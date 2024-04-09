@extends('layout.Status')

@section('title', 'รายละเอียดห้องประชุม')

@section('reserv')

    <link rel="stylesheet" href="{{ url('assets/dist/css/info.css') }}">

    <div class="room-name">
        <span>ห้องประชุม IF-101</span>
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
                                                            {{-- เหลือลิงค์กับไอดีห้อง --}}
    <div class="texthead">
        <span>สิ่งอำนวยความสะดวก</span>
    </div>
    <div class="info-row">
        <div class="info-box" id="box1">
            <span class="info">

                {{-- @foreach ($Room as $room)
                    <tr>
                        @php
                            $details = explode(',', $room->ro_description);
                        @endphp
                        <td>
                            <ul>
                                @foreach ($details as $detail)
                                    <li>{{ htmlspecialchars($detail) }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach --}}


            </span>





        </div>
        <div class="info-box" id="box2">
            <div class="row-icon">
                <span class="icon" id="size-icon">
                    <i class="fa-solid fa-s fa-xl">
                        {{-- @foreach ($Room as $room)
                            <tr>
                                @if ($room->ro_size == 'S')
                                    <td> ห้องขนาดเล็ก </td>
                                @elseif ($room->ro_size == 'M')
                                    <td> ห้องขนาดกลาง </td>
                                @else
                                    <td> ห้องขนาดใหญ่
                                @endif

                            </tr>
                        @endforeach --}}
                    </i>
                </span>

                <span class="icon">
                    <i class="fa-regular fa-money-bill-1 fa-xl"> ราคา
                        {{-- @foreach ( $Room as $room)
                        <tr>
                            <td>{{$room->ro_price}}

                        @endforeach --}}

                            /วัน
                    </i>
                </span>

                <span class="icon">
                    <i class="fa-solid fa-earth-americas fa-xl">
                        {{-- @foreach ( $Room as $room)
                        <tr>
                            @if ($room->ro_typeroom)
                            <td> ห้องประชุมทั่วไป<td>
                                @else
                                <td> ห้องประชุมส่วนบุคคล<td>

                            @endif

                        @endforeach --}}
                    </i>
                </span>
            </div>






        </div>

    </div>

    <a href="" class="original-button">จองห้อง</a>
@endsection
