@extends('layout.Status')

@section('title', 'รายละเอียดห้องประชุม')

@section('reserv')

    <link rel="stylesheet" href="{{ url('assets/dist/css/info.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">



    <label for="">{{$room->id}}</label>
    <label for="">{{$res_startdate}}</label>
    <label for="">{{$res_enddate}}</label>

    @if ($room)
        {{-- @dd($room); --}}
        <div class="room-name">
            <span>ห้องประชุม {{ $room->ro_name }}</span>
        </div>

        <div class="pic-row">
            <div class="pic" id="pic1">
                <img src="https://i.pinimg.com/736x/b3/b5/b6/b3b5b62ae1e40eb4d21c1859284639cf.jpg" alt="Meeting Room Image">
            </div>
            <span class="pic" id="pic2">
                <img src="https://i.pinimg.com/736x/b3/b5/b6/b3b5b62ae1e40eb4d21c1859284639cf.jpg" alt="Meeting Room Image">
            </span>
            <span class="pic" id="pic3">
                <img src="https://i.pinimg.com/736x/b3/b5/b6/b3b5b62ae1e40eb4d21c1859284639cf.jpg" alt="Meeting Room Image">
            </span>
        </div>

        <div class="texthead">
            <span>สิ่งอำนวยความสะดวก</span>
        </div>

        <div class="info-row">
            <div class="info-box" id="box1">
                <span class="info">
                    <tr>
                        <td>
                            <ul>
                                @foreach (explode(',', $room->ro_description) as $detail)
                                    <li>{{ htmlspecialchars($detail) }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                </span>
            </div>
            <div class="info-box" id="box2">
                <div class="row-icon">
                    <span class="icon" id="size-icon">
                        <i class="fa-solid fa-s fa-xl">
                            <tr>
                                @if ($room->ro_size == 'S')
                                    <td> ห้องขนาดเล็ก </td>
                                @elseif ($room->ro_size == 'M')
                                    <td> ห้องขนาดกลาง </td>
                                @else
                                    <td> ห้องขนาดใหญ่
                                @endif
                            </tr>
                        </i>
                    </span>
                    <span class="icon" id="price">
                        <i class="fa-regular fa-money-bill-1 fa-xl"> ราคา
                            <tr>
                                <td>{{ $room->ro_price }}
                            </tr>
                            /วัน
                        </i>
                    </span>
                    <span class="icon">
                        <i class="fa-solid fa-earth-americas fa-xl">
                            <tr>
                                @if ($room->ro_typeroom)
                                    <td> ห้องประชุมทั่วไป
                                    @else
                                    <td> ห้องประชุมส่วนบุคคล
                                @endif
                            </tr>
                        </i>
                    </span>
                </div>
            </div>

            <a href="{{ route('fillInformation', ['id' => $room->id]) }}" class="original-button">จองห้อง</a>
        @else
            <p>ห้องประชุมไม่ถูกพบ</p>
    @endif

@endsection
