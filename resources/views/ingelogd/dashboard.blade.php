<x-app-layout>
    <div class="overflow-y-auto flex-1 p-6">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Dashboard</h1>
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('users.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                    <i class="fas fa-users-cog mr-2"></i> Manage Users
                </a>
            @elseif(auth()->user()->role === 'teacher')
                <a href="{{ route('agenda.index') }}">
                    <button
                        class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                        <i class="fas fa-plus mr-2"></i> add lesson
                    </button>
                </a>
            @endif
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            @if (auth()->user()->role === 'admin')
                <!-- Admin Stats -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                            <i class="fas fa-users text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">Total Users</p>
                            <p class="text-2xl font-semibold">{{ $data['totalUsers'] ?? 0 }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-500">
                            <i class="fas fa-user-check text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">Lessons given</p>
                            <p class="text-2xl font-semibold">{{ $data['lessonsGiven'] ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            @elseif(auth()->user()->role === 'teacher')
                <!-- teacher Stats -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-500">
                            <i class="fas fa-tasks text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">lessons</p>
                            <p class="text-2xl font-semibold">{{ $data['lessonsCount'] ?? 0 }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-100 text-purple-500">
                            <i class="fas fa-users text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">Students</p>
                            <p class="text-2xl font-semibold">{{ $data['studentCount'] ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            @elseif(auth()->user()->role === 'guardian')
                <!-- Guardian Stats -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                            <i class="fas fa-music text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">Children's Lessons</p>
                            <p class="text-2xl font-semibold">{{ $data['totalChildrenLessons'] ?? 0 }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-500">
                            <i class="fas fa-child text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">My Children</p>
                            <p class="text-2xl font-semibold">{{ $data['childrenCount'] ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            @else
                <!-- student Stats -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                            <i class="fas fa-tasks text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">My lessons</p>
                            <p class="text-2xl font-semibold">{{ $data['myLessons'] ?? 0 }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-500">
                            <i class="fas fa-check-circle text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">Completed lessons</p>
                            <p class="text-2xl font-semibold">{{ $data['completedLessons'] ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Main Content Area -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Role-specific Content -->
            <div class="lg:col-span-2 bg-white rounded-lg shadow">
                <div class="p-6">
                    @if (auth()->user()->role === 'admin')
                        <h2 class="text-xl font-semibold mb-4">Recent Lessons</h2>
                        <div class="space-y-4">
                            @forelse($data['recentLessons'] ?? [] as $lesson)
                                <div class="flex items-center border-b pb-4">
                                    <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-music text-gray-500"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="font-medium">{{ $lesson['title'] }}</p>
                                        <p class="text-sm text-gray-500">Student: {{ $lesson['student_name'] }}</p>
                                        <p class="text-sm text-gray-500">Teacher: {{ $lesson['teacher_name'] }}</p>
                                        <p class="text-xs text-gray-400">Proefles: {{ $lesson['is_proefles'] }}</p>
                                        <p class="text-xs text-gray-400">{{ $lesson['created_at'] }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500">No recent lessons found</p>
                            @endforelse
                        </div>
                    @elseif(auth()->user()->role === 'teacher')
                        <h2 class="text-xl font-semibold mb-4">Upcoming Lessons</h2>
                        <div class="space-y-4">
                            @forelse($data['lessons'] as $lesson)
                                <div class="flex items-center border-b pb-4">
                                    <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-project-diagram text-gray-500"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="font-medium">{{ $lesson['title'] }}</p>
                                        <p class="text-sm text-gray-500">{{ $lesson['date'] }}</p>
                                        <p class="text-sm text-gray-500">Student: {{ $lesson['student_name'] }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500">No upcoming lessons</p>
                            @endforelse
                        </div>
                    @elseif(auth()->user()->role === 'guardian')
                        <h2 class="text-xl font-semibold mb-4">Children's Recent Lessons</h2>
                        <div class="space-y-4">
                            @forelse($data['childrenLessons'] as $lesson)
                                <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-100">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                <i class="fas fa-music text-gray-500"></i>
                                            </div>
                                            <div class="ml-4">
                                                <p class="font-medium">{{ $lesson->title }}</p>
                                                <p class="text-sm text-gray-500">Student: {{ $lesson->student_name }}
                                                </p>
                                            </div>
                                        </div>
                                        <span
                                            class="px-3 py-1 text-sm rounded-full 
                                            @if ($lesson->status === 'completed') bg-green-100 text-green-800
                                            @elseif($lesson->status === 'upcoming') bg-blue-100 text-blue-800
                                            @else bg-gray-100 text-gray-800 @endif">
                                            {{ ucfirst($lesson->status) }}
                                        </span>
                                    </div>
                                    <div class="mt-3">
                                        <p class="text-sm text-gray-600"><span class="font-medium">Teacher:</span>
                                            {{ $lesson->teacher_name }}</p>
                                        @if ($lesson->comment)
                                            <div class="mt-2 p-3 bg-gray-50 rounded-md">
                                                <p class="text-sm text-gray-600">{{ $lesson->comment }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500">No recent lessons found</p>
                            @endforelse
                        </div>
                    @elseif(auth()->user()->role === 'student')
                    <h2 class="text-xl font-semibold mb-4">My Upcoming Lessons</h2>
                    <div class="space-y-4">
                        @forelse($data['lessons'] as $lesson)
                            <div class="flex items-center border-b pb-4">
                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-calendar-alt text-gray-500"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="font-medium">{{ $lesson['title'] }}</p>
                                    <p class="text-sm text-gray-500">{{ $lesson['date'] }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500">No upcoming lessons</p>
                        @endforelse
                    </div>
                @endif
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-4">Quick Actions</h2>
                    <div class="space-y-4">
                        @if (auth()->user()->role === 'admin')
                            <div class="mb-4">
                                <a href="{{ route('admin.register') }}">
                                    <button
                                        class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                                        <i class="fas fa-user-plus mr-2"></i> Add New User
                                    </button>
                                </a>
                            </div>
                            <div class="mb-4">
                                <a href="{{ route('feedback.index') }}">
                                    <button
                                        class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                                        <i class="fas fa-cog mr-2"></i> all feedback
                                    </button>
                                </a>
                            </div>
                            <div class="mb-4">
                                <a href="{{ route('studentGuardian.index') }}">
                                    <button
                                        class="w-full bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600 transition">
                                        <i class="fas fa-download mr-2"></i> manage-student-guardians
                                    </button>
                                </a>
                            </div>
                        @elseif(auth()->user()->role === 'teacher')
                            <a href="{{ route('feedback.create') }}">
                                <button
                                    class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                                    <i class="fas fa-plus mr-2"></i> Add Feedback
                                </button>
                            </a>
                        @elseif(auth()->user()->role === 'guardian')
                        <div class="mb-4">
                            <a href="{{route('studentGuardian.index')}}">
                                <button
                                    class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                                    <i class="fas fa-plus mr-2"></i> manage child
                                </button>
                            </a>
                        </div>
                            <div class="mb-4">
                                <a href="help">
                                    <button
                                        class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                                        <i class="fas fa-user-plus mr-2"></i> help
                                    </button>
                                </a>
                            </div>
                        @else
                            <div class="mb-4">
                                <a href="{{route('agenda.index')}}">
                                    <button class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                                        <i class="fas fa-tasks mr-2"></i> agenda
                                    </button>
                                </a>
                            </div>
                            <div class="mb-4">
                                <a href="{{route('studentGuardian.index')}}">
                                    <button class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                                        <i class="fas fa-clock mr-2"></i> manage guardian
                                    </button>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
