@extends('layout.Status')

@section('title', 'จองห้องประชุม')

@section('reserv')
<!-- Content Header (Page header) -->
<!-- Include Flatpickr library -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- Include Flatpickr range plugin -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/rangePlugin.js"></script>

<!-- /.content-header -->

<!-- Main content -->
<form method="POST" action="{{ route('submit.form') }}">
@csrf 
<link rel="stylesheet" href="{{ url('assets/dist/css/calender.css') }}">
<div class="calender">
    <div class="row">
        <div class="text">
            <span>วันที่เข้าใช้ห้อง :</span>
            <span>วันที่สิ้นสุด :</span>
        </div>

    </div>
    <div class="row">
        <div class="boxSelect">
            <div class="textSelect">
                <i class="fas fa-calendar-days"></i>
                <input type="text" class="datetime-picker" id="start-date2" placeholder="Start Date" >
                
            </div>
        </div>
        <div class="boxSelect">
            <div class="textSelect">
                <i class="fas fa-calendar-days"></i>
                <input type="text" class="datetime-picker" id="end-date" placeholder="End Date">
            </div>
        </div>
    </div>



<script>
    // Initialize Flatpickr datetime pickers for both inputs
    flatpickr('.datetime-picker', {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        altInput: true,
        altFormat: "F j, Y H:i",
        plugins: [new rangePlugin({ input: "#end-date"})] 
    });
</script>

<div class="row" style="margin-top: 20px;">
        <div class="text">
            <span>ขนาดห้อง :</span>
        </div>
    </div>
    <div class="row">
        <span class="textSelect">
            <body>
                <select class="boxSelect" style="width: 210px; margin-left: 36px; color" >
                    <option value="" disabled selected >ขนาดห้อง</option>
                    <option value="small">ห้องเล็ก</option>
                    <option value="medium">ห้องกลาง</option>
                    <option value="large">ห้องใหญ่</option>
                </select>
                
            </body>
        </span>
            <div class="textSubmit">
                <button type="submit" class="submit-button">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span>ค้นหาห้อง</span>
                </button>
            </div>
    </div>
</div>
</form>
<!-- /.content -->

@endsection