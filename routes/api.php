<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CommentsController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\SingerController;
use App\Http\Controllers\API\SingerLangController;
use App\Http\Controllers\API\SongsController;
use App\Http\Controllers\API\SongsGenreController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

Route::resource('singer', SingerController::class);
Route::resource('songslang', SingerLangController::class);
Route::resource('songsgenre', SongsGenreController::class);
Route::resource('songs', SongsController::class);
Route::resource('news', NewsController::class);
Route::resource('comments', CommentsController::class);
