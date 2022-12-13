<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\UserController;
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

Route::controller(AuthController::class)->group(
    function () {
        Route::post('register', 'register');
        Route::post('login', 'login');
        Route::post('refresh', 'refresh');
        Route::post('logout', 'logout');
    }
);

Route::resource('galleries', GalleriesController::class);
Route::get('/galleries/{id}/comments', [CommentsController::class, 'index']);
Route::get('/comments/{id}', [CommentsController::class, 'show']);
Route::post('/galleries/{id}/comments', [CommentsController::class, 'store']);
Route::delete('/comments/{id}', [CommentsController::class, 'destroy']);
Route::get('/user/{id}', [UserController::class, 'show']);

