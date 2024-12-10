<x-app-layout>
    <body class="bg-gray-50 font-sans leading-normal tracking-normal">
        <main class="flex flex-col items-center justify-center py-10 md:py-20 px-4">
            <h1 class="text-3xl md:text-5xl font-bold text-center mb-4 text-gray-800">Login to Your Account</h1>
            <p class="text-lg text-gray-700 mb-8 text-center">Access your personalized music lessons and more.</p>

            <div class="bg-white shadow-lg rounded-lg p-6 md:p-8 w-full max-w-md">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="flex flex-col space-y-4">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" name="remember">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-900">{{ __('Remember me') }}</label>
                        </div>
                        @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a class="font-medium text-blue-600 hover:text-blue-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                        @endif
                    </div>

                    <x-primary-button class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600 transition duration-300">
                        {{ __('Log in') }}
                    </x-primary-button>
                </form>

                <p class="mt-6 text-center text-gray-600">
                    Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-600">Sign up</a>
                </p>
            </div>
        </main>

        <footer class="bg-white shadow-lg mt-16">
            <div class="max-w-6xl mx-auto px-4 py-6">
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">© 2023 Music Academy. All rights reserved.</span>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-600 hover:text-gray-900 transition duration-300">Privacy Policy</a>
                        <a href="#" class="text-gray-600 hover:text-gray-900 transition duration-300">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</x-app-layout>
