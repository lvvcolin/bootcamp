<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::middleware('auth')->group(function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/course', [App\Http\Controllers\CourseController::class, 'index'])->name('course_index');

Route::get('/course/create', [App\Http\Controllers\CourseController::class, 'create'])->name('course_create');

Route::get('/course/{course}/assignments', [App\Http\Controllers\AssignmentController::class, 'index'])->name('course_show');


Route::get('/course/{course}/assignments/create', [App\Http\Controllers\AssignmentController::class, 'create'])->name('create_assignments');

Route::get('/course/{course}/assignments/{assignment}', [App\Http\Controllers\AssignmentController::class, 'show'])->name('show_assignments');
});

Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index'])->name('Faq');




