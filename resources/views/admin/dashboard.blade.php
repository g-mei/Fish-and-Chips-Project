<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <x-app-layout></x-app-layout>

<!-- Temporary(?) place for add/edit foods -->    
		<!-- List of Food --> 
        <div class="relative flex items-top justify-center sm:items-center py-8">
        	</h2>
        	@if(count($foods) > 1)
        	<div class="">
        	
        		<table class="">
        			<tr>
        				<th>Food</th>
        				<th>Cost</th>
					</tr>
            		@foreach($foods as $food)
            		<tr>
            			<td>{{$food->name}}</td>
            			<td>{{$food->cost}}</td>
            		</tr>
            		@endforeach
            	</table>
            </div>
        	@endif
        </div>
        
        <!-- Add Food form -->
        <div class="relative flex items-top justify-center sm:items-center py-8">
        	<div class="">
                <h2 class="text-lg font-medium leading-6 text-gray-900">Add Food</h2>
                <form action="storeFood" method="POST">
                @csrf
                	<div class="bg-white sm:p-6">
                		<input type="text" name="name" placeholder="Name" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                		<input type="number" name="cost" step=".01" placeholder="Cost" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                	</div>
                	<div class="text-right sm:px-6">
                		<button class="text-white bg-indigo-600 ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md">Add</button>
                	</div>
                	<!-- Image upload -->
                	<!-- Dropdown for food category -->
                </form>
            </div>
        </div>
        
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <h1 class="text-primary">This is the dashboard, only admin access</h1>
            
        </div>
    </body>
</html>