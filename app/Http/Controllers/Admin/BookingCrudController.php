<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BookingRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\ReviseOperation\ReviseOperation;

/**
 * Class BookingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BookingCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Booking::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/booking');
        CRUD::setEntityNameStrings('booking', 'bookings');


        $this->crud->denyAccess(['create', 'delete', 'list', 'update']);

        if (backpack_user()->isSuperAdmin) {
            $this->crud->allowAccess(['create', 'delete', 'list', 'update']);
        }


        if (backpack_user()->hasPermissionTo('view bookings')) {
            $this->crud->allowAccess(['list',]);
        }

        if (backpack_user()->hasPermissionTo('edit bookings')) {
            $this->crud->allowAccess(['list', 'update']);
        }

        if (backpack_user()->hasPermissionTo('create bookings')) {
            $this->crud->allowAccess(['create']);
        }
        if (backpack_user()->hasPermissionTo('delete bookings')) {
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
        CRUD::column('service_id');
        CRUD::column('booking_date');
        CRUD::column('customer_name');
        CRUD::column('customer_phone');
        CRUD::column('customer_email');
//        CRUD::column('customer_password');
        CRUD::column('order_num');
        CRUD::column('booking_time');
        CRUD::addColumn(
            [
                'name' => 'booking_status',
                'type' => 'enum',
                'label' => 'Booking Status',
                'options' => [
                    'booked' => 'Booked',
                    'finish' => 'Finish',
                    'cancelled' => 'Cancelled',
                ],
            ],
        );
//        CRUD::column('business_id');
//        getBookingCustomerEmailButton

        $this->crud->addButtonFromModelFunction('line', 'get_booking_customer_email_button', 'getBookingCustomerEmailButton', 'beginning');
        $this->crud->addButtonFromModelFunction('line', 'get_booking_customer_sms_button', 'getBookingCustomerSmsButton', 'beginning');


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
        CRUD::setValidation(BookingRequest::class);

        CRUD::field('service_id');
        CRUD::field('customer_name');
        CRUD::field('customer_email');
//        CRUD::field('customer_phone');
        CRUD::addField([
            'name' => 'customer_phone',
            'type' => 'phone',
            'config' => [
                'onlyCountries' => ['hk'],
                'initialCountry' => 'hk',
            ]
        ]);
        CRUD::field('customer_password');
        CRUD::field('order_num');
        CRUD::field('booking_date');
        CRUD::field('booking_time');
        CRUD::addField(
            [
                'name' => 'booking_status',
                'type' => 'enum',
                'label' => 'Booking Status',
                'options' => [
                    'booked' => 'Booked',
                    'finish' => 'Finish',
                    'cancelled' => 'Cancelled',
                ],
            ],
        );
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
