<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\HomeController;
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
// Chargement d'une image
Route::post('/images/upload', 'App\Http\Controllers\ImageController@upload');
Route::get('/images/download/{id}', 'App\Http\Controllers\ImageController@download');
Route::delete('/images/delete/{id}', 'App\Http\Controllers\ImageController@delete');
Route::post('/themes', [ImageController::class, 'createTheme']);
Route::put('/images/{imageId}/themes/{themeId}', [ImageController::class, 'assignTheme']);
Route::get('/', function () {
    return view('welcome');
});
Route::get('/themes/create', [ThemeController::class, 'create'])->name('themes.create');
Auth::routes();
Route::post('/themes', [ThemeController::class, 'store'])->name('themes.store');
Route::get('/themes', [ThemeController::class, 'index'])->name('themes.index');
Route::put('/themes/{id}', [ThemeController::class, 'update'])->name('themes.update');
Route::delete('/themes/{id}', [ThemeController::class, 'delete'])->name('themes.delete');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/image-store', [App\Http\Controllers\ImageController::class, 'store'])->name('image-store'); 



Route::get('/themes', [ThemeController::class, 'index'])->name('themes.index');
Route::get('/themes/{theme}/edit', [ThemeController::class, 'edit'])->name('themes.edit');
Route::put('/themes/{theme}', [ThemeController::class, 'update'])->name('themes.update');
Route::delete('/themes/{theme}', [ThemeController::class, 'destroy'])->name('themes.destroy');

Route::get('/image/download/{id}', 'ImageController@download')->name('image.download');
Route::get('/image/edit/{id}', 'ImageController@edit')->name('image.edit');
Route::delete('/image/delete/{id}', 'ImageController@delete')->name('image.delete');
