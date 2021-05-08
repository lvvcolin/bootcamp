<?php



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Mail\NewUserWelcomemail;


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
//test

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::middleware('auth')->group(function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Profile
Route::get('/profiles/{user:username}', [App\Http\Controllers\ProfilesController::class, 'show'])->name('profile');
Route::get('/profiles/{user:username}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile_edit');
Route::patch('/profiles/{user:username}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile_update');

//courses
Route::get('/course', [App\Http\Controllers\CourseController::class, 'index'])->name('course_index');
Route::get('/course/create', [App\Http\Controllers\CourseController::class, 'create'])->name('course_create');

//assignments
Route::get('/course/{course}/assignments', [App\Http\Controllers\AssignmentController::class, 'index'])->name('course_show');
Route::get('/course/{course}/assignments/create', [App\Http\Controllers\AssignmentController::class, 'create'])->name('create_assignments');
Route::get('/course/{course}/assignments/{assignment}', [App\Http\Controllers\AssignmentController::class, 'show'])->name('show_assignments');
//reactions
Route::get('/course/{course}/assignments/{assignment}/reactions', [App\Http\Controllers\ReactionController::class, 'create'])->name('create_reaction');

//faq
Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index'])->name('Faq');

//admin

Route::get('/admin/{user:username}', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::post('/admin/{user:username}', [App\Http\Controllers\AdminController::class, 'store']);
Route::get('/admin/{user:username}/create', [App\Http\Controllers\AdminController::class, 'create'])->name('admin_create');


});

Route::get('/course/{course}/assignments/{assignment}/startAssignment', [App\Http\Controllers\AssignmentController::class, 'startAssignment'])->name('startAssignment');

Route::get('/course/{course}/assignments/{assignment}/show_file', [App\Http\Controllers\FileController::class, 'index'])->name('show_file');

Route::get('/course/{course}/assignments/{assignment}/create_file', [App\Http\Controllers\FileController::class, 'store'])->name('create_file');



