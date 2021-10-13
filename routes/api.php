<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Teacher\TeacherController;
use App\Http\Controllers\Api\Teacher\RequestsController;
use App\Http\Controllers\Api\User\UserController;

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

Route::post('register', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);


Route::middleware('auth:sanctum')->prefix('users')->group(function() {

    Route::get('profile', [UserController::class, 'profile']);

    Route::post('update', [UserController::class, 'update']);

    Route::delete('delete', [UserController::class, 'delete']);

});



Route::middleware('auth:sanctum')->prefix('teachers')->group(function() {

    Route::post('/request-for-apply-teacher' , [RequestsController::class, 'request_for_apply_teacher']);

    Route::post('request-for-create-course' , [RequestsController::class, 'request_for_create_course']);

    Route::get('profile', [TeacherController::class, 'profile']);

    Route::post('update' , [TeacherController::class, 'update']);
    
    Route::delete('delete', [TeacherController::class, 'delete']);


});