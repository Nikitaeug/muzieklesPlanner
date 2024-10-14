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
                        @if(auth()->user()->role === 'teacher')
                            <a href="{{ route('agenda.create') }}" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded">
                                Nieuw Tijdslot Toevoegen
                            </a>
                        @endif
                    </div>

                    <div id="calendar">

                    </div>
                
                
                    @push('scripts')
                        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
                            <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
                    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
                    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
                        <script> 
                            document.addEventListener('DOMContentLoaded', function () {
                                var calendarEl = document.getElementById('calendar');
                                var calendar = new FullCalendar.Calendar(calendarEl, {
                                    initialView: 'timeGridWeek',
                                    slotMinTime: '8:00:00',
                                    slotMaxTime: '19:00:00',
                                    events: @json($events),
                                });
                                calendar.render();
                            });
                        </script>
                    @endpush

                </div>
            </div>
        </div>
    </div>


    
</x-app-layout>
