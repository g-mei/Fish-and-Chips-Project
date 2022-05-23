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
            <div class="text-center flex flex-col justify-center items-center">
            
                <h1 class="text-2xl">Orders in Progress</h1>
                <table class="bg-gray-100">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Created</th>
                            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Updated</th>
                            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Instructions</th>
                            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
            			@foreach($orders as $order)
            			<tr class="hover:bg-gray-100">        
                        	<td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->created_at}}</td>
                        	<td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->updated_at}}</td>
                        	<td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->instructions}}</td>
                        	<td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->status}}</td>
                    	</tr>
                    	@endforeach
                	</tbody>
                </table>
                	
                <h1 class="text-2xl">Past Orders</h1>
                <table class="bg-gray-100">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Created</th>
                            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Updated</th>
                            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Instructions</th>
                            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
            			@foreach($past_orders as $order)
            			<tr class="hover:bg-gray-100">        
                        	<td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->created_at}}</td>
                        	<td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->updated_at}}</td>
                        	<td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->instructions}}</td>
                        	<td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->status}}</td>
                    	</tr>
                    	@endforeach
                	</tbody>
                </table>
            </div>
        </section>
    </body>
</html>