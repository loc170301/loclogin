<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

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

Route::get('/tasks', [TasksController::class, 'index'])->name('tasks_list'); 
Route::post('/tasks', [TasksController::class, 'store'])->name('tasks_add');
Route::get('/tasks_add', [TasksController::class, 'show_add_form'])->name('tasks_show_add_form');
Route::delete('/tasks/{id}', [TasksController::class, 'delete'])->name('tasks_delete');
