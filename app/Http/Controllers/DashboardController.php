<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Order;

class DashboardController extends Controller
{
    function index() {
//         $foods = Food::all();
//         return view('admin.dashboard')->with('foods', $foods);

        return view('admin.dashboard');
    }
    
// Food ==================================================================

    function viewFood() {
        $foods = Food::all();
        return view('admin.dashboard')->with('foods', $foods);
    }
    
    function viewFoodDetail(Request $request) {
        $food = Food::find($request->id);
        return view ('admin.dashboard')->with('food', $food);
    }
    
    function storeFood(Request $request) {
        $food = new Food;
        $food->name = $request->input('name');
        $food->cost = $request->input('cost');
        $food->save();
        
        return redirect('/dashboard/food');
    }
    
    function updateFood(Request $request) {
        $food = Food::find($request->id);
        $food->name = $request->input('name');
        $food->cost = $request->input('cost');
        $food->save();

        return view ('admin.dashboard')->with('food', $food);
    }
    
    function deleteFood ($id) {
        $food = Food::find($id);
        $food->delete();
        
        return redirect('/dashboard/food');
    }
    
// Orders ================================================================

    function viewOrders() {
        $orders = Order::whereIn('status', ['waiting','cooking'])->get();
        
        return view('admin.dashboard')
        ->with('orders', $orders);
    }

    function viewOrderHistory() {
        $orders = Order::whereIn('status', ['done'])->get();
        
        return view('admin.dashboard')
        ->with('orders', $orders);
    }

    function updateOrderStatus(Request $request, $id) {
        $orders = Order::whereIn('status', ['waiting','cooking'])->get();
        $order = Order::where('id', $id)->first();

        if($order->status === "waiting") {
            $order->status = "cooking"; 
        } elseif ($order->status === "cooking") {
            $order->status = "done"; 
        }

        $order->save();

        return view ('admin.dashboard')->with('orders', $orders);
    }
    
// Users =================================================================
    
    function viewUsers() {
        return view('admin.dashboard');
    }
    

}
