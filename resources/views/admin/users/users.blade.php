<x-jet-validation-errors class="mb-4" />

<h1 class="text-2xl">Users</h1>

<div style="overflow-x:auto;">
    <table class="bg-gray-100 mt-10">
        <thead>
            <tr>
                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Name</th>
                <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Email</th>       
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($users as $user)
                <tr class="hover:bg-gray-100">
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$user->name}}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$user->email}}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                        <button class="openModal text-blue-700 px-1" data-label="edit" data-id="{{$user->id}}">Edit</button>
                        <button class="openModal text-red-600 px-1" data-label="delete" data-id="{{$user->id}}">Delete</button>
                    </td>
                </tr>
                @include('admin.users.modal-edit-delete')
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-10">
    {{ $users->links() }}
</div>
