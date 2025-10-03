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
    <h2 class="text-2xl font-bold text-white text-center mb-4">Welcome Back!</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-pink-400" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-white"/>
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
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

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <input id="remember_me" type="checkbox" name="remember" class="rounded text-pink-400 focus:ring-pink-400">
                <label for="remember_me" class="ml-2 text-gray-300 text-sm">Remember me</label>
            </div>

            <!-- Actions -->
            <div class="flex justify-between items-center">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-pink-400 hover:underline">
                        Forgot your password?
                    </a>
                @endif

                <x-primary-button class="bg-pink-400 text-black px-4 py-2 rounded-lg hover:bg-pink-500">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>

        <p class="mt-6 text-center text-gray-300 text-sm">
            Don’t have an account? 
            <a href="{{ route('register') }}" class="text-pink-400 hover:underline">Register</a>
        </p>
    </div>

    <script>
        function togglePassword(id) {
            const input = document.getElementById(id);
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</x-guest-layout>


