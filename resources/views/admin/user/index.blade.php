{{-- resources/views/admin/users.blade.php --}}
<x-app-layout>
    <x-slot name="header"></x-slot>

    <div id="preloader" class="fixed inset-0 flex items-center justify-center bg-black z-50">
        <div class="animate-spin rounded-full h-20 w-20 border-t-4 border-b-4 border-pink-500"></div>
    </div>

    <div x-data="{ open: false, selectedUser: null }" class="min-h-screen bg-white text-black flex">
        <!-- Sidebar -->
        <aside class="hidden md:flex flex-col w-64 bg-gray-800 backdrop-blur-lg p-6 space-y-4">
            <h2 class="text-lg text-yellow-200 font-bold mb-6">Quick Links</h2>

            <a href="{{ route('admin.index') }}"
               class="flex items-center gap-3 bg-black text-white p-3 rounded-xl font-semibold shadow hover:bg-white hover:text-black transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                </svg>
                Dashboard
            </a>

            <a href="{{ route('admin.product.index') }}"
               class="flex items-center gap-3 bg-black hover:bg-white hover:text-black text-white p-3 rounded-xl font-semibold shadow transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6M16 21v-4H8v4h8zM3 13h18" />
                </svg>
                Manage Products
            </a>

            <a href="{{ route('admin.orders.index') }}"
               class="flex items-center gap-3 bg-black hover:bg-white hover:text-black text-white p-3 rounded-xl font-semibold shadow transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.3 5.2a1 1 0 001 1.3h12.6a1 1 0 001-1.3L17 13" />
                </svg>
                View Orders
            </a>

            <a href="{{ route('admin.users.index') }}"
               class="flex items-center gap-3 bg-white text-black p-3 rounded-xl font-semibold shadow transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20h6v-2a4 4 0 00-3-3.87M12 12a4 4 0 100-8 4 4 0 000 8z" />
                </svg>
                View Users
            </a>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 relative bg-white">
            <!-- Back Button -->
            <a href="{{ route('admin.index') }}" 
               class="absolute top-4 left-4 flex items-center gap-1 text-pink-400 hover:text-pink-300 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="font-semibold text-black">Back</span>
            </a>

            <div class="max-w-7xl mx-auto mt-12">
                <h1 class="text-3xl font-bold mb-8">Users</h1>

                <x-session-message />

                <!-- Users Table (Desktop) -->
                 <div class="hidden md:block bg-gradient-to-br from-blue-900 via-black to-gray-900 backdrop-blur-lg rounded-xl overflow-auto shadow-lg border border-gray-800">
                    <table class="table-fixed w-full text-left border-collapse">
                        <thead class="bg-black/30">
                            <tr>
                                <th class="w-[8%] py-4 px-6 text-sm font-semibold uppercase border-b border-gray-700 text-white">ID</th>
                                <th class="w-[42%] py-4 px-6 text-sm font-semibold uppercase border-b border-gray-700 text-white">Name</th>
                                <th class="w-[20%] py-4 px-6 text-sm font-semibold uppercase border-b border-gray-700 text-white">Role</th>
                                <th class="w-[30%] py-4 px-6 text-sm font-semibold uppercase border-b border-gray-700 text-center text-white">Manage Users</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="hover:bg-white/10 transition border-b border-gray-800">
                                    <!-- ID -->
                                    <td class="w-[8%] py-4 px-6 text-sm text-gray-200">{{ $user->id }}</td>

                                    <!-- Name -->
                                    <td class="w-[42%] py-4 px-6 flex items-center gap-2 text-sm text-gray-100 whitespace-nowrap">
                                        <img src="{{ asset('import/assets/profile.png') }}" alt="Avatar" class="w-8 h-8 rounded-full border border-gray-700 shrink-0">
                                        <span class="truncate">{{ $user->name }}</span>
                                        @if(Auth::id() === $user->id && $user->role === 'admin')
                                            <span class="ml-1 text-xs text-yellow-400 font-semibold">(You)</span>
                                        @endif
                                    </td>

                                    <!-- Role -->
                                    <td class="w-[20%] py-4 px-6 text-sm text-gray-300 capitalize whitespace-nowrap">
                                        {{ $user->role }}
                                    </td>

                                    <!-- Manage Users -->
                                    <td class="w-[30%] py-4 px-6 text-sm text-center whitespace-nowrap">
                                        @if(!($user->id === Auth::id() && $user->role === 'admin'))
                                            <button 
                                                @click="selectedUser = {{ $user->id }}; open = true"
                                                class="bg-yellow-400 text-black font-semibold px-4 py-2 rounded-lg hover:bg-yellow-300 transition">
                                                Manage User
                                            </button>
                                        @else
                                            <span class="text-gray-500 font-semibold">You</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Users Cards (Mobile) -->
                <div class="md:hidden space-y-4 bg-gradient-to-br from-blue-900 via-black to-gray-900 p-4 rounded-xl text-white">
                    @foreach ($users as $user)
                        <div class="bg-white/10 backdrop-blur-lg p-4 rounded-xl flex flex-col gap-2">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('import/assets/profile.png') }}" alt="Avatar" class="w-10 h-10 rounded-full">
                                    <span class="font-semibold">{{ $user->name }}</span>
                                    @if(Auth::id() === $user->id && $user->role === 'admin')
                                        <span class="text-white">(YOU)</span>
                                    @endif
                                </div>
                                <span class="text-gray-200">{{ $user->role }}</span>
                            </div>
                            @if(!($user->id === Auth::id() && $user->role === 'admin'))
                                <button 
                                    @click="selectedUser = {{ $user->id }}; open = true"
                                    class="mt-3 bg-yellow-400 text-black font-semibold px-4 py-2 rounded-lg hover:bg-yellow-300 transition">
                                    Manage User
                                </button>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {!! $users->links() !!}
                </div>
            </div>

            <!-- Manage User Modal -->
            <div x-show="open" x-transition.opacity
                 class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-md p-4">
                <div class="bg-[#f5f2e9]/95 backdrop-blur-lg text-gray-900 p-6 rounded-2xl border border-gray-300 max-w-md w-full relative flex flex-col shadow-xl">
                    <!-- Close Button -->
                    <button @click="open = false"
                        class="absolute top-2 right-2 text-gray-700 text-3xl font-bold px-3 py-1 rounded-full bg-gray-200 hover:bg-gray-300 transition">
                        &times;
                    </button>

                    <h2 class="text-2xl font-bold mb-4 text-center">Manage User</h2>

                    <div class="flex flex-col gap-3">
                        <form method="POST" :action="'/admin/users/' + selectedUser + '/make-admin'">
                            @csrf
                            <button type="submit"
                                class="w-full bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                                Make Admin
                            </button>
                        </form>

                        <form method="POST" :action="'/admin/users/' + selectedUser + '/delete'">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full bg-red-600 text-white font-semibold px-4 py-2 rounded-lg hover:bg-red-500 transition">
                                Delete User
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <!-- Preloader Script -->
    <script>
        window.addEventListener('load', () => {
            document.getElementById('preloader').style.display = 'none';
        });
    </script>
</x-app-layout>
