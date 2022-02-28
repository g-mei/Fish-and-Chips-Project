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

    function addFood(Request $request) {
        $food = new Food;
        $food->name = $request->input('name');
        $food->cost = $request->input('cost');
        $food->save();

        return redirect('/dashboard');
    }

    function editFood(Request $request) {
        $food = Food::find($request->id);
        $food->name = $request->input('name');
        $food->cost = $request->input('cost');
        $food->save();

        return redirect('/dashboard');
    }
    
    function deleteFood ($id) {
        $food_item= Food::find($id);
        $food_item->delete();

        return redirect('/dashboard');
    }
}
