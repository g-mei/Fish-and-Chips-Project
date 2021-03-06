<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <x-app-layout></x-app-layout>

        @include('admin.sidebar')

            <div class="pt-10 min-h-screen relative">
                <div class="px-10">
                    @if (Route::is('categories'))
                        @include('admin.categories.categories')
                    @elseif(Route::is('food'))
                        @include('admin.food.food-items')
                    @elseif(Route::is('packs'))
                        @include('admin.packs.packs')
                    @elseif(Route::is('orders'))
                        @include('admin.orders.orders')
                    @elseif(Route::is('order_history'))
                        @include('admin.orders.order-history')
                    @elseif(Route::is('users'))
                        @include('admin.users.users')
                    @else
                        @include('admin.orders.orders')
                    @endif
                </div>
            </div>

        @stack('modal')
    </body>
</html>