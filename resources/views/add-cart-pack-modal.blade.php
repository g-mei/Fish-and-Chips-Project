{{-- Add Modal for Menu Cart --}}
<div class="container flex justify-center mx-auto hidden modal" id="addToCartPack#{{$pack->id}}">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50" style="z-index:90; position: fixed;">
        <div class="max-w-xl p-6 bg-white rounded-md" style="z-index: 100">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">{{$pack->name}}</h3>
                <p>${{$pack->cost}}</p>
            </div>
            <form class="mt-5" action="{{route('addToPackCart', ['id' => $pack->id])}}" method="POST">
                @csrf
                <label for="qty" class="block font-bold text-gray-600">Qty</label>
                <input type="number" name="qty" id="qty"
                    class="w-full p-3 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                    min="1" value="1" required>
                    
                <label for="instructions" class="block font-bold text-gray-600">Instructions</label>
                <input type="text" name="instructions" id="instructions"
                    class="w-full p-3 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600">

                <div class="py-6">   
                    <a href="{{route('menu')}}" class="px-4 py-2 text-white bg-gray-600 rounded closeModal" type="button" data-label="cancel add pack">Cancel</a>
                    <button class="px-4 py-2 text-white bg-blue-600 rounded" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
