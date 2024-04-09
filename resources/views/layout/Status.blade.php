@extends('layout.User')

@section('title', 'accout')
@section('content')
            <!DOCTYPE html>
            <html>
            <head>
            <script src="https://kit.fontawesome.com/e71f46c45f.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="{{ url('assets/dist/css/reservation.css') }}">
            </head>
            <body>  
                <div class="center">
                    <div class="content-header">
                    <i class="fa fa-angle-left" style="font-size:72px; margin-right: 20px;"></i>
                        <div class="icon-container">
                            <div class="circle-icon-active">
                                <i class="fas fa-calendar-days"></i>
                            </div>

                        </div>

                        <div class="line-between"></div>

                        <div class="icon-container">
                            <div class="circle-icon-inactive">
                                <i class="fas fa-file"></i>
                            </div>

                        </div>

                        <div class="line-between"></div>

                        <div class="icon-container">
                            <div class="circle-icon-inactive">
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
                        <div class="status1" >จองห้อง</div>
                        <div class="status2" >รายละเอียดห้องประชุม</div>
                        <div class="status3" >กรอกข้อมูลการจอง</div>
                        <div class="status4" >เสร็จสิ้น</div>
                    </div>
                    @yield('reserv')
                </div>

            </body>
            </html>
@endsection


