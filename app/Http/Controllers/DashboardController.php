<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class DashboardController extends Controller
{
    function index() {
//         $foods = Food::all();
//         return view('admin.dashboard')->with('foods', $foods);

        return view('admin.dashboard');
    }

// Categories ============================================================

    function viewCategories() {
        return view('admin.dashboard');
    }
    
// Food ==================================================================

    function viewFood() {
        $foods = Food::all();
        return view('admin.dashboard')->with('foods', $foods);
    }
    
    function viewFoodDetail(Request $request) {
        $food = Food::find($request->id);
        return view ('admin.dashboard')->with('food', $food);
    }
    
    function storeFood(Request $request) {
        $food = new Food;
        $food->name = $request->input('name');
        $food->cost = $request->input('cost');
        $food->save();
        
        return redirect('/dashboard/food');
    }
    
    function updateFood(Request $request) {
        $food = Food::find($request->id);
        $food->name = $request->input('name');
        $food->cost = $request->input('cost');
        $food->save();

        return view ('admin.dashboard')->with('food', $food);
    }
    
    function deleteFood ($id) {
        $food = Food::find($id);
        $food->delete();
        
        return redirect('/dashboard/food');
    }
    
// Orders ================================================================

    function viewOrders() {
        return view('admin.dashboard');
    }

    function viewOrderHistory() {
        return view('admin.dashboard');
    }
    
// Users =================================================================
    
    function viewUsers() {
        return view('admin.dashboard');
    }
    

}
