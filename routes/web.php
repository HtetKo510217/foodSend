<?php

use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});


// admin

Route::prefix('admin')->group(function(){

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

});