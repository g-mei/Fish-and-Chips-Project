<h1 class="text-2xl">Packs</h1>

<div class="py-10">
    <button type="button" class="openModal bg-blue-600 px-2 py-3 rounded-md text-white hover:shadow-md" aria-label="add">Add New</button>
</div>

<table class="bg-gray-100 dark:bg-gray-700">
    <thead>
        <tr>
            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase dark:text-gray-900">Image</th>
            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase dark:text-gray-900">Name</th>
            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase dark:text-gray-900">Cost</th>
            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase dark:text-gray-900">Description</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
    @foreach ($packs as $pack)
        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"><img src="{{ asset('storage/image/food_packs/'.$pack->image) }}" alt="{{$pack->image}}" style="width: 200px"></td>
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$pack->name}}</td>
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$pack->cost}}</td>
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$pack->description}}</td>
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <button class="openModal text-blue-700 px-1" aria-label="edit" data-id="{{$pack->id}}">Edit</button>
                <button class="openModal text-red-600 px-1" aria-label="delete" data-id="{{$pack->id}}">Delete</button>
            </td>
        </tr>
        @include('admin.packs.modal-edit-delete')
    @endforeach
    </tbody>
</table>

@include('admin.packs.modal-add')
