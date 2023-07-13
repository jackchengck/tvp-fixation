<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Requests\OrderRequest;
    use Backpack\CRUD\app\Http\Controllers\CrudController;
    use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
    use Backpack\CRUD\app\Library\Widget;
    use Backpack\ReviseOperation\ReviseOperation;

    /**
     * Class OrderCrudController
     * @package App\Http\Controllers\Admin
     * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
     */
    class OrderCrudController extends CrudController
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
            CRUD::setModel(\App\Models\Order::class);
            CRUD::setRoute(config('backpack.base.route_prefix') . '/order');
            CRUD::setEntityNameStrings('order', 'orders');
        }

        /**
         * Define what happens when the List operation is loaded.
         *
         * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
         * @return void
         */
        protected function setupListOperation()
        {
            CRUD::column('order_num');
            CRUD::column('order_date');
            CRUD::addColumns(
                [
                    [
                        'name'        => 'customer',
                        'type'        => 'relationship',
                        'attribute'   => 'displayName',
                        'searchLogic' => function ($query, $column, $searchTerm) {
                            $query->orWhereHas(
                                'customer', function ($q) use ($column, $searchTerm) {
                                $q->where('name', 'like', '%' . $searchTerm . '%')->orWhere(
                                    'uid', 'like', '%' . $searchTerm . '%'
                                )->orWhere(
                                    'email', 'like', '%' . $searchTerm . '%'
                                );
//                                    ->orWhereDate('depart_at', '=', date($searchTerm));
                            }
                            );
                        }

                    ]
                ]
            );

//            CRUD::column('coupon_id');
//            CRUD::column('coupon_code');
//            CRUD::column('discount');
//            CRUD::column('discount_is_percentage');
            CRUD::column('total');
//            CRUD::column('payment_uid');
            CRUD::column('payment_method');
            CRUD::column('payment_status');
            CRUD::column('delivery_method');
            CRUD::column('delivery_status');
//            CRUD::column('delivery_address');
//            CRUD::column('business_id');
//            CRUD::column('customer_id');

//            $this->crud->filters();

            /**
             * Columns can be defined using the fluent syntax or array syntax:
             * - CRUD::column('price')->type('number');
             * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
             */


//            $this->crud->addButtonFromModelFunction('line', 'get_order_email_button', 'getOrderCustomerEmailButton', 'beginning');

            $this->crud->addButtonFromModelFunction('line', 'get_send_order_receipt_button', 'getSendOrderReceiptButton', 'beginning');
            $this->crud->addButtonFromModelFunction('line', 'get_send_order_invoice_button', 'getSendOrderInvoiceButton', 'beginning');

            $this->crud->addButtonFromModelFunction('line', 'get_order_receipt_button', 'getOrderReceiptButton', 'beginning');
            $this->crud->addButtonFromModelFunction('line', 'get_order_invoice_button', 'getOrderInvoiceButton', 'beginning');


        }

//        protected function setupShowOperation()
//        {
//            $this->setupListOperation();
//        }

        /**
         * Define what happens when the Create operation is loaded.
         *
         * @see https://backpackforlaravel.com/docs/crud-operation-create
         * @return void
         */
        protected function setupCreateOperation()
        {
            CRUD::setValidation(OrderRequest::class);

            CRUD::field('order_num');
            CRUD::field('order_date');
//            CRUD::field('coupon_id');
            CRUD::field('coupon_code');
            CRUD::field('discount');
            CRUD::field('discount_is_percentage');
            Crud::addFields(
                [
                    [
                        'name' => 'discount_is_percentage',
                        'type' => 'switch',

                    ],
                    [
                        'name'      => 'orderItems',
                        'type'      => 'relationship',
                        'subfields' => [
                            [
                                'name'    => 'product',
                                'type'    => 'relationship',
                                'wrapper' => [
                                    'class' => 'form-group col-md-6'
                                ]

                            ],
                            [
                                'name'    => 'quantity',
                                'type'    => 'number',
                                'wrapper' => [
                                    'class' => 'form-group col-md-4'
                                ]
                            ],
                            [
                                'name'       => 'price',
                                'type'       => 'number',
                                'attributes' => [
                                    'step' => 'any',
                                ],
                                'prefix'     => '$',
                                'wrapper'    => [
                                    'class' => 'form-group col-md-2'
                                ]
                            ]
                        ],
                    ]
                ]
            );
//            CRUD::field('total');
//            CRUD::field('total');
            CRUD::addFields(
                [

                    [
                        'name'       => 'subtotal',
                        'type'       => 'number',
                        'attributes' => [
                            'step' => 'any',
                        ],
                        'prefix'     => '$',
                    ],
                    [
                        'name'       => 'total',
                        'type'       => 'number',
                        'attributes' => [
                            'step' => 'any',
                        ],
                        'prefix'     => '$',
                    ]
                ]
            );
//            CRUD::field('payment_status');
            CRUD::field('payment_uid');
//            CRUD::field('delivery_method');
//            CRUD::field('delivery_status');
            CRUD::addFields(
                [
                    [
                        'name'    => 'payment_method',
                        'type'    => 'enum',
                        'label'   => 'Payment Method',
                        'options' => [
                            'onsite'      => '到付',
                            'credit_card' => '信用卡',
                            //                            'rejected' => '被拒絕',
                            //                            'refunded' => '已退款',
                        ],
                    ],
                    [
                        'name'    => 'payment_status',
                        'type'    => 'enum',
                        'label'   => 'Payment Status',
                        'options' => [
                            'pending'  => '待處理中',
                            'paid'     => '已付款',
                            'rejected' => '被拒絕',
                            'refunded' => '已退款',
                        ],
                    ],

                    [
                        'name'    => 'delivery_method',
                        'type'    => 'enum',
                        'label'   => 'Delivery Method',
                        'options' => [
                            'pickup'   => '自取',
                            'delivery' => '送貨',
                        ],
                    ],

                    [
                        'name'    => 'delivery_status',
                        'type'    => 'enum',
                        'label'   => 'Delivery Status',
                        'options' => [
                            'pending'    => '待處理中',
                            'processing' => '處理中',
                            'finished'   => '已完成',
                            'cancelled'  => '已取消',
                        ],
                    ],
                ]
            );
            CRUD::field('delivery_address');
            CRUD::field('business_id');
//            CRUD::field('customer_id');
            CRUD::addFields(
                [
                    [
                        'name'                 => 'customer',
                        'type'                 => 'relationship',
                        'attribute'            => 'email',
                    ],
                    [
                        'name'  => 'remarks',
                        'type'  => 'textarea',
                        'label' => 'Remarks'
                    ],
                ]
            );

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
