<x-app-layout>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl md:text-3xl text-center mb-4">Add Feedback</h1>
        <form action="{{ route('feedback.store') }}" method="POST" class="bg-white p-4 md:p-5 rounded shadow-lg max-w-2xl mx-auto">
            @csrf
            <div class="form-group">
                <label for="music_lessons_id" class="font-weight-bold">Lesson</label>
                <select name="music_lessons_id" id="music_lessons_id" class="form-control border-2 border-gray-300 rounded-lg" required>
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
            <div class="form-group">
                <label for="feedback" class="font-weight-bold">Feedback</label>
                <textarea name="feedback" id="feedback" class="form-control border-2 border-gray-300 rounded-lg" required></textarea>
            </div>
            <button type="submit" class="w-full md:w-auto btn btn-success btn-lg btn-block mt-4">
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
