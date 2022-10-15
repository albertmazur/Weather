<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware(["auth"])->group(function (){

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group([
        "prefix" => "city",
        "namespace" => "city",
        "as" => "city."
    ], function () {
        Route::get("index", [CityController::class, "index"])->name("index");

        Route::get("{cityId}", [CityController::class, "show"])->name("show");
    });

    Route::group([
        "prefix" => "user",
        "namespace" => "user",
        "as" => "user."
    ], function(){
            Route::get("setting", [UserController::class, "show"])->name("show");

            Route::get("cities", [UserController::class, "myCity"])->name("my.cities");

            Route::post("city", [UserController::class, "addCity"])->name("add");

            Route::delete("city", [UserController::class, "removeCity"])->name("remove");
    });

});

Auth::routes();
