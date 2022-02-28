<h1>Food</h1>

<button type="button" class="openModal" aria-label="add">Add New</button>

<table>
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Cost</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($foods as $food)
        <tr>
            <td>{{$food->image}}</td>
            <td>{{$food->name}}</td>
            <td>{{$food->cost}}</td>
            <td>{{$food->cost}}</td>
            <th>
                <button class="openModal" aria-label="edit" data-id="{{$food->id}}">Edit</button>
                <button class="openModal" aria-label="delete" data-id="{{$food->id}}">Delete</button>
            </th>
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