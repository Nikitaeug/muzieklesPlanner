<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - Music Academy</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/iconoir-icons/iconoir@main/css/iconoir.css"/>
</head>
<body class="font-sans tracking-normal leading-normal bg-gray-50">
    <header class="bg-gradient-to-r from-purple-500 to-blue-500 shadow-lg">
        <div class="px-4 mx-auto max-w-6xl">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <i class="text-3xl text-white iconoir-music-note"></i>
                    <span class="ml-2 text-2xl font-bold text-white">Music Academy</span>
                </div>
                <nav class="hidden space-x-6 md:flex">
                    <a href="/" class="text-white transition duration-300 hover:text-gray-200">Home</a>
                    <a href="/about" class="text-white transition duration-300 hover:text-gray-200">About</a>
                    <a href="/lessons" class="text-white transition duration-300 hover:text-gray-200">Lessons</a>
                    <a href="/contact" class="text-white transition duration-300 hover:text-gray-200">Contact</a>
                </nav>
                <div class="hidden items-center space-x-2 md:flex">
                    <a href="#" class="text-white transition duration-300 hover:text-gray-200">Login</a>
                    <a href="#" class="px-4 py-2 text-blue-500 bg-white rounded transition duration-300 hover:bg-gray-200">Sign Up</a>
                </div>
                <div class="flex items-center md:hidden">
                    <button class="mobile-menu-button">
                        <i class="text-3xl text-white iconoir-menu"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>
  
    <main class="flex flex-col justify-center items-center py-20">
        <h1 class="mb-4 text-5xl font-bold text-center text-gray-800">Contact Us</h1>
        <p class="mb-8 text-lg text-center text-gray-700">If you have any questions, feel free to reach out to us using the information below.</p>
    </main>
  
    <section class="px-4 py-16 mx-auto max-w-6xl">
        <div class="p-8 bg-white rounded-lg shadow-lg">
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-800">Call Us</h2>
                <p class="text-lg text-gray-700">You can reach us at:</p>
                <p class="text-lg font-bold text-blue-500">(123) 456-7890</p>
            </div>
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-800">Email Us</h2>
                <p class="text-lg text-gray-700">Send us an email at:</p>
                <p class="text-lg font-bold text-blue-500">info@musicacademy.com</p>
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
</html>
