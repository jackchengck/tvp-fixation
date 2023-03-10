<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BusinessRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class BusinessCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BusinessCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Business::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/business');
        CRUD::setEntityNameStrings('business', 'businesses');


        $this->crud->denyAccess(['create', 'delete', 'list', 'update']);

        if (backpack_user()->isSuperAdmin) {
            $this->crud->allowAccess(['create', 'delete', 'list', 'update']);
        }

        if (backpack_user()->hasPermissionTo('view business')) {
            $this->crud->allowAccess(['list',]);
        }

        if (backpack_user()->hasPermissionTo('edit business')) {
            $this->crud->allowAccess(['list', 'update']);
        }
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('title');
        CRUD::column('address');
        CRUD::column('phone');
        CRUD::column('info');
        CRUD::column('email');
        CRUD::column('user_id');
        CRUD::column('solution_integrator_id');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(BusinessRequest::class);

        CRUD::field('title');
        CRUD::field('address');
        CRUD::field('phone');
        CRUD::field('info');
        CRUD::field('email');
        CRUD::field('user_id');
        CRUD::field('solution_integrator_id');

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
