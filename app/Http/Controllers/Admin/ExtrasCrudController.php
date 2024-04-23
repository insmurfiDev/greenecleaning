<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FlatSizeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ExtrasCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use Traits\AjaxUploadImagesTrait;
    public function setup()
    {
        CRUD::setModel(\App\Models\Extras::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/extras');
        CRUD::setEntityNameStrings('Extra', 'Extras');
    }

    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // columns
        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Name',
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


    protected function setupUpdateOperation()
    {
        CRUD::setValidation(FlatSizeRequest::class);

        $this->crud->addField([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'attributes' => [
                'disabled' => true,
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


}
