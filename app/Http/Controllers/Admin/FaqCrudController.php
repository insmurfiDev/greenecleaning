<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FaqRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FaqCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FaqCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Faq::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/faq');
        CRUD::setEntityNameStrings('FAQ', 'FAQs');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name'=>'question',
            'label'=>'Question',
            'type'=>'closure',
            'searchLogic' => 'text',
            'function' => function($entry)
            {
                if (strlen($entry->question)>50)
                    $text=substr($entry->question,0,50).'...';
                else
                    $text=$entry->question;
                return '<a class="btn 	 btn-link"  href="faq/'.$entry->id.'/edit"><span>'.$text.'</span></a>';
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
        CRUD::setValidation(FaqRequest::class);

        $this->crud->addField([
            'name'  => 'question',
            'label' => 'Question text',
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
            'name'  => 'answer',
            'label' => 'Answer',
            'type'  => 'textarea'
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
