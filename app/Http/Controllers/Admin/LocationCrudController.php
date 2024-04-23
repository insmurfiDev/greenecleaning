<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LocationRequest;
use App\Location;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Http\Request;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class LocationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use Traits\AjaxUploadImagesTrait;
    public function setup()
    {
        CRUD::setModel(\App\Models\Location::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/location');
        CRUD::setEntityNameStrings('location', 'locations');
    }

    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // columns
        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Location',
            'type' => 'closure',
            'searchLogic' => 'text',
            'function' => function ($entry) {
                if (strlen($entry->name) > 50)
                    $text = substr($entry->name, 0, 50) . '...';
                else
                    $text = $entry->name;
                return '<a class="btn 	 btn-link"  href="location/' . $entry->id . '/edit"><span>' . $text . '</span></a>';
            }
        ]);

        $this->crud->addColumn([
            'name' => 'additional_price_percent',
            'label' => 'Additional price (%)',
            'type' => 'number'
        ]);

    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(LocationRequest::class);

        $this->crud->addField([
            'name' => 'name',
            'label' => 'Location name',
            'type' => 'text',
            'attributes' => [
                'required' => true,
            ],
        ]);

        $this->crud->addField([
            'name' => 'additional_price_percent',
            'label' => 'Additional price (%)',
            'type' => 'number',
            'attributes' => [
                'default' => 0,
            ],
        ]);

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }


}
