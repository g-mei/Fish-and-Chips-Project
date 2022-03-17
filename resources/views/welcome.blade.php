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
        <div class="bg-blue-500 w-[100%] text-white flex py-4" style="justify-content: center">
            <div class="py-4" style="margin-right: 10%">
                <div class="pr-4">
                    <h3 class="text-lg py-4 font-bold">Address</h3>
                    <p>123 Spring Road,</p>
                    <p>Enterville</p>
                    <p>9876</p>
                </div>

                <div class="pr-4">
                    <h3 class="text-lg py-4 font-bold">Phone Number</h3>
                    <p>03 123 456 789</p>
                </div>
            </div>
            <div class="py-4">
                <h3 class="text-xl py-4 font-bold">OPENING HOURS</h3>
                <table>
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
    </body>
</html>
