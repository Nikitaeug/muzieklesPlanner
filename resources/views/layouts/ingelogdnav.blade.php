<div class="flex h-auto font-sans tracking-normal leading-normal bg-gray-100">
    <!-- Full-height sidebar -->
    <nav class="flex sticky top-0 flex-col p-4 w-64 h-screen bg-gradient-to-b from-purple-500 to-blue-500 shadow-lg">
        <div class="flex items-center mb-6">
            <i class="text-2xl text-white iconoir-music-note"></i>
            <span class="ml-2 text-xl font-bold text-white">Music Academy</span>
        </div>
        <ul class="flex-grow">
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
            <li class="mb-4">
                <a href="{{route('agenda.available-slots')}}"
                    class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                    <i class="text-xl iconoir-calendar"></i>
                    <span class="ml-2">available time slots</span>
                </a>
            </li>

       
            
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

                
                <li class="mb-4">
                    <a href="/feedback/create"
                        class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                        <i class="text-xl iconoir-user-circle"></i>
                        <span class="ml-2">add feedback</span>
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
                    <span class="ml-2">all your feedback</span>
                </a>
            </li>
            @endif

            @if (auth()->user()->role == 'teacher')
                <li class="mb-4">
                    <a href="/manage-student-guardians"
                        class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                        <i class="text-xl iconoir-user-circle"></i>
                        <span class="ml-2">Manage Student Guardians</span>
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

        <div class="mt-auto">
            <a href="/profile"
                class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                <i class="text-xl iconoir-user"></i>
                <span class="ml-2">Profile</span>
            </a>
        </div>
        <div class="mt-auto">
            <a href="/help"
                class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                <i class="text-xl iconoir-help-circle"></i>
                <span class="ml-2">Help</span>
            </a>
        </div>
        <div class="mt-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center p-2 text-white rounded transition duration-300 hover:bg-blue-600">
                    <i class="text-xl iconoir-log-out"></i>
                    <span class="ml-2">Logout</span>
                </button>
            </form>
        </div>
    </nav>
</div>
