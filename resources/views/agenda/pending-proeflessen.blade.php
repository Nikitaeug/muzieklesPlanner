<!-- In resources/views/agenda/pending-proeflessen.blade.php -->

<x-app-layout>
    <div class="py-6 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 sm:p-6">
                <h2 class="text-2xl sm:text-4xl font-bold text-gray-800 mb-6 sm:mb-8">Pending Trial Lessons</h2>

                @if($pendingLessons->isEmpty())
                <p class="text-lg text-gray-600">No pending trial lessons at the moment.</p>
            @else
                <div class="space-y-4">
                    @foreach($pendingLessons as $lesson)
                        <div class="bg-gray-100 p-4 rounded-lg shadow-lg">
                            <p class="font-semibold">{{ $lesson->title }} - {{ $lesson->student->user->name }}</p>
                            <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($lesson->date)->format('l, F j, Y') }} - {{ \Carbon\Carbon::parse($lesson->start_time)->format('H:i') }} to {{ \Carbon\Carbon::parse($lesson->end_time)->format('H:i') }}</p>
                            <p class="text-sm text-gray-600">Comments: {{ $lesson->comments }}</p>
            
                            <div class="mt-4 flex gap-4">
                                <form action="{{ route('lessons.approve', $lesson) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg">Approve</button>
                                </form>
                                <form action="{{ route('lessons.decline', $lesson) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg">Decline</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            
            </div>
        </div>
    </div>
</x-app-layout>
