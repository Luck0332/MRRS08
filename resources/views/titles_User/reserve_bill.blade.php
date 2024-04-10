@extends('layout.Status')

@section('title', 'คำร้องขอ')
@section('reserv')
    <link rel="stylesheet" href="{{ url('assets/dist/css/bill.css') }}">


    <head>


    </head>

    <body>
        <div class="head-row">
            <div class="room-name">
                {{-- <span>ห้องประชุม {{ $room->ro_name }}</span> --}}
            </div>
            <div class="room-name">
                {{-- <span>รหัสติดตามการจอง : {{ $username->res_serialcode }}</span> --}}
            </div>
        </div>

        <div class="pic-row">
            <div class="pic" id="pic1">
                <img src="https://i.pinimg.com/736x/b3/b5/b6/b3b5b62ae1e40eb4d21c1859284639cf.jpg" alt="Meeting Room Image">
            </div>
        </div>

        <div class="info-row">
            <div class="info-box" id="box1">
                <span class="info">
                    <div class="texthead">
                        <span>รายละเอียดผู้จอง</span>
                    </div>
                    <ul>
                        {{-- <li>ชื่อ: {{ $resinfo_id->reserver_fname }} {{ $resinfo_id->reserver_lname }}</li>
                        <li>ID Line: {{ $resinfo_id->us_lineid }}</li>
                        <li>เบอร์โทรศัพท์: {{ $resinfo_id->reserver_tel }}</li> --}}
                    </ul>
                </span>
            </div>

            <div class="info-box" id="box2">
                <span class="info">
                    <div class="texthead">
                        <span>รายละเอียดการจอง</span>
                    </div>
                    <ul>
                        {{-- {{-- <li>วันที่: {{ $reservation->date }}</li> --}}
                        <li>ขนาดห้อง:
                            {{-- @if ($room->ro_size == 'S')
                                <td> ห้องขนาดเล็ก </td>
                            @elseif ($room->ro_size == 'M')
                                <td> ห้องขนาดกลาง </td>
                            @else
                                <td> ห้องขนาดใหญ่
                            @endif --}}
                        </li>
                        <li>ประเภทห้องประชุม:
                            {{-- @if ($room->ro_typeroom)
                                <td> ห้องประชุมทั่วไป
                                @else
                                <td> ห้องประชุมส่วนบุคคล
                            @endif --}}
                        </li>
                        <li>ระยะเวลา:
                            {{-- {{
                                \Carbon\Carbon::parse($username->res_startdate)->locale('th')
                                ->isoFormat('DD MMM ', 'numeric')
                            }}
                            -
                            {{
                                \Carbon\Carbon::parse($username->res_enddate)->locale('th')
                                ->isoFormat('DD MMM YYYY', 'numeric')
                            }} --}}
                        </li>

                        <li>ค่าใช้จ่าย: <tr>
                                {{-- <td>{{ $room->ro_price }} --}}
                            </tr>
                            /วัน</li>
                    </ul>
                </span>
            </div>
        </div>

        <a href="{{url('/')}}" class="original-button">เสร็จสิ้น</a>
    </body>



@endsection
