<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    function index() {
        $foods = Food::all();
        return view('admin.dashboard')->with('foods', $foods);
    }

    function addFood() {
        $foods = Food::all();
        return view('admin.dashboard')->with('foods', $foods);
    }

    function editFood() {
        $foods = Food::all();
        return view('admin.dashboard')->with('foods', $foods);
    }
    
    function deleteFood ($id) {
        $food_item= Food::find($id);
        $food_item->delete();

        return redirect('/dashboard');
    }

    function storeFood(Request $request) {
        $foods = new Food;
        $foods->name = $request->input('name');
        $foods->cost = $request->input('cost');
        $foods->save();
        
        return redirect('/dashboard');
    }
}
