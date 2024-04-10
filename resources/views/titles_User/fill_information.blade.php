@extends('layout.Status')

@section('title', 'จองห้องประชุม')
@section('reserv')

    <!-- SORCE -->
    <link rel="stylesheet" href="{{ url('assets/dist/css/LineAPI_Verification.css') }}">
    <script src="{{ url('assets/dist/css/LineAPI_Verification.js') }}"></script>
    <link rel="stylesheet" href="{{ url('assets/dist/css/fillinformation.css') }}">

    <form action="{{ route('reservation.StoreInfo') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="hidden" name="start_date" value="{{ $start_date }}">
        <input type="hidden" name="end_date" value="{{ $end_date }}">
        <div class="textHead">
            กรอกข้อมูลการจอง
        </div>
        <div class="row">
            <div class="inputBox" id="Name">
                <input type="text" name="us_name" required>
                <span class="text">ชื่อ</span>
            </div>
            <div class="inputBox" id="Surname">
                <input type="text" name="us_fname" required>
                <span class="text">สกุล</span>
            </div>
        </div>
        <div class="row">
            <div class="inputBox" id="tel">
                <input type="text" name="us_tel" required>
                <span class="text">เบอร์โทรศัพท์</span>
            </div>
        </div>
        <div class="row">
            <div class="inputBox" id="agenda">
                <input type="text" name="agenda" required>
                <span class="text">วาระการประชุม</span>
            </div>
        </div>
        <div class="row" id="confirm">
            <div class="boxConfirm">
                <button type="submit" class="confirmText">ยืนยันการจอง</button>
            </div>
        </div>
    </form>
    </section>

@endsection
