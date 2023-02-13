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

Route::get('/', function () {
//    return view('welcome');
    return redirect('/booking');
//    return redirect('/booking');
});

Route::get('/booking', function () {
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

    return view('booking.booking_form', ['domain' => $getHost, 'si' => $si, 'business' => $business]);
})->name('booking');

Route::get('/get-ticket', function () {
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

    return view('booking.get_ticket', ['domain' => $getHost, 'si' => $si, 'business' => $business]);
})->name('get-ticket');

Route::get('/menu', function () {
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

    return view('menu', ['domain' => $getHost, 'si' => $si, 'business' => $business]);
})->name('menu');

Route::get('/survey', function () {

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

    return view('survey.survey', ['domain' => $getHost, 'si' => $si, 'business' => $business]);
})->name('survey');


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

Route::get('/faqs', function () {
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

    return view('faq', ['domain' => $getHost, 'si' => $si, 'business' => $business]);
});

Route::post('/store-booking', [\App\Http\Controllers\BookingController::class, 'store']);
Route::post('/store-customer-survey', [\App\Http\Controllers\CustomerInfoSurveyController::class, 'store']);

Route::get('/test', function () {
    $slots = \App\Models\Service::find(1)->getBookingSlots('2022-12-27');
    $bookings = \App\Models\Booking::where('customer_email', '=', 'jackchengck@gmail.com')->where('customer_password', '=', "123456")->get();
//    dd($bookings);

    return view('booking.test', ['slots' => $slots]);
});

