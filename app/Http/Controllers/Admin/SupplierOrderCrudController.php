<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SupplierOrderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\ReviseOperation\ReviseOperation;

/**
 * Class SupplierOrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SupplierOrderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use ReviseOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\SupplierOrder::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/supplier-order');
        CRUD::setEntityNameStrings('supplier order', 'supplier orders');



        $this->crud->denyAccess(['create', 'delete', 'list', 'update']);

        if (backpack_user()->isSuperAdmin) {
            $this->crud->allowAccess(['create', 'delete', 'list', 'update']);
        }


        if (backpack_user()->hasPermissionTo('view supplier orders')) {
            $this->crud->allowAccess(['list',]);
        }

        if (backpack_user()->hasPermissionTo('edit supplier orders')) {
            $this->crud->allowAccess(['list', 'update']);
        }

        if (backpack_user()->hasPermissionTo('create supplier orders')) {
            $this->crud->allowAccess(['create']);
        }
        if (backpack_user()->hasPermissionTo('delete supplier orders')) {
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
        CRUD::column('supplier_id');
        CRUD::column('user_id');
        CRUD::column('business_id');

        $this->crud->addButtonFromModelFunction('line', 'get_supplier_order_email_button', 'getSupplierOrderEmailButton', 'beginning');

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
        CRUD::setValidation(SupplierOrderRequest::class);

        CRUD::field('supplier_id');
        CRUD::field('user_id');
        CRUD::field('business_id');

        CRUD::addFields([
            [
                'name' => 'supplierOrderItems',
                'type' => 'relationship',


                'subfields' => [
                    [
                        'name' => 'product',
                        'type' => 'relationship',


//                'entity' => 'maids',
//                        'attribute' => 'name',
//                'data_source' => url('api/maid'),
//                'pivot' => true,
//                        'include_all_form_fields' => true,
//                        'method' => 'POST',
                    ],
                    [
                        'name' => 'quantity',
                        'type' => 'number',
                        'attributes' => [
                            'step' => 'any'
                        ],
                        'default' => 0,
                    ],

                ]
            ]
        ]);

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
