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
        $foods = Food::all();
        $packs = Pack::all();
        $ingredients = Ingredient::all();

        return view('menu')
            ->with('categories', $categories)
            ->with('foods', $foods)
            ->with('packs', $packs)
            ->with('ingredients', $ingredients);
    }
}
