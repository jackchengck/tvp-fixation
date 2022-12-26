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
    return view('welcome');
//    return redirect('/booking');
//    return redirect('/booking');
});

Route::get('/booking', function () {
//    $host = request()->getHttpHost();
    $getHost = request()->getHost();
    $host = explode('.', $getHost);

    if ($host[1] == 'localhost') {
        $domain = "piercer-tech.com";
    } else {
        $domain = $host[1] . $host[2];
    }
    $subdomain = $host[0];

    $si = \App\Models\SolutionIntegrator::where('domain', $domain)->first();
    $business = \App\Models\Business::where('subdomain', $subdomain)->first();

//    dd($si, $business);
    if ($si == null || $business == null) {
        return abort(404);
    }

    return view('booking.booking_form', ['domain' => $getHost, 'si' => $si, 'business' => $business]);
});


Route::post('/booking', function () {

});

