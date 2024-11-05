<x-app-layout>
<body class="font-sans tracking-normal leading-normal bg-gray-50">

    <section class="flex px-4 py-16 mx-auto max-w-6xl">
        <div class="pr-8 w-1/2">
            <h1 class="mb-4 text-5xl font-bold text-center text-gray-800">About Us</h1>
            <p class="mb-8 text-lg text-center text-gray-700">Learn more about our mission, vision, and the team behind Music Academy.</p>

            <h2 class="mb-8 text-4xl font-bold text-center text-gray-800">Our Mission</h2>
            <p class="mb-8 text-lg text-center text-gray-700">At Music Academy, our mission is to provide high-quality music education to students of all ages and skill levels. We believe in the transformative power of music and strive to make learning accessible and enjoyable for everyone.</p>
            
            <h2 class="mb-8 text-4xl font-bold text-center text-gray-800">Our Vision</h2>
            <p class="mb-8 text-lg text-center text-gray-700">Our vision is to create a vibrant community of musicians who inspire and support each other. We aim to foster a love for music that lasts a lifetime and to help our students achieve their full potential.</p>
        </div>
        <div class="w-1/2">
            <h2 class="mb-8 text-4xl font-bold text-center text-gray-800">Meet the Team</h2>
            <div class="grid grid-cols-1 gap-10">
                <div class="p-6 bg-gradient-to-r from-purple-700 to-blue-500 rounded-lg shadow-2xl transition-transform transform hover:scale-105"> <!-- Normal color -->
                    <i class="mb-4 text-4xl text-white iconoir-user"></i>
                    <h3 class="mb-2 text-xl font-semibold text-white">Etienne van 023</h3>
                    <p class="text-white">Eigenaar</p>
                </div>
                <div class="p-6 bg-gradient-to-r from-purple-800 to-blue-500 rounded-lg shadow-2xl transition-transform transform hover:scale-105"> <!-- Darker color -->
                    <i class="mb-4 text-4xl text-white iconoir-user"></i>
                    <h3 class="mb-2 text-xl font-semibold text-white">Tom Alkalai</h3>
                    <p class="text-white">Eigenaar</p>
                </div>
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
  </body>
</x-app-layout> 

