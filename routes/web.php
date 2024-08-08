<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentResourceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('students', [StudentController::class, 'index']);
Route::post('students', [StudentController::class, 'store']);
Route::get('fetch-students', [StudentController::class, 'fetchstudent']);
// Route::get('edit-student/{id}', [StudentController::class, 'edit']);
Route::get('edit-student/{id}', [StudentController::class, 'edit_test']);
Route::put('update-student/{id}', [StudentController::class, 'update']);
Route::delete('delete-student/{id}', [StudentController::class, 'destroy']);
Route::get('view', [StudentController::class, 'view']);
Route::post('students/data', [StudentController::class, 'get']);

Route::resource('resource', StudentResourceController::class);
