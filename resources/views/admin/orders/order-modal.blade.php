<div class="container flex justify-center mx-auto hidden modal" id="orderFood#{{$order->id}}">
    <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50" style="z-index:90">
        <div class="max-w-xl p-6 bg-white rounded-md" style="z-index: 100">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">Are you sure you want to cancel this order?</h3>
            </div>
            <form class="mt-5" action="{{route('orderFood', ['id' => $order->id])}}" method="POST">
                @csrf
                <div class="py-6">   
                    <button class="px-4 py-2 text-white bg-blue-600 rounded" type="submit" name="submit" value="cancel">Yes</button>
                    <a href="{{route('orders')}}" class="px-4 py-2 text-white bg-gray-600 rounded closeModal" type="button">No</a>
                </div>
            </form>
        </div>
    </div>
</div>
