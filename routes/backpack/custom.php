<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array)config('backpack.base.web_middleware', 'web'),
        (array)config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('booking', 'BookingCrudController');
    Route::crud('business', 'BusinessCrudController');
    Route::crud('inventory-log', 'InventoryLogCrudController');
    Route::crud('location', 'LocationCrudController');
    Route::crud('product', 'ProductCrudController');
    Route::crud('service', 'ServiceCrudController');
    Route::crud('solution-integrator', 'SolutionIntegratorCrudController');
    Route::crud('supplier', 'SupplierCrudController');
    Route::crud('supplier-order', 'SupplierOrderCrudController');
    Route::crud('supplier-order-item', 'SupplierOrderItemCrudController');
    Route::crud('holiday', 'HolidayCrudController');
    Route::crud('opening-hour', 'OpeningHourCrudController');

    Route::group(array('prefix' => 'documents'), function () {
        Route::get('/', [\App\Http\Controllers\DocumentsController::class, 'viewDocumentsList']);
        Route::get('daily_sales_statement_pdf', [\App\Http\Controllers\DocumentsController::class, 'dailySalesStatementParamPdfStream']);
        Route::get('monthly_sales_statement_pdf', [\App\Http\Controllers\DocumentsController::class, 'monthlySalesStatementParamPdfStream']);

        Route::get('monthly_employee_sales_records_pdf', [\App\Http\Controllers\DocumentsController::class, 'monthlyEmployeeSalesRecordsParamPdfStream']);
        Route::get('monthly_employee_product_damaged_records_pdf', [\App\Http\Controllers\DocumentsController::class, 'monthlyEmployeeProductDamagedRecordsParamPdfStream']);
        Route::get('monthly_employee_product_consumed_records_pdf', [\App\Http\Controllers\DocumentsController::class, 'monthlyEmployeeProductConsumedRecordsParamPdfStream']);
        Route::get('monthly_top_five_pdf', [\App\Http\Controllers\DocumentsController::class, 'monthlySalesStatementParamPdfStream']);
        Route::get('monthly_trashed_inventories_records_pdf', [\App\Http\Controllers\DocumentsController::class, 'monthlyTrashedInventoryRecordsParamPdfStream']);
        Route::get('monthly_damaged_inventories_records_pdf', [\App\Http\Controllers\DocumentsController::class, 'monthlyDamagedInventoryRecordsParamPdfStream']);
        Route::get('monthly_booking_record_list_pdf', [\App\Http\Controllers\DocumentsController::class, 'monthlyBookingRecordsParamPdfStream']);
        Route::get('customer_list_pdf', [\App\Http\Controllers\DocumentsController::class, 'customerListParamPdfStream']);

        Route::get('daily_statement_export', [\App\Http\Controllers\ExportController::class, 'dailyStatementParamExport']);
        Route::get('monthly_statement_export', [\App\Http\Controllers\ExportController::class, 'monthlyStatementParamExport']);

    });

//    EMAIL
    Route::group(array('prefix' => 'mail'), function () {

        Route::get('send-supplier-order-email/{id}', [\App\Http\Controllers\SendMailController::class, 'sendSupplierOrderEmail']);
        Route::get('send-booking-customer-email/{id}', [\App\Http\Controllers\SendMailController::class, 'sendBookingCustomerEmail']);

    });

//    SMS
    Route::group(array('prefix' => 'sms'), function () {

        Route::get('send-booking-customer-sms/{id}', [\App\Http\Controllers\SendSmsController::class, 'sendBookingCustomerSms']);

    });


    Route::get('booking-calendar', \App\Http\Controllers\Admin\BookingCalendarController::class)->name('booking-calendar');
    Route::group(array('prefix' => 'charts'), function () {
        Route::get('weekly-sales', 'Charts\WeeklySalesChartController@response')->name('charts.weekly-sales.index');
        Route::get('monthly-sales', 'Charts\MonthlySalesChartController@response')->name('charts.monthly-sales.index');
    });
    Route::crud('user-login-log', 'UserLoginLogCrudController');
    Route::get('charts/monthly-top-five', 'Charts\MonthlyTopFiveChartController@response')->name('charts.monthly-top-five.index');
}); // this should be the absolute last line of this file