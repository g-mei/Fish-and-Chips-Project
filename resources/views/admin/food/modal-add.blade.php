{{-- Add Modal for Food --}}
<div class="container flex justify-center mx-auto hidden" id="addFoodModal">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50" style="z-index: 90">
        <div class="max-w-xl p-6 bg-white rounded-md" style="z-index: 100">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">Add Food</h3>
            </div>
            <form class="mt-5" action="{{route('addFood')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="responsive-container">
                    <div style="padding-right: 20px">
                        <label for="name" class="block font-bold text-gray-600">Name</label>
                        <input type="text" name="name" id="name"
                            class="w-full p-5 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Enter name" maxlength="50">

                        <label for="cost" class="block font-bold text-gray-600">Cost</label>
                        <input type="number" name="cost" step=".01" min="0" name="cost" id="cost"
                            class="w-full p-5 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Enter the cost" max="1000">

                        <label for="category" class="block font-bold text-gray-600">Category</label>
                        <select id="category" name="category" class="w-full p-5 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600">
                            <option value="">--- Select a Category ---</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>

                        <label for="description" class="block font-bold text-gray-600">Description</label>
                        <textarea name="description" id="description" rows="4"
                            class="w-full mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Enter food description..." maxlength="255"></textarea>

                        <label for="image" class="block font-bold text-gray-600">Upload Image</label>
                        <input type="file" name="image" id="add_food_image"
                            class="w-full p-5 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                            accept="image/png, image/jpeg">
                    </div>
                    <div>
                        <label for="ingredients" class="block font-bold text-gray-600">Ingredients</label>
                        @foreach ($ingredients as $ingredient)
                            <div class="mr-1">
                                <input type="checkbox" id="{{$ingredient->id}}" name="ingredients[]" value="{{$ingredient->id}}" />
                                <label for="{{$ingredient->id}}">{{$ingredient->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="block py-6">   
                    <a href="{{route('food')}}" class="px-4 py-2 text-white bg-gray-600 rounded closeModal" type="button" data-label="cancel add">Cancel</a>
                    <button class="px-4 py-2 text-white bg-blue-600 rounded" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

