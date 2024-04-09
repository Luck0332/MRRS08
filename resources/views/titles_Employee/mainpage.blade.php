@extends('layout.Employee')

@section('title', 'หน้าหลัก')
@section('content')
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
        @method("post")
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
                        <input type="text" class="datetime-picker" id="date" name="date"
                            placeholder="Start Date">
                    </div>
                </div>
                <div class="boxSelect">
                    <div class="textSelect">
                        <i class="fas fa-calendar-days"></i>
                        <input type="text" class="datetime-picker" id="end-date" name="end_date" placeholder="End Date">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- /.content -->

@endsection
