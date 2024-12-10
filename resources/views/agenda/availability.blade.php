<x-app-layout>
    <div class="py-6 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 sm:p-6">
                <h2 class="text-2xl sm:text-4xl font-bold text-gray-800 mb-6 sm:mb-8">Manage Your Available Time Slots</h2>

                <!-- Create New Slot Form -->
                <form action="{{ route('agenda.availability.store') }}" method="POST" class="mb-8 bg-gradient-to-r from-purple-600 to-blue-500 p-4 sm:p-6 rounded-lg shadow-lg">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-white mb-2 text-sm">Title</label>
                            <input type="text" name="title" class="w-full rounded-lg text-sm" required>
                        </div>
                        <div>
                            <label class="block text-white mb-2 text-sm">Date</label>
                            <input type="date" name="date" class="w-full rounded-lg text-sm" required>
                        </div>
                        <div>
                            <label class="block text-white mb-2 text-sm">Start Time</label>
                            <input type="time" name="start_time" class="w-full rounded-lg text-sm" required>
                        </div>
                        <div>
                            <label class="block text-white mb-2 text-sm">End Time</label>
                            <input type="time" name="end_time" class="w-full rounded-lg text-sm" required>
                        </div>
                    </div>
                    <button type="submit" class="mt-4 w-full sm:w-auto px-6 sm:px-8 py-2 sm:py-3 bg-white text-purple-600 rounded-full shadow-lg transition duration-300 hover:scale-105">
                        Add Available Slot
                    </button>
                </form>

                <!-- Available Slots List -->
                <div class="mt-8">
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Your Available Slots</h3>
                    <div class="grid grid-cols-1 gap-4">
                        @forelse($availableSlots as $slot)
                            <div class="p-4 bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg shadow-lg flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <div class="text-white">
                                    <p class="font-semibold">{{ $slot->title }}</p>
                                    <p class="font-semibold">{{ \Carbon\Carbon::parse($slot->date)->format('l, F j, Y') }}</p>
                                    <p>{{ \Carbon\Carbon::parse($slot->start_time)->format('H:i') }} - 
                                       {{ \Carbon\Carbon::parse($slot->end_time)->format('H:i') }}</p>
                                </div>
                                <form action="{{ route('agenda.cancel', $slot) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full sm:w-auto px-4 py-2 bg-white text-purple-600 rounded-full hover:scale-105 transition duration-300">
                                        Remove
                                    </button>
                                </form>
                            </div>
                        @empty
                            <p class="text-gray-600">No available time slots found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 