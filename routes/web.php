<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\ToursController;

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

Route::get('/doc', function () {
    return view('docapi');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Countries
Route::get('/countries', [CountriesController::class, 'getCountries']);
Route::get('/countries/create', [CountriesController::class, 'createCountry'])->name('countries.create');
Route::post('/countries/store', [CountriesController::class, 'storeCountry'])->name('countries.store');
Route::get('/countries/edit/{id}', [CountriesController::class, 'editCountry'])->name('countries.edit');
Route::put('/countries/update/{id}', [CountriesController::class, 'updateCountry'])->name('countries.update');
Route::delete('/countries/delete/{id}', [CountriesController::class, 'deleteCountry'])->name('countries.destroy');

// Cities
Route::get('/cities', [CitiesController::class, 'getCities']);
Route::get('/cities/create', [CitiesController::class, 'createCity'])->name('cities.create');
Route::post('/cities/store', [CitiesController::class, 'storeCity'])->name('cities.store');
Route::get('/cities/edit/{id}', [CitiesController::class, 'editCity'])->name('cities.edit');
Route::put('/cities/update/{id}', [CitiesController::class, 'updateCity'])->name('cities.update');
Route::delete('/cities/delete/{id}', [CitiesController::class, 'deleteCity'])->name('cities.destroy');

// Hotels
Route::get('/hotels', [HotelsController::class, 'getHotels']);
Route::get('/hotels/create', [HotelsController::class, 'createHotel'])->name('hotels.create');
Route::post('/hotels/store', [HotelsController::class, 'storeHotel'])->name('hotels.store');
Route::get('/hotels/edit/{id}', [HotelsController::class, 'editHotel'])->name('hotels.edit');
Route::put('/hotels/update/{id}', [HotelsController::class, 'updateHotel'])->name('hotels.update');
Route::delete('/hotels/delete/{id}', [HotelsController::class, 'deleteHotel'])->name('hotels.destroy');

// Tours
Route::get('/tours', [ToursController::class, 'getTours']);
Route::get('/tours/create', [ToursController::class, 'createTour'])->name('tours.create');
Route::post('/tours/store', [ToursController::class, 'storeTour'])->name('tours.store');
Route::get('/tours/edit/{id}', [ToursController::class, 'editTour'])->name('tours.edit');
Route::put('/tours/update/{id}', [ToursController::class, 'updateTour'])->name('tours.update');
Route::delete('/tours/delete/{id}', [ToursController::class, 'deleteTour'])->name('tours.destroy');

// Orders
Route::get('/orders', [OrdersController::class, 'getOrders']);
Route::get('/orders/create', [OrdersController::class, 'createOrder'])->name('orders.create');
Route::post('/orders/store', [OrdersController::class, 'storeOrder'])->name('orders.store');
Route::get('/orders/edit/{id}', [OrdersController::class, 'editOrder'])->name('orders.edit');
Route::put('/orders/update/{id}', [OrdersController::class, 'updateOrder'])->name('orders.update');
Route::delete('/orders/delete/{id}', [OrdersController::class, 'deleteOrder'])->name('orders.destroy');
