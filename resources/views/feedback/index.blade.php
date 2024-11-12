<x-app-layout>
<div class="container mx-auto p-6">
    @if(auth()->user()->role === 'admin')
    <h1 class="text-3xl font-bold mb-4 text-center">all Feedback</h1>
    @endif
    @if(auth()->user()->role === 'teacher' ||  (auth()->user()->role === 'student'))
    <h1 class="text-3xl font-bold mb-4 text-center">Your Feedback</h1>
    @endif
    @if($feedbacks->isEmpty())
        <p class="text-gray-500 text-center">No feedback available.</p>
    @else
        <ul class="space-y-4">
            @foreach($feedbacks as $feedback)
                <li class="p-4 border rounded-lg shadow-md bg-white">
                    @if(auth()->user()->role === 'admin')
                    <strong class="text-lg">{{ $feedback->musicLesson->teacher->user->name }}</strong><br>
                    @endif
                    <strong class="text-lg">{{ $feedback->musicLesson->title }}</strong><br>
                    <strong>Feedback:</strong> <span class="text-gray-700">{{ $feedback->feedback }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</div>
</x-app-layout>