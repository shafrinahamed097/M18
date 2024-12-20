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
Route::get("/unions", [DemoController::class, "Unions"]);
Route::get("/orWhere", [DemoController::class, "orWhere"]);
Route::get("/whereNot", [DemoController::class, "whereNot"]);
Route::get("/whereBetween", [DemoController::class, "whereBetween"]);
Route::get("/whereNotBetween", [DemoController::class, "whereNotBetween"]);
Route::get("/whereNull", [DemoController::class, "whereNull"]);
Route::get("/whereNotNull", [DemoController::class, "whereNotNull"]);
Route::get("/whereDate", [DemoController::class, "whereDate"]);
Route::get("/whereMonth", [DemoController::class, "whereMonth"]);
Route::get("/whereDay", [DemoController::class, "whereDay"]);
Route::get("/whereYear", [DemoController::class, "whereYear"]);
Route::get("/whereTime", [DemoController::class, "whereTime"]);
Route::get("/whereIn", [DemoController::class, "whereIn"]);
Route::get("/whereNotIn", [DemoController::class, "whereNotIn"]);
Route::get("/whereColumn", [DemoController::class, "whereColumn"]);
Route::get("/orderBy", [DemoController::class, "orderBy"]);
Route::get("/inRandom", [DemoController::class, "inRandom"]);
Route::get("/latestData", [DemoController::class, "latestData"]);
Route::get("/oldestData", [DemoController::class, "oldestData"]);
Route::get("/skipTake", [DemoController::class, "skipTake"]);
Route::get("/groupBy", [DemoController::class, "groupBy"]);
Route::get("/groupByHaving", [DemoController::class, "groupByHaving"]);
Route::post("/update/{id}", [DemoController::class, "Update"]);
Route::post("/upsert/{brandName}", [DemoController::class, "UpdateOrInsert"]);
Route::post("/increment/{id}", [DemoController::class, "Increment"]);
Route::post("/decrement/{id}", [DemoController::class, "Decrement"]);
Route::post("/delete/{id}", [DemoController::class, "Delete"]);




