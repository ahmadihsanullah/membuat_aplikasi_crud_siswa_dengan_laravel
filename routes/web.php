<?php

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

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

Route::get("/siswa", [StudentController::class, 'index'])->name('siswa');
Route::post("/siswa/create", [StudentController::class, 'create']);
Route::get("/siswa/{id}/edit", [StudentController::class, 'edit']);
Route::put("/siswa/{id}/update", [StudentController::class, 'update']);
Route::delete("/siswa/{id}/delete", [StudentController::class, 'destroy']);
