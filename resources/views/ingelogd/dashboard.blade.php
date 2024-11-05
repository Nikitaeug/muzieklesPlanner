<x-app-layout>
    <div class="overflow-y-auto flex-1 p-6">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Dashboard</h1>
            @if(auth()->user()->role === 'admin')
                <button class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                    <i class="fas fa-users-cog mr-2"></i> Manage Users
                </button>
            @elseif(auth()->user()->role === 'manager')
                <button class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                    <i class="fas fa-plus mr-2"></i> New Project
                </button>
            @endif
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            @if(auth()->user()->role === 'admin')
                <!-- Admin Stats -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                            <i class="fas fa-users text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">Total Users</p>
                            <p class="text-2xl font-semibold">{{ $totalUsers ?? 0 }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-500">
                            <i class="fas fa-user-check text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">Active Users</p>
                            <p class="text-2xl font-semibold">{{ $activeUsers ?? 0 }}</p>
                        </div>
                    </div>
                </div>

            @elseif(auth()->user()->role === 'manager')
                <!-- Manager Stats -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-500">
                            <i class="fas fa-tasks text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">Active Projects</p>
                            <p class="text-2xl font-semibold">{{ $activeProjects ?? 0 }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-100 text-purple-500">
                            <i class="fas fa-users text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">Team Members</p>
                            <p class="text-2xl font-semibold">{{ $teamMembers ?? 0 }}</p>
                        </div>
                    </div>
                </div>

            @else
                <!-- Employee Stats -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                            <i class="fas fa-tasks text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">My Tasks</p>
                            <p class="text-2xl font-semibold">{{ $myTasks ?? 0 }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-500">
                            <i class="fas fa-check-circle text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-500">Completed Tasks</p>
                            <p class="text-2xl font-semibold">{{ $completedTasks ?? 0 }}</p>
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
                    @if(auth()->user()->role === 'admin')
                        <h2 class="text-xl font-semibold mb-4">System Activity</h2>
                        <div class="space-y-4">
                            @forelse($systemActivities ?? [] as $activity)
                                <div class="flex items-center border-b pb-4">
                                    <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-shield-alt text-gray-500"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="font-medium">{{ $activity->description }}</p>
                                        <p class="text-sm text-gray-500">{{ $activity->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500">No recent system activity</p>
                            @endforelse
                        </div>

                    @elseif(auth()->user()->role === 'manager')
                        <h2 class="text-xl font-semibold mb-4">Project Overview</h2>
                        <div class="space-y-4">
                            @forelse($projects ?? [] as $project)
                                <div class="flex items-center border-b pb-4">
                                    <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-project-diagram text-gray-500"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="font-medium">{{ $project->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $project->status }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500">No active projects</p>
                            @endforelse
                        </div>

                    @else
                        <h2 class="text-xl font-semibold mb-4">My Tasks</h2>
                        <div class="space-y-4">
                            @forelse($tasks ?? [] as $task)
                                <div class="flex items-center border-b pb-4">
                                    <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-tasks text-gray-500"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="font-medium">{{ $task->title }}</p>
                                        <p class="text-sm text-gray-500">Due: {{ $task->due_date->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500">No tasks assigned</p>
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
                        @if(auth()->user()->role === 'admin')
                            <button class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                                <i class="fas fa-user-plus mr-2"></i> Add New User
                            </button>
                            <button class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                                <i class="fas fa-cog mr-2"></i> System Settings
                            </button>
                            <button class="w-full bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600 transition">
                                <i class="fas fa-download mr-2"></i> Download Reports
                            </button>

                        @elseif(auth()->user()->role === 'manager')
                            <button class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                                <i class="fas fa-plus mr-2"></i> Create Project
                            </button>
                            <button class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                                <i class="fas fa-user-plus mr-2"></i> Add Team Member
                            </button>
                            <button class="w-full bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600 transition">
                                <i class="fas fa-chart-bar mr-2"></i> View Reports
                            </button>

                        @else
                            <button class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                                <i class="fas fa-tasks mr-2"></i> View All Tasks
                            </button>
                            <button class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                                <i class="fas fa-clock mr-2"></i> Time Tracking
                            </button>
                            <button class="w-full bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600 transition">
                                <i class="fas fa-comment mr-2"></i> Message Team
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
