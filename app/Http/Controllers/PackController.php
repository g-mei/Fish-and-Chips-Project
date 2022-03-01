<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pack;

class PackController extends Controller
{
    function index() {
        $packs = Pack::all();

        return view('admin.dashboard')
        ->with('packs', $packs);
    }

    function addPack(Request $request) {
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

        return redirect('/dashboard');
    }

    function editPack(Request $request) {
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

        return redirect('/dashboard');
    }
    
    function deletePack ($id) {
        $pack_item= Pack::find($id);
        $pack_item->delete();

        return redirect('/dashboard');
    }
}
