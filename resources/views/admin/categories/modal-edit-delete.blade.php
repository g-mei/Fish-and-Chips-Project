{{-- Edit Modal for Categories --}}
<div class="container flex justify-center mx-auto hidden modal" id="edit#{{$category->id}}">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
        <div class="max-w-xl p-6 bg-white rounded-md">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">Edit Category</h3>
            </div>
            <form class="mt-5" action="{{route('editCategory', ['id' => $category->id])}}" method="POST">
                @method('PUT')
                @csrf

                <label for="name" class="block font-bold text-gray-600">Name</label>
                <input type="text" name="name"
                    class="w-full p-3 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                    value="{{$category->name}}">

                <div class="py-6">   
                    <a href="{{route('categories')}}" class="px-4 py-2 text-white bg-gray-600 rounded closeModal" type="button">Cancel</a>
                    <button class="px-4 py-2 text-white bg-blue-600 rounded" type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Delete Modal for Categories --}}
<div class="container flex justify-center mx-auto hidden modal" id="delete#{{$category->id}}">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
        <div class="max-w-sm p-6 bg-white rounded-md">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">Are you sure you want to delete "{{$category->name}}" from categories?</h3>
            </div>
            <form class="mt-5" action="{{route('deleteCategory', ['id' => $category->id])}}" method="POST">
                @method('DELETE')
                @csrf

                <div class="py-6">   
                    <a href="{{route('categories')}}" class="px-4 py-2 text-white bg-gray-600 rounded closeModal" type="button">Cancel</a>
                    <button class="px-4 py-2 text-white bg-red-600 rounded" type="submit">Delete</button>
                </div>

            </form>
        </div>
    </div>
</div>