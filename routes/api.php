<?php

use App\Http\Controllers\API\V1\PostController as V1PostController;
use App\Http\Controllers\API\V2\PostController as V2PostController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'/*, 'namespace' => 'Api\V1'*/], function () {
    Route::resource('posts', V1PostController::class)->only(['index', 'show']);
});

Route::group(['prefix' => 'v2'/*, 'namespace' => 'Api\V2'*/], function () {
    Route::resource('posts', V2PostController::class)->only(['index', 'show']);
});
