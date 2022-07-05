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
            <div class="flex justify-center items-center text-blue-800 bg-pink-300 py-10">
                <h1 style="font-size: 3rem; font-weight:bold">ABOUT US</h1>
            </div>

            <div>
                <div class="flex flex-col items-center text-center bg-blue-500 w-[100%] text-white p-20">
                    <img src="{{asset('/img/logo.png')}}" alt="fish and chip logo" class="pb-10" style="width:250px">
                    <h2 class="text-xl font-bold mb-4">Who are we?</h2>
                    <p>We pride ourselves in making the freshest and most delicious fish and chips you’ll ever have. We are a small fish and chips business that has over 20 years of experience in this industry and uses the best quality ingredients to provide our amazing customers.
                        At Fish and Chips, we aren’t just here to provide you with the best food, we are here to provide you with a great service. We believe that each and every customer deserves to be treated with respect and dignity. 
                    </p>
                    <br/>
                    <p>View our <a href="{{route('menu')}}" class="text-rose-300 font-bold hover:text-blue-700">menu</a> and try to order online without having to wait in person. For all orders or general enquires, you can contact us at <b>03 123 456 789</b> or via in person at <b>123 Spring Road, Enterville 9876</b>.</p>
                </div>
            </div>

            {{-- Footer--}}
            <footer class="bg-gray-100 text-center">
                {{-- Footer Links --}}
                <div class="p-6">
                    <div class="grid lg:grid-cols-3 md:grid-cols-3">
                    <div class="mb-6">
                        <h5 class="uppercase font-bold mb-2.5 text-gray-800">Explore the Page</h5>
                
                        <ul class="list-none mb-0">
                        <li class="mt-1">
                            <a href="{{route('/')}}" class="text-gray-800">Home</a>
                        </li>
                        <li class="mt-1">
                            <a href="{{route('menu')}}" class="text-gray-800">Menu</a>
                        </li>
                        <li class="mt-1">
                            <a href="{{route('about')}}" class="text-gray-800">About</a>
                        </li>
                        </ul>
                    </div>
                
                    <div class="mb-6">
                        <h5 class="uppercase font-bold mb-2.5 text-gray-800">Where to find us?</h5>
                        
                        <div class="mb-0 text-gray-800 mt-1">
                                <p>123 Spring Road,</p>
                                <p>Enterville</p>
                                <p>9876</p>
                                <p class="mt-3">03 123 456 789</p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h5 class="uppercase font-bold mb-2.5 text-gray-800">Follow Us</h5>
                        
                        <ul class="list-none mb-0">
                            <li class="mt-1">
                            <a href="" class="text-gray-800">Facebook</a>
                            </li>
                            <li class="mt-1">
                            <a href="" class="text-gray-800">Instagram</a>
                            </li>
                            <li class="mt-1">
                            <a href="" class="text-gray-800">Twiter</a>
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>

                <div class="text-center text-gray-700 p-4" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2022 Copyright:
                <a class="text-gray-800" href="{{route('/')}}">Fish and Chips</a>
                </div>
            </footer>
        </div>
    </body>
</html>