<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LoginController::class, 'showLogin'])->name('noAuth');
Route::post('/', [LoginController::class, 'doLogin']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/users', [UsersController::class, 'index'])->name('users');
Route::get('/courses', [CoursesController::class, 'index'])->name('courses');
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('/uploadFile', [UploadFileController::class, 'index'])->name('uploadFile');
Route::post('/uploadFile', [UploadFileController::class, 'uploadFile']);

Route::get('/professor', [CoursesController::class, 'index'])
    ->name('professor')
    ->middleware('professor');

Route::get('/student', [CoursesController::class, 'index'])
    ->name('student')
    ->middleware('student');
