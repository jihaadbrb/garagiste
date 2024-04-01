<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VehiculeController;
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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('clients',[ClientController::class,'index'])->name('clients.index');
Route::get('clients/add',[ClientController::class,'addclient'])->name('clients.show');
Route::post('clients', [ClientController::class, 'store'])->name('clients.store');
Route::delete('clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::put('clients/{id}', [ClientController::class, 'update'])->name('clients.update');
Route::get('clients/search', [ClientController::class, 'search'])->name('clients.search');


Route::get('vehicules', [VehiculeController::class, 'index'])->name('vehicules.index');
Route::post('vehicules', [VehiculeController::class, 'store'])->name('vehicules.store');
Route::delete('vehicules/{id}', [VehiculeController::class, 'destroy'])->name('vehicules.destroy');
Route::put('vehicules/{id}', [VehiculeController::class, 'update'])->name('vehicules.update');
Route::get('vehicules/search', [VehiculeController::class, 'search'])->name('vehicules.search');