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
        {{-- Banner --}}
        <div style="background-image: url({{asset('img/banner.jpg')}}); background-size:cover; background-position-y:center; height:500px;">
            <div class="flex justify-center">
                <div class="justify-center row">
                    <div class="text-center" style="margin-top: 10rem">
                        <h1 style="font-size: 2rem; font-style: bold;">Best Fish and Chips you'll ever have!</h1>
                        <p class="px-5 mb-10 text-xl text-gray-700">Everything is fresh and delicious!</p>
                        <ul class="flex flex-wrap justify-center" style="margin-top:5rem">
                            <li><a style="background-color: rgb(243 186 229); padding: 1rem 2rem; color:rgb(40 140 215); font-weight:900;"href="{{route('menu')}}">LOOK AT THE MENU</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Opening Hours --}}
        <div class="bg-blue-500 w-[100%] text-white py-8 text-center grid lg:grid-cols-2 md:grid-cols-2">
            <div class="py-4">
                <h3 class="text-lg py-4 font-bold">Address</h3>
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
            {{-- Sign up field --}}
            <div class="px-6 py-6" style="background-color: rgba(61, 131, 211, 0.2);">
              <form action="">
                <div class="grid md:grid-cols-3 gird-cols-1 gap-4 flex justify-center items-center">
                  <div class="md:ml-auto md:mb-6">
                    <p class="text-gray-800">
                      <strong>Sign up for our newsletter</strong>
                    </p>
                  </div>
          
                  <div class="md:mb-6">
                    <input
                      type="text"
                      class="form-control block w-full px-5 py-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none "
                      id="exampleFormControlInput1"
                      placeholder="Email address"/>
                  </div>
          
                  <div class="md:mr-auto">
                    <button type="button" class="inline-block px-6 py-4 bg-blue-500 text-white font-medium leading-tight uppercase rounded shadow-md hover:bg-blue-600 hover:shadow-lg focus:bg-blue-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">Subscribe</button>
                  </div>
                </div>
              </form>
            </div>

            {{-- Footer Links --}}
            <div class="p-6">
                <div class="grid lg:grid-cols-4 md:grid-cols-3">
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
              © 2021 Copyright:
              <a class="text-gray-800" href="{{route('/')}}">Fish and Chips</a>
            </div>
          </footer>
    </body>
</html>
