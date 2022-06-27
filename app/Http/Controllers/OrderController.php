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
        $order = Order::where('user_id', $uid)
            ->where('status', 'incart')
            ->first();
        $foods = null;
        $packs = null;
        
        if(!empty($order)) {
            $foods = $order->foods()->get();
            $packs = $order->packs()->get();
            
            $order->subtotal = $this->calculateSubtotal($order);
            $order->save();
        }
        
        return view('order')
        ->with('order', $order)
        ->with('foods', $foods)
        ->with('packs', $packs);
    }

    // Add food into order
    public function store(Request $request, $id)
    {
      if (auth()->user()){

          //checks if user has an existing order
          $order = Order::where('user_id', auth()->user()->id)->where('status', 'incart')->first();

          if($order && $order->status === 'incart') {
            
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
            $order->status = "incart";
            $order->save();


            //adding the items in the foreign table -> order_food
            $order->foods()->attach([ $id =>
                [
                    'qty' => $request->qty,
                    'instructions' => $request->instructions
                ]
            ]);
          }
          
          $order->subtotal = $this->calculateSubtotal($order);
          $order->save();
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
          $order = Order::where('user_id', auth()->user()->id)->where('status', 'incart')->first();

          if($order && $order->status === 'incart') {
            
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
            $order->status = "incart";
            $order->save();


            //adding the items in the foreign table -> order_pack
            $order->packs()->attach([ $id =>
                [
                    'qty' => $request->qty,
                    'instructions' => $request->instructions
                ]
            ]);
          }

          $order->subtotal = $this->calculateSubtotal($order);
          $order->save();
          return redirect('/menu');

      } else {
          //user needs to login to place order
          return redirect('/login');
      }
    }

    // edit order item
    public function editOrderItem(Request $request, $id) {
        $this->validate($request, [
            'qty' => 'required'
        ]);
        
        $uid = auth()->user()->id;
        $order = Order::where('user_id', $uid)->where('status', 'incart')->first();
        $order->foods()->wherePivot('id', $id)->update([
            'qty' => $request->qty,
            'instructions' => $request->instructions
        ]);
        
        $order->subtotal = $this->calculateSubtotal($order);
        $order->save();
        return redirect('/order');
    }
    
    public function deleteOrderItem($id) {
        $uid = auth()->user()->id;
        $order = Order::where('user_id', $uid)->where('status', 'incart')->first();
        $order->foods()->wherePivot('id', $id)->detach();

        $order->subtotal = $this->calculateSubtotal($order);
        $order->save();
        return redirect('/order');
    }

    //pack functions edit and delete
    public function editPackOrderItem(Request $request, $id) {
        $this->validate($request, [
            'qty' => 'required'
        ]);
        
        $uid = auth()->user()->id;
        $order = Order::where('user_id', $uid)->where('status', 'incart')->first();
        $order->packs()->wherePivot('id', $id)->update([
            'qty' => $request->qty,
            'instructions' => $request->instructions
        ]);
        
        $order->subtotal = $this->calculateSubtotal($order);
        $order->save();
        return redirect('/order');
    }

    public function deletePackOrderItem($id) {
        $uid = auth()->user()->id;
        $order = Order::where('user_id', $uid)->where('status', 'incart')->first();
        $order->packs()->wherePivot('id', $id)->detach();

        $order->subtotal = $this->calculateSubtotal($order);
        $order->save();
        return redirect('/order');
    }
    
    //submit order to restaurant
    public function submitOrder(Request $request, $id) {
        $order = Order::where('id', $id)->first();
        $order->status = 'waiting';
        $order->instructions = $request->instructions;
        $order->subtotal = $this->calculateSubtotal($order);
        $order->save();
        
        return redirect('/order-history');
    }

    //view order history page
    public function viewOrderHistory() {
        $uid = auth()->user()->id;
        $orders = Order::where('user_id', $uid)->whereIn('status', ['waiting','cooking','pickup']);
        $past_orders = Order::where('user_id', $uid)->whereIn('status', ['done','cancelled'])->paginate(5);
        
        return view('order-history')
        ->with('orders', $orders)
        ->with('past_orders', $past_orders);
    }
    
    function calculateSubtotal($order) {
        $totalcost = 0;
        
        if(!empty($order)) {
            $foods = $order->foods()->get();
            $packs = $order->packs()->get();
            
            foreach ($foods as $food) {
                $cost = $food->pivot->qty * $food->cost;
                $totalcost += $cost;
            }
            
            foreach ($packs as $pack) {
                $cost = $pack->pivot->qty * $pack->cost;
                $totalcost += $cost;
            }
        }
        return $totalcost;
    }

}

