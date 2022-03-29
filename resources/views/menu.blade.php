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
            <h1 class="text-2xl font-bold flex justify-center mb-5 mt-4">Menu</h1>
            <section class="flex justify-center" style="padding: 5rem">
                <aside class="mb-4 mr-3 text-center">
                    <nav>
                        <ul>
                            @foreach ($categories as $category)
                            <li class="py-2"><a href="{{route('menu', ['category' => $category->id])}}">{{ $category->name }} ({{$category->food()->count() + $category->pack()->count()}})</a></li>   
                            @endforeach
                            <li class="py-2"><a href="{{route('menu', ['category' => 'uncategorized'])}}">Uncategorized ({{$category->food()->count() + $category->pack()->count()}})</a></li>
                            <li class="py-2"><a href="{{route('menu')}}">Show All</a></li>   
                        </ul>
                    </nav>
                </aside>

                <div class="flex flex-row flex-wrap">
                    @foreach ($foodspacks as $foodpack)
                        <div class="bg-white shadow-sm px-3 mb-4 mr-3" style="width: 300px; height: 100px">
                            <div class="flex justify-between mt-3">
                                <h2 class="font-bold">{{$foodpack->name}}</h2>
                                <p>${{$foodpack->cost}}</p>
                            </div>
                            
                            @if ($foodpack->description)
                            <p  class="text-sm">{{$foodpack->description}}</p>
                            @else
                                <br/>
                            @endif

                            <div class="flex justify-end items-end">
                                <button>Add to Cart</button>
                            </div>
                        </div>   
                    @endforeach
                </div>
            </section>
        </div>
    </body>
</html>