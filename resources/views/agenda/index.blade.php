<x-app-layout>
    <div class="container mx-auto mt-5">
        <h1 class="text-xl font-bold mb-4">Agenda Calendar</h1>
        <div id="calendar"></div>
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
