<x-jet-validation-errors class="mb-4" />

<div class="responsive-container">
    <div class="mb-5" style="margin-right: 100px">
        <h1 class="text-2xl">Food Items</h1>

        <div class="py-5">
            <button type="button"  class="openFoodModal bg-blue-600 px-2 py-3 rounded-md text-white hover:shadow-md" data-label="add">Add New</button>
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
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-wrap">{{$food->description}}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                        <button class="openModal text-blue-700 px-1" data-label="editFood" data-id="{{$food->id}}">Edit</button>
                        <button class="openModal text-red-600 px-1" data-label="deleteFood" data-id="{{$food->id}}">Delete</button>
                    </td>
                </tr>
                @include('admin.food.modal-edit-delete')
            @endforeach
            </tbody>
        </table>

        <div class="mt-10">
            {{ $foods->links() }}
        </div>

        @include('admin.food.modal-add')
    </div>

    <div>
        @include('admin.ingredients.ingredients')
        <div class="mt-10" style="z-index: -100">
            {{ $ingredients->links() }}
        </div>
    </div>
</div>