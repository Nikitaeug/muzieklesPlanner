<x-app-layout>
    <div class="font-sans tracking-normal leading-normal min-h-screen bg-gradient-to-b from-gray-50 to-gray-100">
        <!-- Hero Section -->
        <main class="relative flex flex-col justify-center items-center py-16 md:py-24 overflow-hidden">
            <div class="relative z-[1] px-4">
                <h1 class="mb-6 text-4xl md:text-6xl font-extrabold text-center text-gray-800 animate-fade-in">
                    Contact Us
                </h1>
                <p class="mb-8 text-lg md:text-xl text-center text-gray-700 max-w-2xl mx-auto">
                    Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.
                </p>
            </div>
        </main>

        <!-- Contact Information Cards -->
        <section class="px-4 py-12 md:py-20 mx-auto max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
                <!-- Call Us Card -->
                <div class="transform transition duration-500 hover:scale-105">
                    <div class="h-full p-8 bg-white rounded-2xl shadow-xl border-l-4 border-purple-500">
                        <div class="flex items-center mb-6">
                            <svg class="w-8 h-8 text-purple-500 mr-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <h2 class="text-2xl font-bold text-gray-800">Call Us</h2>
                        </div>
                        <p class="text-lg text-gray-600 mb-3">Available Monday - Friday</p>
                        <p class="text-lg text-gray-600 mb-3">9:00 AM - 6:00 PM EST</p>
                        <a href="tel:1234567890"
                            class="text-xl font-bold text-purple-600 hover:text-purple-700 transition duration-300">
                            (123) 456-7890
                        </a>
                    </div>
                </div>

                <!-- Email Us Card -->
                <div class="transform transition duration-500 hover:scale-105">
                    <div class="h-full p-8 bg-white rounded-2xl shadow-xl border-l-4 border-purple-500">
                        <div class="flex items-center mb-6">
                            <svg class="w-8 h-8 text-purple-500 mr-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <h2 class="text-2xl font-bold text-gray-800">Email Us</h2>
                        </div>
                        <p class="text-lg text-gray-600 mb-3">We'll respond within 24 hours</p>
                        <p class="text-lg text-gray-600 mb-3">For any inquiries</p>
                        <a href="mailto:info@musicacademy.com"
                            class="text-xl font-bold text-purple-600 hover:text-purple-700 transition duration-300">
                            info@musicacademy.com
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Location Section -->
        <section class="px-4 py-12 md:py-20 mx-auto max-w-6xl">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Visit Our Studio</h2>
                <div class="aspect-w-16 aspect-h-9 rounded-xl overflow-hidden">
                    <!-- Replace with your actual map embed code -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.9916256937967!2d2.2922926!3d48.8583736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sEiffel%20Tower!5e0!3m2!1sen!2sus!4v1647834755695!5m2!1sen!2sus"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        class="rounded-xl"></iframe>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-white shadow-lg mt-12">
            <div class="px-4 py-8 mx-auto max-w-6xl">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <span class="text-gray-600">© 2024 Music Academy. All rights reserved.</span>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-600 hover:text-purple-600 transition duration-300">Privacy
                            Policy</a>
                        <a href="#" class="text-gray-600 hover:text-purple-600 transition duration-300">Terms of
                            Service</a>
                        <a href="#" class="text-gray-600 hover:text-purple-600 transition duration-300">FAQ</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</x-app-layout>
