<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CleaningRequest;
use App\Http\Requests\FlatSizeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class CleaningCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use Traits\AjaxUploadImagesTrait;
    public function setup()
    {
        CRUD::setModel(\App\Models\Cleaning::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/cleaning');
        CRUD::setEntityNameStrings('Cleaning', 'Cleanings');
    }

    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // columns
        $this->crud->addColumn([
            'name' => 'location_id',
            'label' => 'Location',
            'type' => 'select',
            'entity' => 'location'
        ]);

        $this->crud->addColumn([
            'name' => 'come_date',
            'label' => 'Come date',
            'type' => 'text',
            'searchLogic' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'time_window_id',
            'label' => 'Time window',
            'type' => 'select',
            'entity' => 'time_window',
            'attribute' => 'window'
        ]);

        $this->crud->addColumn([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
        ]);

        $this->crud->addColumn([
            'name' => 'cleaning_type_id',
            'label' => 'Cleaning type',
            'type' => 'select',
            'entity' => 'cleaning_type'
        ]);

        $this->crud->addColumn([
            'name' => 'flat_size_id',
            'label' => 'Flat size',
            'type' => 'select',
            'entity' => 'flat_size'
        ]);

        $this->crud->addColumn([
            'name' => 'bathroom_size_id',
            'label' => 'Bathroom size',
            'type' => 'select',
            'entity' => 'bathroom_size'
        ]);

    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(CleaningRequest::class);

        $this->crud->addField([
            'name' => 'come_date',
            'label' => 'Come date',
            'type' => 'date',
            'searchLogic' => 'text',
            'attributes' => [
                'required' => true
            ]
        ]);

        $this->crud->addField([
            'name' => 'location_id',
            'label' => 'Location',
            'type' => 'select2',
            'entity' => 'location',
            'attributes' => [
                'required' => true
            ]
        ]);

        $this->crud->addField([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'text',
            'attributes' => [
                'required' => true
            ]
        ]);

        $this->crud->addField([
            'name' => 'apt_number',
            'label' => 'Apt. number',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'attributes' => [
                'required' => true
            ]
        ]);

        $this->crud->addField([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
            'attributes' => [
                'required' => true
            ]
        ]);

        $this->crud->addField([
            'name' => 'phone',
            'label' => 'Phone',
            'type' => 'text',
            'attributes' => [
                'required' => true
            ]
        ]);

        $this->crud->addField([
            'name' => 'pay_now',
            'label' => 'Is pay now',
            'type' => 'boolean',
            'attributes' => [
                'required' => true
            ]
        ]);

        $this->crud->addField([
            'name' => 'paypal_email',
            'label' => 'Paypal email',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'time_window_id',
            'label' => 'Time window',
            'type' => 'select2',
            'entity' => 'time_window',
            'attribute' => 'window',
            'attributes' => [
                'required' => true
            ]
        ]);

        $this->crud->addField([
            'name' => 'cleaning_type_id',
            'label' => 'Cleaning type',
            'type' => 'select2',
            'entity' => 'cleaning_type',
            'attributes' => [
                'required' => true
            ]
        ]);

        $this->crud->addField([
            'name' => 'flat_size_id',
            'label' => 'Flat size',
            'type' => 'select2',
            'entity' => 'flat_size',
            'attributes' => [
                'required' => true
            ]
        ]);

        $this->crud->addField([
            'name' => 'bathroom_size_id',
            'label' => 'Bathroom size',
            'type' => 'select2',
            'entity' => 'bathroom_size',
            'model' => "App\Models\BathroomSize",
            'attributes' => [
                'required' => true
            ]
        ]);

        CRUD::addField([
            'name' => 'extras',
            'label' => 'Extras',
            'type' => 'select2_multiple',
            'entity' => 'extras',
            'attribute' => 'name',
            'model' => "App\Models\Extras",
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }


}
