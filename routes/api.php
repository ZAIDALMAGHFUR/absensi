<?php

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Api\HolidayController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\API_EmployeeController;


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

Route::get('permissions/detail', [PermissionController::class, 'show'])->name('api.permissions.show');
// Route::get('api-employeeController', [API_EmployeeController::class, 'index'])->name('api.attendances.index');
//membuat data kariawan dengan api 
Route::post('api-employeeController-create', [API_EmployeeController::class, 'create'])->name('api.employeeController.create');
Route::put('api-employeeController-edit/{id}', [API_EmployeeController::class, 'edit'])->name('api.employeeController.edit');
Route::delete('api-employeeController-delete/{id}', [API_EmployeeController::class, 'delete'])->name('api.employeeController.delete');

//membuat data absensi dengan api
Route::post('AttendanceController-create', [AttendanceController::class, 'create'])->name('AttendanceController.create');
Route::put('AttendanceController-edit/{id}', [AttendanceController::class, 'edit'])->name('AttendanceController.edit');

//membuat data position dengan api
Route::post('PositionController-create', [PositionController::class, 'create'])->name('PositionController.create');
Route::put('PositionController-edit/{id}', [PositionController::class, 'edit'])->name('PositionController.edit');
Route::delete('PositionController-delete/{id}', [PositionController::class, 'delete'])->name('PositionController.delete');

//membuat data hari libur by admin use api 
Route::post('HolidayController-create', [HolidayController::class, 'create'])->name('HolidayController.create');
Route::put('HolidayController-edit/{id}', [HolidayController::class, 'edit'])->name('HolidayController.edit');
Route::delete('HolidayController-delete/{id}', [HolidayController::class, 'delete'])->name('HolidayController.delete');