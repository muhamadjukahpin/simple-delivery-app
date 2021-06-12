<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CountryController as AdminCountryController;
use App\Http\Controllers\Operator\PortController as OperatorPortController;
use App\Http\Controllers\Operator\ContainerController as OperatorContainerController;
use App\Http\Controllers\Operator\CargoShipController as OperatorCargoShipController;
use App\Http\Controllers\Operator\DeliveryController as OperatorDeliveryController;
use App\Http\Controllers\Operator\DeliveryDetailController as OperatorDeliveryDetailController;
use PHPUnit\Framework\Constraint\Operator;

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
});

Auth::routes();

Route::post('track', [OperatorDeliveryController::class, 'track']);


Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index']);
        Route::get('countries', [AdminCountryController::class, 'index']);
    });
});

Route::middleware(['auth', 'is_operator'])->group(function () {
    Route::prefix('operator')->group(function () {
        Route::resource('ports', OperatorPortController::class);
        Route::resource('containers', OperatorContainerController::class);
        Route::resource('cargo_ships', OperatorCargoShipController::class);
        Route::prefix('deliveries')->group(function () {
            Route::resource('/', OperatorDeliveryController::class)->parameters(['' => 'delivery_id']);
            Route::prefix('{delivery_id}')->group(function () {
                Route::resource('delivery_details', OperatorDeliveryDetailController::class);
            });
        });
    });
});
