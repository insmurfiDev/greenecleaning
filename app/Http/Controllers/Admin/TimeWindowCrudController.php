<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LocationRequest;
use App\Http\Requests\TimeWindowRequest;
use App\Location;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Http\Request;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class TimeWindowCrudController extends CrudController
{
	use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
	use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
	use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
	use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
	use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
	use Traits\AjaxUploadImagesTrait;
	public function setup()
	{
		CRUD::setModel(\App\Models\TimeWindow::class);
		CRUD::setRoute(config('backpack.base.route_prefix') . '/time_window');
		CRUD::setEntityNameStrings('Time window', 'Time windows');
	}

	protected function setupListOperation()
	{
		$this->crud->addColumn([
			'name' => 'time_start',
			'label' => 'From',
			'type' => 'text'
		]);
		$this->crud->addColumn([
			'name' => 'time_end',
			'label' => 'To',
			'type' => 'text'
		]);
	}


	protected function setupCreateOperation()
	{
		CRUD::setValidation(TimeWindowRequest::class);

		$this->crud->addField([
			'name' => 'time_start',
			'label' => 'From',
			'type' => 'text',
			'attributes' => [
				'required' => true
			]
		]);
		$this->crud->addField([
			'name' => 'time_end',
			'label' => 'To',
			'type' => 'text',
			'attributes' => [
				'required' => true
			]
		]);

	}

	protected function setupUpdateOperation()
	{
		$this->setupCreateOperation();
	}


}
