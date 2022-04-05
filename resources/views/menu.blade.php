<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fish and Chips</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <x-app-layout></x-app-layout>
        <div class="flex justify-center items-center text-white" style="background-image: url('/img/image_1.jpg'); background-position: center; height:150px; width:100%; background-repeat:no-repeat;">
            <h1 style="font-size: 3rem; font-weight:bold">MENU</h1>
        </div>
        <section class="flex justify-center" style="padding: 5rem">
            <aside class="mb-4 mr-3 text-center">
                <nav>
                    <ul>
                        @foreach ($categories as $category)
                        <li class="py-2"><a href="{{route('menu', ['category' => $category->id])}}">{{ $category->name }} ({{$category->food()->count()}})</a></li>   
                        @endforeach
                        <li class="py-2"><a href="{{route('menu', ['category' => 'uncategorized'])}}">Uncategorized</a></li>
                        <li class="py-2"><a href="{{route('menu')}}">Show All</a></li>   
                    </ul>
                </nav>
            </aside>
            <div class="grid lg:grid-cols-4 md:grid-cols-3">
                @foreach ($foods as $food)
                    @include('add-cart-modal')
                    <div class="mb-4 mr-3 hover:bg-white hover:shadow-md" style="max-height: 500px">
                        @if ($food->image)
                        <div class="flex justify-center">
                            <div class="relative">
                                <i class="fa fa-plus fa-3x absolute openModal" style="right: 0.25rem; top:0.25rem; color:white;" aria-hidden="true" data-id="{{$food->id}}"></i>
                                <img src="{{ asset('storage/image/food_items/'.$food->image) }}" alt="{{$food->image}}" style="width: 500px; height: 250px;"> 
                            </div>
                        </div>
                        @else
                        <div class="flex justify-center">
                            <div class="bg-blue-400 relative" style="width:100%; height: 250px;">
                                <i class="fa fa-plus fa-3x absolute openModal" style="right: 0.25rem; top:0.25rem; color:white;" data-id="{{$food->id}}"></i>
                                <div class="text-gray-600 flex justify-center" style="margin-top:100px">
                                    <p>{{$food->name}}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <div class="grid md:grid-row-3 px-3">
                            <div class="flex justify-between mt-3">
                                <h2 class="font-bold text-lg">{{$food->name}}</h2>
                                <p>${{$food->cost}}</p>
                            </div>
                            
                            @if ($food->description)
                                @if (Str::limit($food->description, 120))
                                    <p class="text-sm break-words">{{Str::limit($food->description, 120)}}</p>
                                @else
                                    <p class="text-sm break-words">{{$food->description}}</p>
                                @endif
                                <br/>
                            @else
                                <p></p>
                                <br/>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <script type="text/javascript" src="{{URL::asset('js/cart.js')}}"></script>
    </body>
</html>