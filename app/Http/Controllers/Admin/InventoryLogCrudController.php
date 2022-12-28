<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InventoryLogRequest;
use App\Models\Location;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class InventoryLogCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class InventoryLogCrudController extends CrudController
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
        CRUD::setModel(\App\Models\InventoryLog::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/inventory-log');
        CRUD::setEntityNameStrings('inventory log', 'inventory logs');


        $this->crud->denyAccess(['create', 'delete', 'list', 'update']);

        if (backpack_user()->isSuperAdmin) {
            $this->crud->allowAccess(['create', 'delete', 'list', 'update']);
        }


        if (backpack_user()->hasPermissionTo('view inventory logs')) {
            $this->crud->allowAccess(['list',]);
        }

        if (backpack_user()->hasPermissionTo('edit inventory logs')) {
            $this->crud->allowAccess(['list', 'update']);
        }

        if (backpack_user()->hasPermissionTo('create inventory logs')) {
            $this->crud->allowAccess(['create']);
        }
        if (backpack_user()->hasPermissionTo('delete inventory logs')) {
            $this->crud->allowAccess(['delete',]);
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

        CRUD::column('product_id');
        CRUD::column('location');
        CRUD::addColumn([
            'name' => 'type',
            'type' => 'enum',
            'options' => [
                'move_in' => 'Move In',
                'move_out' => 'Move out',
                'consume' => 'Consumed',
                'damaged' => 'Damaged',
                'sold' => 'Sold'
            ]
        ]);
        CRUD::column('quantity');
        CRUD::column('remark');
//        CRUD::column('business_id');
//        CRUD::column('user_id');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */

        $this->crud->addFilter([
            'name' => 'location',
            'type' => 'select2',
            'label' => 'Location'
        ], function () {
            return Location::all()->keyBy('id')->pluck('title', 'id')->toArray();
        }, function ($value) {
            $this->crud->addClause('where', 'location_id', $value);
        });
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(InventoryLogRequest::class);

        CRUD::field('type');
        CRUD::addField([
            'name' => 'type',
            'type' => 'enum',
            'options' => [
                'move_in' => 'Move In',
                'move_out' => 'Move out',
                'consume' => 'Consumed',
                'damaged' => 'Damaged',
                'sold' => 'Sold'
            ]
        ]);
        CRUD::field('quantity');
        CRUD::field('remark');
        CRUD::field('location_id');
        CRUD::field('product_id');
        CRUD::field('business_id');
        CRUD::field('user_id');

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
