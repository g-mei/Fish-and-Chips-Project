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
            <h1 class="text-2xl font-bold flex justify-center py-5">Menu</h1>
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

                <div class="grid lg:grid-cols-4 md:grid-cols-3">
                    @foreach ($foodspacks as $foodpack)
                        <div class="bg-white shadow-sm mb-4 mr-3 max-w-[5rem]">
                            @if ($foodpack->image)
                            <div class="flex justify-center">
                                <img src="{{ asset('storage/image/food_items/'.$foodpack->image) }}" alt="{{$foodpack->image}}" style="width: 500px; height: 250px;">        
                            </div>
                            @else
                            <div class="flex justify-center">
                                <div class="bg-blue-400 flex justify-center items-center text-gray-600" style="width: 500px; height: 250px;">No Image</div>
                            </div>
                            @endif
                            
                            <div class="grid md:grid-row-3 px-3">
                                <div class="flex justify-between mt-3">
                                    <h2 class="font-bold">{{$foodpack->name}}</h2>
                                    <p>${{$foodpack->cost}}</p>
                                </div>
                                
                                @if ($foodpack->description)
                                    @if (Str::limit($foodpack->description, 150))
                                        <p class="text-sm break-words">{{Str::limit($foodpack->description, 150)}}</p>
                                    @else
                                        <p class="text-sm break-words">{{$foodpack->description}}</p>
                                    @endif
                                    <br/>
                                @else
                                    <br/>
                                @endif

                                <div class="flex justify-end items-end">
                                    <button>Add to Cart</button>
                                </div>
                            </div>
                        </div>   
                    @endforeach
                </div>
            </section>
        </div>
    </body>
</html>