<x-app-layout>
    <body class="bg-gray-50 font-sans leading-normal tracking-normal">
        <main class="flex flex-col items-center justify-center py-20">
            <h1 class="text-5xl font-bold text-center mb-4 text-gray-800">Create Your Account</h1>
            <p class="text-lg text-gray-700 mb-8 text-center">Sign up and start your personalized music journey.</p>

            <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
                <!-- Validation Errors -->
             

                <form method="POST" action="{{ route('register') }}" class="flex flex-col space-y-4">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <x-primary-button class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600 transition duration-300">
                        {{ __('Sign up') }}
                    </x-primary-button>
                </form>

                <p class="mt-6 text-center text-gray-600">
                    Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-600">Log in</a>
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
