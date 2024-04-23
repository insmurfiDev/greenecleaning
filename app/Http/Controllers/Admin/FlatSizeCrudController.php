<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FlatSizeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class FlatSizeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use Traits\AjaxUploadImagesTrait;
    public function setup()
    {
        CRUD::setModel(\App\Models\FlatSize::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/flat_size');
        CRUD::setEntityNameStrings('Flat size', 'Flat sizes');
    }

    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // columns
        $this->crud->addColumn([
            'name' => 'size',
            'label' => 'Size',
            'type' => 'text',
            'searchLogic' => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'price',
            'label' => 'Price',
            'type' => 'number',
            'searchLogic' => 'text',
        ]);

    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(FlatSizeRequest::class);

        $this->crud->addField([
            'name' => 'size',
            'label' => 'Size',
            'type' => 'text',
            'attributes' => [
                'required' => true,
            ],
        ]);

        $this->crud->addField([
            'name' => 'price',
            'label' => 'Price',
            'type' => 'number',
            'attributes' => [
                'required' => true,
            ],
        ]);

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }


}
