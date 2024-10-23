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
                    slotMinTime: '08:00:00',
                    slotMaxTime: '19:00:00',
                    events: @json($events),
                    selectable: true,
                    selectMirror: true,
                    
                    select: function(info) {
                    // Construct the URL with the necessary parameters
                    const createUrl = `{{ route('agenda.create') }}?start=${info.start.toISOString()}&end=${info.end.toISOString()}`;

                    // Redirect to the lesson creation page
                    window.location.href = createUrl;

                    calendar.unselect(); // Unselect the time slot
                    },
                    
                    // Event click functionality to show more details
                    eventClick: function(info) {
                        let event = info.event;
                        
                        // Prepare the event details to display
                        let title = event.title;
                        let teacher = event.extendedProps.teacher || 'Unknown Teacher';
                        let comment = event.extendedProps.comment || 'No comments';
                        let isProefles = event.extendedProps.is_proefles ? 'Yes' : 'No';
                        let start = event.start.toLocaleString();
                        let end = event.end ? event.end.toLocaleString() : 'No end time';

                        // Show an alert with the event details
                        alert(`Lesson Details:\n\nTitle: ${title}\nTeacher: ${teacher}\nStart: ${start}\nEnd: ${end}\nProefles: ${isProefles}\nComment: ${comment}`);
                    },
                    
                    editable: true,
                    
                    // Event resize and drop functionality
                    eventResize: function(info) {
                        updateEvent(info.event);
                    },
                    eventDrop: function(info) {
                        updateEvent(info.event);
                    }
                });
                calendar.render();

                // Function to update an event after resizing or dragging
                function updateEvent(event) {
                    $.ajax({
                        url: '{{ route('musiclessons.update') }}',
                        method: 'PATCH',
                        data: {
                            id: event.id,
                            title: event.title,
                            start: event.start.toISOString(),
                            end: event.end.toISOString(),
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log('Event updated successfully');
                        },
                        error: function(xhr, status, error) {
                            console.error('Error updating event:', xhr.responseText);
                            alert('There was an error updating the event');
                            event.revert();
                        }
                    });
                }
            });

        </script>
    @endpush

                </div>
            </div>
        </div>
    </div>


    
</x-app-layout>