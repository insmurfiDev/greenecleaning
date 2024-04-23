<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CleaningTypeRequest;
use App\Http\Requests\FlatSizeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class CleaningTypeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use Traits\AjaxUploadImagesTrait;
    public function setup()
    {
        CRUD::setModel(\App\Models\CleaningType::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/cleaning_type');
        CRUD::setEntityNameStrings('Cleaning type', 'Cleaning types');
    }

    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // columns
        $this->crud->addColumn([
            'name' => 'type',
            'label' => 'Type',
            'type' => 'text',
            'searchLogic' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'additional_price_percent',
            'label' => 'Additional price percent',
            'type' => 'number',
            'searchLogic' => 'text',
        ]);

    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(CleaningTypeRequest::class);

        $this->crud->addField([
            'name' => 'type',
            'label' => 'Type',
            'type' => 'text',
            'attributes' => [
                'required' => true,
            ],
        ]);

        $this->crud->addField([
            'name' => 'additional_price_percent',
            'label' => 'Additional price percent',
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
