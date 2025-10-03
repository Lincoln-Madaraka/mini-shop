<nav x-data="{ open: false }" class="bg-black/50 backdrop-blur-md border-b border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="w-full mx-auto px-4 bg-gradient-to-br from-blue-900 via-black to-gray-900 backdrop-blur-lg sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <a href="{{ url('/') }}" class="sm:hidden flex items-center space-x-2">
                        <img src="{{ asset('import/assets/logo.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
                        <div class="flex flex-col">
                            <span class="text-xs tracking-widest font-bold text-pink-400">MINI</span>
                            <h1 class="text-2xl font-bold text-white">SHOP</h1>
                        </div>
                    </a>
                    <a href="{{ url('/') }}" class="hidden sm:flex flex-col leading-none">
                        <span class="text-xs tracking-widest font-bold text-pink-400">MINI</span>
                        <h1 class="text-2xl font-bold text-white flex items-center">
                            SH
                            <img src="{{ asset('import/assets/logo.png') }}" alt="O" class="w-6 h-6 mx-1">
                            P
                        </h1>
                    </a>
                </div>

            </div>

            <!-- Settings Dropdown (Desktop) -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent 
                                       text-sm font-medium rounded-md text-white hover:text-pink-400 
                                       focus:outline-none transition">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 
                                    011.414 0L10 10.586l3.293-3.293a1 1 0 
                                    111.414 1.414l-4 4a1 1 0 
                                    01-1.414 0l-4-4a1 1 0-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" 
                        class="p-2 rounded-md text-gray-300 hover:text-pink-400 hover:bg-gray-800 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" 
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" 
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-black/60 backdrop-blur-md text-white">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('admin.index')" :active="request()->routeIs('dashboard')" class="text-white hover:text-black">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            {{-- Admin links only for admin role --}}
            @if(Auth::user() && Auth::user()->role === 'admin')
                <x-responsive-nav-link :href="route('admin.product.index')" class="text-white hover:text-black">Manage Products</x-responsive-nav-link>
                <x-responsive-nav-link href="#" class="text-white hover:text-black">View Orders</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.users.index')" class="text-white hover:text-black">View Users</x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings -->
        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="px-4 text-white">
                <div class="font-medium text-base">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1 text-white">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:text-black">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}" ">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();" class="text-white hover:text-black">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
