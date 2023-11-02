<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Requests\FoodOrderRequest;
    use Backpack\CRUD\app\Http\Controllers\CrudController;
    use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
    use Backpack\CRUD\app\Library\Widget;
    use Backpack\EditableColumns\Http\Controllers\Operations\MinorUpdateOperation;

    /**
     * Class FoodOrderCrudController
     * @package App\Http\Controllers\Admin
     * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
     */
    class FoodOrderCrudController extends CrudController
    {
        use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
        use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
        use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
        use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
        use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
        use MinorUpdateOperation;

        /**
         * Configure the CrudPanel object. Apply settings to all operations.
         *
         * @return void
         */
        public function setup()
        {
            CRUD::setModel(\App\Models\FoodOrder::class);
            CRUD::setRoute(config('backpack.base.route_prefix') . '/food-order');
            CRUD::setEntityNameStrings('food order', 'food orders');
        }

        /**
         * Define what happens when the List operation is loaded.
         *
         * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
         * @return void
         */
        protected function setupListOperation()
        {
            CRUD::column('business_id');
            CRUD::column('table_id');
//            CRUD::column('status');
//            CRUD::column('payment_method');

            CRUD::addColumns(
                [

                    [
                        'name'    => 'status',
                        //                        'type'    => 'select_from_array',
                        'type'    => 'editable_select',
                        'options' => [
                            'preparing' => '準備中',
                            'delivered' => '已出餐',
                            'paid'      => '已結帳',
                        ],
                    ],

                    [
                        'name'    => 'payment_method',
                        //                        'type'    => 'select_from_array',
                        'type'    => 'editable_select',
                        'options' => [
                            null          => '---',
                            'cash'        => '現金',
                            'credit_card' => '信用卡',
                            'octopus'     => '八達通',
                            'payme'       => 'Payme',
                            'alipay'      => '支付寶',
                            'wechatpay'   => '微信支付',
                            'other'       => '其他',

                        ],
                    ],
                ]
            );

            /**
             * Columns can be defined using the fluent syntax or array syntax:
             * - CRUD::column('price')->type('number');
             * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
             */
            $this->crud->addButtonFromModelFunction('line', 'set_status_paid_button', 'getSetStatusPaidButton', 'beginning');
            $this->crud->addButtonFromModelFunction('line', 'set_status_delivered_button', 'getSetStatusDeliveredButton', 'beginning');


        }

        /**
         * Define what happens when the Create operation is loaded.
         *
         * @see https://backpackforlaravel.com/docs/crud-operation-create
         * @return void
         */
        protected function setupCreateOperation()
        {
            CRUD::setValidation(FoodOrderRequest::class);

//            CRUD::field('table_id');
//            CRUD::field('payment_method');
//            CRUD::field('status');

            CRUD::addFields(
                [
                    [
                        'name' => 'table',
                        'type' => 'relationship',
                    ],
                    [
                        'name'      => 'foodOrderItems',
                        'type'      => 'relationship',
                        'subfields' => [
                            [
                                'name' => 'dish',
                                'type' => 'relationship',

                            ],

                            [
                                'name'       => 'quantity',
                                'type'       => 'number',
                                'attributes' => [
                                    'step' => '1'
                                ],
                                'default'    => 1,
                            ],
                        ]
                    ],
                    [
                        'name'        => 'status',
                        'type'        => 'select_from_array',
                        'options'     => [
                            'preparing' => '準備中',
                            'delivered' => '已出餐',
                            'paid'      => '已結帳',
                        ],
                        'allows_null' => false,
                        'default'     => 'preparing'
                    ],

                    [
                        'name'        => 'payment_method',
                        'type'        => 'select_from_array',
                        'options'     => [
                            null          => '---',
                            'cash'        => '現金',
                            'credit_card' => '信用卡',
                            'octopus'     => '八達通',
                            'payme'       => 'Payme',
                            'alipay'      => '支付寶',
                            'wechatpay'   => '微信支付',
                            'other'       => '其他',
                        ],
                        'allows_null' => true,
                        'default'     => null
                    ],
                ]
            );

            CRUD::field('business_id');

            /**
             * Fields can be defined using the fluent syntax or array syntax:
             * - CRUD::field('price')->type('number');
             * - CRUD::addField(['name' => 'price', 'type' => 'number']));
             */


            Widget::add()->to('after_content')->type('div')->class('row')->content(
                [
                    Widget::make(
                        [
                            'type'     => 'view',
                            'view'     => 'admin.components.show_payment_qrcode',
                            'someAttr' => 'some value',
                        ]
                    ),

                ]
            );

        }

        /**
         * Define what happens when the Update operation is loaded.
         *
         * @see https://backpackforlaravel.com/docs/crud-operation-update
         * @return void
         */
        protected function setupUpdateOperation()
        {
            CRUD::addFields(
                [

                    [
                        'name'       => 'created_at',
                        'label'      => '下單時間',
                        'type'       => 'datetime',
                        'attributes' => [
                            'readonly' => 'readonly'
                        ],

                    ],
                ]
            );

            $this->setupCreateOperation();

        }
    }
