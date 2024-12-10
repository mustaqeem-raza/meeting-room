$(function () {
  // Initialize FullCalendar
  $('#fullcalendar').fullCalendar({
    header: {
      left: 'prev,today,next',
      center: 'title',
      right: 'month,agendaWeek,agendaDay,listMonth'
    },
    editable: true,
    droppable: true, // Allow events to be dragged onto the calendar
    defaultView: 'month',
    eventLimit: true, // Show "more" link when too many events
    events: function (start, end, timezone, callback) {
      // AJAX call to fetch meetings
      $.ajax({
        url: '/meetings',  // API endpoint to fetch meetings
        type: 'GET',
        dataType: 'json',
        success: function (data) {
          console.log('Fetched meetings:', data);
          // Transform and pass events to FullCalendar
          const events = data.map(meeting => ({
            id: meeting.id,
            title: meeting.title,
            start: meeting.start,
            end: meeting.end,
            organizer: meeting.organizer,
            participants: meeting.participants,
          }));
          callback(events);
        },
        error: function (error) {
          console.error('Error fetching meetings:', error);
        }
      });
    },
    eventClick: function (event, jsEvent, view) {
      // Populate modal with event details
      $('#modalTitle1').text(event.title);
      $('#modalOrganizer').text(event.organizer);
      $('#modalStartTime').text(moment(event.start).format('MMMM Do YYYY, h:mm a'));
      $('#modalEndTime').text(moment(event.end).format('MMMM Do YYYY, h:mm a'));
      $('#modalParticipants').text(event.participants.join(', ')); // Join participant names
      $('#fullCalModal').modal('show'); // Show modal
    },
    dayClick: function (date, jsEvent, view) {
      // Open modal for creating a new event
      $('#createEventModal').modal('show');
    }
  });
});