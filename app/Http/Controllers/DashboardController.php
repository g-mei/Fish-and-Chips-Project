<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class DashboardController extends Controller
{
    function index() {
        $foods = Food::all();
        
        return view('admin.dashboard')->with('foods', $foods);
    }

    function viewCategories() {
        return view('admin.categories.categories');
    }

    function viewFood() {
        return view('admin.food.food-items');
    }

    function viewOrders() {
        return view('admin.orders.orders');
    }

    function viewOrderHistory() {
        return view('admin.orders.order-history');
    }

    function viewUsers() {
        return view('admin.users.users');
    }
    
    function storeFood(Request $request) {
        $food = new Food;
        $food->name = $request->input('name');
        $food->cost = $request->input('cost');
        $food->save();
        
        return redirect('/dashboard');
    }
    
    function deleteFood ($id) {
        $food = Food::find($id);
        $food->delete();
        
        return redirect('/dashboard');
    }
}
