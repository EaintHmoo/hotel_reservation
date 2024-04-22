<?php

use App\Http\Controllers\Api\ReservationFormController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserAuthController;

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

Route::post('register', [UserAuthController::class, 'register']);
Route::post('login', [UserAuthController::class, 'login']);
Route::post('logout', [UserAuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [UserAuthController::class, 'logout']);
    Route::put('password/update', [UserAuthController::class, 'changePassword']);
    Route::put('profile/update', [UserAuthController::class, 'updateProfile']);
    Route::delete('users/delete-account', [UserAuthController::class, 'deleteAccount']);
    Route::get('reservation-forms', [ReservationFormController::class, 'index']);
    Route::get('reservation-forms/{reservationForm}', [ReservationFormController::class, 'show']);
    Route::put('reservation-forms/{reservationForm}', [ReservationFormController::class, 'update']);
    Route::delete('reservation-forms/{reservationForm}', [ReservationFormController::class, 'destroy']);

    // Users
    Route::get('users', [UserAuthController::class, 'index']);
    Route::delete('users/{user}', [UserAuthController::class, 'destory']);
});


// Reservation forms
Route::post('reservation-forms', [ReservationFormController::class, 'store']);
