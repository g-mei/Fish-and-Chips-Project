<h1 class="text-2xl">Categories</h1>

<div class="py-10">
    <button type="button" class="openModal bg-blue-600 px-2 py-3 rounded-md text-white hover:shadow-md" data-label="add">Add New</button>
</div>

<table class="bg-gray-100">
    <thead>
        <tr>
            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Name</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
    @foreach ($categories as $category)
        <tr class="hover:bg-gray-100">
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$category->name}}</td>
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                <button class="openModal text-blue-700 px-1" data-label="edit" data-id="{{$category->id}}">Edit</button>
                <button class="openModal text-red-600 px-1" data-label="delete" data-id="{{$category->id}}">Delete</button>
            </td>
        </tr>
        @include('admin.categories.modal-edit-delete')
    @endforeach
    </tbody>
</table>

@include('admin.categories.modal-add')

<div class="mt-10">
    {{ $categories->links() }}
</div>