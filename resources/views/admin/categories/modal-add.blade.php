{{-- Add Modal for Categories --}}
<div class="container justify-center mx-auto modal hidden" id="addModal">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50" style="z-index: 90">
        <div class="max-w-xl p-6 bg-white rounded-md" style="z-index: 100">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">Add Categories</h3>
            </div>

            <form class="mt-5" action="{{route('addCategory')}}" method="POST">
                @csrf

                <label for="name" class="block font-bold text-gray-600">Name</label>
                <input type="text" name="name" id="name"
                    class="w-full p-3 mb-4 border border-gray-300 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                    placeholder="Enter name" maxlength="50">

                <div class="py-6">   
                    <a href="{{route('categories')}}" class="px-4 py-2 text-white bg-gray-600 rounded closeModal" type="button" data-label="cancel add">Cancel</a>
                    <button class="px-4 py-2 text-white bg-blue-600 rounded" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

