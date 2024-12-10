<x-app-layout>

    <body class="font-sans tracking-normal leading-normal bg-gradient-to-b from-gray-50 to-gray-100">
        <!-- Hero Section -->
        <div class="relative overflow-hidden">
            <!-- Background with overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-purple-700 to-blue-500 opacity-90"></div>

            <!-- Decorative circles -->
            <div class="absolute -left-8 -top-8 w-32 h-32 bg-purple-500 rounded-full opacity-20"></div>
            <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-blue-500 rounded-full opacity-20"></div>

            <!-- Content -->
            <div class="relative py-10 px-4">
                <div class="max-w-4xl mx-auto text-center">
                    <h1 class="text-3xl md:text-4xl font-bold text-white mb-3">
                        About Us
                    </h1>
                    <p class="text-lg md:text-xl text-white opacity-90 max-w-2xl mx-auto">
                        Discover the passion and dedication behind Music Academy.
                    </p>
                </div>
            </div>
        </div>

        <!-- Mission & Vision Section -->
        <section class="py-16 px-4">
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12">
                <div class="bg-white p-8 rounded-xl shadow-lg transform transition-transform hover:scale-105">
                    <div class="text-purple-600 text-5xl mb-6 flex justify-center">
                        <i class="iconoir-target"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Our Mission</h2>
                    <p class="text-gray-600 leading-relaxed">
                        At Music Academy, our mission is to provide high-quality music education to students of all ages
                        and skill levels. We believe in the transformative power of music and strive to make learning
                        accessible and enjoyable for everyone.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg transform transition-transform hover:scale-105">
                    <div class="text-blue-600 text-5xl mb-6 flex justify-center">
                        <i class="iconoir-eye"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Our Vision</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Our vision is to create a vibrant community of musicians who inspire and support each other. We
                        aim to foster a love for music that lasts a lifetime and to help our students achieve their full
                        potential.
                    </p>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="py-16 px-4 bg-white">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Meet the Team</h2>
                <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    <div
                        class="p-8 bg-gradient-to-r from-purple-700 to-blue-500 rounded-xl shadow-xl transform transition-all hover:scale-105 hover:shadow-2xl">
                        <div class="flex flex-col items-center">
                            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mb-4">
                                <i class="text-4xl text-purple-600 iconoir-user"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-2">Etienne van Bergeijk</h3>
                            <p class="text-white opacity-90 text-lg">Owner</p>
                        </div>
                    </div>

                    <div
                        class="p-8 bg-gradient-to-r from-purple-800 to-blue-500 rounded-xl shadow-xl transform transition-all hover:scale-105 hover:shadow-2xl">
                        <div class="flex flex-col items-center">
                            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mb-4">
                                <i class="text-4xl text-blue-600 iconoir-user"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-2">Tom Alkalai</h3>
                            <p class="text-white opacity-90 text-lg">Owner</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-white shadow-lg mt-16">
            <div class="max-w-6xl mx-auto px-4 py-8">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <span class="text-gray-600">© 2023 Music Academy. All rights reserved.</span>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-600 hover:text-purple-600 transition duration-300">Privacy
                            Policy</a>
                        <a href="#" class="text-gray-600 hover:text-purple-600 transition duration-300">Terms of
                            Service</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</x-app-layout>
