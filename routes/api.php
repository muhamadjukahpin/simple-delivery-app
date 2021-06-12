<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PortController as ApiPortController;
use App\Http\Controllers\Api\CargoShipController as ApiCargoShipController;
use App\Http\Controllers\Api\ContainerController as ApiContainerController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('port/country/{country_id}', [ApiPortController::class, 'getPortByCountry']);
Route::get('cargo_ship/port/{country_id}', [ApiCargoShipController::class, 'getCargoShipByPort']);
Route::get('container/country/{country_id}', [ApiContainerController::class, 'getContainerByCountry']);
