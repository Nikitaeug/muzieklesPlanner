<x-app-layout>

<body class="font-sans tracking-normal leading-normal bg-gray-50">
    <main class="flex flex-col justify-center items-center py-20">
        <h1 class="mb-4 text-5xl font-bold text-center text-gray-800">Elevate Your Music Skills</h1>
        <p class="mb-8 text-lg text-center text-gray-700">Join us for personalized music lessons tailored to your needs.
        </p>
        <a href="#"
            class="px-8 py-3 text-blue-500 bg-white rounded-full shadow-lg transition duration-300 hover:bg-gray-200">Try a free lesson!</a>
    </main>

    <section class="px-4 py-16 mx-auto max-w-6xl">
        <h2 class="mb-8 text-4xl font-bold text-center text-gray-800">What We Offer</h2>
        <div class="grid grid-cols-1 gap-10 md:grid-cols-3">
            <div class="p-6 bg-white rounded-lg shadow-2xl transition-transform transform hover:scale-105">
                <i class="mb-4 text-4xl text-blue-500 iconoir-music-note"></i>
                <h3 class="mb-2 text-xl font-semibold">Custom Lessons</h3>
                <p class="text-gray-600">Experience lessons designed specifically for your musical journey.</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-2xl transition-transform transform hover:scale-105">
                <i class="mb-4 text-4xl text-blue-500 iconoir-calendar"></i>
                <h3 class="mb-2 text-xl font-semibold">Flexible Scheduling</h3>
                <p class="text-gray-600">Select lesson times that fit your busy lifestyle.</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-2xl transition-transform transform hover:scale-105">
                <i class="mb-4 text-4xl text-blue-500 iconoir-check-circle"></i>
                <h3 class="mb-2 text-xl font-semibold">Great for kids!</h3>
                <p class="text-gray-600">Parents can see how there kids are doing.</p>
            </div>
        </div>
    </section>

    <footer class="mt-16 bg-white shadow-lg">
        <div class="px-4 py-6 mx-auto max-w-6xl">
            <div class="flex justify-between items-center">
                <span class="text-gray-600">© 2023 Music Academy. All rights reserved.</span>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-600 transition duration-300 hover:text-gray-900">Privacy
                        Policy</a>
                    <a href="#" class="text-gray-600 transition duration-300 hover:text-gray-900">Terms of
                        Service</a>
                </div>
            </div>
        </div>
    </footer>   
</x-app-layout>
