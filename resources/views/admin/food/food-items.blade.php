<h1 class="text-2xl">Food Items</h1>

<div class="py-10">
    <button type="button"  class="openModal bg-blue-600 px-2 py-3 rounded-md text-white hover:shadow-md" data-label="add">Add New</button>
</div>

<table class="bg-gray-100">
    <thead>
        <tr>
            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Image</th>
            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Name</th>
            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Cost</th>
            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Category</th>
            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Description</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
    @foreach ($foods as $food)
        <tr class="hover:bg-gray-100">
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap"><img src="{{ asset('storage/image/food_items/'.$food->image) }}" alt="{{$food->image}}" style="width: 200px"></td>
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$food->name}}</td>
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$food->cost}}</td>
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$food->category->name??null}}</td>
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$food->description}}</td>
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                <button class="openModal text-blue-700 px-1" data-label="edit" data-id="{{$food->id}}">Edit</button>
                <button class="openModal text-red-600 px-1" data-label="delete" data-id="{{$food->id}}">Delete</button>
            </td>
        </tr>
        @include('admin.food.modal-edit-delete')
    @endforeach
    </tbody>
</table>

@include('admin.food.modal-add')

 <!-- Temporary(?) place for add/edit foods -->    
		<!-- List of Food --> 
        {{-- <div class="relative flex items-top justify-center sm:items-center py-8">
        </h2>
        @if(count($foods) > 1)
        <div class="">
        	<h2 class="text-lg">Food</h2>
            <table class="table-auto">
                <tr>
                    <th class="px-4 py-2">Food</th>
                    <th class="px-4 py-2">Cost</th>
                </tr>
                @foreach($foods as $food)
                <tr>
                    <td class="border px-4 py-2">{{$food->name}}</td>
                    <td class="border px-4 py-2">{{$food->cost}}</td>
                    <td class="border px-4 py-2">
                        <a href="editFood/{{$food->id}}" class="text-blue-400">Edit</a>
                    </td>
                    <td class="border px-4 py-2">
                        <a href="deleteFood/{{$food->id}}" class="text-red-600">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    @endif
	</div> --}}

    <!-- Add Food form -->
    {{-- <div class="relative flex items-top justify-center sm:items-center py-8">
        <div class="">
            <h2 class="text-lg">Add Food</h2>
            <form action="storeFood" method="POST">
            @csrf
                <div class="bg-white sm:p-6">
                    <input type="text" name="name" placeholder="Name" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                    <input type="number" name="cost" step=".01" placeholder="Cost" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="text-right sm:px-6">
                    <button class="bg-blue-500 ml-5 py-2 px-3 border border-gray-300 rounded-md">Add</button>
                </div>
                <!-- Image upload -->
                <!-- Dropdown for food food -->
            </form>
        </div>
    </div> 
    
</div> --}}
