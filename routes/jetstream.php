<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\IngredientController;
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
        
        Route::get('/order', [OrderController::class, 'index'])->name('order');
    });

    //only admin can access these routes
    Route::group(['middleware'=>'is_admin'], function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        //Category Routes
        Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('categories');
        Route::post('/dashboard/categories', [CategoryController::class, 'addCategory'])->name('addCategory');
        Route::put('/dashboard/categories/{id}', [CategoryController::class, 'editCategory'])->name('editCategory');
        Route::delete('/dashboard/categories/{id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');

        //Ingredient Routes
        Route::post('/dashboard/ingredients', [IngredientController::class, 'addIngredient'])->name('addIngredient');
        Route::put('/dashboard/ingredients/{id}', [IngredientController::class, 'editIngredient'])->name('editIngredient');
        Route::delete('/dashboard/ingredients/{id}', [IngredientController::class, 'deleteIngredient'])->name('deleteIngredient');

        //Food Routes
        Route::get('/dashboard/food',[FoodController::class, 'index'])->name('food');
        Route::post('/dashboard/food',[FoodController::class, 'addFood'])->name('addFood');
        Route::put('/dashboard/food/{id}',[FoodController::class, 'editFood'])->name('editFood');
        Route::delete('/dashboard/food/{id}',[FoodController::class, 'deleteFood'])->name('deleteFood');

        //Pack Routes
        Route::get('/dashboard/packs',[PackController::class, 'index'])->name('packs');
        Route::post('/dashboard/packs',[PackController::class, 'addPack'])->name('addPack');
        Route::put('/dashboard/packs/{id}',[PackController::class, 'editPack'])->name('editPack');
        Route::delete('/dashboard/packs/{id}',[PackController::class, 'deletePack'])->name('deletePack');
        
        //User Routes
        Route::get('/dashboard/users',[UserController::class, 'index'])->name('users');
        Route::put('/dashboard/users/{id}',[UserController::class, 'editUser'])->name('editUser');
        Route::delete('/dashboard/users/{id}',[UserController::class, 'deleteUser'])->name('deleteUser');

        //viewing routes
        Route::get('/dashboard/orders',[DashboardController::class, 'viewOrders'])->name('orders');
        Route::get('/dashboard/order_history',[DashboardController::class, 'viewOrderHistory'])->name('order_history');

        //Route::resource('foods', 'App\Http\Controllers\FoodsController');        
        Route::post('/storeFood', ['uses' => 'App\Http\Controllers\DashboardController@storeFood']);
        Route::get('/deleteFood/{id}', ['uses' => 'App\Http\Controllers\DashboardController@deleteFood']);
        Route::get('/dashboard', ['\App\Http\Controllers\DashboardController', 'index'])->name('dashboard');
    
        //add other admin routes here
        Route::post('/storeFood', ['uses' => 'App\Http\Controllers\DashboardController@storeFood']);
        Route::get('/deleteFood/{id}', ['uses' => 'App\Http\Controllers\DashboardController@deleteFood']);
        
        //Route::resource('foods', 'App\Http\Controllers\FoodsController');        
        Route::post('dashboard/storeFood', ['uses' => 'App\Http\Controllers\DashboardController@storeFood']);
        Route::get('/dashboard/editFood/{id}',['\App\Http\Controllers\DashboardController', 'viewFoodDetail'])->name('food-edit');
        Route::post('/dashboard/editFood/{id}',['\App\Http\Controllers\DashboardController', 'updateFood'])->name('food-edit');
        Route::get('dashboard/deleteFood/{id}', ['uses' => 'App\Http\Controllers\DashboardController@deleteFood']);
    
    });
});