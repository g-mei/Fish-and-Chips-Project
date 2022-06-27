<x-jet-validation-errors class="mb-4" />

<div class="responsive-container">
    <div class="mb-5">
        <h1 class="text-2xl">Order History</h1>

        <div style="overflow-x:auto;">
            <table class="bg-gray-100">
                <thead>
                    <tr>
                        <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">User</th>
                        <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Instructions</th>
                        <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Items</th>
                        <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Subtotal</th>
                        <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Status</th>
                        <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Review description</th>
                        <th scope="col" class="py-3 px-6 text-m font-medium tracking-wider text-left text-gray-800 uppercase">Review rating</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($orders as $order)
                    <tr class="hover:bg-gray-100">
                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->user->name??null}}</td>
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
                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->status}}</td>
                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->review_desc}}</td>
                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">{{$order->review_rate}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>