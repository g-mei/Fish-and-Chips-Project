{{-- Edit Modal for User --}}
<div class="container flex justify-center mx-auto hidden modal" id="edit#{{$user->id}}">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
        <div class="max-w-sm p-6 bg-white rounded-md">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">Edit User</h3>
            </div>
            <form class="mt-5" action="{{route('editUser', ['id' => $user->id])}}" method="POST">
                @method('PUT')
                @csrf
                
                <label for="name" class="block font-bold text-gray-600">Name</label>
                <input type="text" name="name"
                    class="w-full p-2 border border-gray-300 rounded-l round shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                    value="{{$user->name}}">

                <label for="email" class="block font-bold text-gray-600">Email</label>
                <input type="email" name="email"
                    class="w-full p-2 border border-gray-300 rounded-l round shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                    value="{{$user->email}}">

                <div class="py-6">   
                    <a href="{{route('users')}}" class="px-4 py-2 text-white bg-gray-600 rounded closeModal" type="button">Cancel</a>
                    <button class="px-4 py-2 text-white bg-blue-600 rounded" type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Delete Modal for User --}}
<div class="container flex justify-center mx-auto hidden modal" id="delete#{{$user->id}}">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
        <div class="max-w-sm p-6 bg-white rounded-md">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">Are you sure you want to delete "{{$user->name}}" from user?</h3>
            </div>
            <form class="mt-5" action="{{route('deleteUser', ['id' => $user->id])}}" method="POST">
                @method('DELETE')
                @csrf
                <div class="py-6">   
                    <a href="{{route('users')}}" class="px-4 py-2 text-white bg-gray-600 rounded closeModal" type="button">Cancel</a>
                    <button class="px-4 py-2 text-white bg-red-600 rounded" type="submit">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>