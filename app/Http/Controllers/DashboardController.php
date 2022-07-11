<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Order;

class DashboardController extends Controller
{
    function index() {
        $orders_unconfirmed = Order::whereIn('status', ['waiting'])->get();
        $orders = Order::whereIn('status', ['cooking'])->get();
        $orders_pickup = Order::whereIn('status', ['pickup'])->get();
        
        return view('admin.dashboard')
        ->with('orders_unconfirmed', $orders_unconfirmed)
        ->with('orders', $orders)
        ->with('orders_pickup', $orders_pickup);
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
        $orders_unconfirmed = Order::whereIn('status', ['waiting'])->get();
        $orders = Order::whereIn('status', ['cooking'])->get();
        $orders_pickup = Order::whereIn('status', ['pickup'])->get();
        
        return view('admin.dashboard')
        ->with('orders_unconfirmed', $orders_unconfirmed)
        ->with('orders', $orders)
        ->with('orders_pickup', $orders_pickup);
    }

    function viewOrderHistory() {
        $orders = Order::whereIn('status', ['done', 'cancelled'])->paginate(10);
        
        return view('admin.dashboard')
        ->with('orders', $orders);
    }

    function updateOrderStatus(Request $request, $id) {
        $orders = Order::whereIn('status', ['waiting','cooking'])->get();
        $order = Order::where('id', $id)->first();

        

        if($order->status === "waiting") {
            $order->status = "cooking"; 
        } elseif ($order->status === "cooking") {
            $order->status = "pickup"; 
        } elseif ($order->status === "pickup") {
            $order->status = "done"; 
        }

        $order->save();

        return redirect('/dashboard/orders')->with('orders', $orders);
    }

    function cancelOrder(Request $request, $id) {
        $orders = Order::whereIn('status', ['cancelled','done'])->get();
        $order = Order::where('id', $id)->first();
        $order_id = $order->id;

        if($request->submit == "cancel"){
            $order->status = "cancelled"; 
        }

        $order->save();

        return redirect('/dashboard/order_history')
        ->with('orders', $orders)
        ->with('order_cancelled', 'Order ' . $order_id . ' has been cancelled');
    }
    
// Users =================================================================
    
    function viewUsers() {
        return view('admin.dashboard');
    }
    

}
