<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Food;
use App\Models\Pack;
use App\Models\Ingredient;

class MenuController extends Controller
{
    function index() {
        $categories = Category::all();
        $ingredients = Ingredient::all();
        
        if (request()->category) {
            $id = request()->query('category');
            $category = Category::where('id', $id)->first();
            
            if (!(is_null($category))) {
                $foods = $category->food()->get();
                $packs = $category->pack()->get();
            } else {                                            // default show all food if the category identified by the query string doesn't exist
                $foods = Food::all();
                $packs = Pack::all();
            }
            
        } else {
            $foods = Food::all();
            $packs = Pack::all();
        }
        
        return view('menu')
            ->with('categories', $categories)
            ->with('foods', $foods)
            ->with('packs', $packs)
            ->with('ingredients', $ingredients);
    }
}
