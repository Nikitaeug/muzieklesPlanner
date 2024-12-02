<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-4xl font-bold text-gray-800">Your Music Lessons</h2>
                    @if (auth()->user()->role === 'teacher')
                        <a href="{{ route('agenda.availability') }}"
                            class="px-8 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-full shadow-lg transition duration-300 hover:scale-105">
                            Manage Availability
                        </a>    
                    @endif
                    @if (auth()->user()->role === 'student')
                        <a href="{{ route('agenda.available-slots') }}"
                            class="px-8 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-full shadow-lg transition duration-300 hover:scale-105">
                            Book New Lesson
                        </a>
                    @endif
                </div>

                @if ($events->isEmpty())
                    <p class="text-gray-600">No lessons available.</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200 mt-6">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Title</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Time</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Student</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Teacher</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($events as $event)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($event->date)->format('Y-m-d') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->start_time }} -
                                        {{ $event->end_time }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->student->user->name ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->teacher->user->name ?? 'N/A' }}</td>
                                
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
