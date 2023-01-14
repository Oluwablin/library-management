<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\API\Auth\AuthController;
use App\Http\Controllers\v1\API\Library\LibraryController;
use App\Http\Controllers\v1\API\Record\RecordController;
use App\Http\Controllers\v1\API\Student\StudentController;

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

    // All routes for authenticated super admins should go down here under this group
    Route::prefix('superadmin')->middleware(['auth:sanctum', 'role:SuperAdmin'])->group(function () {

        // Record endpoints
        Route::prefix('records')->name('records.')->controller(RecordController::class)->group(function () {
            Route::get('/{id}', 'getRecord')->name('get-one');
            Route::get('/', 'getAllRecords')->name('get-all');
            Route::post('/', 'addNewRecord')->name('add-new');
            Route::put('/{id}', 'updateRecord')->name('update-one');
            Route::delete('/{id}', 'deleteRecord')->name('delete-one');
        });

        // Library endpoints
        Route::prefix('libraries')->name('libraries.')->controller(LibraryController::class)->group(function () {
            Route::get('/{id}', 'getLibrary')->name('get-one');
            Route::get('/', 'getAllLibraries')->name('get-all');
            Route::post('/', 'addNewLibrary')->name('add-new');
            Route::put('/{id}', 'updateLibrary')->name('update-one');
            Route::delete('/{id}', 'deleteLibrary')->name('delete-one');
        });

        // Student endpoints
        Route::prefix('students')->name('students.')->controller(StudentController::class)->group(function () {
            Route::get('/{id}', 'getStudent')->name('get-one');
            Route::get('/', 'getAllStudents')->name('get-all');
            Route::post('/', 'addNewStudent')->name('add-new');
            Route::put('/{id}', 'updateStudent')->name('update-one');
            Route::delete('/{id}', 'deleteStudent')->name('delete-one');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    | Here are all admins API routes
    */

    // All routes for authenticated admins should go down here under this group
    Route::prefix('admin')->middleware(['auth:sanctum', 'role:SuperAdmin,Admin'])->group(function () {

        // Record endpoints
        Route::prefix('records')->name('records.')->controller(RecordController::class)->group(function () {
            Route::get('/', 'getAllLibraryRecords')->name('get-all-records');
            Route::post('/', 'addParticularRecord')->name('add-particular-one');
            Route::put('/{id}', 'updateParticularRecord')->name('update-particular-one');
            Route::delete('/{id}', 'deleteParticularRecord')->name('delete-particular-one');
        });

        // Student endpoints
        Route::prefix('students')->name('students.')->controller(StudentController::class)->group(function () {
            Route::get('/{id}', 'getParticularStudent')->name('get-particular-one');
            Route::get('/', 'getAllLibraryStudents')->name('get-all-students');
            Route::post('/', 'addParticularStudent')->name('add-particular-one');
            Route::put('/{id}', 'updateParticularStudent')->name('update-particular-one');
            Route::delete('/{id}', 'deleteParticularStudent')->name('delete-particular-one');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Student Routes
    |--------------------------------------------------------------------------
    | Here are all students API routes
    */

    // All routes for authenticated students should go down here under this group
    Route::prefix('student')->middleware(['auth:sanctum', 'role:SuperAdmin,Admin,Student'])->group(function () {

        // Record endpoints
        Route::prefix('records')->name('records.')->controller(RecordController::class)->group(function () {
            Route::get('/{id}', 'getParticularRecord')->name('get-particular-one');
        });

        // Library endpoints
        Route::prefix('libraries')->name('libraries.')->controller(LibraryController::class)->group(function () {
            Route::get('/{id}', 'getParticularLibrary')->name('get-particular-one');
        });
    });

});