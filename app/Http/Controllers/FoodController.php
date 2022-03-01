<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;

class FoodController extends Controller
{
    function index() {
        $foods = Food::all();
        $categories = Category::all();

        return view('admin.dashboard')
        ->with('foods', $foods)
        ->with('categories', $categories);
    }

    function addFood(Request $request) {
        $food = new Food;
        $food->name = $request->input('name');
        $food->cost = $request->input('cost');
        $food->description = $request->input('description');
        $food->category_id = $request->input('category');

        if($request->hasFile('image')) {
            $image_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/image/food_items/', $image_name);
            $food->image = $image_name;
        }
        
        $food->save();

        return redirect('/dashboard');
    }

    function editFood(Request $request) {
        $food = Food::find($request->id);
        $food->name = $request->input('name');
        $food->cost = $request->input('cost');
        $food->description = $request->input('description');
        $food->category_id = $request->input('category');

        if($request->hasFile('image')) {
            $image_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/image/food_items/', $image_name);
            $food->image = $image_name;
        }
        
        $food->save();

        return redirect('/dashboard');
    }
    
    function deleteFood ($id) {
        $food_item= Food::find($id);
        $food_item->delete();

        return redirect('/dashboard');
    }
}
