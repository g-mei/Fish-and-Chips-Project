<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index() {
        $users = User::all()->where('role_id', 2);
        return view('admin.dashboard')->with('users', $users);
    }

    function editUser(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);
        
        $user = User::find($id);
        $user->update(['name'=>$request->get('name')]);
        $user->update(['email'=>$request->get('email')]);

        return redirect('/dashboard');
    }

    function deleteUser($id) {
        $user= User::find($id);
        $user->delete();

        return redirect('/dashboard');
    }
}