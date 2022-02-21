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
