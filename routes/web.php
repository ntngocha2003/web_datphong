<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\RoomController;
use App\Http\Controllers\admin\OrderRoomController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\customer\AuthUserController;
use App\Http\Controllers\customer\HomeUserController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;

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

Route::get('/', function () {
    return view('welcome');
});
// loginAdmin

Route::get('adminLogin',[AuthController::class,'index']) ->name('auth.admin');

Route::post('loginAdmin',[AuthController::class,'login']) ->name('auth.login');

Route::get('logout',[AuthController::class,'logout']) ->name('auth.logout');

Route::get('dashboard/index',[DashboardController::class,'index']) ->name('dashboard.index')->middleware(AuthenticateMiddleware::class);

// registerUser

Route::get('register',[UserController::class,'create']) ->name('user.create');

Route::post('store',[UserController::class,'store']) ->name('user.store');

// loginUser

Route::get('user',[AuthUserController::class,'index']) ->name('auth.user');

Route::post('loginUser',[AuthUserController::class,'login']) ->name('auth.loginUser');

// logoutUser
Route::get('logoutUser',[AuthUserController::class,'logoutUser']) ->name('auth.logoutUser');


// room
Route::get('room/index',[RoomController::class,'index']) ->name('room.index');

Route::get('room/create',[RoomController::class,'create']) ->name('room.create');

Route::post('room/store',[RoomController::class,'store']) ->name('room.store');

Route::get('room/edit',[RoomController::class,'edit']) ->name('room.edit');

Route::put('room/update',[RoomController::class,'update']) ->name('room.update');

Route::get('room/show',[RoomController::class,'show']) ->name('room.show');

Route::get('room/delete',[RoomController::class,'delete']) ->name('room.delete');

Route::post('room/destroy',[RoomController::class,'destroy']) ->name('room.destroy');

// user/user

Route::get('home/myaccount',[UserController::class,'myaccount']) ->name('home.myaccount');

Route::put('home/updateAccount',[UserController::class,'updateAccount']) ->name('home.updateAccount');

// user/admin
Route::get('user/index',[UserController::class,'index']) ->name('user.index');

Route::get('user/delete',[UserController::class,'delete']) ->name('user.delete');

Route::post('user/destroy',[UserController::class,'destroy']) ->name('user.destroy');

// show room home
Route::get('home/index',[HomeUserController::class,'index']) ->name('home.index');

Route::get('home/roomDetail',[HomeUserController::class,'show']) ->name('home.roomDetail');

Route::get('home/roomConfirm',[HomeUserController::class,'confirm']) ->name('home.roomConfirm');

// user
//  order room
Route::get('order/myOrder',[HomeUserController::class,'myOrder']) ->name('order.myOrder');
Route::post('order/store',[OrderRoomController::class,'store']) ->name('order.store');

// admin/order
Route::get('order/index',[OrderRoomController::class,'index']) ->name('order.index');

Route::get('order/edit',[OrderRoomController::class,'edit']) ->name('order.edit');

Route::post('order/updateCancel',[OrderRoomController::class,'updateCancel']) ->name('order.updateCancel');

Route::post('order/updateBack',[OrderRoomController::class,'updateBack']) ->name('order.updateBack');

Route::post('order/updateConfirm',[OrderRoomController::class,'updateConfirm']) ->name('order.updateConfirm');

Route::get('order/delete',[OrderRoomController::class,'delete']) ->name('order.delete');

Route::post('order/destroy',[OrderRoomController::class,'destroy']) ->name('order.destroy');