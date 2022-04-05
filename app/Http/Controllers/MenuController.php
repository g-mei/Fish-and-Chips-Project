<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Food;
use App\Models\Pack;
use App\Models\Ingredient;
use App\Models\Order;

class MenuController extends Controller
{
    function index() {
        $uid = auth()->user()->id;
        $categories = Category::all();
        $ingredients = Ingredient::all();
        $orders = Order::all()->where('user_id', $uid);
        
        if (request()->category) {
            if ((request()->category) === 'uncategorized') {
                $foods = DB::table('foods')->whereNull('category_id')->get();
                $packs = DB::table('packs')->whereNull('category_id')->get();
                
            } else {
                $id = request()->query('category');
                $category = Category::where('id', $id)->first();
                
                if (!(is_null($category))) {
                    $foods = $category->food()->get();
                    $packs = $category->pack()->get();
                } else {                                            // default show all food if the category identified by the query string doesn't exist
                    $foods = Food::all();
                    $packs = Pack::all();
                }
            }
            
        } else {
            $foods = Food::all();
            $packs = Pack::all();
        }
        
//         $foodspacks = $foods->concat($packs)->sortBy('name');
        $foodspacks = $foods->concat($packs);
        
        return view('menu')
            ->with('categories', $categories)
            ->with('foods', $foods)
            ->with('packs', $packs)
            ->with('ingredients', $ingredients)
            ->with('foodspacks', $foodspacks)
            ->with('orders', $orders);
    }
}
