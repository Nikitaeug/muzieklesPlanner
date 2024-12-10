<x-app-layout>
    <div class="py-6 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 sm:p-6">
                <h2 class="text-2xl sm:text-4xl font-bold text-gray-800 mb-6 sm:mb-8">Available Lesson Slots</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                    @forelse($availableSlots as $slot)
                        <div class="p-4 sm:p-6 bg-gradient-to-r from-purple-600 to-blue-500 rounded-lg shadow-2xl transition-transform transform hover:scale-105">
                            <div class="text-white mb-4">
                                <p class="font-semibold">{{ $slot->title }}</p>
                                <p class="text-lg sm:text-xl font-semibold">{{ \Carbon\Carbon::parse($slot->date)->format('l, F j, Y') }}</p>
                                <p class="text-base sm:text-lg">{{ \Carbon\Carbon::parse($slot->start_time)->format('H:i') }} - 
                                   {{ \Carbon\Carbon::parse($slot->end_time)->format('H:i') }}</p>
                                <p class="mt-2">Teacher: {{ $slot->teacher->user->name }}</p>
                            </div>

                            @auth
                                @if(auth()->user()->role === 'student')
                                    <form action="{{ route('agenda.book', $slot) }}" method="POST" class="space-y-3">
                                        @csrf
                                        <input type="hidden" name="student_id" value="{{ auth()->user()->student->id }}">
                                        <div>
                                            <label class="flex items-center text-white text-sm">
                                                <input type="checkbox" name="is_proefles" value="1" class="mr-2">
                                                Trial Lesson
                                            </label>
                                        </div>
                                        <div>
                                            <textarea name="comments" placeholder="Any comments?" 
                                                class="w-full rounded-lg text-gray-800 text-sm p-2"></textarea>
                                        </div>
                                        <button type="submit" 
                                            class="w-full px-4 sm:px-6 py-2 bg-white text-purple-600 rounded-full shadow-lg transition duration-300 hover:scale-105 text-sm">
                                            Book This Slot
                                        </button>
                                    </form>
                                @elseif(auth()->user()->role === 'guardian')
                                    <form action="{{ route('agenda.book', $slot) }}" method="POST" class="space-y-3">
                                        @csrf
                                        <div>
                                            <label class="text-white text-sm">Select Child:</label>
                                            <select name="student_id" class="w-full rounded-lg text-gray-800 text-sm">
                                                @foreach($children as $child)
                                                    <option value="{{ $child->id }}">{{ $child->user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label class="flex items-center text-white text-sm">
                                                <input type="checkbox" name="is_proefles" class="mr-2">
                                                Trial Lesson
                                            </label>
                                        </div>
                                        <div>
                                            <textarea name="comments" placeholder="Any comments?" 
                                                class="w-full rounded-lg text-gray-800 text-sm p-2"></textarea>
                                        </div>
                                        <button type="submit" 
                                            class="w-full px-4 sm:px-6 py-2 bg-white text-purple-600 rounded-full shadow-lg transition duration-300 hover:scale-105 text-sm">
                                            Book This Slot for Child
                                        </button>
                                    </form>
                                @endif
                            @else
                                <a href="{{ route('login') }}" 
                                    class="block w-full text-center px-4 sm:px-6 py-2 bg-white text-purple-600 rounded-full shadow-lg transition duration-300 hover:scale-105 text-sm">
                                    Login to Book
                                </a>
                            @endauth
                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-600">
                            <p class="text-lg sm:text-xl">No available slots at the moment.</p>
                            <p class="text-sm sm:text-base">Please check back later or contact us for more information.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 