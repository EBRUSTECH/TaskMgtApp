<?php

use App\Http\Controllers\WelcomeController;
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

Route::get('/',  [WelcomeController::class, 'index'])->name('welcome');
Route::get('/add-task',  [WelcomeController::class, 'addTask'])->name('add-task');
Route::get('/single-task/{id}',  [WelcomeController::class, 'singleTask'])->name('task');
Route::get('/edit-task/{id}',  [WelcomeController::class, 'editTask'])->name('edit-task');
Route::get('/tasks',  [WelcomeController::class, 'allTasks'])->name('tasks');
