<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-4xl font-bold text-gray-800 mb-8">Available Lesson Slots</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($availableSlots as $slot)
                        <div class="p-6 bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg shadow-2xl transition-transform transform hover:scale-105">
                            <div class="text-white mb-4">
                                <p class="font-semibold">{{ $slot->title }}</p> <!-- Display the title here -->
                                <p class="text-xl font-semibold">{{ \Carbon\Carbon::parse($slot->date)->format('l, F j, Y') }}</p>
                                <p class="text-lg">{{ \Carbon\Carbon::parse($slot->start_time)->format('H:i') }} - 
                                   {{ \Carbon\Carbon::parse($slot->end_time)->format('H:i') }}</p>
                                <p class="mt-2">Teacher: {{ $slot->teacher->name }}</p>
                            </div>

                            @auth
                                @if(auth()->user()->role === 'student')
                                    <form action="{{ route('agenda.book', $slot) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="student_id" value="{{ auth()->user()->student->id }}">
                                        <div class="mb-3">
                                            <label class="flex items-center text-white">
                                                <input type="checkbox" name="is_proefles" class="mr-2">
                                                Trial Lesson
                                            </label>
                                        </div>
                                        <div class="mb-3">
                                            <textarea name="comments" placeholder="Any comments?" 
                                                class="w-full rounded-lg text-gray-800"></textarea>
                                        </div>
                                        <button type="submit" 
                                            class="w-full px-6 py-2 bg-white text-purple-600 rounded-full shadow-lg transition duration-300 hover:scale-105">
                                            Book This Slot
                                        </button>
                                    </form>
                                @elseif(auth()->user()->role === 'guardian')
                                    <form action="{{ route('agenda.book', $slot) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="child" class="text-white">Select Child:</label>
                                            <select name="student_id" id="child" class="w-full rounded-lg text-gray-800">
                                                @foreach($children as $child)
                                                    <option value="{{ $child->id }}">{{ $child->user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="flex items-center text-white">
                                                <input type="checkbox" name="is_proefles" class="mr-2">
                                                Trial Lesson
                                            </label>
                                        </div>
                                        <div class="mb-3">
                                            <textarea name="comments" placeholder="Any comments?" 
                                                class="w-full rounded-lg text-gray-800"></textarea>
                                        </div>
                                        <button type="submit" 
                                            class="w-full px-6 py-2 bg-white text-purple-600 rounded-full shadow-lg transition duration-300 hover:scale-105">
                                            Book This Slot for Child
                                        </button>
                                    </form>
                                @endif
                            @else
                                <a href="{{ route('login') }}" 
                                    class="block text-center px-6 py-2 bg-white text-purple-600 rounded-full shadow-lg transition duration-300 hover:scale-105">
                                    Login to Book
                                </a>
                            @endauth
                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-600">
                            <p class="text-xl">No available slots at the moment.</p>
                            <p>Please check back later or contact us for more information.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 