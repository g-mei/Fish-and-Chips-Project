<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fish and Chips</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <x-app-layout></x-app-layout>
        <div class="flex justify-center items-center text-white" style="background-image: url('/img/image_2.jpg'); background-position: center; height:150px; width:100%; background-repeat:no-repeat;">
            <h1 style="font-size: 3rem; font-weight:bold">My Orders</h1>
        </div>

        <section>            
        	<br>
            <div class="relative px-5">
                @if ($message = Session::get('order_submitted'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                      <strong>{{$message}}</strong>
                    </div>
                @endif

                @if ($message = Session::get('order_failed'))
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-300 rounded-lg" role="alert">
                      <strong>{{$message}}</strong>
                    </div>
                @endif
                
                <h1 class="text-2xl">Orders in Progress</h1>

                <div style="overflow-x:auto;">
                    <table class="bg-gray-100">
                        <thead>
                            <tr>
                                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Order ID</th>
                                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Updated</th>
                                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Items</th>
                                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Instructions</th>
                                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Subtotal</th>
                                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($orders as $order)
                            <tr class="hover:bg-gray-100">        
                                <td class="py-4 px-6 text-sm font-medium text-gray-900">{{$order->id}}</td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900">{{$order->updated_at}}</td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900">
                                    @foreach ($order->foods as $food) 
                                        <b>{{$food->pivot->qty}}x {{$food->name}}</b> {{$food->pivot->instructions}}<br>
                                    @endforeach
                                    @foreach ($order->packs as $pack) 
                                        <b>{{$pack->pivot->qty}}x {{$pack->name}}</b> {{$pack->pivot->instructions}}<br>
                                    @endforeach
                                </td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900">{{$order->instructions}}</td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900">{{$order->subtotal}}</td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900">{{$order->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <br/>

                <h1 class="text-2xl" style="margin-top: 30px">Past Orders</h1>

                <div style="overflow-x:auto;">
                    <table class="bg-gray-100">
                        <thead>
                            <tr>
                                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Order ID</th>
                                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Updated</th>
                                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Items</th>
                                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Instructions</th>
                                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Subtotal</th>
                                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($past_orders as $order)
                            <tr class="hover:bg-gray-100">        
                                <td class="py-4 px-6 text-sm font-medium text-gray-900">{{$order->id}}</td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900">{{$order->updated_at}}</td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900">
                                    @foreach ($order->foods as $food) 
                                        <b>{{$food->pivot->qty}}x {{$food->name}}</b> {{$food->pivot->instructions}}<br>
                                    @endforeach
                                    @foreach ($order->packs as $pack) 
                                        <b>{{$pack->pivot->qty}}x {{$pack->name}}</b> {{$pack->pivot->instructions}}<br>
                                    @endforeach
                                </td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900">{{$order->instructions}}</td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900">{{$order->subtotal}}</td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900">{{$order->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="py-10">
                    {{ $past_orders->links() }}
                </div>
            </div>
        </section>
    </body>
</html>