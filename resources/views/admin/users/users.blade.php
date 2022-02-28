<h1 class="text-2xl">Users</h1>

<table class="bg-gray-100 dark:bg-gray-700 mt-10">
    <thead>
        <tr>
            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase dark:text-gray-900">Name</th>
            <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase dark:text-gray-900">Email</th>       
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
        @foreach ($users as $user)
            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$user->name}}</td>
                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$user->email}}</td>
                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <button class="openModal text-blue-700 px-1" aria-label="edit" data-id="{{$user->id}}">Edit</button>
                    <button class="openModal text-red-600 px-1" aria-label="delete" data-id="{{$user->id}}">Delete</button>
                </td>
            </tr>
            @include('admin.users.modal-edit-delete')
        @endforeach
    </tbody>
</table>
