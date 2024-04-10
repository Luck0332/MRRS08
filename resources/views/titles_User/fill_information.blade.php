@extends('layout.Status')

@section('title', 'จองห้องประชุม')
@section('content')
    <script src="https://kit.fontawesome.com/e71f46c45f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ url('assets/dist/css/reservation.css') }}">
    <body>
        <div class="center">
            <div class="content-header">
            <i class="fa fa-angle-left" style="font-size:72px; margin-right: 20px;"></i>
                <div class="icon-container">
                    <div class="circle-icon-active">
                        <i class="fas fa-calendar-days"></i>
                    </div>

                </div>

                <div class="line-between-active"></div>

                <div class="icon-container">
                    <div class="circle-icon-active">
                        <i class="fas fa-file"></i>
                    </div>

                </div>

                <div class="line-between-active"></div>

                <div class="icon-container">
                    <div class="circle-icon-active">
                        <i class="fas fa-pencil"></i>
                    </div>

                </div>
                <div class="line-between"></div>
                <div class="icon-container">
                    <div class="circle-icon-inactive">
                        <i class="fas fa-check"></i>
                    </div>
                </div>
            </div>
            <div class="text-container">
                <div class="status3" >จองห้อง</div>
                <div class="status2" >รายละเอียดห้องประชุม</div>
                <div class="status1" >กรอกข้อมูลการจอง</div>
                <div class="status4" >เสร็จสิ้น</div>
            </div>
        </div>

    </body>
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
