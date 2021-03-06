<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fish and Chips</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="relative min-h-screen">
            <x-app-layout></x-app-layout>
            <div class="flex justify-center items-center text-white" style="background-image: url('/img/image_2.jpg'); background-position: center; height:150px; width:100%; background-repeat:no-repeat;">
                <h1 style="font-size: 3rem; font-weight:bold">Cart</h1>
            </div>

            <section>
                <br/>             
                <div class="px-5">
                    <div style="overflow-x:auto;">
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
                                @isset($foods)
                                    @foreach ($foods as $food)
                                        <tr class="hover:bg-gray-100">
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 wrap">{{$food->name}}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 wrap">{{$food->pivot->qty}}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 wrap">{{$food->pivot->qty * $food->cost}}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 wrap">{{$food->pivot->instructions}}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 wrap">
                                                <button class="openModal text-blue-700 px-1" data-label="edit" data-id="{{$food->pivot->id}}">Edit</button>
                                                <button class="openModal text-red-600 px-1" data-label="delete" data-id="{{$food->pivot->id}}">Delete</button>            
                                            </td>
                                        </tr>
                                        @include('order-edit-delete-modal')
                                    @endforeach
                                @endisset
                                
                                @isset($packs)
                                    @foreach ($packs as $pack)
                                        <tr class="hover:bg-gray-100">
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 wrap">{{$pack->name}}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 wrap">{{$pack->pivot->qty}}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 wrap">{{$pack->pivot->qty * $pack->cost}}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 wrap">{{$pack->pivot->instructions}}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 wrap">
                                                <button class="openModal text-blue-700 px-1" data-label="edit" data-id="{{$pack->pivot->id}}">Edit</button>
                                                <button class="openModal text-red-600 px-1" data-label="delete" data-id="{{$pack->pivot->id}}">Delete</button>            
                                            </td>
                                        </tr>
                                        @include('order-pack-edit-delete-modal')
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                    
                    <br/>

                    @if($order)
                        @if ($order->foods->first() || $order->packs->first())
                            <div class="py-5 flex justify-end items-center">
                                <p class="pr-5"><b>Subtotal: ${{$order->subtotal}}</b></p>
                                <button type="button" class="openModal bg-blue-600 px-2 py-2 rounded-md text-white hover:shadow-md" data-label="submit" data-id="{{$order->id}}">Submit Order To Restaurant</button>
                            </div>
                            @include('order-submit-modal')
                        @else
                        <div class="text-center">
                            <p class="mb-5">Your cart is empty!</p>
                        </div>
                        @endif
                    @else
                        <div class="text-center">
                            <p class="mb-5">Your cart is empty!</p>
                        </div>
                    @endif
                    
                </div>
        </section>
        
        @stack('modal')
    </body>
</html>