<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TravelController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/users', [UserController::class, 'store']);
    Route::post('/travels', [TravelController::class, 'storetravel']);
    Route::post('/travels/{id}', [TravelController::class, 'update']);
    Route::post('/travels/{travel_id}/tours', [TravelController::class, 'storetour']);
});


Route::get('/public-travels', [TravelController::class, 'publicTravels']);
Route::get('/tours/{slug}', [TravelController::class, 'index']);
