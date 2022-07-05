<nav class="bg-blue-900 text-white">
    <ul class="flex flex-row justify-center flex-wrap">
        <li class="py-4 hover:bg-blue-400 hover:rounded-m {{Request::is('dashboard/categories') ? 'bg-blue-400 rounded-m' : ''}}"><a href="{{route('categories')}}" class="px-4 ">Manage Categories</a></li>
        <li class="py-4 hover:bg-blue-400 hover:rounded-m {{Request::is('dashboard/food') ? 'bg-blue-400 rounded-m' : ''}} "><a href="{{route('food')}}" class="px-4 ">Manage Food Items</a></li>
        <li class="py-4 hover:bg-blue-400 hover:rounded-m {{Request::is('dashboard/packs') ? 'bg-blue-400 rounded-m' : ''}} "><a href="{{route('packs')}}" class="px-4 ">Manage Food Packs</a></li>
        <li class="py-4 hover:bg-blue-400 hover:rounded-m {{Request::is('dashboard/orders') ? 'bg-blue-400 rounded-m' : ''}} "><a href="{{route('orders')}}" class="px-4 ">Manage Orders</a></li>
        <li class="py-4 hover:bg-blue-400 hover:rounded-m {{Request::is('dashboard/order_history') ? 'bg-blue-400 rounded-m' : ''}} "><a href="{{route('order_history')}}" class="px-4 ">Order History</a></li>
        <li class="py-4 hover:bg-blue-400 hover:rounded-m {{Request::is('dashboard/users') ? 'bg-blue-400 rounded-m' : ''}} "><a href="{{route('users')}}" class="px-4 ">Users/Customers</a></li>
    </ul>
</nav>