<nav x-data="{ open: false }" class="bg-primary">
    @if (Route::has('login'))
        @auth
            @if (Auth::user()->role_id === 1)
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="{{ route('/') }}">
                                    <x-jet-application-mark class="block h-9 w-auto" />
                                </a>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-jet-nav-link href="{{ route('/') }}" :active="request()->routeIs('/')">
                                    {{ __('Home') }}
                                </x-jet-nav-link>
                                <x-jet-nav-link href="{{ route('menu') }}" :active="request()->routeIs('menu')">
                                    {{ __('Menu') }}
                                </x-jet-nav-link>
                                <x-jet-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                                    {{ __('About Us') }}
                                </x-jet-nav-link>
                                <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->is('dashboard', 'dashboard/*')">
                                    {{ __('Dashboard') }}
                                </x-jet-nav-link>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <x-jet-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ Auth::user()->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-jet-dropdown-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                            {{ __('Profile') }}
                                        </x-jet-dropdown-link>

                                        <div class="border-t border-blue-100"></div>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-jet-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-jet-dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-white hover:bg-primary focus:outline-none focus:bg-primary focus:text-white transition">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-jet-responsive-nav-link href="{{ route('/') }}" :active="request()->routeIs('/')">
                            {{ __('Home') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('menu') }}" :active="request()->routeIs('menu')">
                            {{ __('Menu') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                            {{ __('About Us') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->is('dashboard', 'dashboard/*')">
                            {{ __('Dashboard') }}
                        </x-jet-responsive-nav-link>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-blue-200">
                        <div class="flex items-center px-4">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <div class="shrink-0 mr-3">
                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </div>
                            @endif
                        </div>

                        <div class="mt-3 space-y-1">
                            <!-- Account Management -->
                            <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                {{ __('Profile') }}
                            </x-jet-responsive-nav-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                </div>
            @elseif (Auth::user()->role_id === 2)
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="{{ route('/') }}">
                                    <x-jet-application-mark class="block h-9 w-auto" />
                                </a>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-jet-nav-link href="{{ route('/') }}" :active="request()->routeIs('/')">
                                    {{ __('Home') }}
                                </x-jet-nav-link>
                                <x-jet-nav-link href="{{ route('menu') }}" :active="request()->routeIs('menu')">
                                    {{ __('Menu') }}
                                </x-jet-nav-link>
                                <x-jet-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                                    {{ __('About Us') }}
                                </x-jet-nav-link>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <x-jet-nav-link href="{{ route('order') }}" :active="request()->routeIs('order')">
                                    {{ __('Order') }}
                            </x-jet-nav-link>
                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <x-jet-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ Auth::user()->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-jet-dropdown-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                            {{ __('Profile') }}
                                        </x-jet-dropdown-link>

                                        <div class="border-t border-blue-100"></div>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-jet-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-jet-dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-blue hover:bg-primary focus:outline-none focus:bg-primary focus:text-white transition">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-jet-responsive-nav-link href="{{ route('/') }}" :active="request()->routeIs('/')">
                            {{ __('Home') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('menu') }}" :active="request()->routeIs('menu')">
                            {{ __('Menu') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                            {{ __('About Us') }}
                        </x-jet-responsive-nav-link>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-blue-200">
                        <div class="mt-3 space-y-1">
                            <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                {{ __('Profile') }}
                            </x-jet-responsive-nav-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
            @else
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="{{ route('/') }}">
                                    <x-jet-application-mark class="block h-9 w-auto" />
                                </a>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-jet-nav-link href="{{ route('/') }}" :active="request()->routeIs('/')">
                                    {{ __('Home') }}
                                </x-jet-nav-link>
                                <x-jet-nav-link href="{{ route('menu') }}" :active="request()->routeIs('menu')">
                                    {{ __('Menu') }}
                                </x-jet-nav-link>
                                <x-jet-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                                    {{ __('About Us') }}
                                </x-jet-nav-link>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <div align="right" width="48">
                                    <a href="{{ route('login') }}" class="text-sm text-white dark:text-white" :active="request()->routeIs('login')">Log in</a>
                                    
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text-sm text-white dark:text-white" :active="request()->routeIs('register')">Register</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-white hover:bg-primary focus:outline-none focus:bg-primary focus:text-white transition">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                 <!-- Responsive Navigation Menu -->
                 <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-jet-responsive-nav-link href="{{ route('/') }}" :active="request()->routeIs('/')">
                            {{ __('Home') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('menu') }}" :active="request()->routeIs('menu')">
                            {{ __('Menu') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                            {{ __('About Us') }}
                        </x-jet-responsive-nav-link>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-blue-200">
                        
                        <div class="mt-3 space-y-1">
                            <!-- Account Management -->
                            <x-jet-responsive-nav-link  href="{{ route('login') }}" :active="request()->routeIs('login')">
                                {{ __('Login') }}
                            </x-jet-responsive-nav-link>

                            <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                                {{ __('Register') }}
                            </x-jet-responsive-nav-link>
                        </div>
                    </div>
                </div>
                
        @endauth
    @endif
</nav>
