<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
use App\Models\Ingredient;

class FoodController extends Controller
{
    function index() {
        $foods = Food::paginate(5, ['*'], 'food_pages');
        $categories = Category::all();
        $ingredients = Ingredient::paginate(8, ['*'], 'ingredient_pages');

        return view('admin.dashboard')
        ->with('foods', $foods)
        ->with('categories', $categories)
        ->with('ingredients', $ingredients);
    }

    function addFood(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:50',
            'cost' => 'required|numeric|between:0,1000',
            'description' => 'max:255'
        ]);
        
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
        
        $ingredients = $request->input('ingredients');
        if ($ingredients != null) {
            foreach ($ingredients as $ingredient) {
                $food->ingredients()->attach($ingredient);
            }
        }

        return redirect('/dashboard/food');
    }

    function editFood(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:50',
            'cost' => 'required|numeric|between:0,1000',
            'description' => 'max:255'
        ]);
        
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
        
        $food->ingredients()->detach();
        $ingredients = $request->input('ingredients');
        if ($ingredients != null) {
            foreach ($ingredients as $ingredient) {
                $food->ingredients()->attach($ingredient);
            }
        }

        return redirect('/dashboard/food');
    }
    
    function deleteFood ($id) {
        $food_item= Food::find($id);
        $food_item->delete();

        return redirect('/dashboard/food');
    }
}
