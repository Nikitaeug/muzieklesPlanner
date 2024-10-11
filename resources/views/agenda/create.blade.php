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
                            <label for="date">Datum:</label>
                            <input type="date" name="date" id="date" required>
                        </div>
                        <div>
                            <label for="start_time">Starttijd:</label>
                            <input type="time" name="start_time" id="start_time" required>
                        </div>
                        <div>
                            <label for="end_time">Eindtijd:</label>
                            <input type="time" name="end_time" id="end_time" required>
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
