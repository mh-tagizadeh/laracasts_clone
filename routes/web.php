<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\TeacherController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});




Route::prefix('admin')->group(function (){
    Route::resource('categories', CategoriesController::class);
    Route::resource('users', UsersController::class);
    Route::resource('courses', CoursesController::class);
    Route::resource('teachers', TeacherController::class);

    Route::prefix('teacher')->group(function () {
        Route::get('requests', [TeacherController::class, 'request_teachers'])->name('teacher.requests');
        Route::get('requests/rejected', [TeacherController::class, 'rejected_requests'])->name('teacher.requests.rejected');
        Route::get('request/{request}', [TeacherController::class, 'answer_request'])->name('teacher.request.answer');
        Route::delete('request/{request}', [TeacherController::class, 'reject_request'])->name('teacher.request.reject');
        Route::post('request/{request}', [TeacherController::class, 'accept_request'])->name('teacher.request.accept');
    });


    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


Route::get('hello', function() {
    return Inertia::render('Hello');
});