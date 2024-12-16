<div class="flex h-auto font-sans tracking-normal leading-normal bg-gray-100">
    <!-- Mobile menu checkbox (hidden) -->
    <input type="checkbox" id="nav-toggle" class="hidden">
    
    <!-- Mobile menu button -->
    <label for="nav-toggle" class="lg:hidden fixed top-4 left-4 z-50 p-2 rounded-md bg-blue-500 text-white cursor-pointer">
        <i class="text-xl iconoir-menu"></i>
    </label>

    <!-- Sidebar Navigation -->
    <nav id="sidebar" class="nav-sidebar fixed lg:sticky top-0 left-0 flex flex-col p-4 w-64 h-screen bg-gradient-to-b from-purple-500 to-blue-500 shadow-lg z-40">
        <div class="flex items-center mb-6">
            <i class="text-2xl text-white iconoir-music-note"></i>
            <span class="ml-2 text-xl font-bold text-white">Music Academy</span>
        </div>
        
        <!-- Close button for mobile -->
        <label for="nav-toggle" class="lg:hidden absolute top-4 right-4 text-white cursor-pointer">
            <i class="text-xl iconoir-cancel"></i>
        </label>

        <ul class="flex-grow overflow-y-auto">
            <li class="mb-4">
                <a href="/dashboard"
                    class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                    <i class="text-xl iconoir-home"></i>
                    <span class="ml-2">Home</span>
                </a>
            </li>
            <li class="mb-4">
                <a href="/agenda"
                    class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                    <i class="text-xl iconoir-calendar"></i>
                    <span class="ml-2">Agenda</span>
                </a>
            </li>
            @if (auth()->user()->role != 'admin')
            <li class="mb-4">
                <a href="{{route('agenda.available-slots')}}"
                    class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                    <i class="text-xl iconoir-calendar"></i>
                    <span class="ml-2">available time slots</span>
                </a>
            </li>
            @endif

       
            
            @if (auth()->user()->role == 'admin')
            <li class="mb-4">
                <a href="{{route('users.index')}}"
                    class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                    <i class="text-xl iconoir-user-circle"></i>
                    <span class="ml-2">all users</span>
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('admin.register') }}"
                class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                        <i class="text-xl iconoir-user-plus"></i>
                        <span class="ml-2">Add new User</span>
                    </a>
                </li>

                <li class="mb-4">
                    <a href="/studentGuardian"
                        class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                        <i class="text-xl iconoir-user-circle"></i>
                        <span class="ml-2">Manage Student Guardians</span>
                    </a>
                </li>

                <li class="mb-4">
                    <a href="{{ route('feedback.index') }}"
                        class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                        <i class="text-xl iconoir-calendar"></i>
                        <span class="ml-2">all feedback</span>
                    </a>
                </li>

            @endif

            @if (auth()->user()->role == 'student')
            <li class="mb-4">
                <a href="/studentGuardian"
                    class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                    <i class="text-xl iconoir-user-circle"></i>
                    <span class="ml-2">Manage guardian</span>
                </a>
            </li>
            @endif

            @if (auth()->user()->role == 'guardian')
            <li class="mb-4">
                <a href="/studentGuardian"
                    class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                    <i class="text-xl iconoir-user-circle"></i>
                    <span class="ml-2">Manage Child</span>
                </a>
            </li>

            <li class="mb-4">
                <a href="{{ route('feedback.index') }}"
                    class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                    <i class="text-xl iconoir-calendar"></i>
                    <span class="ml-2">feedback</span>
                </a>
            </li>
            @endif

            @if (auth()->user()->role == 'teacher')

                <li class="mb-4">
                    <a href="{{ route('lessons.pending') }}"
                        class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                        <i class="text-xl iconoir-calendar"></i>
                        <span class="ml-2">all triallessons</span>
                    </a>
                </li> 

                <li class="mb-4">
                    <a href="{{ route('feedback.index') }}"
                        class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                        <i class="text-xl iconoir-calendar"></i>
                        <span class="ml-2">all your feedback</span>
                    </a>
                </li>
            
                <li class="mb-4">
                    <a href="/feedback/create"
                        class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                        <i class="text-xl iconoir-user-circle"></i>
                        <span class="ml-2">add feedback</span>
                    </a>
                </li>
            @endif
          
        </ul>

        <div class="mt-auto space-y-2">
            <a href="/profile"
                class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                <i class="text-xl iconoir-user"></i>
                <span class="ml-2">Profile</span>
            </a>
            <a href="/help"
                class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                <i class="text-xl iconoir-help-circle"></i>
                <span class="ml-2">Help</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                    <i class="text-xl iconoir-log-out"></i>
                    <span class="ml-2">Logout</span>
                </button>
            </form>
        </div>
    </nav>

    <!-- Mobile overlay -->
    <label for="nav-toggle" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden overlay"></label>
</div>

<style>
    @media (max-width: 1023px) {
        .nav-sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }
        
        #nav-toggle:checked ~ .nav-sidebar {
            transform: translateX(0);
        }
        
        #nav-toggle:checked ~ .overlay {
            display: block;
        }
        
        #nav-toggle:checked ~ * {
            overflow: hidden;
        }
    }
</style>
