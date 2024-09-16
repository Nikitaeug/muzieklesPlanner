<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuw Tijdslot Toevoegen aan Agenda
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
                        <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">
                            Tijdslot Toevoegen
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
