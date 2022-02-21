<?php

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

//GET the main pages
Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/about', function () {
    return view('about');
})->name('about');

//Route::resource('foods', 'App\Http\Controllers\FoodsController');
Route::post('/storeFood', ['uses' => 'App\Http\Controllers\DashboardController@storeFood']);
Route::get('/deleteFood/{id}', ['uses' => 'App\Http\Controllers\DashboardController@deleteFood']);

//links the jetstream.php routes
require_once __DIR__ . '/jetstream.php';