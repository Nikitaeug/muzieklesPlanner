<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agenda Overzicht
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="agenda-container">
                        <h1>Agenda Overzicht</h1>
                        <div id="agenda"></div> <!-- HTML-element voor de agenda -->
                        <a href="{{ route('agenda.create') }}" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded">
                            Nieuw Tijdslot Toevoegen
                        </a>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <!-- FullCalendar CSS -->
        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />

        <!-- FullCalendar JS -->
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                console.log(@json($events)); // Check the events data in the console

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridWeek',
                    slotMinTime: '08:00:00',
                    slotMaxTime: '19:00:00',
                    events: @json($events), // Ensure this returns a valid JSON array
                    eventClick: function(info) {
                        alert('Lesson: ' + info.event.title);
                    }
                });
                calendar.render();
            });
        </script>
    @endpush
</x-app-layout>
