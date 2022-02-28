<?php

use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;

Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
    $authMiddleware = config('jetstream.guard')
            ? 'auth:'.config('jetstream.guard')
            : 'auth';

    Route::group(['middleware' => [$authMiddleware, 'verified']], function () {
        // User & Profile...
        Route::get('/profile', [UserProfileController::class, 'show'])
                    ->name('profile.show');
    });

    //only admin can access these routes
    Route::group(['middleware'=>'is_admin'], function(){
    Route::get('/dashboard', ['\App\Http\Controllers\DashboardController', 'index'])->name('dashboard');
    
    //add other admin routes here
    Route::post('/storeFood', ['uses' => 'App\Http\Controllers\DashboardController@storeFood']);
    Route::get('/deleteFood/{id}', ['uses' => 'App\Http\Controllers\DashboardController@deleteFood']);
    
    //viewing routes
    Route::get('/dashboard/categories',['\App\Http\Controllers\DashboardController', 'viewCategories'])->name('categories');
    Route::get('/dashboard/food',['\App\Http\Controllers\DashboardController', 'viewFood'])->name('food');
    Route::get('/dashboard/orders',['\App\Http\Controllers\DashboardController', 'viewOrders'])->name('orders');
    Route::get('/dashboard/order_history',['\App\Http\Controllers\DashboardController', 'viewOrderHistory'])->name('order_history');
    Route::get('/dashboard/users',['\App\Http\Controllers\DashboardController', 'viewUsers'])->name('users');

    //Route::resource('foods', 'App\Http\Controllers\FoodsController');        
    Route::post('dashboard/storeFood', ['uses' => 'App\Http\Controllers\DashboardController@storeFood']);
    Route::get('dashboard/deleteFood/{id}', ['uses' => 'App\Http\Controllers\DashboardController@deleteFood']);

    });
});
