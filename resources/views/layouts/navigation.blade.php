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
         <div class="hidden sm:flex sm:items-center sm:gap-10">
               
                 @if(Auth::user() && Auth::user()->role !== 'admin')
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-white hover:text-pink-400 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                    </svg>
                    Dashboard
                </a>

                <a href="#" class="flex items-center gap-2 text-white hover:text-pink-400 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.3 5.2a1 1 0 001 1.3h12.6a1 1 0 001-1.3L17 13M7 13l10 0" />
                    </svg>
                    Cart
                </a>

                <a href="#" class="flex items-center gap-2 text-white hover:text-pink-400 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3v1h6v-1c0-1.657-1.343-3-3-3zm9 4h-1a9 9 0 11-16 0H3" />
                    </svg>
                    Checkout
                </a>

                <a href="#" class="flex items-center gap-2 text-white hover:text-pink-400 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2h6v2a2 2 0 002 2h2v2H5v-2h2a2 2 0 002-2zm0-6V9a3 3 0 016 0v2" />
                    </svg>
                    My Orders
                </a>
                @endif

                <!-- User Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent 
                                    text-sm font-medium rounded-md text-white hover:text-pink-400 
                                    focus:outline-none transition ml-4">
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
            <!-- Dashboard -->
             @if(Auth::user() && Auth::user()->role !== 'admin')
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center gap-2 text-white hover:text-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                </svg>
                Dashboard
            </x-responsive-nav-link>

            <!-- Cart -->
            <x-responsive-nav-link href="#" class="flex items-center gap-2 text-white hover:text-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.3 5.2a1 1 0 001 1.3h12.6a1 1 0 001-1.3L17 13M7 13l10 0" />
                </svg>
                Cart
            </x-responsive-nav-link>

            <!-- Checkout -->
            <x-responsive-nav-link href="#" class="flex items-center gap-2 text-white hover:text-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3v1h6v-1c0-1.657-1.343-3-3-3zm9 4h-1a9 9 0 11-16 0H3" />
                </svg>
                Checkout
            </x-responsive-nav-link>

            <!-- My Orders -->
            <x-responsive-nav-link href="#" class="flex items-center gap-2 text-white hover:text-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2h6v2a2 2 0 002 2h2v2H5v-2h2a2 2 0 002-2zm0-6V9a3 3 0 016 0v2" />
                </svg>
                My Orders
            </x-responsive-nav-link>
            @endif

            {{-- Admin links only for admin role --}}
           @if(Auth::user() && Auth::user()->role === 'admin')
                    <x-responsive-nav-link :href="route('admin.index')" class="flex items-center gap-2 text-white hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                        </svg>
                        Dashboard
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('admin.product.index')" class="flex items-center gap-2 text-white hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6M16 21v-4H8v4h8zM3 13h18" />
                        </svg>
                        Manage Products
                    </x-responsive-nav-link>

                    <x-responsive-nav-link href="#" class="flex items-center gap-2 text-white hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.3 5.2a1 1 0 001 1.3h12.6a1 1 0 001-1.3L17 13" />
                        </svg>
                        View Orders
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('admin.users.index')" class="flex items-center gap-2 text-white hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20h6v-2a4 4 0 00-3-3.87M12 12a4 4 0 100-8 4 4 0 000 8z" />
                        </svg>
                        View Users
                    </x-responsive-nav-link>
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
                <form method="POST" action="{{ route('logout') }}" >
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
