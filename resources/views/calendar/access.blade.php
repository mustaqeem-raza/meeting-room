<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meeting PRO</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/core/core.css')}}">
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets/vendors/fullcalendar/fullcalendar.min.css')}}">
    <!-- end plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/demo_1/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
</head>

<body class="sidebar-dark">
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3 d-none d-md-block">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title mb-4">Full calendar</h6>
                                        <div id='external-events' class='external-events'>
                                            <div id='external-events-listing'>
                                                <h6 class="mb-2 text-muted">Draggable Events</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="card">
                                    <div class="card-body">
                                        <div id='fullcalendar'></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal for event details -->
                <div id="fullCalModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullCalModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 id="modalTitle1" class="modal-title"></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Organizer:</strong> <span id="modalOrganizer"></span></p>
                                <p><strong>Start Time:</strong> <span id="modalStartTime"></span></p>
                                <p><strong>End Time:</strong> <span id="modalEndTime"></span></p>
                                <p><strong>Participants:</strong> <span id="modalParticipants"></span></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal for creating events -->
                <div id="createEventModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTitle2" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 id="modalTitle2" class="modal-title">Add Event</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div id="modalBody2" class="modal-body">
                                <form id="createEventForm" class="needs-validation" action="{{ route('meetings.store') }}" method="POST" novalidate>
                                    @csrf
                                    <div class="form-group">
                                        <label for="eventTitle">Event Title</label>
                                        <input type="text" class="form-control" id="eventTitle" name="title" placeholder="Enter event title" required>
                                        <div class="invalid-feedback">Please provide a valid title.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="eventStart">Start Time</label>
                                        <input type="datetime-local" class="form-control" id="eventStart" name="start_time" required>
                                        <div class="invalid-feedback">Please select a valid start time.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="eventEnd">End Time</label>
                                        <input type="datetime-local" class="form-control" id="eventEnd" name="end_time" required>
                                        <div class="invalid-feedback">Please select a valid end time.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="eventOrganizer">Organizer</label>
                                        <select name="organizer" id="eventOrganizer" class="form-control select2" required>
                                            <option value="" disabled selected>Select Organizer</option>
                                            @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Please select an organizer.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="eventParticipants">Participants</label>
                                        <select name="participants[]" id="eventParticipants" class="form-control select2" multiple required>
                                            @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Please select at least one participant.</div>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="addEventBtn">Add Event</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- core:js -->
    <script src="{{asset('assets/vendors/core/core.js')}}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{asset('assets/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/vendors/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/vendors/fullcalendar/fullcalendar.min.js')}}"></script>
    <!-- end plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/template.js')}}"></script>
    <!-- endinject -->
    <!-- custom js for this page -->
    <script src="{{asset('assets/js/fullcalendar.js')}}"></script>
    <!-- endinject -->
</body>

</html>