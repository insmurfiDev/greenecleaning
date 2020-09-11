<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use Traits\AjaxUploadImagesTrait;
    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('product', 'products');
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
            'label'=>'Product',
            'type'=>'closure',
            'searchLogic' => 'text',
            'function' => function($entry)
            {
                if (strlen($entry->name)>50)
                    $text=substr($entry->name,0,50).'...';
                else
                    $text=$entry->name;
                return '<a class="btn 	 btn-link"  href="product/'.$entry->id.'/edit"><span>'.$text.'</span></a>';
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
        CRUD::setValidation(ProductRequest::class);

        $this->crud->addField([
            'name'  => 'name',
            'label' => 'Product name',
            'type'  => 'text'
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
            'name'  => 'sort',
            'label' => 'Sort order',
            'type'  => 'number',
            'wrapper'=>[
                'class' => 'form-group col-md-4 ',
            ],
        ]);
        $this->crud->addField([
            'name'=>'price',
            'label'=>'Price',
            'type'=>'text',
            'wrapper'=>[
                'class' => 'form-group col-md-3',
            ],
        ]);
        $this->crud->addField([
            'name'  => 'sale',
            'label' => 'Sale',
            'type'  => 'checkbox',
            //'default'=>1,
            'wrapper'=>[
                'class' => 'form-group col-md-2 pt-4',
            ],
        ]);
        $this->crud->addField([
            'name'  => 'short_desc',
            'label' => 'Short',
            'type'  => 'textarea'
        ]);
        $this->crud->addField([
            'name'  => 'description',
            'label' => 'Description',
            'type'  => 'wysiwyg'
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
        $this->crud->addField([
                'name'          => 'images',
                'type'          => 'dropzone',
                'upload_route'  => 'upload_images',
                'reorder_route' => 'reorder_images',
                'delete_route'  => 'delete_image',
                'disk'          => 'public', // local disk where images will be uploaded
                'mimes'         => 'image/*', //allowed mime types separated by comma. eg. image/*, application/*, etc
                'filesize'      => 10, // maximum file size in MB
                'entry'=>'properties',

            ]
        //'update'=>['images'=>['disk'=>'public']],
        );
    }
}
