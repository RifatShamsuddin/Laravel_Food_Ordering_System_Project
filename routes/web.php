<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DishController;
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
Route::get('/redirects', [HomeController::class, "index"]);

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

/* Dashboard Routes Start*/
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
/* Dashboard Routes End*/


/* Dish Routes Start*/
Route::get('/dish/add', [DishController::class, 'index'])->name('dish.show_dish_table');
Route::post('/dish/save', [DishController::class, 'save_dish_table'])->name('save_dish_table');
Route::get('/dish/manage', [DishController::class, 'manage_dish'])->name('manage_dish');
Route::get('/dish/delete/{dish_id}', [DishController::class, 'dish_delete'])->name('dish_delete');
Route::get('/dish/edit/{dish_id}', [DishController::class, 'dish_edit'])->name('dish_edit');
Route::PUT('/dish/update', [DishController::class, 'dish_update'])->name('dish_update');
/* Dish Routes End*/
