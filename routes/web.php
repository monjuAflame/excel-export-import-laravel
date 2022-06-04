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

Route::get('/export-format/{format}', [\App\Http\Controllers\CustomerController::class, 'export_format'])->name('customers.export_format');
Route::get('/export-format', [\App\Http\Controllers\CustomerController::class, 'export_multiple_sheets'])->name('customers.export_multiple_sheets');
Route::get('/export-by-heading', [\App\Http\Controllers\CustomerController::class, 'export_with_heading'])->name('customers.export_by_heading');
Route::get('/export-relation-map', [\App\Http\Controllers\CustomerController::class, 'export_mapping'])->name('customers.export_mapping');
Route::get('/export-styling', [\App\Http\Controllers\CustomerController::class, 'export_styling'])->name('customers.export_styling');
Route::get('/export-autosize', [\App\Http\Controllers\CustomerController::class, 'export_autosize'])->name('customers.export_autosize');
Route::get('/export-dateTime-format', [\App\Http\Controllers\CustomerController::class, 'export_dateTime_format'])->name('customers.export_dateTime_format');



// import
Route::post('/import', [\App\Http\Controllers\CustomerController::class, 'import'])->name('customers.import');
Route::post('/import-heading', [\App\Http\Controllers\CustomerController::class, 'import_heading'])->name('customers.import_heading');
Route::post('/import-largeFile', [\App\Http\Controllers\CustomerController::class, 'import_largeFile'])->name('customers.import_largeFile');
Route::post('/import-relationships', [\App\Http\Controllers\CustomerController::class, 'import_relationships'])->name('customers.import_relationships');
Route::post('/import-datetime_format', [\App\Http\Controllers\CustomerController::class, 'import_datetime_format'])->name('customers.import_datetime_format');
