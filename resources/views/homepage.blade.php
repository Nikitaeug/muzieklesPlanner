<x-app-layout>
<div class="">  <!-- \muziekles.png is the image link-->
    <img class="object-cover absolute top-0 left-0 z-0 w-full h-96" src="/muziekles.png" alt="123">
    <div class="absolute top-0 left-0 w-full h-96 bg-blue-500 opacity-30 z-9"></div> <!-- Overlay met blauwe tint -->
    <main class="flex flex-col justify-center items-center py-20">
        <h1 class="z-0 mb-4 text-5xl font-bold text-center text-white">Elevate Your Music Skills</h1>
        <a href="/register" class="z-0 px-8 py-3 text-white bg-gradient-to-r from-purple-500 to-blue-500 rounded-full shadow-lg transition duration-300 hover:scale-105 hover:shadow-lg">Start Your Journey</a>
    </main>

    <section class="px-4 py-16 mx-auto max-w-6xl">
        <h2 class="mb-8 text-4xl font-bold text-center text-gray-800">What We Offer</h2>
        <div class="grid grid-cols-1 gap-10 md:grid-cols-3">
            <div class="p-6 bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg shadow-2xl transition-transform transform hover:scale-105">
                <i class="mb-4 text-4xl text-white iconoir-music-note"></i>
                <h3 class="mb-2 text-xl font-semibold text-white">Custom Lessons</h3>
                <p class="text-white">Experience lessons designed specifically for your musical journey.</p>
            </div>
            <div class="p-6 bg-gradient-to-r from-purple-600 to-blue-600 rounded-lg shadow-2xl transition-transform transform hover:scale-105">
                <i class="mb-4 text-4xl text-white iconoir-calendar"></i>
                <h3 class="mb-2 text-xl font-semibold text-white">Flexible Scheduling</h3>
                <p class="text-white">Select lesson times that fit your busy lifestyle.</p>
            </div>
            <div class="p-6 bg-gradient-to-r from-purple-700 to-blue-700 rounded-lg shadow-2xl transition-transform transform hover:scale-105">
                <i class="mb-4 text-4xl text-white iconoir-check-circle"></i>
                <h3 class="mb-2 text-xl font-semibold text-white">Great for kids!</h3>
                <p class="text-white">Parents can see how there kids are doing.</p>
            </div>
        </div>
    </section>

    <footer class="mt-16 bg-white shadow-lg">
        <div class="px-4 py-6 mx-auto max-w-6xl">
            <div class="flex justify-between items-center">
                <span class="text-gray-600">© 2023 Music Academy. All rights reserved.</span>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-600 transition duration-300 hover:text-gray-900">Privacy Policy</a>
                    <a href="#" class="text-gray-600 transition duration-300 hover:text-gray-900">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
</div>
</x-app-layout>
