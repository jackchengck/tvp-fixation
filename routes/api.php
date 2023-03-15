<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getChatroom', [\App\Http\Controllers\Api\ChatroomController::class, 'getChatroom']);

Route::get("try", function () {
    return ("success");
});

//Route::get("chatroom/{id}", [\App\Http\Controllers\ChatroomController::class, 'show']);

Route::get('messages', [\App\Http\Controllers\InstantMessageController::class, 'retrieveMessage']);
Route::post('messages', [\App\Http\Controllers\InstantMessageController::class, 'sendMessage']);
//Route::post('image-messages', [\App\Http\Controllers\InstantMessageController::class, 'sendImageMessage']);
Route::post('image-messages', [\App\Http\Controllers\InstantMessageController::class, 'sendImageMessage']);
Route::post('voice-messages', [\App\Http\Controllers\InstantMessageController::class, 'sendVoiceMessage']);

Route::get('business', [\App\Http\Controllers\BusinessController::class, 'checkSubdomain']);

    Route::post('end-chat',[\App\Http\Controllers\Api\ChatroomController::class,'endChat']);
