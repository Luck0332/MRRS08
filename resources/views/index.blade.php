<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MRRS System</title>
    <link rel="stylesheet" href="{{ url('assets/dist/css/Homepage.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

</head>

<body>
    <div class="header">
        <div class="logo-container">
            <img src="{{ url('assets\dist\img\LOGOMRRS.png') }}" alt="โลโก้ระบบจองห้องประชุม" style="max-height: 75px;">
        </div>
        <div style="padding: 20px 0px 20px 0px;">
            <a href="{{url('/login')}}">
                <button id="staff">สำหรับเจ้าหน้าที่</button>
            </a>
        </div>
    </div>
    <div>
        <hr class="divider">
    </div>

    <h1>Meeting Room <br> Reserve System</h1>
    <h2>ยินดีต้อนรับเข้าสู่ระบบจองห้องประชุม โปรดเลือกการปฏิบัติงาน <br>
            ที่ท่านต้องการดำเนินการในส่วนถัดไป</h2>
    <div class="button-group">
        <a href="{{url('/User')}}">
            <button>จองห้องประชุม</button>
        </a>
        <a href="{{url('/Employee')}}">
            <button>ติดตามสถานะการจอง</button>
        </a>
    </div>
    <div>
        <div class="deck"></div>
        <div class="deck-element">
            <img src="{{ url('assets\dist\img\laptop.png') }}" alt="โลโก้ระบบจองห้องประชุม" style="max-height: 980px; max-width:980px">
        </div>
    </div>
</body>

</html>
