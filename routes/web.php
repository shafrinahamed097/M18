<?php

use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Route;

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


Route::get("/products", [DemoController::class,"Products"]);
Route::get("/brands", [DemoController::class, "Brands"]);
Route::get("/categories", [DemoController::class, "Categories"]);
Route::get("/profiles", [DemoController::class ,"Profiles"]);
Route::get("/inner-join", [DemoController::class, "InnerJoin"]);
Route::get("/left-join", [DemoController::class, "leftJoin"]);
Route::get("/right-join", [DemoController::class, "RightJoin"]);
Route::get("/cross-join", [DemoController::class, "CrossJoin"]);
Route::get("/advanced-join", [DemoController::class, "AdvancedJoinClauses"]);
