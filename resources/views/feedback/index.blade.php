<x-app-layout>
    <div class="container mx-auto px-4 py-6 sm:px-6 lg:px-8">
        @if(auth()->user()->role === 'admin')
            <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-6 text-center">All Feedback</h1>
        @else
            <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-6 text-center">Your Feedback</h1>
        @endif

        @if($feedbacks->isEmpty())
            <div class="text-center py-8">
                <p class="text-gray-500 text-lg">No feedback available.</p>
            </div>
        @else
            <div class="max-w-4xl mx-auto">
                <ul class="grid gap-6 sm:grid-cols-1 lg:grid-cols-2">
                    @foreach($feedbacks as $feedback)
                        <li class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                            <div class="p-4 sm:p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $feedback->musicLesson->title }}</h3>
                                <div class="space-y-2 text-sm sm:text-base">
                                    <p>
                                        <span class="font-medium text-gray-700">Teacher:</span>
                                        <span class="text-gray-600">{{ optional($feedback->user)->name ?? 'N/A' }}</span>
                                    </p>
                                    <p>
                                        <span class="font-medium text-gray-700">Student:</span>
                                        <span class="text-gray-600">{{ optional($feedback->musicLesson->student)->user->name ?? 'N/A' }}</span>
                                    </p>
                                    <p class="mt-3">
                                        <span class="font-medium text-gray-700">Feedback:</span>
                                        <span class="text-gray-600 block mt-1">{{ $feedback->feedback }}</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-app-layout>