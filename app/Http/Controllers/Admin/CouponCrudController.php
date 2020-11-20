<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CouponRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CouponCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CouponCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Coupon::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/coupon');
        CRUD::setEntityNameStrings('coupon', 'coupons');
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
            'label'=>'Coupon',
            'type'=>'closure',
            'searchLogic' => 'text',
            'function' => function($entry)
            {
                if (strlen($entry->name)>50)
                    $text=substr($entry->name,0,50).'...';
                else
                    $text=$entry->name;
                return '<a class="btn 	 btn-link"  href="coupon/'.$entry->id.'/edit"><span>'.$text.'</span></a>';
            }
        ]);

        $this->crud->addColumn(['name'=>'active','label'=>'Active','type'=>'boolean']);
        $this->crud->addColumn(['name'=>'value','label'=>'Value','type'=>'number']);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CouponRequest::class);

        //CRUD::setFromDb(); // fields
        $this->crud->addField([
            'name'  => 'name',
            'label' => 'Coupon name',
            'type'  => 'text',
            'wrapper'=>[
                'class' => 'form-group col-md-6',
            ],
        ]);
        $this->crud->addField([
            'name'  => 'code',
            'label' => 'Coupon code',
            'type'  => 'text',
            'wrapper'=>[
                'class' => 'form-group col-md-6',
            ],
        ]);
        $this->crud->addField([
            'name'  => 'active',
            'label' => 'Active',
            'type'  => 'checkbox',
            'default'=>1,
            'wrapper'=>[
                'class' => 'form-group col-md-2 pt-4',
            ],
        ]);
        $this->crud->addField([
            'name'  => 'type',
            'label' => 'Type',
            'type'  => 'select_from_array',
            'options'     => ['1' => '%', '2' => '$'],
            'allows_null' => false,
            'wrapper'=>[
                'class' => 'form-group col-md-2',
            ],
        ]);
        $this->crud->addField([
            'name'  => 'value',
            'label' => 'Value',
            'type'  => 'number',
            'wrapper'=>[
                'class' => 'form-group col-md-2',
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
