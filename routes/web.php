<?php

use App\Http\Controllers\Admin\DasboardController;
use App\Http\Controllers\AdminController;
use App\Http\Livewire\Admin\Students\ListStudents;
use App\Http\Livewire\ShowStudent;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', DasboardController::class);
Route::get('admin/students', ListStudents::class)->name('admin.students');
Route::get('admin/students/{id}', ShowStudent::class)->name('admin.students_show');

Route::get('/{page}', [AdminController::class, 'index']);
