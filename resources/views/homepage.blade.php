<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Music Lessons</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/iconoir-icons/iconoir@main/css/iconoir.css"/>

  

</head>
<body class="bg-gray-50 font-sans leading-normal tracking-normal">
    <header class="bg-gradient-to-r from-purple-500 to-blue-500 shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <i class="iconoir-music-note text-3xl text-white"></i>
                    <span class="font-bold text-2xl text-white ml-2">Music Academy</span>
                </div>
                <nav class="hidden md:flex space-x-6">
                    <a href="#" class="text-white hover:text-gray-200 transition duration-300">Home</a>
                    <a href="#" class="text-white hover:text-gray-200 transition duration-300">About</a>
                    <a href="#" class="text-white hover:text-gray-200 transition duration-300">Lessons</a>
                    <a href="#" class="text-white hover:text-gray-200 transition duration-300">Contact</a>
                </nav>
                <div class="hidden md:flex items-center space-x-2">
                    <a href="#" class="text-white hover:text-gray-200 transition duration-300">Login</a>
                    <a href="#" class="bg-white text-blue-500 px-4 py-2 rounded hover:bg-gray-200 transition duration-300">Sign Up</a>
                </div>
                <div class="md:hidden flex items-center">
                    <button class="mobile-menu-button">
                        <i class="iconoir-menu text-3xl text-white"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>
  
    <main class="flex flex-col items-center justify-center py-20">
        <h1 class="text-5xl font-bold text-center mb-4 text-gray-800">Elevate Your Music Skills</h1>
        <p class="text-lg text-gray-700 mb-8 text-center">Join us for personalized music lessons tailored to your needs.</p>
        <a href="#" class="bg-white text-blue-500 px-8 py-3 rounded-full shadow-lg hover:bg-gray-200 transition duration-300">Start Your Journey</a>
    </main>
  
    <section class="max-w-6xl mx-auto px-4 py-16">
        <h2 class="text-4xl font-bold text-center mb-8 text-gray-800">What We Offer</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="bg-white rounded-lg shadow-2xl p-6 transition-transform transform hover:scale-105">
                <i class="iconoir-music-note text-4xl mb-4 text-blue-500"></i>
                <h3 class="text-xl font-semibold mb-2">Custom Lessons</h3>
                <p class="text-gray-600">Experience lessons designed specifically for your musical journey.</p>
            </div>
            <div class="bg-white rounded-lg shadow-2xl p-6 transition-transform transform hover:scale-105">
                <i class="iconoir-calendar text-4xl mb-4 text-blue-500"></i>
                <h3 class="text-xl font-semibold mb-2">Flexible Scheduling</h3>
                <p class="text-gray-600">Select lesson times that fit your busy lifestyle.</p>
            </div>
            <div class="bg-white rounded-lg shadow-2xl p-6 transition-transform transform hover:scale-105">
                <i class="iconoir-check-circle text-4xl mb-4 text-blue-500"></i>
                <h3 class="text-xl font-semibold mb-2">Great for kids!</h3>
                <p class="text-gray-600">Parents can see how there kids are doing.</p>
            </div>
        </div>
    </section>
  
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
</html>
