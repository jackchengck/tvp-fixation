<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Requests\DishRequest;
    use Backpack\CRUD\app\Http\Controllers\CrudController;
    use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

    /**
     * Class DishCrudController
     * @package App\Http\Controllers\Admin
     * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
     */
    class DishCrudController extends CrudController
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
            CRUD::setModel(\App\Models\Dish::class);
            CRUD::setRoute(config('backpack.base.route_prefix') . '/dish');
            CRUD::setEntityNameStrings('dish', 'dishes');
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
            CRUD::column('image')->type('image');
            CRUD::column('price');
            CRUD::column('active')->type('check');
            CRUD::column('business_id');

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
            CRUD::setValidation(DishRequest::class);

            CRUD::addFields(
                [
                    [
                        'name'  => 'title',
                        'label' => 'Title',
                        'type'  => 'text'
                    ],

                    [
                        'name'  => 'description',
                        'label' => 'Description',
                        'type'  => 'textarea'
                    ],

                    [
                        'name'    => 'active',
                        'label'   => 'Active',
                        'type'    => 'switch',
                        'default' => true
                    ],

                    [
                        'name'  => 'image',
                        'label' => 'Image',
                        'type'  => 'image'
                    ],

                    [
                        'name'       => 'price',
                        'label'      => 'Price',
                        'type'       => 'number',
                        'attributes' => [
                            'step' => 'any'
                        ],
                        'prefix'     => "$",


                    ],

                    [
                        'name'       => 'cost',
                        'label'      => 'Cost',
                        'type'       => 'number',
                        'attributes' => [
                            'step' => 'any'
                        ],
                        'prefix'     => "$",


                    ],

                ]
            );
            CRUD::field('title');
            CRUD::field('description');
            CRUD::field('image');
            CRUD::field('price');
            CRUD::field('active');
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
