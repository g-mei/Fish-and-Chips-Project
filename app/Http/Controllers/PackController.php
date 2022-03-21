<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pack;
use App\Models\Category;
use App\Models\Food;

class PackController extends Controller
{
    function index() {
        $packs = Pack::paginate(5);
        $categories = Category::all();
        $foods = Food::all();

        return view('admin.dashboard')
        ->with('packs', $packs)
        ->with('categories', $categories)
        ->with('foods', $foods);
    }

    function addPack(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'cost' => 'required'
        ]);

        $pack = new Pack;
        $pack->name = $request->input('name');
        $pack->cost = $request->input('cost');
        $pack->description = $request->input('description');
        $pack->category_id = $request->input('category');

        if($request->hasFile('image')) {
            $image_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/image/food_packs/', $image_name);
            $pack->image = $image_name;
        }
        
        $pack->save();
        
        $foods = $request->input('foods');
        if ($foods != null) {
            foreach ($foods as $food) {
                $pack->foods()->attach($food);
            }
        }

        return redirect('/dashboard/packs');
    }

    function editPack(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'cost' => 'required'
        ]);
        
        $pack = Pack::find($request->id);
        $pack->name = $request->input('name');
        $pack->cost = $request->input('cost');
        $pack->description = $request->input('description');
        $pack->category_id = $request->input('category');

        if($request->hasFile('image')) {
            $image_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/image/food_packs/', $image_name);
            $pack->image = $image_name;
        }
        
        $pack->save();
        
        $pack->foods()->detach();
        $foods = $request->input('foods');
        if ($foods != null) {
            foreach ($foods as $food) {
                $pack->foods()->attach($food);
            }
        }

        return redirect('/dashboard/packs');
    }
    
    function deletePack ($id) {
        $pack_item= Pack::find($id);
        $pack_item->delete();

        return redirect('/dashboard/packs');
    }
}
