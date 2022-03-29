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
                                <li class="py-2"><a href="{{route('menu', ['category' => $category->id])}}">{{ $category->name }}</a></li>   
                            @endforeach
                        </ul>
                    </nav>
                </aside>

                <div class="grid lg:grid-cols-4 md:grid-cols-3">
                    @foreach ($foods as $food)
                        <div class="bg-white shadow-sm mb-4 mr-3">
                            @if ($food->image)
                            <div class="flex justify-center">
                                <img src="{{ asset('storage/image/food_items/'.$food->image) }}" alt="{{$food->image}}" style="width: 300px; height: 250px;">        
                            </div>
                            @else
                            <div class="flex justify-center">
                                <div class="bg-blue-400 flex justify-center items-center text-gray-600" style="width: 300px; height: 250px;">No Image</div>
                            </div>
                            @endif
                            
                            <div class="grid md:grid-row-3 px-3">
                                <div class="flex justify-between mt-3">
                                    <h2 class="font-bold">{{$food->name}}</h2>
                                    <p>${{$food->cost}}</p>
                                </div>
                                
                                @if ($food->description)
                                    @if (Str::limit($food->description, 50))
                                        <p>yo</p>
                                    @else
                                        <p>w</p>
                                    @endif
                                    
                                @endif
                                {{-- <p class="text-sm">{{$food->description}}</p> --}}

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