{{-- Edit Modal for Food --}}
<div class="container flex justify-center mx-auto hidden modal" id="edit#{{$food->id}}">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
        <div class="max-w-sm p-6 bg-white rounded-md">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">Edit Food</h3>
            </div>
            <form class="mt-5" action="{{route('editFood', ['id' => $food->id])}}" method="POST">
                @method('PUT')
                @csrf
                <label for="name" class="block font-bold text-gray-600">Name</label>
                <input type="text" name="name"
                    class="w-full p-2 border border-gray-300 rounded-l round shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                    value="{{$food->name}}">
                <div class="py-6">   
                    <a href="{{route('food')}}" class="px-4 py-2 text-white bg-gray-600 rounded closeModal" type="button">Cancel</a>
                    <button class="px-4 py-2 text-white bg-blue-600 rounded" type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Delete Modal for Food --}}
<div class="container flex justify-center mx-auto hidden modal" id="delete#{{$food->id}}">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
        <div class="max-w-sm p-6 bg-white rounded-md">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">Are you sure you want to delete "{{$food->name}}" from food items?</h3>
            </div>
            <form class="mt-5" action="{{route('deleteFood', ['id' => $food->id])}}" method="POST">
                @method('DELETE')
                @csrf
                <div class="py-6">   
                    <a href="{{route('food')}}" class="px-4 py-2 text-white bg-gray-600 rounded closeModal" type="button">Cancel</a>
                    <button class="px-4 py-2 text-white bg-red-600 rounded" type="submit">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>