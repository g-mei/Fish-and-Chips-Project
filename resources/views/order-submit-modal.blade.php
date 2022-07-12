{{-- Submit Modal for Order --}}
<div class="container flex justify-center mx-auto hidden modal" id="submit#{{$order->id}}">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50" style="z-index: 90">
        <div class="max-w-xl p-6 bg-white rounded-md" style="z-index: 100">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">Submit this order?</h3>
            </div>
            
            <br/>

            @isset($foods)
                @foreach ($foods as $food)
                <ul>
                    <li style="padding: 0 1rem;">{{$food->name}} ${{$food->cost}}</li>
                </ul>
                @endforeach
            @endisset

            @isset($packs)
                @foreach ($packs as $pack)
                <ul>
                    <li style="padding: 0 1rem;">{{$pack->name}} ${{$pack->cost}}</li>
                </ul>
                @endforeach
            @endisset

            <form class="mt-5" action="{{route('submitOrder', ['id' => $order->id])}}" method="POST">
                @method('PUT')
                @csrf
                
                <label for="instructions" class="block font-bold text-gray-600">Add order instructions</label>
                        <input type="text" name="instructions" id="instructions"
                            class="w-full p-5 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600" maxlength="255">

                <div class="float-right">
                    <span class="float-right pb-4"><b>Total Cost: ${{$order->subtotal}}</b></span>

                    <div class="py-6">
                        <a href="{{route('order')}}" class="px-4 py-2 text-white bg-gray-600 rounded closeModal" type="button">Cancel</a>
                        <button class="px-4 py-2 text-white bg-blue-600 rounded" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>