<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Nieuw Tijdslot Toevoegen aan Agenda
        </h2>
    </x-slot>
    
    <div class="py-8">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 space-y-4">
                    @if (session('error'))
                        <div class="p-3 text-sm text-white bg-red-500 rounded alert alert-error">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="p-3 text-sm text-white bg-red-500 rounded alert alert-error">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('musiclessons.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500" value="{{ old('title') }}">
                        </div>

                        <div>
                            <label for="teacher_id" class="block text-sm font-medium text-gray-700">Teacher</label>
                            <select name="teacher_id" id="teacher_id" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500">
                                <option value="">Select a Teacher</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="student_id" class="block text-sm font-medium text-gray-700">Student</label>
                            <select name="student_id" id="student_id" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500">
                                <option value="">Select a Student</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                <input type="date" name="date" id="date" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500" value="{{ old('date', request('date')) }}">
                            </div>
                            <div>
                                <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                                <input type="time" name="start_time" id="start_time" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500" value="{{ old('start_time', request('start_time')) }}">
                            </div>
                            <div>
                                <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                                <input type="time" name="end_time" id="end_time" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500" value="{{ old('end_time', request('end_time')) }}">
                            </div>
                        </div>

                        <div>
                            <label for="comments" class="block text-sm font-medium text-gray-700">Comment</label>
                            <input type="text" name="comments" id="comments" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500" value="{{ old('comment') }}">
                        </div>

                        <div>
                            <label for="is_proefles" class="block text-sm font-medium text-gray-700">Is Proefles?</label>
                            <select name="is_proefles" id="is_proefles" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                                Create Lesson
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
