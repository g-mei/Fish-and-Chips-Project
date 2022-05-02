<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $uid = auth()->user()->id;
        $order = Order::where('user_id', $uid)->first();
        $foods = null;
        $totalcost = 0;
        
        if(!empty($order)) {
            $foods = $order->foods()->get();
            
            foreach ($foods as $food) {
                $cost = $food->pivot->qty * $food->cost;
                $totalcost += $cost;
            }
        }
        
        return view('order')
        ->with('order', $order)
        ->with('foods', $foods)
        ->with('totalcost', $totalcost);
    }

    // Add food into order
    public function store(Request $request, $id)
    {
      if (auth()->user()){

          //checks if user has an existing order
          $order = Order::where('user_id', auth()->user()->id)->first();

          if($order && $order->status === 'waiting') {
            
            //adds the item in order_food
            $order->foods()->attach([ $id =>
                [
                    'qty' => $request->qty,
                    'instructions' => $request->instructions
                ]
           ]);

          } else {
            //create a new order in the orders table
            $order = new Order;
            $order->user_id = auth()->user()->id;
            $order->status = "waiting";
            $order->save();


            //adding the items in the foreign table -> order_food
            $order->foods()->attach([ $id =>
                [
                    'qty' => $request->qty,
                    'instructions' => $request->instructions
                ]
            ]);
          }

          return redirect('/menu');

      } else {
          //user needs to login to place order
          return redirect('/login');
      }
    }

    // Add pack into order
    public function storePack(Request $request, $id)
    {
      if (auth()->user()){

          //checks if user has an existing order
          $order = Order::where('user_id', auth()->user()->id)->first();

          if($order && $order->status === 'waiting') {
            
            //adds the item in order_pack
            $order->packs()->attach([ $id =>
                [
                    'qty' => $request->qty,
                    'instructions' => $request->instructions
                ]
           ]);

          } else {
            //create a new order in the orders table
            $order = new Order;
            $order->user_id = auth()->user()->id;
            $order->status = "waiting";
            $order->save();


            //adding the items in the foreign table -> order_pack
            $order->packs()->attach([ $id =>
                [
                    'qty' => $request->qty,
                    'instructions' => $request->instructions
                ]
            ]);
          }

          return redirect('/menu');

      } else {
          //user needs to login to place order
          return redirect('/login');
      }
    }

    // edit order
    public function edit() {
        
    }
    
    // edit order item
    public function editOrderItem(Request $request, $id) {
        $this->validate($request, [
            'qty' => 'required'
        ]);
        
        $uid = auth()->user()->id;
        $order = Order::where('user_id', $uid)->first();
        $order->foods()->wherePivot('id', $id)->update([
            'qty' => $request->qty,
            'instructions' => $request->instructions
        ]);
        
        return redirect('/order');
    }
    
    public function deleteOrderItem($id) {
        $uid = auth()->user()->id;
        $order = Order::where('user_id', $uid)->first();
        $order->foods()->wherePivot('id', $id)->detach();

        return redirect('/order');
    }
}
