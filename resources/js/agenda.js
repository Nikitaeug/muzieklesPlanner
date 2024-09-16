// public/js/agenda.js

document.addEventListener('DOMContentLoaded', function() {
    $('#agenda').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        editable: true,
        events: '/api/timeslots' // Stel hier je route in voor het ophalen van tijdslots
    });
});
