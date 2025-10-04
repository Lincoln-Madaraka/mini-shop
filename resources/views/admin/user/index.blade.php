{{-- resources/views/admin/users.blade.php --}}
<x-app-layout>
    {{-- Remove default Jetstream header --}}
    <x-slot name="header"></x-slot>

    <!-- Preloader -->
    <div id="preloader" class="fixed inset-0 flex items-center justify-center bg-black z-50">
        <div class="animate-spin rounded-full h-20 w-20 border-t-4 border-b-4 border-pink-500"></div>
    </div>

    <div class="min-h-screen bg-gradient-to-br from-blue-900 via-black to-gray-900 text-white flex">
        <!-- Sidebar (desktop only) -->
      <aside class="hidden md:flex flex-col w-64 bg-black/40 backdrop-blur-lg p-6 space-y-4">
            <h2 class="text-lg font-bold mb-6">Quick Links</h2>

            <a href="{{ route('admin.index') }}"
            class="flex items-center gap-3 bg-gradient-to-r from-blue-600 to-blue-400 text-white p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                </svg>
                Dashboard
            </a>

            <a href="{{ route('admin.product.index') }}"
            class="flex items-center gap-3 bg-gradient-to-r from-blue-600 to-blue-400 text-white p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6M16 21v-4H8v4h8zM3 13h18" />
                </svg>
                Manage Products
            </a>

            <a href="{{ route('admin.orders.index') }}"
            class="flex items-center gap-3 bg-gradient-to-r from-pink-600 to-pink-400 text-white p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.3 5.2a1 1 0 001 1.3h12.6a1 1 0 001-1.3L17 13" />
                </svg>
                View Orders
            </a>

            <a href="{{ route('admin.users.index') }}"
            class="flex items-center gap-3 bg-gradient-to-r from-purple-600 to-purple-400 text-white p-3 rounded-xl font-semibold shadow hover:opacity-90 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20h6v-2a4 4 0 00-3-3.87M12 12a4 4 0 100-8 4 4 0 000 8z" />
                </svg>
                View Users
            </a>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 relative">
            <!-- Back Button -->
            <a href="{{ route('admin.index') }}" 
               class="absolute top-4 left-4 flex items-center gap-1 text-pink-400 hover:text-pink-300 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="font-semibold">Back</span>
            </a>

            <div class="max-w-7xl mx-auto mt-12">
                <h1 class="text-3xl font-bold mb-8">Users</h1>

                <x-session-message />

                <!-- Users Table (desktop) -->
                <div class="hidden md:block bg-white/10 backdrop-blur-lg rounded-xl overflow-auto">
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="py-4 px-6 font-bold uppercase text-sm border-b border-grey-light">ID</th>
                                <th class="py-4 px-6 font-bold uppercase text-sm border-b border-grey-light">Name</th>
                                <th class="py-4 px-6 font-bold uppercase text-sm border-b border-grey-light">Role</th>
                                <th class="py-4 px-6 font-bold uppercase text-sm border-b border-grey-light">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="hover:bg-white/20">
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $user->id }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light flex items-center gap-2">
                                        <img src="{{ asset('import/assets/profile.png') }}" alt="Avatar" class="w-8 h-8 rounded-full">
                                        {{ $user->name }}
                                        @if(Auth::id() === $user->id && $user->role === 'admin')
                                            <span class="text-pink-400 text-sm">(YOU)</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $user->role }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        @if(Auth::id() !== $user->id)
                                            <button class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded"
                                                    onclick="location.href='{{ route('admin.users.edit', $user->id) }}';">Edit</button>
                                            <form method="POST" action="{{ route('admin.users.destroy', $user->id)}}" class="inline" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-4 py-1 text-white font-light tracking-wider bg-red-600 rounded">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Users Cards (mobile) -->
                <div class="md:hidden space-y-4">
                    @foreach ($users as $user)
                        <div class="bg-white/10 backdrop-blur-lg p-4 rounded-xl flex flex-col gap-2">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('import/assets/profile.png') }}" alt="Avatar" class="w-10 h-10 rounded-full">
                                    <span class="font-semibold">{{ $user->name }}</span>
                                    @if(Auth::id() === $user->id && $user->role === 'admin')
                                        <span class="text-pink-400">(YOU)</span>
                                    @endif
                                </div>
                                <span class="text-gray-200">{{ $user->role }}</span>
                            </div>
                            @if(Auth::id() !== $user->id)
                                <div class="flex gap-2 mt-2">
                                    <button class="flex-1 px-4 py-1 bg-green-600 rounded text-white" onclick="location.href='{{ route('admin.users.edit', $user->id) }}'">Edit</button>
                                    <form method="POST" action="{{ route('admin.users.destroy', $user->id)}}" class="flex-1" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full px-4 py-1 bg-red-600 rounded text-white">Delete</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {!! $users->links() !!}
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
