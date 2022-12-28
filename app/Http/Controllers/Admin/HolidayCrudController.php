<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HolidayRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\ReviseOperation\ReviseOperation;
use Carbon\Carbon;

/**
 * Class HolidayCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class HolidayCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Holiday::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/holiday');
        CRUD::setEntityNameStrings('holiday', 'holidays');


        $this->crud->denyAccess(['create', 'delete', 'list', 'update']);

        if (backpack_user()->isSuperAdmin) {
            $this->crud->allowAccess(['create', 'delete', 'list', 'update']);
        }


        if (backpack_user()->hasPermissionTo('view settings')) {
            $this->crud->allowAccess(['list',]);
        }

        if (backpack_user()->hasPermissionTo('edit settings')) {
            $this->crud->allowAccess(['list', 'update']);
        }

        if (backpack_user()->hasPermissionTo('create settings')) {
            $this->crud->allowAccess(['create']);
        }

        if (backpack_user()->hasPermissionTo('delete settings')) {
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
        CRUD::column('holiday_date');
        CRUD::column('whole_day');
        CRUD::column('service_id');
        CRUD::column('start');
        CRUD::column('end');
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
        CRUD::setValidation(HolidayRequest::class);

        CRUD::addField([
            'name' => 'holiday_date',
            'type' => 'date',
            'default' => date('Y-m-d'),
//            'default' => new Carbon(),

        ]);
        CRUD::field('whole_day');
        CRUD::field('service_id');
        CRUD::addFields([
            [
                'name' => 'start',
                'type' => 'time',
                'default' => '00:00'
            ],
            [
                'name' => 'end',
                'type' => 'time',
                'default' => '23:59'
            ],
        ]);
//        CRUD::field('start');
//        CRUD::field('end');
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
