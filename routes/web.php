<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;


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

Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::post('/menu/{id}', [OrderController::class, 'store'])->name('addToCart');
Route::post('/menu/pack/{id}', [OrderController::class, 'storePack'])->name('addToPackCart');

Route::get('/about', function () {
    return view('about');
})->name('about');

//links the jetstream.php routes
require_once __DIR__ . '/jetstream.php';