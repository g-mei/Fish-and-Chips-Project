<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
