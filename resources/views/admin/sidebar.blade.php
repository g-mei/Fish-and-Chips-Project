<nav class="absolute z-10 w-48 bg-blue-900 text-white min-h-screen">
    <ul class="mt-10">
        <li class="hover:bg-blue-400 hover:rounded-m {{Request::is('dashboard/categories') ? 'bg-blue-400 rounded-m' : ''}}"><a href="{{route('categories')}}" class="block px-4 py-4">Categories</a></li>
        <li class="hover:bg-blue-400 hover:rounded-m {{Request::is('dashboard/food') ? 'bg-blue-400 rounded-m' : ''}}"><a href="{{route('food')}}" class="block px-4 py-4 ">Food Items</a></li>
        <li class="hover:bg-blue-400 hover:rounded-m {{Request::is('dashboard/orders') ? 'bg-blue-400 rounded-m' : ''}}"><a href="{{route('orders')}}" class="block px-4 py-4 ">Orders</a></li>
        <li class="hover:bg-blue-400 hover:rounded-m {{Request::is('dashboard/order_history') ? 'bg-blue-400 rounded-m' : ''}}"><a href="{{route('order_history')}}" class="block px-4 py-4 ">Order History</a></li>
        <li class="hover:bg-blue-400 hover:rounded-m {{Request::is('dashboard/users') ? 'bg-blue-400 rounded-m' : ''}}"><a href="{{route('users')}}" class="block px-4 py-4 ">Users</a></li>
    </ul>
</nav>