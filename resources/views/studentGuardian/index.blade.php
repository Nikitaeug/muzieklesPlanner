<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if(auth()->user()->role === 'admin')
                    <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Student-Guardian Management</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white rounded-lg overflow-hidden">
                            <thead class="bg-gradient-to-r from-purple-600 to-blue-500 text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left">Student Name</th>
                                    <th class="px-6 py-3 text-left">Current Guardian</th>
                                    <th class="px-6 py-3 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($students as $student)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">{{ $student->user->name }}</td>
                                    <td class="px-6 py-4">
                                        {{ $student->guardian ? $student->guardian->user->name : 'No Guardian Assigned' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button onclick="openModal('modal-{{ $student->id }}')" 
                                                class="px-4 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-full hover:scale-105 transition duration-300">
                                            Assign Guardian
                                        </button>

                                        <div id="modal-{{ $student->id }}" class="fixed inset-0 z-50 hidden">
                                            <div class="absolute inset-0 bg-black opacity-50"></div>
                                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg p-8 max-w-md w-full">
                                                <h3 class="text-2xl font-bold mb-4">Assign Guardian to {{ $student->user->name }}</h3>
                                                <form action="{{ route('studentGuardian.update', $student->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="guardian_id" class="w-full p-2 border rounded-lg mb-4">
                                                        <option value="">Select Guardian</option>
                                                        @foreach($guardians as $guardian)
                                                            <option value="{{ $guardian->id }}" 
                                                                {{ $student->guardian_id == $guardian->id ? 'selected' : '' }}>
                                                                {{ $guardian->user->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="flex justify-end space-x-3">
                                                        <button type="button" onclick="closeModal('modal-{{ $student->id }}')"
                                                                class="px-4 py-2 bg-gray-200 rounded-full hover:bg-gray-300">
                                                            Cancel
                                                        </button>
                                                        <button type="submit"
                                                                class="px-4 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-full hover:scale-105 transition duration-300">
                                                            Save
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @elseif(auth()->user()->role === 'student')
                    <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">My Guardian</h2>
                    <div class="bg-white rounded-lg p-4 shadow">
                        @if(auth()->user()->student->guardian)
                            <p class="text-lg"><strong>Guardian Name:</strong> {{ auth()->user()->student->guardian->user->name }}</p>
                            <p class="text-gray-600"><strong>Contact:</strong> {{ auth()->user()->student->guardian->phone_number ?? 'No phone number provided' }}</p>
                        @else
                            <p class="text-gray-600">No guardian assigned yet.</p>
                        @endif
                    </div>
                @elseif(auth()->user()->role === 'guardian')
                    <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">My Students</h2>
                    @php
                        $students = auth()->user()->guardian->students;
                    @endphp
                    
                    @if($students->count() > 0)
                        <div class="grid gap-4">
                            @foreach($students as $student)
                                <div class="bg-white rounded-lg p-4 shadow">
                                    <p class="text-lg font-semibold">{{ $student->user->name }}</p>
                                    <p class="text-gray-600">{{ $student->user->email }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-600">No students assigned yet.</p>
                    @endif
                @endif
            </div>
        </div>
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>
</x-app-layout>
