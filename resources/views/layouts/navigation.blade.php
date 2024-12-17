<div class="px-4 mx-auto my-3 max-w-6xl" x-data="{ mobileMenuOpen: false }">
    <div class="relative z-10 justify-center px-4 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full shadow-lg">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center">
                <i class="text-3xl text-white iconoir-music-note"></i>
                <span class="ml-2 text-2xl font-bold text-white">Music Academy</span>
            </div>
            <nav class="hidden space-x-6 md:flex">
                <a href="/"
                    class="px-2 py-1 text-white rounded-full transition transform duration-600 hover:scale-105 hover:bg-blue-700 hover:shadow-lg">Home</a>
                <a href="/about"
                    class="px-2 py-1 text-white rounded-full transition transform duration-600 hover:scale-105 hover:bg-blue-700 hover:shadow-lg">About</a>
                <a href="/contact"
                    class="px-2 py-1 text-white rounded-full transition transform duration-600 hover:scale-105 hover:bg-blue-700 hover:shadow-lg">Contact</a>
            </nav>
            <div class="hidden items-center space-x-2 md:flex">
                <a href="/login" class="text-white transition duration-300 hover:text-gray-200">Login</a>
                <a href="/register"
                    class="px-4 py-2 text-blue-500 bg-white rounded-full transition duration-300 hover:bg-gray-200">Sign
                    Up</a>
            </div>
            <div class="flex items-center md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="mobile-menu-button">
                    <i class="text-3xl text-white iconoir-menu"></i>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4"
            class="absolute inset-x-0 top-20 p-4 mx-4 bg-white rounded-2xl shadow-2xl transform md:hidden">
            <div class="flex flex-col space-y-4">
                <a href="/"
                    class="px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-xl transition-colors duration-200">
                    <span class="font-medium">Home</span>
                </a>
                <a href="/about"
                    class="px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-xl transition-colors duration-200">
                    <span class="font-medium">About</span>
                </a>
                <a href="/contact"
                    class="px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-xl transition-colors duration-200">
                    <span class="font-medium">Contact</span>
                </a>

                <div class="pt-4 mt-4 border-t border-gray-100">
                    <a href="/login"
                        class="block px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-xl transition-colors duration-200">
                        <span class="font-medium">Login</span>
                    </a>
                    <a href="/register"
                        class="block px-4 py-3 mt-2 text-white bg-gradient-to-r from-purple-500 to-blue-500 rounded-xl text-center font-medium hover:from-purple-600 hover:to-blue-600 transition-colors duration-200">
                        Sign Up
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
