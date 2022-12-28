@extends(backpack_view('blank'))
@php

    @endphp

@section('content')
    <h2 class="mt-4 mb-2">Booking Calendar</h2>

    <div id="calendar"></div>

    <div class="mb-5"></div>
@endsection

@push('after_scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/index.global.min.js"></script>
    <script>
        var events = @json($events);

        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                // initialView: 'dayGridMonth',
                initialView: 'timeGridWeek',
                slotMinTime: '00:00:00',
                slotMaxTime: '24:00:00',
                events: events,
                // datesSet: function (info) {
                //     // console.log('Date Set');
                //     calendar.addEvent
                //     // calendar.render();
                // }
            }, true);

            function handleDateChanged() {

            }

            calendar.render();
        });


        // function doSomethingOnDateSet(month, year) {
        //     console.log('Date Set', month, year);
        // }
    </script>
@endpush
