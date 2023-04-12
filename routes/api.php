<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FarmController;
use App\Http\Controllers\API\SensorDeviceController;
use App\Http\Controllers\API\SensorAutoController;
use App\Http\Controllers\API\FarmSectionController;
use App\Http\Controllers\API\SensorTypeController;
use App\Http\Controllers\API\SensorConfigController;
use App\Http\Controllers\API\SensorDatalogController;
use App\Http\Controllers\API\SettingGeneralController;


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

    Route::post('login',[AuthController::class, 'login']);

    Route::middleware(['auth:api'])->group(function () {
        Route::resource('farm', FarmController::class);
        Route::resource('farm-section', FarmSectionController::class);
        Route::resource('sensor-type', SensorTypeController::class);
        Route::resource('sensor-device', SensorDeviceController::class);
        Route::resource('sensor-auto', SensorAutoController::class);
        Route::resource('sensor-config', SensorConfigController::class);
        Route::resource('sensor-datalog', SensorDatalogController::class);
        Route::resource('setting-general', SettingGeneralController::class);
        Route::GET('/data/{unique_id}/{value}/{measurement}',[SensorDeviceController::class, 'data']);
        Route::POST('/data/{unique_id}/{value}/{measurement}',[SensorDeviceController::class, 'data']);
        Route::POST('/datalog-device/',[SensorDeviceController::class, 'datalog_device']);
    });
