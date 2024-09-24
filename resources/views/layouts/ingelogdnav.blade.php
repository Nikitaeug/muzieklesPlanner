<body class="flex h-screen font-sans tracking-normal leading-normal bg-gray-100">
    <!-- Full-height sidebar -->
    <nav class="flex sticky top-0 flex-col p-4 w-64 h-screen bg-gradient-to-b from-purple-500 to-blue-500 shadow-lg">
        <div class="flex items-center mb-6">
            <i class="text-2xl text-white iconoir-music-note"></i>
            <span class="ml-2 text-xl font-bold text-white">Music Academy</span>
        </div>
        <ul class="flex-grow">
            <li class="mb-4">
                <a href="/dashboard" class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                    <i class="text-xl iconoir-home"></i>
                    <span class="ml-2">Home</span>
                </a>
            </li>
            <li class="mb-4">
                <a href="/agenda" class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                    <i class="text-xl iconoir-calendar"></i>
                    <span class="ml-2">Agenda</span>
                </a>
            </li>
            <li class="mb-4">
                <a href="/profile" class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                    <i class="text-xl iconoir-user"></i>
                    <span class="ml-2">Profile</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                        <i class="text-xl iconoir-log-out"></i>
                        <span class="ml-2">Logout</span>
                    </button>
                </form>
            </li>
        </ul>
        <!-- New Help button at the bottom -->
        <div class="mt-auto">
            <a href="/help" class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                <i class="text-xl iconoir-help-circle"></i>
                <span class="ml-2">Help</span>
            </a>
        </div>
    </nav>
</body>
