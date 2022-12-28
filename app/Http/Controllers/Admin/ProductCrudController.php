<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('product', 'products');


        $this->crud->denyAccess(['create', 'delete', 'list', 'update']);

        if (backpack_user()->isSuperAdmin) {
            $this->crud->allowAccess(['create', 'delete', 'list', 'update']);
        }


        if (backpack_user()->hasPermissionTo('view products')) {
            $this->crud->allowAccess(['list',]);
        }

        if (backpack_user()->hasPermissionTo('edit products')) {
            $this->crud->allowAccess(['list', 'update']);
        }

        if (backpack_user()->hasPermissionTo('create products')) {
            $this->crud->allowAccess(['create']);
        }
        if (backpack_user()->hasPermissionTo('delete products')) {
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
        CRUD::column('title');
//        CRUD::column('description');
//        CRUD::column('image');
        CRUD::column('cost');
        CRUD::column('price');
//        CRUD::column('minimum_inventory');
//        CRUD::column('alert_quantity');
//        CRUD::column('business_id');
        CRUD::column('supplier_id');

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
        CRUD::setValidation(ProductRequest::class);

//        CRUD::field('title');
//        CRUD::field('description');
////        CRUD::field('image');
//        CRUD::field('cost');
//        CRUD::field('price');
//        CRUD::field('minimum_inventory_quantity');
//        CRUD::field('alert_quantity');
        CRUD::field('business_id');
//        CRUD::field('supplier_id');

        CRUD::addFields([
            [
                'name' => 'title',
                'type' => 'text',
            ],
            [
                'name' => 'description',
                'type' => 'textarea',
            ],
            [
                'name' => 'cost',
                'type' => 'number',
                'attributes' => [
                    'step' => 'any'
                ]
            ],

            [
                'name' => 'price',
                'type' => 'number',
                'attributes' => [
                    'step' => 'any'
                ]
            ],

            [
                'name' => 'minimum_inventory',
                'type' => 'number',
                "default" => 0,

            ],
            [
                'name' => 'alert_quantity',
                'type' => 'number',
                "default" => 0,

            ],
            [
                'name' => 'supplier',
                'type' => 'relationship',
            ],
//            [
//                'name' => 'business',
//                'type' => 'relationship',
//                'value' => backpack_user()->business_id,
//            ]
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

    protected function autoSetupShowOperation()
    {
        $this->setupListOperation();
        CRUD::column('minimum_inventory');
        CRUD::column('alert_quantity');
        CRUD::addColumn([
            'name' => 'quantity',
            'type' => 'number',
            'label' => 'Current Quantity',
        ]);

        CRUD::addColumn([
            'name' => 'alert',
            'type' => 'text',
            'label' => 'Available Alert',
            'wrapper' => [
                'element' => 'span',
                'class' => 'alert alert-danger',
            ],
        ]);

    }
}
