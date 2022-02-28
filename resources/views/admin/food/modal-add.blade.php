{{-- Add Modal for Food --}}
<div class="container flex justify-center mx-auto hidden" id="addModal">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
        <div class="max-w-sm p-6 bg-white rounded-md">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">Add Food</h3>
            </div>
            <form class="mt-5" action="{{route('addFood')}}" method="POST">
                @csrf

                <label for="name" class="block font-bold text-gray-600">Name</label>
                <input type="text" name="name"
                    class="w-full p-2 border border-gray-300 rounded-l round shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                    placeholder="Enter name">

                <label for="cost" class="block font-bold text-gray-600">Cost</label>
                <input type="number" name="cost" step=".01" name="cost"
                    class="w-full p-2 border border-gray-300 rounded-l round shadow focus:outline-none focus:ring-2 focus:ring-blue-600"
                    placeholder="Enter the cost">

                <div class="py-6">   
                    <a href="{{route('food')}}" class="px-4 py-2 text-white bg-gray-600 rounded closeModal" type="button" aria-label="cancel add">Cancel</a>
                    <button class="px-4 py-2 text-white bg-blue-600 rounded" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

