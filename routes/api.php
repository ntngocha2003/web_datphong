<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiRoomController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('rooms/{id?}',
[ApiRoomController::class,'index']
);

Route::post('create',
[ApiRoomController::class,'create']
);

Route::put('update/{id}',
[ApiRoomController::class,'update']
) ;

Route::delete('delete/{id}',
[ApiRoomController::class,'delete']
) ;
