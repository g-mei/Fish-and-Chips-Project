{{-- Edit Modal for Pack --}}
<div class="container flex justify-center mx-auto hidden modal" id="edit#{{$pack->id}}">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50" style="z-index: 90">
        <div class="max-w-xl p-6 bg-white rounded-md" style="z-index: 100">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">Edit Pack</h3>
            </div>
            <form class="mt-5" action="{{route('editPack', ['id' => $pack->id])}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="responsive-container">
                    <div style="padding-right: 20px">
                        <label for="name" class="block font-bold text-gray-600">Name</label>
                        <input type="text" name="name" id="name"
                            class="w-full p-3 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                            value="{{$pack->name}}" maxlength="50">
                        
                        <label for="cost" class="block font-bold text-gray-600">Cost</label>
                        <input type="number" name="cost" step=".01" min="0" name="cost" id="cost"
                            class="w-full p-5 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                            value="{{$pack->cost}}" max="1000">
                            
                        <label for="category" class="block font-bold text-gray-600">Category</label>
                        <select id="category" name="category" class="w-full p-5 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600">
                            <option value="">--- Select a Category ---</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{($pack->category_id == $category->id) ? 'selected' : ''}}> {{$category->name}} </option>
                            @endforeach
                        </select>
                        
                        <label for="description" class="block font-bold text-gray-600">Description</label>
                        <textarea name="description" id="description" rows="4" maxlength="255"
                            class="w-full mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600">{{$pack->description}}</textarea>
                        
                        <label for="image" class="block font-bold text-gray-600">Upload Image</label>
                        <input type="file" name="image" id="edit_pack_image#{{$pack->id}}"
                            class="w-full p-5 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                            accept="image/png, image/jpeg">
                    </div>
                    <div>
                        <label for="foods" class="block font-bold text-gray-600">Foods</label>
                        @foreach ($foods as $food)
                            <div class="mr-1">
                                <input type="checkbox" id="{{$food->id}}" name="foods[]" value="{{$food->id}}" {{$pack->foods->contains($food) ? 'checked' : ''}}>
                                <label for="{{$food->id}}">{{$food->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="block py-6">   
                    <a href="{{route('packs')}}" class="px-4 py-2 text-white bg-gray-600 rounded closeModal" type="button">Cancel</a>
                    <button class="px-4 py-2 text-white bg-blue-600 rounded" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Delete Modal for Packs --}}
<div class="container flex justify-center mx-auto hidden modal" id="delete#{{$pack->id}}">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50" style="z-index: 90">
        <div class="max-w-sm p-6 bg-white rounded-md" style="z-index: 100">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">Are you sure you want to delete "{{$pack->name}}" from packs?</h3>
            </div>
            <form class="mt-5" action="{{route('deletePack', ['id' => $pack->id])}}" method="POST">
                @method('DELETE')
                @csrf

                <div class="py-6">   
                    <a href="{{route('packs')}}" class="px-4 py-2 text-white bg-gray-600 rounded closeModal" type="button">Cancel</a>
                    <button class="px-4 py-2 text-white bg-red-600 rounded" type="submit">Delete</button>
                </div>

            </form>
        </div>
    </div>
</div>