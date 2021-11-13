<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\RequestsController;
use App\Http\Controllers\Admin\LessonsController;
use App\Http\Controllers\Admin\TeachersController;
use App\Http\Controllers\Admin\PlansController;
use App\Http\Controllers\Admin\TeamPlansController;

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




Route::middleware(['auth'])->prefix('admin')->group(function (){

    Route::resource('categories', CategoriesController::class);

    Route::resource('users', UsersController::class);

    Route::resource('courses', CoursesController::class);

    Route::resource('teachers', TeachersController::class);

    Route::resource('lessons', LessonsController::class);

    Route::resource('plans', PlansController::class);
    Route::resource('team-plans', TeamPlansController::class);

    Route::get('category/parents', [CategoriesController::class, 'get_parent_categories'])->name('categories.parents');

    Route::get('lesson/video/{video}', [LessonsController::class, 'video'])->name('video');


    Route::prefix('teacher')->group(function () {

        Route::get('requests', [RequestsController::class, 'request_teachers'])->name('teacher.requests');

        Route::get('requests/rejected', [RequestsController::class, 'rejected_requests'])->name('teacher.requests.rejected');

        Route::get('request/{request}', [RequestsController::class, 'answer_request'])->name('teacher.request.answer');

        Route::delete('request/{request}', [RequestsController::class, 'reject_request'])->name('teacher.request.reject');

        Route::post('request/{request}', [RequestsController::class, 'accept_request'])->name('teacher.request.accept');

        Route::get('requests/course', [RequestsController::class, 'requests_course'])->name('teacher.course.requests');

        Route::get('request/course/{request}', [RequestsController::class, 'answer_request_course'])->name('teacher.request.course.answer');
        
        Route::post('request/course/{request}', [RequestsController::class, 'accept_request_course'])->name('teacher.request.course.accept');

        Route::delete('request/course/{request}', [RequestsController::class, 'reject_request_course'])->name('teacher.request.course.reject');

        Route::get('requests/courses/rejected', [RequestsController::class, 'rejected_courses'])->name('teacher.course.rejected');

    });


    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

});


Route::get('hello', function() {
    return Inertia::render('Hello');
});