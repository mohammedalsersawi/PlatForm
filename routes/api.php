<?php

use App\Http\Controllers\api\AllDataApiController;
use App\Http\Controllers\api\ClassApiController;
use App\Http\Controllers\api\GradeApiController;
use App\Http\Controllers\api\lessonApiController;
use App\Http\Controllers\api\SectionApiController;
use App\Http\Controllers\JWTController;
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
//
//Route::middleware( 'checkPassword' , 'api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
//Route::group(['middleware' => ['api','checkPassword']], function (){
//
//
//});


Route::group(['middleware' => 'api'], function($router) {
    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/login', [JWTController::class, 'login']);
    Route::post('/logout', [JWTController::class, 'logout']);
    Route::post('/refresh', [JWTController::class, 'refresh']);
    Route::post('/profile', [JWTController::class, 'profile']);

//    Route::get('grade', [GradeApiController::class, 'index']);
//    //

    Route::group(['middleware' => 'checkPassword'], function (){
        Route::get('allData', [AllDataApiController::class, 'index']);
        Route::get('grade', [GradeApiController::class, 'index']);
        Route::get('class' , [ClassApiController::class , 'index']);
        Route::get('section' , [SectionApiController::class , 'index']);
        Route::get('lesson' , [lessonApiController::class , 'index']);

    });



});

