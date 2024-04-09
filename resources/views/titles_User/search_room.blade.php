@extends('layout.Status')

@section('title', 'จองห้องประชุม')

@section('reserv')
<!-- Include Flatpickr library -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- Include Flatpickr range plugin -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/rangePlugin.js"></script>
<link rel="stylesheet" href="{{ url('assets/dist/css/searchroom.css') }}">
<p>{{ session('message') }}</p>
<form method="POST" action="{{ route('submit.form') }}">
    <div class="showroom">
        <div class="rowicon">
            <div class="boxSelect-calender">
                <div class="textSelect">
                    <i class="fas fa-calendar-days"></i>
                    <input type="text" class="datetime-picker" id="date" name="date" value="$dateData" placeholder="Start Date" >
                    
                </div>
            </div>
            <div class="row">
                <div class="boxRoom" id="box1">
                    <span class="roominfo" id="statusRoom">
                        <i class="fa-solid fa-earth-americas"></i>
                    </span>
                    <span class="roominfo">
                        <i class="fa-sharp fa-solid fa-s"> ห้องขนาดเล็ก</i>
                    </span>
                    <span class="roominfo">
                        <i class="fa-regular fa-money-bill-1"> ราคา 4000 บาท/วัน</i>
                    </span>
                    <span class="roominfo">
                        <i class="fa-solid fa-laptop"> คอมพิวเตอร์ โปรเจคเตอร์</i>
                    </span>
                    <span class="roomname">
                        IF-301
                    </span>
                </div>
                <div class="boxRoom" id="box2">
                    <span class="roominfo" id="statusRoom">
                        <i class="fa-solid fa-earth-americas"></i>
                    </span>
                    <span class="roominfo">
                        <i class="fa-sharp fa-solid fa-s"> ห้องขนาดเล็ก</i>
                    </span>
                    <span class="roominfo">
                        <i class="fa-regular fa-money-bill-1"> ราคา 4000 บาท/วัน</i>
                    </span>
                    <span class="roominfo">
                        <i class="fa-solid fa-laptop"> คอมพิวเตอร์ โปรเจคเตอร์</i>
                    </span>
                    <span class="roomname">
                        IF-301
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="boxRoom" id="box1">
                    <span class="roominfo" id="statusRoom">
                        <i class="fa-solid fa-earth-americas"></i>
                    </span>
                    <span class="roominfo">
                        <i class="fa-sharp fa-solid fa-s"> ห้องขนาดเล็ก</i>
                    </span>
                    <span class="roominfo">
                        <i class="fa-regular fa-money-bill-1"> ราคา 4000 บาท/วัน</i>
                    </span>
                    <span class="roominfo">
                        <i class="fa-solid fa-laptop"> คอมพิวเตอร์ โปรเจคเตอร์</i>
                    </span>
                    <span class="roomname">
                        IF-301
                    </span>
                </div>
                <div class="boxRoom" id="box2">
                    <span class="roominfo" id="statusRoom">
                        <i class="fa-solid fa-earth-americas"></i>
                    </span>
                    <span class="roominfo">
                        <i class="fa-sharp fa-solid fa-s"> ห้องขนาดเล็ก</i>
                    </span>
                    <span class="roominfo">
                        <i class="fa-regular fa-money-bill-1"> ราคา 4000 บาท/วัน</i>
                    </span>
                    <span class="roominfo">
                        <i class="fa-solid fa-laptop"> คอมพิวเตอร์ โปรเจคเตอร์</i>
                    </span>
                    <span class="roomname">
                        IF-301
                    </span>
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="boxRoom" id="box1">

                <span class="roominfo" id="statusRoom">
                    <i class="fa-solid fa-earth-americas"></i>
                </span>
                <span class="roominfo">
                    <i class="fa-sharp fa-solid fa-s"> ห้องขนาดเล็ก</i>
                </span>
                <span class="roominfo">
                    <i class="fa-regular fa-money-bill-1"> ราคา 4000 บาท/วัน</i>
                </span>
                <span class="roominfo">
                    <i class="fa-solid fa-laptop"> คอมพิวเตอร์ โปรเจคเตอร์</i>
                </span>
                <span class="roomname" >
                    IF-301
                </span>
            </div>
            <div class="boxRoom" id="box2">
                <span class="roominfo" id="statusRoom">
                    <i class="fa-solid fa-earth-americas"></i>
                </span>
                <span class="roominfo">
                    <i class="fa-sharp fa-solid fa-s"> ห้องขนาดเล็ก</i>
                </span>
                <span class="roominfo">
                    <i class="fa-regular fa-money-bill-1"> ราคา 4000 บาท/วัน</i>
                </span>
                <span class="roominfo">
                    <i class="fa-solid fa-laptop"> คอมพิวเตอร์ โปรเจคเตอร์</i>
                </span>
                <span class="roomname">
                    IF-301
                </span>
            </div>
        </div>
        <div class="row">
            <div class="boxRoom" id="box1">
                <span class="roominfo" id="statusRoom">
                    <i class="fa-solid fa-earth-americas"></i>
                </span>
                <span class="roominfo">
                    <i class="fa-sharp fa-solid fa-s"> ห้องขนาดเล็ก</i>
                </span>
                <span class="roominfo">
                    <i class="fa-regular fa-money-bill-1"> ราคา 4000 บาท/วัน</i>
                </span>
                <span class="roominfo">
                    <i class="fa-solid fa-laptop"> คอมพิวเตอร์ โปรเจคเตอร์</i>
                </span>
                <span class="roomname">
                    IF-301
                </span>
            </div>
            <div class="boxRoom" id="box2">
                <span class="roominfo" id="statusRoom">
                    <i class="fa-solid fa-earth-americas"></i>
                </span>
                <span class="roominfo">
                    <i class="fa-sharp fa-solid fa-s"> ห้องขนาดเล็ก</i>
                </span>
                <span class="roominfo">
                    <i class="fa-regular fa-money-bill-1"> ราคา 4000 บาท/วัน</i>
                </span>
                <span class="roominfo">
                    <i class="fa-solid fa-laptop"> คอมพิวเตอร์ โปรเจคเตอร์</i>
                </span>
                <span class="roomname">
                    IF-301
                </span>
            </div>
        </div>
        <div class="row">
            <div class="boxRoom" id="box1">
                <span class="roominfo" id="statusRoom">
                    <i class="fa-solid fa-earth-americas"></i>
                </span>
                <span class="roominfo">
                    <i class="fa-sharp fa-solid fa-s"> ห้องขนาดเล็ก</i>
                </span>
                <span class="roominfo">
                    <i class="fa-regular fa-money-bill-1"> ราคา 4000 บาท/วัน</i>
                </span>
                <span class="roominfo">
                    <i class="fa-solid fa-laptop"> คอมพิวเตอร์ โปรเจคเตอร์</i>
                </span>
                <span class="roomname">
                    IF-301
                </span>
            </div>
            <div class="boxRoom" id="box2">
                <span class="roominfo" id="statusRoom">
                    <i class="fa-solid fa-earth-americas"></i>
                </span>
                <span class="roominfo">
                    <i class="fa-sharp fa-solid fa-s"> ห้องขนาดเล็ก</i>
                </span>
                <span class="roominfo">
                    <i class="fa-regular fa-money-bill-1"> ราคา 4000 บาท/วัน</i>
                </span>
                <span class="roominfo">
                    <i class="fa-solid fa-laptop"> คอมพิวเตอร์ โปรเจคเตอร์</i>
                </span>
                <span class="roomname">
                    IF-301
                </span>
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

@endsection
