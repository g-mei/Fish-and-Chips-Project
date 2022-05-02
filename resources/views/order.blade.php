<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fish and Chips</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="antialiased">
        <x-app-layout></x-app-layout>
        <div class="min-h-screen bg-gray-50">
            <div class="flex justify-center items-center text-white" style="background-image: url('/img/image_2.jpg'); background-position: center; height:150px; width:100%; background-repeat:no-repeat;">
                <h1 style="font-size: 3rem; font-weight:bold">Cart</h1>
            </div>

            <div style="padding:5rem;">
                @isset($order)
                <div class="text-center">
                    <h2 class="text-xl font-bold mb-4">Order</h2>
                    <p>Order ID: {{$order->id}}</p>
                    <p>Instructions: {{$order->instructions}}</p>
                    <p>Status: {{$order->status}}</p>
                    <p>Review title: {{$order->review_title}}</p>
                    <p>Review desc: {{$order->review}}</p>
                    <p>Rating: {{$order->review_rate}}</p>
                </div>
                @endisset
                
                <div class="text-center">
                <br>
                
                @isset($foods)
                <table class="bg-gray-100">
                <thead>
                	<tr>
                		<th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Food</th>
                		<th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">QTY</th>
                		<th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Cost</th>
                		<th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Instructions</th>
                	</tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($foods as $food)
                    
                        <tr class="hover:bg-gray-100">
                        	<td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$food->name}}</td>
                        	<td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$food->pivot->qty}}</td>
                        	<td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$food->pivot->qty * $food->cost}}</td>
                        	<td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$food->pivot->instructions}}</td>
                        	<td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                <button class="openModal text-blue-700 px-1" data-label="edit" data-id="{{$food->pivot->id}}">Edit {{$food->pivot->id}}</button>
                    			<button class="openModal text-red-600 px-1" data-label="delete" data-id="{{$food->pivot->id}}">Delete {{$food->pivot->id}}</button>            
                            </td>
                        </tr>
                        @include('order-edit-delete-modal')
                    @endforeach
                </tbody>
                </table>
                @endisset
                
                @if(!$order)
                    <p class="mb-5">Your cart is empty!</p>
                @endif

                <b>Subtotal: ${{$totalcost}}</b>
                </div>
            </div>
        </div>
        
        @stack('modal')
    </body>
</html>