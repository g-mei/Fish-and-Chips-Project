<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function index() {
        $categories = Category::paginate(8);
        return view('admin.dashboard')->with('categories', $categories);
    }

    function addCategory(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:50'
        ]);

        $category = new Category;
        $category->name = $request->input('name');
        $category->save();

        return redirect('/dashboard/categories');
    }

    function editCategory(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|max:50'
        ]);
        
        $category = Category::find($id);
        $category->update(['name'=>$request->get('name')]);

        return redirect('/dashboard/categories');
    }

    function deleteCategory($id) {
        $category= Category::find($id);
        $category->delete();

        return redirect('/dashboard/categories');
    }
}
