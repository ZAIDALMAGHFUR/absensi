<?php

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
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
Route::post('api-employeeController-create', [API_EmployeeController::class, 'create'])->name('api.employeeController.create');
Route::put('api-employeeController-edit/{id}', [API_EmployeeController::class, 'edit'])->name('api.employeeController.edit');
Route::delete('api-employeeController-delete/{id}', [API_EmployeeController::class, 'delete'])->name('api.employeeController.delete');
Route::post('AttendanceController-create', [AttendanceController::class, 'create'])->name('AttendanceController.create');
Route::put('AttendanceController-edit/{id}', [AttendanceController::class, 'edit'])->name('AttendanceController.edit');
