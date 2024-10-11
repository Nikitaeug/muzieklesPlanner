// public/js/agenda.js
document.addEventListener('DOMContentLoaded', function() {
    $('#agenda').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        editable: true,
        events: '/api/timeslots', // Route to fetch events
        eventClick: function(info) {
            alert('Lesson: ' + info.event.title);
        }
    });
});
