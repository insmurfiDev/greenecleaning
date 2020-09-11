<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReviewRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ReviewCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ReviewCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Review::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/review');
        CRUD::setEntityNameStrings('review', 'reviews');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // columns
        $this->crud->addColumn([
            'name'=>'name',
            'label'=>'Name',
            'type'=>'closure',
            'searchLogic' => 'text',
            'function' => function($entry)
            {
                if (strlen($entry->name)>50)
                    $text=substr($entry->name,0,50).'...';
                else
                    $text=$entry->name;
                return '<a class="btn 	 btn-link"  href="review/'.$entry->id.'/edit"><span>'.$text.'</span></a>';
            }
        ]);

        $this->crud->addColumn(['name'=>'rating','label'=>'Rating','type'=>'number','orderable'=>true]);
        $this->crud->addColumn(['name'=>'review_date','label'=>'Date','type'=>'date','orderable'=>true]);
        $this->crud->addColumn(['name'=>'product.name','label'=>'Product','type'=>'text']);
        $this->crud->addColumn(['name'=>'sort','label'=>'Order','type'=>'text']);
        $this->crud->addColumn(['name'=>'active','label'=>'Active','type'=>'boolean']);

    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(ReviewRequest::class);

        //CRUD::setFromDb(); // fields
        $this->crud->addField([
            'name'=>'active',
            'label'=>' Active',
            'type'=>'checkbox',

            'wrapper'=>[
                'class' => 'form-group col-md-12 pt-4',
            ],
        ]);

        $this->crud->addField([
            'name'=>'name',
            'label'=>'Reviewer name',
            'type'=>'text',
            'wrapper'=>[
                'class' => 'form-group col-md-6',
            ],
            'attributes' => ['required' => true,],
        ]);
        $this->crud->addField([
            'name'=>'address',
            'label'=>'Address',
            'type'=>'text',
            'wrapper'=>[
                'class' => 'form-group col-md-6',
            ],
            'attributes' => ['required' => true],
        ]);
        $this->crud->addField([
            'name'=>'rating',
            'label'=>'Rating',
            'type'=>'select_from_array',
            'options'=> [1=>1,2=>2,3=>3,4=>4,5=>5],
            'wrapper'=>[
                'class' => 'form-group col-md-2',
            ],
        ]);

        $this->crud->addField([
            'name'=>'product_id',
            'label'=>'Product',
            'type'=>'select',
            'entity'=>'product',
            'attribute'=>'name',
            'attributes'=>[
                'rows'=>5,
            ],
            'wrapper'=>[
                'class' => 'form-group col-md-4',
            ],
        ]);
        $this->crud->addField([
            'name'=>'sort',
            'label'=>'Order',
            'type'=>'number',
            'wrapper'=>[
                'class' => 'form-group col-md-3',
            ],
        ]);
        $this->crud->addField([
            'name'=>'review_date',
            'label'=>'Review Date',
            'type'=>'date_picker',
            'wrapper'=>[
                'class' => 'form-group col-md-3',
            ],
        ]);

        $this->crud->addField([
            'name'=>'msg',
            'label'=>'Review text',
            'type'=>'textarea',
            'wrapper'=>[
                'class' => 'form-group col-md-12',
            ],
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
