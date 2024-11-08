<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Assign Role</h1>
        
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->role }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-col sm:flex-row gap-2">
                                        <form action="{{ route('assign-role.assign', ['user' => $user, 'role' => 'teacher']) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="w-full sm:w-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Assign as Teacher
                                            </button>
                                        </form>
                                        <form action="{{ route('assign-role.assign', ['user' => $user, 'role' => 'guardian']) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="w-full sm:w-auto bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                Assign as Guardian
                                            </button>
                                        </form>
                                        <form action="{{ route('assign-role.assign', ['user' => $user, 'role' => 'admin']) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="w-full sm:w-auto bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                                                Assign as Admin
                                            </button>
                                        </form>
                                        <form action="{{ route('assign-role.assign', ['user' => $user, 'role' => 'student']) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="w-full sm:w-auto bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                                Assign as student
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                    No users found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>