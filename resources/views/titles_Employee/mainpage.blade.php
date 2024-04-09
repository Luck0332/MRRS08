@extends('layout.Employee')

@section('title', 'หน้าหลัก')
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <!-- FullCalendar -->
    <script src="https://unpkg.com/@fullcalendar/core@5.10.1/main.min.js"></script>
    <script src="https://unpkg.com/@fullcalendar/daygrid@5.10.1/main.min.js"></script>
    <script src="https://unpkg.com/@fullcalendar/interaction@5.10.1/main.min.js"></script>

    <style>
        .container{
        background-color: #ffffff; /* Dark background color */
        border-radius: 30px; /* Rounded corners */
        padding: 50px; /* Reduced padding for content */
        margin: 10 auto; /* Center horizontally */
        box-shadow: rgba(100, 100, 111, 0.5) 0px 7px 29px 0px;
        }
    </style>
@section('content')
<div id="calendar"></div>
<script src="https://unpkg.com/@fullcalendar/core@5.10.1/main.min.js"></script>
<script src="https://unpkg.com/@fullcalendar/daygrid@5.10.1/main.min.js"></script>
<script src="https://unpkg.com/@fullcalendar/interaction@5.10.1/main.min.js"></script>

<script>
  // ตรวจสอบให้แน่ใจว่าไฟล์ JavaScript ทั้งหมดถูกโหลด
    // ตรวจสอบให้แน่ใจว่าไฟล์ JavaScript ทั้งหมดถูกโหลด
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  // อ้างอิง FullCalendar
  var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: [ 'dayGrid', 'interaction' ],
    initialView: 'dayGridMonth',
    events: [
      {
        title: 'Event 1',
        start: '2024-04-10',
        end: '2024-04-12'
      },{
        title: 'Event 2',
        start: '2024-04-15',
        end: '2024-04-17'
      }
    ]
     });

    calendar.render();
    });

</script>
@endsection

