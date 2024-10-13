<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Nieuw Tijdslot Toevoegen aan Agenda
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('error'))
                        <div class="p-4 mb-4 text-white bg-red-500 rounded-md alert alert-error">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="p-4 mb-4 text-white bg-red-500 rounded-md alert alert-error">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('timeslots.store') }}" method="POST">
                        @csrf

                        <div>
                            <label for="teacher_id">Teacher</label>
                            <select name="teacher_id" id="teacher_id" class="block mt-1 w-full">
                                <option value="">Select a Teacher</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <label for="student_id">Student</label>
                            <select name="student_id" id="student_id" class="block mt-1 w-full">
                                <option value="">Select a Student</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <label for="date">Date</label>
                            <input type="date" name="date" id="date" class="block mt-1 w-full" value="{{ old('date') }}">
                        </div>

                        <div class="mt-4">
                            <label for="start_time">Start Time</label>
                            <input type="time" name="start_time" id="start_time" class="block mt-1 w-full" value="{{ old('start_time') }}">
                        </div>

                        <div class="mt-4">
                            <label for="end_time">End Time</label>
                            <input type="time" name="end_time" id="end_time" class="block mt-1 w-full" value="{{ old('end_time') }}">
                        </div>

                        <div class="mt-4">
                            <label for="status">Status</label>
                            <input type="text" name="status" id="status" class="block mt-1 w-full" value="{{ old('status') }}">
                        </div>

                        <div class="mt-4">
                            <label for="is_proefles">Is Proefles?</label>
                            <select name="is_proefles" id="is_proefles" class="block mt-1 w-full">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                                Create Lesson
                            </button>
                        </div>
                        <button type="submit" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded">
                            Tijdslot Toevoegen
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
