<x-guest-layout>
    <div class="w-full max-w-md bg-gradient-to-br from-blue-900 via-black to-gray-900 backdrop-blur-md rounded-2xl p-8 shadow-xl">
        <a href="{{ url('/') }}" 
            class="absolute top-4 left-4 text-pink-400 hover:text-pink-300 transition">
                <!-- Heroicon chevron-left -->
                <svg xmlns="http://www.w3.org/2000/svg" 
                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
                    class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </a>

    <div class="flex justify-center mb-6">
            <img src="{{ asset('import/assets/logo.png') }}" 
                alt="Logo" 
                class="w-16 h-16 rounded-full animate-spin-slow">
        </div>
        <h2 class="text-2xl font-bold text-white text-center mb-4">Create Account</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('Name')" class="text-white"/>
                <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
                    class="mt-1 w-full rounded-lg px-4 py-2 bg-black/30 text-white placeholder-gray-400 focus:ring-pink-400 focus:border-pink-400"/>
                <x-input-error :messages="$errors->get('name')" class="text-pink-400 mt-1"/>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-white"/>
                <x-text-input id="email" type="email" name="email" :value="old('email')" required
                    class="mt-1 w-full rounded-lg px-4 py-2 bg-black/30 text-white placeholder-gray-400 focus:ring-pink-400 focus:border-pink-400"/>
                <x-input-error :messages="$errors->get('email')" class="text-pink-400 mt-1"/>
            </div>

            <!-- Password -->
            <div class="mb-4 relative">
                <x-input-label for="password" :value="__('Password')" class="text-white"/>
                <x-text-input id="password" type="password" name="password" required
                    class="mt-1 w-full rounded-lg px-4 py-2 bg-black/30 text-white placeholder-gray-400 focus:ring-pink-400 focus:border-pink-400 pr-10"/>
                <button type="button" onclick="togglePassword('password')" class="absolute right-3 top-9 text-gray-400 hover:text-pink-400">
                    ⎚-⎚
                </button>
                <x-input-error :messages="$errors->get('password')" class="text-pink-400 mt-1"/>
            </div>

            <!-- Confirm Password -->
            <div class="mb-4 relative">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-white"/>
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
                    class="mt-1 w-full rounded-lg px-4 py-2 bg-black/30 text-white placeholder-gray-400 focus:ring-pink-400 focus:border-pink-400 pr-10"/>
                <button type="button" onclick="togglePassword('password_confirmation')" class="absolute right-3 top-9 text-gray-400 hover:text-pink-400">
                    ⎚-⎚
                </button>
                <x-input-error :messages="$errors->get('password_confirmation')" class="text-pink-400 mt-1"/>
            </div>

            <!-- Register Button -->
            <x-primary-button class="w-full text-center bg-pink-400 text-black px-4 py-2 rounded-lg hover:bg-pink-500">
                {{ __('Register') }}
            </x-primary-button>
        </form>

        <p class="mt-6 text-center text-gray-300 text-sm">
            Already registered? 
            <a href="{{ route('login') }}" class="text-pink-400 hover:underline">Login</a>
        </p>
    </div>

    <script>
        function togglePassword(id) {
            const input = document.getElementById(id);
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</x-guest-layout>
