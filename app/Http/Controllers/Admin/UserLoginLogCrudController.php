<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserLoginLogRequest;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UserLoginLogCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserLoginLogCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;

//    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
//    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
//    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
//    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\UserLoginLog::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user-login-log');
        CRUD::setEntityNameStrings('user login log', 'user login logs');

    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('user_id');
        CRUD::column('business_id');
        CRUD::addColumns([
            [
                'name' => 'created_at',
                'type' => 'datetime',
                'label'=>'Login Date Time'
            ]
        ]);


        $this->crud->addFilter([
            'name' => 'user',
            'type' => 'select2',
            'label' => 'User'
        ], function () {
            return User::all()->keyBy('id')->pluck('name', 'id')->toArray();
        }, function ($value) {
            $this->crud->addClause('where', 'user_id', $value);
        });

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
        CRUD::setValidation(UserLoginLogRequest::class);

        CRUD::field('user_id');
        CRUD::field('business_id');

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
