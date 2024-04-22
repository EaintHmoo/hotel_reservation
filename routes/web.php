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


Route::get('/dashboard', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

//Admin Route
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::resource('permissions', 'PermissionController');

    // Roles
    Route::resource('roles', 'RoleController');

    // Users
    Route::resource('users', 'UserController');

    // Reservation Form
    Route::resource('reservation-forms', 'ReservationFormController');
});

// Frontend Route
Route::get('/', function () {
    return view('booking');
})->name('frontend.booking');
Route::get('/room', 'App\Http\Controllers\Frontend\ReservationFormController@room')->name('frontend.room');
Route::post('/reservation-forms', 'App\Http\Controllers\Frontend\ReservationFormController@store')->name('frontend.reservation-forms.store');

// Profile
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'App\Http\Controllers\Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

// Route::redirect('/', '/login');

require __DIR__ . '/auth.php';
