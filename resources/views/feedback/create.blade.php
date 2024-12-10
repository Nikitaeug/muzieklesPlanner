<x-app-layout>
    <div class="container mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-center mb-6">Add Feedback</h1>
        
        <form action="{{ route('feedback.store') }}" method="POST" class="bg-white p-4 sm:p-6 md:p-8 rounded-lg shadow-lg max-w-2xl mx-auto space-y-6">
            @csrf
            <div class="space-y-2">
                <label for="music_lessons_id" class="block text-sm font-medium text-gray-700">Lesson</label>
                <select name="music_lessons_id" id="music_lessons_id" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    @if(auth()->user()->role === 'admin')
                        @foreach($lessons as $lesson)
                            <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                        @endforeach
                    @elseif(auth()->user()->role === 'teacher')
                        @foreach(auth()->user()->teacher->lessons as $lesson)
                            <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="space-y-2">
                <label for="feedback" class="block text-sm font-medium text-gray-700">Feedback</label>
                <textarea name="feedback" id="feedback" rows="4"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    required></textarea>
            </div>

            <button type="submit" 
                class="w-full sm:w-auto px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-md shadow-sm transition duration-150 ease-in-out">
                @if(auth()->user()->role === 'admin')
                    Submit Feedback as Admin
                @elseif(auth()->user()->role === 'teacher')
                    Submit Feedback as Teacher
                @else
                    Submit Feedback
                @endif
            </button>
        </form>
    </div>
</x-app-layout>
