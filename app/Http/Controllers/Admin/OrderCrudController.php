<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Order::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order');
        CRUD::setEntityNameStrings('order', 'orders');
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

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
        //CRUD::setFromDb(); // columns
        $this->crud->addColumn([
            'name'=>'fname',
            'label'=>'Name',
            'type'=>'closure',
            'searchLogic' => 'text',
            'function' => function($entry)
            {
                $text=$entry->fname.' '.$entry->lname;
                if (strlen($text)>50)
                    $text=substr($text,0,50).'...';
                return '<a class="btn 	 btn-link"  href="order/'.$entry->id.'/edit"><span>'.$text.'</span></a>';
            }
        ]);

        $this->crud->addColumn(['name'=>'order_date','label'=>'Order date','type'=>'datetime']);
        $this->crud->addColumn(['name'=>'order_status(status)','label'=>'Status','type'=>'date']);

    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(OrderRequest::class);

        //CRUD::setFromDb(); // fields
        $this->crud->addField([
            'name'  => 'id',
            'label' => 'Order#',
            'type'  => 'text',

            'wrapper'=>[
                'class' => 'form-group col-md-1',
            ],
        ]);

        $this->crud->addField([
            'name'  => 'order_date',
            'label' => 'Order date/time',
            'type'  => 'datetime',
            'wrapper'=>[
                'class' => 'form-group col-md-3',
            ],
        ]);
        $this->crud->addField([
            'name'  => 'email',
            'label' => 'Customer email',
            'type'  => 'text',
            'wrapper'=>[
                'class' => 'form-group col-md-4',
            ],
        ]);
        $this->crud->addField([
            'name'  => 'phone',
            'label' => 'Customer phone',
            'type'  => 'text',
            'wrapper'=>[
                'class' => 'form-group col-md-4',
            ],
        ]);

        $this->crud->addField([
            'name'  => 'transaction',
            'label' => 'transaction id',
            'type'  => 'text',
            'wrapper'=>[
                'class' => 'form-group col-md-4',
            ],
        ]);

        $this->crud->addField([
            'name'  => 'status',
            'label' => 'Status',
            'type'  => 'select_from_array',
            'options'=>order_status(),
            'allows_null' => false,

            'wrapper'=>[
                'class' => 'form-group col-md-4',
            ],
        ]);

        $this->crud->addField([
            'name'  => 'html1',
            'value'=>'Shipping data:',
            'label' => 'Product name',
            'type'  => 'custom_html',
            'wrapper'=>[
                'class' => 'form-group col-md-12',
            ],
        ]);

        $this->crud->addField([
            'name'  => 'fname',
            'label' => 'first name',
            'type'  => 'text',
            'wrapper'=>[
                'class' => 'form-group col-md-3',
            ],
        ]);
        $this->crud->addField([
            'name'  => 'lname',
            'label' => 'last name',
            'type'  => 'text',
            'wrapper'=>[
                'class' => 'form-group col-md-3',
            ],
        ]);
        $this->crud->addField([
            'name'  => 'address',
            'label' => 'address',
            'type'  => 'text',
            'wrapper'=>[
                'class' => 'form-group col-md-4',
            ],
        ]);
        $this->crud->addField([
            'name'  => 'apt',
            'label' => 'apt/suite',
            'type'  => 'text',
            'wrapper'=>[
                'class' => 'form-group col-md-2',
            ],
        ]);

        $this->crud->addField([
            'name'  => 'html2',
            'value'=>'Billing data:',
            'type'  => 'custom_html',
            'wrapper'=>[
                'class' => 'form-group col-md-12',
            ],
        ]);

        $this->crud->addField([
            'name'  => 'fname_b',
            'label' => 'first name',
            'type'  => 'text',
            'wrapper'=>[
                'class' => 'form-group col-md-3',
            ],
        ]);
        $this->crud->addField([
            'name'  => 'lname_b',
            'label' => 'last name',
            'type'  => 'text',
            'wrapper'=>[
                'class' => 'form-group col-md-3',
            ],
        ]);
        $this->crud->addField([
            'name'  => 'address_b',
            'label' => 'address',
            'type'  => 'text',
            'wrapper'=>[
                'class' => 'form-group col-md-4',
            ],
        ]);
        $this->crud->addField([
            'name'  => 'apt_b',
            'label' => 'apt/suite',
            'type'  => 'text',
            'wrapper'=>[
                'class' => 'form-group col-md-2',
            ],
        ]);

        $this->crud->addField([
            'name'  => 'details',
            'label' => 'Order details',
            'type'  => 'textarea',
            'wrapper'=>[
                'class' => 'form-group col-md-12',
            ],
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
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
