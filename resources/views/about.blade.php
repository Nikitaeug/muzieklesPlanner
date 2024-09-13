<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - Music Academy</title>
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

    <section class="px-4 py-16 mx-auto max-w-6xl">
        <h1 class="mb-4 text-5xl font-bold text-center text-gray-800">About Us</h1>
        <p class="mb-8 text-lg text-center text-gray-700">Learn more about our mission, vision, and the team behind Music Academy.</p>

        <h2 class="mb-8 text-4xl font-bold text-center text-gray-800">Our Mission</h2>
        <p class="mb-8 text-lg text-center text-gray-700">At Music Academy, our mission is to provide high-quality music education to students of all ages and skill levels. We believe in the transformative power of music and strive to make learning accessible and enjoyable for everyone.</p>
        
        <h2 class="mb-8 text-4xl font-bold text-center text-gray-800">Our Vision</h2>
        <p class="mb-8 text-lg text-center text-gray-700">Our vision is to create a vibrant community of musicians who inspire and support each other. We aim to foster a love for music that lasts a lifetime and to help our students achieve their full potential.</p>
        
        <h2 class="mb-8 text-4xl font-bold text-center text-gray-800">Meet the Team</h2>
        <div class="grid grid-cols-1 gap-10 md:grid-cols-3">
            <div class="p-6 bg-white rounded-lg shadow-2xl transition-transform transform hover:scale-105">
                <i class="mb-4 text-4xl text-blue-500 iconoir-user"></i>
                <h3 class="mb-2 text-xl font-semibold">Nikita Voronkin</h3>
                <p class="text-gray-600">Medewerker</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-2xl transition-transform transform hover:scale-105">
                <i class="mb-4 text-4xl text-blue-500 iconoir-user"></i>
                <h3 class="mb-2 text-xl font-semibold">Etienne van 023</h3>
                <p class="text-gray-600">Medewerker</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-2xl transition-transform transform hover:scale-105">
                <i class="mb-4 text-4xl text-blue-500 iconoir-user"></i>
                <h3 class="mb-2 text-xl font-semibold">Thom Alkalai</h3>
                <p class="text-gray-600">Medewerker</p>
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
