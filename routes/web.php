<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\RoomController;

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
// loginadmin

Route::get('admin',
    [AuthController::class,'index']
) ->name('auth.admin');

Route::post('login',
    [AuthController::class,'login']
) ->name('auth.login');

Route::get('logout',
    [AuthController::class,'logout']
) ->name('auth.logout');

Route::get('dashboard/index',
    [DashboardController::class,'index']
) ->name('dashboard.index');

// room
Route::get('room/index',
[RoomController::class,'index']
) ->name('room.index');

Route::get('room/create',
[RoomController::class,'create']
) ->name('room.create');

Route::post('room/store',
[RoomController::class,'store']
) ->name('room.store');

Route::get('room/edit',
[RoomController::class,'edit']
) ->name('room.edit');

Route::put('room/update',
[RoomController::class,'update']
) ->name('room.update');

Route::get('room/show',
[RoomController::class,'show']
) ->name('room.show');

Route::get('room/delete',
[RoomController::class,'delete']
) ->name('room.delete');

Route::post('room/destroy',
[RoomController::class,'destroy']
) ->name('room.destroy');

