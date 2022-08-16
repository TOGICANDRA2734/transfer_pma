<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\ColorSchemeController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UploadController;

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

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

Route::get('/', [TransferController::class, 'index'])->name('dashboard');
Route::post('store-file', [TransferController::class, 'store'])->name('file.store');
Route::post('upload',  [UploadController::class, 'store'])->name('upload.store');
// Route::get('crud-data-list-page', [PageController::class, 'crudDataList'])->name('crud-data-list');
// Route::get('crud-form-page', [PageController::class, 'crudForm'])->name('crud-form');