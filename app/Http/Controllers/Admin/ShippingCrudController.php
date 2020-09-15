<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ShippingRequest;
use App\Models\State;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ShippingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ShippingCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Shipping::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/shipping');
        CRUD::setEntityNameStrings('shipping', 'shippings');
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
                return '<a class="btn 	 btn-link"  href="shipping/'.$entry->id.'/edit"><span>'.$text.'</span></a>';
            }
        ]);

        $this->crud->addColumn(['name'=>'sort','label'=>'Order','type'=>'text']);
        $this->crud->addColumn(['name'=>'active','label'=>'Active','type'=>'boolean']);

    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ShippingRequest::class);

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
            'label'=>'Shipper name',
            'type'=>'text',
            'wrapper'=>[
                'class' => 'form-group col-md-6',
                ],
            'attributes' => ['required' => true,],
        ]);

        $this->crud->addField([
            'name'=>'sort',
            'label'=>'Order',
            'type'=>'number',
            'wrapper'=>[
                'class' => 'form-group col-md-6',
            ],
        ]);

        $this->crud->addField([
            'name'=>'html1',
            'type'=>'custom_html',
            'value'=>'Pice per base item',
            'wrapper'=>[
                'class' => 'form-group col-md-12',
            ],
        ]);


        $states=State::orderby('name')->get();
        foreach ($states as $state)
        {
            $this->crud->addField([
                'name' => $state->code,
                'label' => $state->code,
                'fake' => true,
                'type'=>'number',
                'prefix'=>'$',
                'store_in' => 'prices',
                'wrapper'=>[
                        'class' => 'form-group col-md-2',
                    ],
                ]);
        }
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
