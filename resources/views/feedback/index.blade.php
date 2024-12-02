<x-app-layout>
<div class="container mx-auto p-6">
    @if(auth()->user()->role === 'admin')
    <h1 class="text-3xl font-bold mb-4 text-center">all Feedback</h1>
    @else
    <h1 class="text-3xl font-bold mb-4 text-center">Your Feedback</h1>
    @endif
    @if($feedbacks->isEmpty())
        <p class="text-gray-500 text-center">No feedback available.</p>
    @else
        <ul class="space-y-4">
            @foreach($feedbacks as $feedback)
                          <li class="p-4 border rounded-lg shadow-md bg-white">
                    <strong class="text-lg">{{ $feedback->musicLesson->title }}</strong><br>
                    <strong>teacher:</strong> <span class="text-gray-700">{{ optional($feedback->user)->name ?? 'N/A' }}</span><br>
                    <strong>student:</strong> <span class="text-gray-700">{{ optional($feedback->musicLesson->student)->user->name ?? 'N/A' }}</span><br>
                    <strong>Feedback:</strong> <span class="text-gray-700">{{ $feedback->feedback }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</div>
</x-app-layout>