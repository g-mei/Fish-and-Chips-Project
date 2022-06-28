<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Fish and Chips</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="antialiased">
        <x-app-layout></x-app-layout>
        {{-- Banner --}}
        <div style="background-image: url({{asset('img/banner.jpg')}}); background-size:cover; background-position-y:center; height:500px;">
            <div class="flex justify-center">
                <div class="justify-center row">
                    <div class="text-center" style="margin-top: 10rem">
                        <h1 style="font-size: 2rem;" class="font-bold text-blue-800">Best Fish and Chips you'll ever have!</h1>
                        <p class="px-5 mb-10 text-xl text-blue-800 italic">Everything is fresh and delicious!</p>
                        <ul class="flex flex-wrap justify-center" style="margin-top:5rem">
                          <li><a href="{{route('menu')}}" class="bg-pink-300 text-blue-700 py-3 px-2 rounded hover:bg-blue-600 hover:text-pink-300 hover:cursor-pointer transition font-bold">LOOK AT THE MENU</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Information about how to order --}}
        <div class="bg-pink-300">
          <div class="p-6 text-center text-blue-600">
            <div class="grid lg:grid-cols-4 md:grid-cols-4">
              <div class="mb-6">
                <h5 class="uppercase font-bold mb-2.5">STEP 1</h5>
                <i class="fa-solid fa-cart-shopping fa-2x py-5"></i>
                <p>Login and order your</p>
                <p>fish and chips online.</p>
              </div>
        
              <div class="mb-6">
                <h5 class="uppercase font-bold mb-2.5">STEP 2</h5>
                <i class="fa-solid fa-kitchen-set fa-2x py-5"></i>
                <p>Submit the order and the</p>
                <p>restaurant will start preparing it.</p>
              </div>

              <div class="mb-6">
                <h5 class="uppercase font-bold mb-2.5">STEP 3</h5>
                <i class="fa-solid fa-money-bill fa-2x py-5"></i>
                <p>When it's ready for pick up,</p>
                <p>collect the order and pay at the counter.</p>
              </div>

              <div class="mb-6">
                <h5 class="uppercase font-bold mb-2.5">STEP 4</h5>
                <i class="fa-solid fa-utensils fa-2x py-5"></i>
                <p>Enjoy your delicious</p>
                <p>Fish and Chips.</p>
              </div>
            </div>
          </div>
        </div>

        {{-- Opening Hours --}}
        <div class="bg-blue-500 w-[100%] text-white py-8 text-center grid lg:grid-cols-2 md:grid-cols-2">
            <div class="py-4">
                <h3 class="text-lg pb-4 font-bold">Address</h3>
                <p>123 Spring Road,</p>
                <p>Enterville</p>
                <p>9876</p>

                <h3 class="text-lg py-4 font-bold">Phone Number</h3>
                <p>03 123 456 789</p>
            </div>
            
            <div class="py-4 flex justify-center">
              <table>
                <thead>
                  <tr>
                    <th colspan="3">
                      <h3 class="text-xl font-bold">OPENING HOURS</h3>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <td class="font-bold">Monday</td>
                      <td>8:00</td>
                      <td>18:00</td>
                  </tr>
                  <tr>
                      <td class="font-bold">Tuesday</td>
                      <td>8:00</td>
                      <td>18:00</td>
                  </tr>
                  <tr>
                      <td class="font-bold">Wednesday</td>
                      <td>8:00</td>
                      <td>18:00</td>
                  </tr>
                  <tr>
                      <td class="font-bold">Thursday</td>
                      <td>8:00</td>
                      <td>18:00</td>
                  </tr>
                  <tr>
                      <td class="font-bold">Friday</td>
                      <td>8:00</td>
                      <td>18:00</td>
                  </tr>
                  <tr>
                      <td class="font-bold">Saturday</td>
                      <td>8:00</td>
                      <td>18:00</td>
                  </tr>
                  <tr>
                      <td class="font-bold">Sunday</td>
                      <td>8:00</td>
                      <td>18:00</td>
                  </tr>
                </tbody>
              </table>
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
    </body>
</html>
