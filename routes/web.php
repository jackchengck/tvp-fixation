<?php

    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get(
        '/', function () {
//    return view('welcome');
        return redirect('/booking');
//    return redirect('/booking');
    }
    );

    Route::get(
        '/booking', function () {
        $getHost = request()->getHost();
        $host = explode('.', $getHost);

        if ($host[1] == 'localhost') {
            $domain = "piercer-tech.com";
        } else {
            $domain = $host[1] . "." . $host[2];
        }
        $subdomain = $host[0];

        $si = \App\Models\SolutionIntegrator::where('domain', $domain)->first();
        $business = \App\Models\Business::where('subdomain', $subdomain)->first();

        if ($si == null || $business == null) {
            return abort(404);
        }

        return view(
            'booking.booking_form', [
                                      'domain'   => $getHost,
                                      'si'       => $si,
                                      'business' => $business
                                  ]
        );
    }
    )->name('booking');

    Route::get(
        '/get-ticket', function () {
        $getHost = request()->getHost();
        $host = explode('.', $getHost);

        if ($host[1] == 'localhost') {
            $domain = "piercer-tech.com";
        } else {
            $domain = $host[1] . "." . $host[2];
        }
        $subdomain = $host[0];

        $si = \App\Models\SolutionIntegrator::where('domain', $domain)->first();
        $business = \App\Models\Business::where('subdomain', $subdomain)->first();

        if ($si == null || $business == null) {
            return abort(404);
        }

        return view(
            'booking.get_ticket', [
                                    'domain'   => $getHost,
                                    'si'       => $si,
                                    'business' => $business
                                ]
        );
    }
    )->name('get-ticket');

    Route::get(
        '/menu', function () {
        $getHost = request()->getHost();
        $host = explode('.', $getHost);

        if ($host[1] == 'localhost') {
            $domain = "piercer-tech.com";
        } else {
            $domain = $host[1] . "." . $host[2];
        }
        $subdomain = $host[0];

        $si = \App\Models\SolutionIntegrator::where('domain', $domain)->first();
        $business = \App\Models\Business::where('subdomain', $subdomain)->first();

        if ($si == null || $business == null) {
            return abort(404);
        }

        return view(
            'menu', [
                      'domain'   => $getHost,
                      'si'       => $si,
                      'business' => $business
                  ]
        );
    }
    )->name('menu');

    Route::get(
        '/survey', function () {

        $getHost = request()->getHost();
        $host = explode('.', $getHost);

        if ($host[1] == 'localhost') {
            $domain = "piercer-tech.com";
        } else {
            $domain = $host[1] . "." . $host[2];
        }
        $subdomain = $host[0];

        $si = \App\Models\SolutionIntegrator::where('domain', $domain)->first();
        $business = \App\Models\Business::where('subdomain', $subdomain)->first();

        if ($si == null || $business == null) {
            return abort(404);
        }

        return view(
            'survey.survey', [
                               'domain'   => $getHost,
                               'si'       => $si,
                               'business' => $business
                           ]
        );
    }
    )->name('survey');


//Route::get('/survey-result', function () {
//
//    $getHost = request()->getHost();
//    $host = explode('.', $getHost);
//
//    if ($host[1] == 'localhost') {
//        $domain = "piercer-tech.com";
//    } else {
//        $domain = $host[1] . "." . $host[2];
//    }
//    $subdomain = $host[0];
//
//    $si = \App\Models\SolutionIntegrator::where('domain', $domain)->first();
//    $business = \App\Models\Business::where('subdomain', $subdomain)->first();
//
//    if ($si == null || $business == null) {
//        return abort(404);
//    }
//
//    return view('survey.result', ['domain' => $getHost, 'si' => $si, 'business' => $business]);
//});

    Route::get(
        '/faqs', function () {
        $getHost = request()->getHost();
        $host = explode('.', $getHost);

        if ($host[1] == 'localhost') {
            $domain = "piercer-tech.com";
        } else {
            $domain = $host[1] . "." . $host[2];
        }
        $subdomain = $host[0];

        $si = \App\Models\SolutionIntegrator::where('domain', $domain)->first();
        $business = \App\Models\Business::where('subdomain', $subdomain)->first();

        if ($si == null || $business == null) {
            return abort(404);
        }

        return view(
            'faq', [
                     'domain'   => $getHost,
                     'si'       => $si,
                     'business' => $business
                 ]
        );
    }
    );

//    Route::get(
//        '/store-booking', [
//                            \App\Http\Controllers\BookingController::class,
//                            'getStoreBooking'
//                        ]
//    );


    Route::post(
        '/store-booking', [
                            \App\Http\Controllers\BookingController::class,
                            'storeBooking'
                        ]
    );

    Route::get(
        '/booking-success', function () {
        $getHost = request()->getHost();
        $host = explode('.', $getHost);

        if ($host[1] == 'localhost') {
            $domain = "piercer-tech.com";
        } else {
            $domain = $host[1] . "." . $host[2];
        }
        $subdomain = $host[0];

        $si = \App\Models\SolutionIntegrator::where('domain', $domain)->first();
        $business = \App\Models\Business::where('subdomain', $subdomain)->first();

        if ($si == null || $business == null) {
            return abort(404);
        }

        return view(
            'booking.booking_success', [
                                      'domain'   => $getHost,
                                      'si'       => $si,
                                      'business' => $business
                                  ]
        );
    }
    )->name('booking-success');

    Route::post(
        '/store-customer-survey', [
                                    \App\Http\Controllers\CustomerInfoSurveyController::class,
                                    'storeSurvey'
                                ]
    );

    Route::get(
        '/test', function () {
        $slots = \App\Models\Service::find(1)->getBookingSlots('2022-12-27');
        $bookings = \App\Models\Booking::where('customer_email', '=', 'jackchengck@gmail.com')->where('customer_password', '=', "123456")->get();
//    dd($bookings);

        return view('booking.test', ['slots' => $slots]);
    }
    );


    Route::get(
        '/ordering', function () {
        $getHost = request()->getHost();
        $host = explode('.', $getHost);

        if ($host[1] == 'localhost') {
            $domain = "piercer-tech.com";
        } else {
            $domain = $host[1] . "." . $host[2];
        }
        $subdomain = $host[0];

        $si = \App\Models\SolutionIntegrator::where('domain', $domain)->first();
        $business = \App\Models\Business::where('subdomain', $subdomain)->first();

        if ($si == null || $business == null) {
            return abort(404);
        }

        $tables = \App\Models\Table::where('business_id', $business->id)->get();

        return view(
            'ordering.table-list', [
                                     'domain'   => $getHost,
                                     'si'       => $si,
                                     'business' => $business,
                                     'tables'   => $tables,

                                 ]
        );
    }
    )->name('ordering.table-list');

    Route::get(
        '/ordering/success/{orderId}', function ($orderId) {

        $getHost = request()->getHost();
        $host = explode('.', $getHost);

        if ($host[1] == 'localhost') {
            $domain = "piercer-tech.com";
        } else {
            $domain = $host[1] . "." . $host[2];
        }
        $subdomain = $host[0];

        $si = \App\Models\SolutionIntegrator::where('domain', $domain)->first();
        $business = \App\Models\Business::where('subdomain', $subdomain)->first();

        $foodOrder = \App\Models\FoodOrder::where('business_id', $business->id)->where('id', $orderId)->firstOrFail();

        if ($si == null || $business == null) {
            return abort(404);
        }

        return view(
            'ordering.ordering-success', [
                                           'domain'    => $getHost,
                                           'si'        => $si,
                                           'business'  => $business,
                                           'foodOrder' => $foodOrder
                                       ]
        );
    }
    )->name('ordering.ordering-success');

    Route::get(
        '/ordering/{id}', function ($id) {
        $getHost = request()->getHost();
        $host = explode('.', $getHost);

        if ($host[1] == 'localhost') {
            $domain = "piercer-tech.com";
        } else {
            $domain = $host[1] . "." . $host[2];
        }
        $subdomain = $host[0];

        $si = \App\Models\SolutionIntegrator::where('domain', $domain)->first();
        $business = \App\Models\Business::where('subdomain', $subdomain)->first();

        if ($si == null || $business == null) {
            return abort(404);
        }

        $table = \App\Models\Table::where('business_id', $business->id)->where('id', $id)->firstOrFail();

        $dishes = \App\Models\Dish::where('business_id', $business->id)->where('active', true)->get();

        return view(
            'ordering.ordering-form', [
                                        'domain'   => $getHost,
                                        'si'       => $si,
                                        'business' => $business,
                                        'table'    => $table,
                                        'dishes'   => $dishes,

                                    ]
        );
    }
    )->name('ordering.ordering-form');


    Route::post(
        '/ordering/{id}', function (\Illuminate\Http\Request $request, $id) {
        $getHost = request()->getHost();
        $host = explode('.', $getHost);

        if ($host[1] == 'localhost') {
            $domain = "piercer-tech.com";
        } else {
            $domain = $host[1] . "." . $host[2];
        }
        $subdomain = $host[0];

        $si = \App\Models\SolutionIntegrator::where('domain', $domain)->first();
        $business = \App\Models\Business::where('subdomain', $subdomain)->first();

        if ($si == null || $business == null) {
            return abort(404);
        }

        $table = \App\Models\Table::where('business_id', $business->id)->where('id', $id)->firstOrFail();

        $dishes = \App\Models\Dish::where('business_id', $business->id)->where('active', true)->get();

        $foodOrder = new \App\Models\FoodOrder();

        $foodOrder->table_id = $table->id;

        $foodOrder->status = 'preparing';
        $foodOrder->payment_method = null;
        $foodOrder->business_id = $business->id;

        $foodOrder->save();

        $order = array();

        foreach ($dishes as $dish) {
            if ($request[$dish->id] !== null || $request[$dish->id] > 0) {
                $fOItem = new \App\Models\FoodOrderItem();
                $fOItem->dish_id = $dish->id;
                $fOItem->quantity = $request[$dish->id];
                $fOItem->business_id = $business->id;
                $fOItem->food_order_id = $foodOrder->id;
                $fOItem->save();
            }
        }
//        return redirect('/ordering/success');
        return redirect()->route('ordering.ordering-success', ['orderId' => $foodOrder->id]);
    }
    )->name('ordering.ordering');


    Route::get(
        '/ordering/{id}/history', function ($id) {
        $getHost = request()->getHost();
        $host = explode('.', $getHost);

        if ($host[1] == 'localhost') {
            $domain = "piercer-tech.com";
        } else {
            $domain = $host[1] . "." . $host[2];
        }
        $subdomain = $host[0];

        $si = \App\Models\SolutionIntegrator::where('domain', $domain)->first();
        $business = \App\Models\Business::where('subdomain', $subdomain)->first();

        if ($si == null || $business == null) {
            return abort(404);
        }

        $table = \App\Models\Table::where('business_id', $business->id)->where('id', $id)->firstOrFail();

//        $dishes = \App\Models\Dish::where('business_id', $business->id)->where('active', true)->get();
        $foodOrders = \App\Models\FoodOrder::where('business_id', $business->id)->where('table_id', $table->id)->where('status', '!=', 'paid')->get();

        return view(
            'ordering.ordering-history', [
                                           'domain'     => $getHost,
                                           'si'         => $si,
                                           'business'   => $business,
                                           'table'      => $table,
                                           'foodOrders' => $foodOrders,

                                       ]
        );
    }
    )->name('ordering.ordering-history');;


    Route::get(
        '/ordering/{id}/qr-pay', function ($id) {
        $getHost = request()->getHost();
        $host = explode('.', $getHost);

        if ($host[1] == 'localhost') {
            $domain = "piercer-tech.com";
        } else {
            $domain = $host[1] . "." . $host[2];
        }
        $subdomain = $host[0];

        $si = \App\Models\SolutionIntegrator::where('domain', $domain)->first();
        $business = \App\Models\Business::where('subdomain', $subdomain)->first();

        if ($si == null || $business == null) {
            return abort(404);
        }

        $table = \App\Models\Table::where('business_id', $business->id)->where('id', $id)->firstOrFail();

//        $dishes = \App\Models\Dish::where('business_id', $business->id)->where('active', true)->get();
        $foodOrders = \App\Models\FoodOrder::where('business_id', $business->id)->where('table_id', $table->id)->where('status', '!=', 'paid')->get();

        return view(
            'ordering.ordering-qr-pay', [
                                           'domain'     => $getHost,
                                           'si'         => $si,
                                           'business'   => $business,
                                           'table'      => $table,
                                           'foodOrders' => $foodOrders,
                                       ]
        );
    }
    )->name('ordering.ordering-qr');


    Route::get(
        '/ordering/{id}/qr-code', function ($id) {
        $getHost = request()->getHost();
        $host = explode('.', $getHost);

        if ($host[1] == 'localhost') {
            $domain = "piercer-tech.com";
        } else {
            $domain = $host[1] . "." . $host[2];
        }
        $subdomain = $host[0];

        $si = \App\Models\SolutionIntegrator::where('domain', $domain)->first();
        $business = \App\Models\Business::where('subdomain', $subdomain)->first();

        if ($si == null || $business == null) {
            return abort(404);
        }

        $table = \App\Models\Table::where('business_id', $business->id)->where('id', $id)->firstOrFail();

//        $dishes = \App\Models\Dish::where('business_id', $business->id)->where('active', true)->get();
//        $foodOrders = \App\Models\FoodOrder::where('business_id', $business->id)->where('table_id', $table->id)->where('status', '!=', 'paid')->get();

        return view(
            'ordering.ordering-qr-code', [
                                          'domain'     => $getHost,
                                          'si'         => $si,
                                          'business'   => $business,
                                          'table'      => $table,
//                                          'foodOrders' => $foodOrders,
                                      ]
        );
    }
    )->name('ordering.ordering-qr-code');
