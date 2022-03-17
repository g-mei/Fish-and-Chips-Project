<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    function addIngredient(Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ]);
        
        $ingredient = new Ingredient;
        $ingredient->name = $request->input('name');
        $ingredient->save();

        return redirect('/dashboard');
    }

    function editIngredient(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required'
        ]);
        
        $ingredient = Ingredient::find($id);
        $ingredient->update(['name'=>$request->get('name')]);

        return redirect('/dashboard');
    }

    function deleteIngredient($id) {
        $ingredient= Ingredient::find($id);
        $ingredient->delete();

        return redirect('/dashboard');
    }
}
