<x-jet-validation-errors class="mb-4" />

<div class="mb-5">
	@if ($message = Session::get('order_cancelled'))
	<div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
    	<strong>{{$message}}</strong>
    </div>
	@endif
                    
    <h1 class="text-2xl">Order History</h1>

    <h2 class="text-xl pt-10 font-bold">Past Orders: DONE</h2>
    <div style="overflow-x:auto;">
        <table class="bg-gray-100">
            <thead>
                <tr>
                    <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">User</th>
                    <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Order ID</th>
                    <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Instructions</th>
                    <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Items</th>
                    <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Subtotal</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($orders as $order)
                @if($order->status === "done")
                    <tr class="hover:bg-gray-100">
                        <td class="py-4 px-6 text-sm font-medium text-gray-900">{{$order->user->name??null}}</td>
                        <td class="py-4 px-6 text-sm font-medium text-gray-900">{{$order->id}}</td>
                        <td class="py-4 px-6 text-sm font-medium text-gray-900">{{$order->instructions}}</td>
                        <td class="py-4 px-6 text-sm font-medium text-gray-900">
                            @foreach ($order->foods as $food) 
                                <b>{{$food->pivot->qty}}x {{$food->name}}</b> {{$food->pivot->instructions}}<br>
                            @endforeach
                            @foreach ($order->packs as $pack) 
                                <b>{{$pack->pivot->qty}}x {{$pack->name}}</b> {{$pack->pivot->instructions}}<br>
                            @endforeach
                        </td>
                        <td class="py-4 px-6 text-sm font-medium text-gray-900">{{$order->subtotal}}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

    <h2 class="text-xl pt-10 font-bold">Past Orders: CANCELLED</h2>
    <div style="overflow-x:auto;">
        <table class="bg-gray-100">
            <thead>
                <tr>
                    <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">User</th>
                    <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Order ID</th>
                    <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Instructions</th>
                    <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Items</th>
                    <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Subtotal</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($orders as $order)
                @if($order->status === "cancelled")
                    <tr class="hover:bg-gray-100">
                        <td class="py-4 px-6 text-sm font-medium text-gray-900">{{$order->user->name??null}}</td>
	                    <td class="py-4 px-6 text-sm font-medium text-gray-900">{{$order->id}}</td>
                        <td class="py-4 px-6 text-sm font-medium text-gray-900">{{$order->instructions}}</td>
                        <td class="py-4 px-6 text-sm font-medium text-gray-900">
                            @foreach ($order->foods as $food) 
                                <b>{{$food->pivot->qty}}x {{$food->name}}</b> {{$food->pivot->instructions}}<br>
                            @endforeach
                            @foreach ($order->packs as $pack) 
                                <b>{{$pack->pivot->qty}}x {{$pack->name}}</b> {{$pack->pivot->instructions}}<br>
                            @endforeach
                        </td>
                        <td class="py-4 px-6 text-sm font-medium text-gray-900">{{$order->subtotal}}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="pt-10">
        {{ $orders->links() }}
    </div>
</div>