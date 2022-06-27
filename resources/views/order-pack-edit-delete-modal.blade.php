{{-- Edit Modal for Order --}}
<div class="container flex justify-center mx-auto hidden modal" id="edit#{{$pack->pivot->id}}">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50" style="z-index: 90">
        <div class="max-w-xl p-6 bg-white rounded-md" style="z-index: 100">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">Edit {{$pack->name}}</h3>
            </div>
            
            <form class="mt-5" action="{{route('editPackOrderItem', ['id' => $pack->pivot->id])}}" method="POST">
                @method('PUT')
                @csrf

				<label for="qty" class="block font-bold text-gray-600">QTY</label>
                <input type="number" name="qty" min="0" name="qty" id="qty"
                    class="w-full p-5 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                    value="{{$pack->pivot->qty}}" min="1" max="99" required>
                
				<label for="instructions" class="block font-bold text-gray-600">Instructions</label>
                <input type="text" name="instructions" id="instructions"
                    class="w-full p-5 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                    value="{{$pack->pivot->instructions}}" maxlength="255">
                    
                <div class="py-6">   
                    <a href="{{route('order')}}" class="px-4 py-2 text-white bg-gray-600 rounded closeModal" type="button">Cancel</a>
                    <button class="px-4 py-2 text-white bg-blue-600 rounded" type="submit">Save</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

{{-- Delete Modal for Order --}}
<div class="container justify-center mx-auto hidden modal" id="delete#{{$pack->pivot->id}}">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50" style="z-index: 90">
        <div class="max-w-sm p-6 bg-white rounded-md" style="z-index: 100">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">Are you sure you want to delete "{{$pack->name}}" from the order?</h3>
            </div>
            <form class="mt-5" action="{{route('deletePackOrderItem', ['id' => $pack->pivot->id])}}" method="POST">
                @method('DELETE')
                @csrf

                <div class="py-6">   
                    <a href="{{route('order')}}" class="px-4 py-2 text-white bg-gray-600 rounded closeModal" type="button">Cancel</a>
                    <button class="px-4 py-2 text-white bg-red-600 rounded" type="submit">Delete</button>
                </div>

            </form>
        </div>
    </div>
</div>