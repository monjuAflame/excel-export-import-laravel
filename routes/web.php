<?php

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

Route::get('/', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');
Route::get('/export', [\App\Http\Controllers\CustomerController::class, 'export'])->name('customers.export');
Route::get('/export-view', [\App\Http\Controllers\CustomerController::class, 'export_view'])->name('customers.export_view');
Route::get('/export-store', [\App\Http\Controllers\CustomerController::class, 'export_store'])->name('customers.export_store');
