<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
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
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        //Category Routes
        Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('categories');
        Route::post('/dashboard/categories', [CategoryController::class, 'addCategory'])->name('addCategory');
        Route::put('/dashboard/categories/{id}', [CategoryController::class, 'editCategory'])->name('editCategory');
        Route::delete('/dashboard/categories/{id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');

        //Food Routes
        Route::get('/dashboard/food',[FoodController::class, 'index'])->name('food');
        Route::post('/dashboard/food',[FoodController::class, 'addFood'])->name('addFood');
        Route::put('/dashboard/food/{id}',[FoodController::class, 'editFood'])->name('editFood');
        Route::delete('/dashboard/food/{id}',[FoodController::class, 'deleteFood'])->name('deleteFood');
        
        //viewing routes
        Route::get('/dashboard/orders',[DashboardController::class, 'viewOrders'])->name('orders');
        Route::get('/dashboard/order_history',[DashboardController::class, 'viewOrderHistory'])->name('order_history');
        Route::get('/dashboard/users',[DashboardController::class, 'viewUsers'])->name('users');

        //Route::resource('foods', 'App\Http\Controllers\FoodsController');        
        Route::post('/storeFood', ['uses' => 'App\Http\Controllers\DashboardController@storeFood']);
        Route::get('/deleteFood/{id}', ['uses' => 'App\Http\Controllers\DashboardController@deleteFood']);

    });
});
