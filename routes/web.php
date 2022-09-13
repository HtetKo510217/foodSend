<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FrontendViewController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RestaurantOwnerController;
use App\Http\Controllers\TownshipController;
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

Route::get('/',[FrontendViewController::class,'index']);


Route::get('/register',[AuthController::class,'create']);
Route::post('/register',[AuthController::class,'store']);

Route::post('/logout',[AuthController::class,'logout']);

Route::get('/login',[AuthController::class,'login']);
Route::post('/login',[AuthController::class,'login_store']);

// admin

Route::prefix('admin')->group(function(){
    //AdminController
    Route::get('/',[AdminController::class,'index']);
    
    //CategoryController
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/categories','show')->name('category');
        Route::get('/categories/create','create')->name('category_create');
        Route::post('/categories/store','store')->name('category_store');
        Route::get('/categories/edit/{id}','edit')->name('category_edit');
        Route::post('/categories/update/{id}','update')->name('category_update');
        Route::post('/categories/destory/{id}','destory')->name('category_destory');
    });

      //TownshipController
      Route::controller(TownshipController::class)->group(function(){
        Route::get('/townships','show')->name('township');
        Route::get('/townships/create','create')->name('township_create');
        Route::post('/townships/store','store')->name('township_store');
        Route::get('/townships/edit/{id}','edit')->name('township_edit');
        Route::post('/townships/update/{id}','update')->name('township_update');
        Route::post('/townships/destory/{id}','destory')->name('township_destory');
    });

    //RestatrantOwnerController

    Route::controller(RestaurantOwnerController::class)->group(function(){
        Route::get('/restaurant_owners','show')->name('owner');
        Route::get('/restaurant_owners/create','create')->name('owner_create');
        Route::post('/restaurant_owners/store','store')->name('owner_store');
        Route::get('/restaurant_owners/edit/{id}','edit')->name('restaurant_owners_edit');
        Route::post('/restaurant_owners/update/{id}','update')->name('restaurant_owners_update');
        Route::post('/restaurant_owners/destory/{id}','destory')->name('restaurant_owners_destory');
    });

    Route::controller(RestaurantController::class)->group(function(){
        Route::get('/restaurants','show')->name('restaurants');
        Route::get('/restaurants/create','create')->name('restaurants_create');
        Route::post('/restaurants/store','store')->name('restaurants_store');
        Route::get('/restaurants/edit/{id}','edit')->name('restaurants_edit');
        Route::patch('/restaurants/update/{id}','update')->name('restaurants_update');
        Route::post('/restaurants/destory/{id}','destory')->name('restaurants_destory');
    });

    Route::controller(FoodController::class)->group(function(){
        Route::get('/foods','show')->name('foods');
        Route::get('/foods/create','create')->name('foods_create');
        Route::post('/foods/store','store')->name('foods_store');
        Route::get('/foods/edit/{id}','edit')->name('foods_edit');
        Route::patch('/foods/update/{id}','update')->name('foods_update');
        Route::post('/foods/destory/{id}','destory')->name('foods_destory');

    });

});