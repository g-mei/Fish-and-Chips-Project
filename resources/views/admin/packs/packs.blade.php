<x-jet-validation-errors class="mb-4" />

<h1 class="text-2xl">Packs</h1>

<div class="py-5">
    <button type="button" class="openModal bg-blue-600 px-2 py-3 rounded-md text-white hover:shadow-md" data-label="add">Add New</button>
</div>

<div style="overflow-x:auto;">
    <table class="bg-gray-100">
        <thead>
            <tr>
                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Image</th>
                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Name</th>
                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Cost</th>
                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Category</th>
                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Items</th>
                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Description</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($packs as $pack)
            <tr class="hover:bg-gray-100">
                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap"><img src="{{ asset('storage/image/food_packs/'.$pack->image) }}" alt="{{$pack->image}}" style="width: 200px"></td>
                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$pack->name}}</td>
                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$pack->cost}}</td>
                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$pack->category->name??null}}</td>
                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                    @foreach ($pack->foods as $food)
                        {{$food->name}}
                    @endforeach
                </td>
                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-wrap">{{$pack->description}}</td>
                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                    <button class="openModal text-blue-700 px-1" data-label="editPack" data-id="{{$pack->id}}">Edit</button>
                    <button class="openModal text-red-600 px-1" data-label="deletePack" data-id="{{$pack->id}}">Delete</button>
                </td>
            </tr>
            
            @include('admin.packs.modal-edit-delete')
            
        @endforeach
        </tbody>
    </table>
</div>

@include('admin.packs.modal-add')

<div class="pt-10">
    {{ $packs->links() }}
</div>

@stack('checkFile')