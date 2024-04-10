@extends('layout.User')

@section('title', 'จองห้องประชุม')

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

                        <div class="line-between-active"></div>

                        <div class="icon-container">
                            <div class="circle-icon-active">
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
    <!-- Include Flatpickr library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Include Flatpickr range plugin -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/rangePlugin.js"></script>
    <link rel="stylesheet" href="{{ url('assets/dist/css/searchroom.css') }}">

    <form method="POST" action="{{ route('submit.form') }}">
        <div class="showroom">
            <div class="rowicon">
                <div class="boxSelect-calender">
                    <div class="textSelect">
                        <i class="fas fa-calendar-days"></i>
                        <input type="text" class="datetime-picker" id="date" name="date" value="$dateData"
                            placeholder="Start Date">

                    </div>
                </div>
                <div class="line-between-calender"></div>
                <div class="boxSelect-calender" style="margin-left: 0px;">
                    <div class="textSelect">
                        <i class="fas fa-calendar-days"></i>
                        <input type="text" class="datetime-picker" id="end-date" placeholder="End Date">

                    </div>
                </div>
                <span class="textSelect" id="size">

                    <body>
                        <select class="boxSelect-Size" id="roomSize">
                            <option value="" disabled selected>ขนาดห้อง</option>
                            <option value="small">ห้องเล็ก</option>
                            <option value="medium">ห้องกลาง</option>
                            <option value="large">ห้องใหญ่</option>
                        </select>
                    </body>
                </span>
                <button type="submit" class="btn btn-outline-primary"
                    style="margin-left: 100px;background-color: #5E96EB;color: #fff;width:200px">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    ค้นหาห้อง
                </button>
            </div>
            {{-- @php
                // Splitting start and end dates only if the string contains " to "
                $startAndEndDate = explode(' to ', $startDate);
                $startDate = isset($startAndEndDate[0]) ? explode(' ', $startAndEndDate[0])[0] : '';
                $endDate = isset($startAndEndDate[1]) ? explode(' ', $startAndEndDate[1])[0] : '';
            @endphp --}}



            {{-- <label for="">{{ $startDate }}</label><br>
<label for="">{{ $endDate }}</label><br>
<label for="">{{ $roomSize }}</label> --}}
                
                
            <div class="row">
                {{-- <label for="">{{$startDate}}</label>
                <label for="">{{$endDate}}</label> --}}
                @foreach ($rooms as $key => $room)
                    <a href="{{ route('roominfo', ['roomId' => $room->id, 'res_startdate' => $reserv_room->res_startdate, 'res_enddate' => $reserv_room->res_enddate]) }}"
                        class="boxRoom" id="box{{ $key + 1 }}" data-room-id="{{ $room->id }}"
                        style="background-image: url('{{ asset('image/' . $room->ro_pic1) }}');
                        background-size: cover;"
                        background-position: center;
                        justify-content: center;
                        display: flex;
                        align-items: center;
                        background-repeat: no-repeat;>

                        <!-- Content for each room -->
                        <span class="roominfo" id="statusRoom">
                            <i class="fa-solid fa-earth-americas"></i>
                        </span>
                        <span class="roominfo">
                            <i class="fa-sharp fa-solid fa-s">{{ $room->ro_size }}</i>
                        </span>
                        <span class="roominfo">
                            <i class="fa-regular fa-money-bill-1"> ราคา {{ $room->ro_price }} บาท/วัน</i>
                        </span>
                        <span class="roominfo">
                            <i class="fa-solid fa-laptop">{{ $room->ro_description }}</i>
                        </span>
                        <span class="roomname">
                            {{ $room->ro_name }}
                        </span>
                    </a>
                @endforeach


                @push('scripts')
                    <script>
                        document.querySelectorAll('.boxRoom').forEach(box => {
                            box.addEventListener('click', () => {
                                const roomId = box.getAttribute('data-room-id');
                                const path = '{{ route('test', ':id') }}'.replace(':id', roomId);
                                window.location.href = path;
                            });
                        });
                    </script>
                @endpush

            </div>
        <script>
            // Initialize Flatpickr datetime pickers for both inputs
            flatpickr('.datetime-picker', {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                altInput: true,
                altFormat: "F j, Y H:i",
                plugins: [new rangePlugin({
                    input: "#end-date"
                })]
            });
        </script>
    </form>

@endsection
