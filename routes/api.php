<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \Illuminate\Routing\Middleware\ThrottleRequests;
use \App\Http\Controllers\API\AbController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('API')->withoutMiddleware([ThrottleRequests::class])->group(function (){
    //play_now 获取后验证。
    Route::get('register', [AbController::class, 'register']);
    Route::get('php', [AbController::class, 'php']);
    Route::get('readmysql', [AbController::class, 'read_mysql']);
});
