<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/images/upload', 'App\Http\Controllers\ImageController@upload');
Route::get('/images/download/{id}', 'App\Http\Controllers\ImageController@download');
Route::delete('/images/delete/{id}', 'App\Http\Controllers\ImageController@delete');
Route::post('/themes', [ImageController::class, 'createTheme']);
Route::get('/get-image-data/{imageId}', 'ImageController@getImageData');
Route::put('/images/{imageId}/themes/{themeId}', [ImageController::class, 'assignTheme']);
Route::post('/images/{imageId}/new', [ImageController::class, 'createNewImage']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
