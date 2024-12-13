<x-app-layout>
    <div class="py-6 sm:py-8 lg:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 sm:p-6 lg:p-8">
                @if(auth()->user()->role === 'admin')
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-center text-gray-800 mb-6 sm:mb-8">Student-Guardian Management</h2>
                    <div class="overflow-x-auto -mx-4 sm:mx-0">
                        <table class="min-w-full bg-white rounded-lg overflow-hidden">
                            <thead class="bg-gradient-to-r from-purple-600 to-blue-500 text-white">
                                <tr>
                                    <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm">Student Name</th>
                                    <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm">Current Guardian</th>
                                    <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($students as $student)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 text-sm">{{ $student->user->name }}</td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 text-sm">
                                        {{ $student->guardian ? $student->guardian->user->name : 'No Guardian Assigned' }}
                                    </td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4">
                                        <button onclick="openModal('modal-{{ $student->id }}')" 
                                                class="w-full sm:w-auto px-3 sm:px-4 py-1.5 sm:py-2 text-sm bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-full hover:scale-105 transition duration-300">
                                            Assign Guardian
                                        </button>

                                        <!-- Modal -->
                                        <div id="modal-{{ $student->id }}" class="fixed inset-0 z-50 hidden overflow-y-auto">
                                            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                                            <div class="relative min-h-screen flex items-center justify-center p-4">
                                                <div class="bg-white rounded-lg p-4 sm:p-6 lg:p-8 max-w-md w-full mx-4 sm:mx-auto">
                                                    <h3 class="text-xl sm:text-2xl font-bold mb-4">Assign Guardian to {{ $student->user->name }}</h3>
                                                    <form action="{{ route('studentGuardian.update', $student->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="guardian_id" class="w-full p-2 border rounded-lg mb-4 text-sm sm:text-base">
                                                            <option value="">Select Guardian</option>
                                                            @foreach($guardians as $guardian)
                                                                <option value="{{ $guardian->id }}" 
                                                                    {{ $student->guardian_id == $guardian->id ? 'selected' : '' }}>
                                                                    {{ $guardian->user->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="flex flex-col sm:flex-row justify-end space-y-2 sm:space-y-0 sm:space-x-3">
                                                            <button type="button" onclick="closeModal('modal-{{ $student->id }}')"
                                                                    class="px-4 py-2 bg-gray-200 rounded-full hover:bg-gray-300 text-sm">
                                                                Cancel
                                                            </button>
                                                            <button type="submit"
                                                                    class="px-4 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-full hover:scale-105 transition duration-300 text-sm">
                                                                Save
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @elseif(auth()->user()->role === 'student')
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-center text-gray-800 mb-6">My Guardian</h2>
                    <div class="bg-white rounded-lg p-4 sm:p-6 shadow">
                        @if(auth()->user()->student->guardian)
                            <p class="text-base sm:text-lg mb-2"><span class="font-semibold">Guardian Name:</span> {{ auth()->user()->student->guardian->user->name }}</p>
                            <p class="text-gray-600 text-base"><span class="font-semibold">Contact:</span> {{ auth()->user()->student->guardian->phone_number ?? 'No phone number provided' }}</p>
                        @else
                            <p class="text-gray-600 text-center">No guardian assigned yet.</p>
                        @endif
                    </div>
                @elseif(auth()->user()->role === 'guardian')
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-center text-gray-800 mb-6">My Students</h2>
                    @php
                        $students = auth()->user()->guardian->students;
                    @endphp
                    
                    @if($students->count() > 0)
                        <div class="grid gap-4 sm:gap-6 md:grid-cols-2 lg:grid-cols-3">
                            @foreach($students as $student)
                                <div class="bg-white rounded-lg p-4 sm:p-6 shadow hover:shadow-md transition-shadow duration-200">
                                    <p class="text-base sm:text-lg font-semibold mb-2">{{ $student->user->name }}</p>
                                    <p class="text-gray-600 text-sm sm:text-base">{{ $student->user->email }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-600 text-center text-lg">No students assigned yet.</p>
                    @endif
                @endif
            </div>
        </div>
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('fixed')) {
                event.target.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        }
    </script>
</x-app-layout>
