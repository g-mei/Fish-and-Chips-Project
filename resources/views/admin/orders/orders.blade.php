<x-jet-validation-errors class="mb-4" />

<div class="mb-5">

<!-- UNCONFIRMED ORDERS -->

    <h1 class="text-2xl">Unconfirmed orders</h1>
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
            @foreach ($orders_unconfirmed as $order)
            <form action="{{route('updateOrderStatus', ['id' => $order->id])}}" method="POST">
                @csrf
                <tr class="hover:bg-gray-100">
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->user->name??null}}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->id}}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->instructions}}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                        @foreach ($order->foods as $food) 
                            <b>{{$food->pivot->qty}}x {{$food->name}}</b> {{$food->pivot->instructions}}<br>
                        @endforeach
                        @foreach ($order->packs as $pack) 
                            <b>{{$pack->pivot->qty}}x {{$pack->name}}</b> {{$pack->pivot->instructions}}<br>
                        @endforeach
                    </td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->subtotal}}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                        @if($order->status === "waiting")
                        <button type="submit" class="bg-blue-400 p-1 rounded-sm">Cooking</button>
                        @endif

                        @if($order->status === "cooking")
                        <button type="submit" class="bg-green-500 p-1 rounded-sm">Done</button>
                        @endif
                    </td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                        <button class="openModal bg-gray-400 p-1 rounded-sm" data-label="orderFood" data-id="{{$order->id}}">Cancel Order</button>
                    </td>
                </tr>
            </form>
            @include('admin.orders.order-modal')
            @endforeach
            </tbody>
        </table>
    </div>
    
<!-- ORDERS IN PROGRESS -->

    <h1 class="text-2xl" style="margin-top: 30px">Orders in progress</h1>
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
            <form action="{{route('updateOrderStatus', ['id' => $order->id])}}" method="POST">
                @csrf
                <tr class="hover:bg-gray-100">
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->user->name??null}}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->id}}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->instructions}}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                        @foreach ($order->foods as $food) 
                            <b>{{$food->pivot->qty}}x {{$food->name}}</b> {{$food->pivot->instructions}}<br>
                        @endforeach
                        @foreach ($order->packs as $pack) 
                            <b>{{$pack->pivot->qty}}x {{$pack->name}}</b> {{$pack->pivot->instructions}}<br>
                        @endforeach
                    </td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->subtotal}}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                        @if($order->status === "waiting")
                        <button type="submit" class="bg-blue-400 p-1 rounded-sm">Cooking</button>
                        @endif

                        @if($order->status === "cooking")
                        <button type="submit" class="bg-green-500 p-1 rounded-sm">Done</button>
                        @endif
                    </td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                        <button class="openModal bg-gray-400 p-1 rounded-sm" data-label="orderFood" data-id="{{$order->id}}">Cancel Order</button>
                    </td>
                </tr>
            </form>
            @include('admin.orders.order-modal')
            @endforeach
            </tbody>
        </table>
    </div>

<!-- WAITING FOR PICKUP -->

    <h1 class="text-2xl" style="margin-top: 30px">Waiting for Pickup</h1>
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
            @foreach ($orders_pickup as $order)
            <form action="{{route('updateOrderStatus', ['id' => $order->id])}}" method="POST">
                @csrf
                <tr class="hover:bg-gray-100">
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->user->name??null}}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->id}}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->instructions}}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                        @foreach ($order->foods as $food) 
                            <b>{{$food->pivot->qty}}x {{$food->name}}</b> {{$food->pivot->instructions}}<br>
                        @endforeach
                        @foreach ($order->packs as $pack) 
                            <b>{{$pack->pivot->qty}}x {{$pack->name}}</b> {{$pack->pivot->instructions}}<br>
                        @endforeach
                    </td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->subtotal}}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                        @if($order->status === "pickup")
                        <button type="submit" class="bg-green-600 p-1 rounded-sm text-white">Picked up</button>
                        @endif
                    </td>
                </tr>
            </form>
            @endforeach
            </tbody>
        </table>
    </div>
</div>