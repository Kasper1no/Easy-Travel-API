<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\OrdersController;

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


// Tours
Route::get('/tours', [ToursController::class, 'index'] );   
Route::get('/tours/{id}', [ToursController::class, 'show'] );
Route::post('/tours', [ToursController::class, 'store'] );
Route::put('/tours/{id}', [ToursController::class, 'update'] );
Route::delete('/tours/{id}', [ToursController::class, 'destroy'] );


// Countries
Route::get('/countries', [CountriesController::class, 'index'] );
Route::get('/countries/{id}', [CountriesController::class, 'show'] );   
Route::post('/countries', [CountriesController::class, 'store'] ); 
Route::put('/countries/{id}', [CountriesController::class, 'update'] );
Route::delete('/countries/{id}', [CountriesController::class, 'destroy'] );

// Cities
Route::get('/cities', [CitiesController::class, 'index'] );   
Route::get('/cities/{id}', [CitiesController::class, 'show'] );
Route::post('/cities', [CitiesController::class, 'store'] );
Route::put('/cities/{id}', [CitiesController::class, 'update'] );
Route::delete('/cities/{id}', [CitiesController::class, 'destroy'] );

// Hotels
Route::get('/hotels', [HotelsController::class, 'index'] );   
Route::get('/hotels/{id}', [HotelsController::class, 'show'] );
Route::post('/hotels', [HotelsController::class, 'store'] );
Route::put('/hotels/{id}', [HotelsController::class, 'update'] );
Route::delete('/hotels/{id}', [HotelsController::class, 'destroy'] );

// Orders
Route::get('/orders', [OrdersController::class, 'index'] );   
Route::get('/orders/{id}', [OrdersController::class, 'show'] );
Route::post('/orders', [OrdersController::class, 'store'] );
Route::put('/orders/{id}', [OrdersController::class, 'update'] );
Route::delete('/orders/{id}',[OrdersController::class,'destroy']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
