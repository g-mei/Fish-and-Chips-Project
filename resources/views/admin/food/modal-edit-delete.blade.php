{{-- Edit Modal for Food --}}
<div class="container flex justify-center mx-auto hidden modal" id="edit#{{$food->id}}">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
        <div class="max-w-xl p-6 bg-white rounded-md">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">Edit Food</h3>
            </div>
            <form class="mt-5" action="{{route('editFood', ['id' => $food->id])}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                
                <label for="name" class="block font-bold text-gray-600">Name</label>
                <input type="text" name="name" id="name"
                    class="w-full p-5 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                    value="{{$food->name}}">

                <label for="cost" class="block font-bold text-gray-600">Cost</label>
                <input type="number" name="cost" step=".01" min="0" name="cost" id="cost"
                    class="w-full p-5 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                    value="{{$food->cost}}">

                <label for="category" class="block font-bold text-gray-600">Category</label>
                <select id="category" name="category" class="w-full p-5 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <option value="">--- Select a Category ---</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                <label for="description" class="block font-bold text-gray-600">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full p-3 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600">
                    {{$food->description}}</textarea>

                <label for="image" class="block font-bold text-gray-600">Upload Image</label>
                <input type="file" name="image" id="image"
                    class="w-full mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                    accept="image/png, image/jpeg">

                <div class="py-6">   
                    <a href="{{route('food')}}" class="px-4 py-2 text-white bg-gray-600 rounded closeModal" type="button">Cancel</a>
                    <button class="px-4 py-2 text-white bg-blue-600 rounded" type="submit">Save</button>
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