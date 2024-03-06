<?php

use App\Http\Controllers\TaskController;
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

Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/tasks/{id}', [TaskController::class, 'show']);
Route::post('/add-task', [TaskController::class, 'store']);
Route::put('/edit-task/{id}', [TaskController::class, 'update']);
Route::delete('/delete-task/{id}', [TaskController::class, 'destroy']);
Route::get('/mark-task/{id}', [TaskController::class, 'mark']);


