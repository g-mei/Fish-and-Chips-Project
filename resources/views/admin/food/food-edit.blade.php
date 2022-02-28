<div>
	
	<div class="relative flex items-top justify-center sm:items-center py-8">
        <div class="">
            <h2 class="text-lg">Edit {{$food->name}}</h2>
            <form action="" method="POST">
            @csrf
                <div class="bg-white sm:p-6">
                	<input type="hidden" name="id" value="{{$food->id}}">
                	<label>Name</label>
                    <input type="text" name="name" value="{{$food->name}}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                    <label>Cost</label>
                    <input type="number" name="cost" step=".01" value="{{$food->cost}}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
<!--                 	<label>Category</label> -->
<!--                 	<label>Image</label> -->
                </div>
                <div class="text-right sm:px-6">
                    <button type="submit" class="bg-blue-500 ml-5 py-2 px-3 border border-gray-300 rounded-md">Edit</button>
                </div>
            </form>
        </div>
    </div> 
	
	

    
</div>
