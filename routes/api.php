<?php

use App\Http\Controllers\Api\DishController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\TypeController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
Route::apiResource("restaurants", RestaurantController::class)->only(["index", "show"]);
Route::apiResource("dishes", DishController::class)->only(["index", "show"]);
Route::apiResource("types", TypeController::class)->only(["index", "show"]);

Route::get('/get-restaurants-by-types', [RestaurantController::class, 'restaurantsByTypes']);
