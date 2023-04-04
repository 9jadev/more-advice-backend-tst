<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TasksController::class, "index"]);
Route::post('/', [TasksController::class, "store"]);
Route::get('/{tasks}', [TasksController::class, "show"])->name('single-task');
Route::put('/{tasks}', [TasksController::class, "update"])->name('single-task');
Route::delete('/{tasks}', [TasksController::class, "destroy"])->name('single-task');
