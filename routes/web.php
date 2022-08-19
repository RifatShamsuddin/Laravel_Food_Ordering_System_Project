<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
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
Route::get('welcome', [HomeController::class, 'welcome'])->name('welcome');

/* Dashboard Routes Start*/
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/home', [DashboardController::class, 'home'])->name('dashboard.home');
/* Dashboard Routes End*/


/* User Routes Start*/
Route::get('user/profile', [UserController::class, 'show_profile'])->name('user.show_profile');
/* User Routes End*/

/* Dish Routes Start*/
Route::get('/dish/add', [DishController::class, 'index'])->name('dish.show_dish_table');
Route::post('/dish/save', [DishController::class, 'save_dish_table'])->name('save_dish_table');
Route::get('/dish/manage', [DishController::class, 'manage_dish'])->name('manage_dish');
Route::get('/dish/delete/{dish_id}', [DishController::class, 'dish_delete'])->name('dish_delete');
Route::get('/dish/edit/{dish_id}', [DishController::class, 'dish_edit'])->name('dish_edit');
Route::PUT('/dish/update/{dish_id}', [DishController::class, 'dish_update'])->name('dish_update');
Route::GET('/dish/show_update/{dish_id}', [DishController::class, 'show_update'])->name('show_update');
Route::GET('/dish/search', [DishController::class, 'show_dishes'])->name('show_dishes');

Route::POST('/addcart/{dish_id}', [DishController::class, 'addcart'])->name('addcart');
Route::get('showcart/{user_id}', [DishController::class, 'showcart'])->name('showcart');
Route::get('remove/{dish_id}', [DishController::class, 'dish_cart_delete'])->name('dish_cart_delete');
/* Dish Routes End*/

/* Order Routes End*/
Route::POST('orderConfirm', [OrderController::class, 'orderConfirm'])->name('orderConfirm');
Route::get('showOrders', [OrderController::class, 'showOrders'])->name('showOrders');
Route::GET('approveOrder/{order_id}', [OrderController::class, 'approveOrder'])->name('approveOrder');
/* Order Routes End*/

Route::get('showRestaurants', [RestaurantController::class, 'showRestaurants'])->name('showRestaurants');
Route::get('showDishes/{user_id}', [DishController::class, 'show_dishes'])->name('show_dishes');
Route::PUT('/profile/{user_id}', [UserController::class, 'profile_update'])->name('profile_update');

Route::get('showReservations', [ReservationController::class, 'showReservations'])->name('showReservations');
Route::get('showReservationForm/{data}', [ReservationController::class, 'showReservationForm'])->name('showReservationForm');
Route::POST('saveReservation', [ReservationController::class, 'saveReservation'])->name('saveReservation');
Route::GET('approveReservation/{reservation_id}', [ReservationController::class, 'approveReservation'])->name('approveReservation');
