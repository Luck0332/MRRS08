@extends('layout.Status')

@section('title', 'ใบจอง')

@section('reserv')

<link rel="stylesheet" href="{{ url('assets/dist/css/bill.css') }}">

<div class="head-row">
    <div class="room-name">
        <span>ห้องประชุม IF-101</span>
    </div>
    <div class="room-name">
        <span>รหัสติดตามการจอง :</span>

    </div>
</div>

    <div class="pic-row">
        <div class="pic" id="pic1">
            <img src="https://i.pinimg.com/736x/b3/b5/b6/b3b5b62ae1e40eb4d21c1859284639cf.jpg" alt="Meeting Room Image">
        </div>

    </div>
                                                            {{-- เหลือลิงค์กับไอดีห้อง --}}

    <div class="info-row">
        <div class="info-box" id="box1">
            <span class="info">
                <div class="texthead">
                    <span>รายละเอียดผู้จอง</span>
                </div>
                {{-- เหลือลิงค์ข้อมูล --}}



            </span>





        </div>

        <div class="info-box" id="box2">
            <div class="info">
                <div class="texthead">
                    <span>รายละเอียดการจอง</span>
                </div>
                {{-- เหลือลิงค์ข้อมูล --}}

            </div>






        </div>

    </div>

    <a href="" class="original-button">เสร็จสิ้น</a>
@endsection

