{{-- Edit Modal for User --}}
<div class="container flex justify-center mx-auto hidden modal" id="edit#{{$user->id}}">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50" style="z-index: 90">
        <div class="max-w-xl p-6 bg-white rounded-md" style="z-index: 100">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">Edit User</h3>
            </div>
            <form class="mt-5" action="{{route('editUser', ['id' => $user->id])}}" method="POST">
                @method('PUT')
                @csrf
                
                <label for="name" class="block font-bold text-gray-600">Name</label>
                <input type="text" name="name" id="name"
                    class="w-full p-3 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                    value="{{$user->name}}" maxlength="50" pattern="[a-zA-Z0-9 ]+" title="Alphanumerical characters only">

                <label for="email" class="block font-bold text-gray-600">Email</label>
                <input type="email" name="email" id="email"
                    class="w-full p-3 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                    value="{{$user->email}}" maxlength="320">

                <div class="py-6">   
                    <a href="{{route('users')}}" class="px-4 py-2 text-white bg-gray-600 rounded closeModal" type="button">Cancel</a>
                    <button class="px-4 py-2 text-white bg-blue-600 rounded" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Delete Modal for User --}}
<div class="container flex justify-center mx-auto hidden modal" id="delete#{{$user->id}}">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50" style="z-index: 90">
        <div class="max-w-sm p-6 bg-white rounded-md" style="z-index: 100">
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