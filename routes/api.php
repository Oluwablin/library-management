<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\API\Auth\AuthController;

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

Route::prefix('v1')->group(function () {

    // api/v1/auth AUTHENTICATION
    Route::prefix('auth')->name('auth.')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::post('login', 'login')->name('login');
            Route::post('logout', 'logout')->name('logout')->middleware('auth:sanctum');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | SuperAdmin Routes
    |--------------------------------------------------------------------------
    | Here are all superadmin API routes
    */

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    | Here are all admins API routes
    */

    /*
    |--------------------------------------------------------------------------
    | Student Routes
    |--------------------------------------------------------------------------
    | Here are all students API routes
    */

});