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
                <h1 style="font-size: 3rem; font-weight:bold">Order</h1>
            </div>

            <div style="padding:5rem;">
                <div class="text-center">
                    <h2 class="text-xl font-bold mb-4">Order</h2>
                    <p>Order ID: {{$order->id}}</p>
                    <p>Instructions: {{$order->instructions}}</p>
                    <p>Status: {{$order->status}}</p>
                    <p>Review title: {{$order->review_title}}</p>
                    <p>Review desc: {{$order->review}}</p>
                    <p>Rating: {{$order->review_rate}}</p>
                </div>
                
                <div class="text-center">
                <br>
                @foreach ($foods as $food)
                	<p>{{$food->pivot->qty}}x {{$food->name}}, ${{$food->pivot->qty * $food->cost}}</p>
                @endforeach
                
                <b>Subtotal: {{$totalcost}}</b>
                </div>
            </div>
        </div>
    </body>
</html>