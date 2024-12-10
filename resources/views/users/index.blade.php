<x-app-layout>
    <div class="py-6 sm:py-8 lg:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 sm:p-6 lg:p-8">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-center text-gray-800 mb-6 sm:mb-8">User Management</h2>
                
                <!-- Mobile view (card layout) -->
                <div class="block sm:hidden">
                    <div class="space-y-4">
                        @foreach($users as $user)
                            <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow duration-200">
                                <div class="space-y-2">
                                    <div class="flex justify-between items-center">
                                        <span class="font-semibold text-gray-700">Name:</span>
                                        <span class="text-gray-800">{{ $user->name }}</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="font-semibold text-gray-700">Email:</span>
                                        <span class="text-gray-800 text-sm">{{ $user->email }}</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="font-semibold text-gray-700">Role:</span>
                                        <span class="text-gray-800">{{ ucfirst($user->role) }}</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="font-semibold text-gray-700">Created:</span>
                                        <span class="text-gray-800">{{ $user->created_at->format('Y-m-d') }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Desktop view (table layout) -->
                <div class="hidden sm:block overflow-x-auto -mx-4 sm:mx-0">
                    <table class="min-w-full bg-white rounded-lg overflow-hidden">
                        <thead class="bg-gradient-to-r from-purple-600 to-blue-500 text-white">
                            <tr>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm">Name</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm">Email</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm">Role</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm">Created At</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($users as $user)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 text-sm">{{ $user->name }}</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 text-sm">{{ $user->email }}</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 text-sm">{{ ucfirst($user->role) }}</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 text-sm">{{ $user->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
