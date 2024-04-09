@extends('layout.Status')

@section('title', 'จองห้องประชุม')

@section('reserv')

    <!-- Include Flatpickr library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Include Flatpickr range plugin -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/rangePlugin.js"></script>
    <link rel="stylesheet" href="{{ url('assets/dist/css/searchroom.css') }}">

    <form method="POST" action="{{ route('submit.form') }} ">
        @csrf
        @method("post")
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
                        <select class="boxSelect" style="width: 210px; margin-left: 36px;" id="roomSize" name="room_size">
                            <option value="A" selected >ขนาดห้อง</option>
                            <option value="S">ห้องเล็ก</option>
                            <option value="M">ห้องกลาง</option>
                            <option value="L">ห้องใหญ่</option>
                        </select>
                    </body>
                </span>
                <button type="submit" class="btn btn-outline-primary"
                    style="margin-left: 100px;background-color: #5E96EB;color: #fff;width:200px">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    ค้นหาห้อง
                </button>
            </div>




    <div class="row">
    @foreach($rooms as $key => $room)
    <div onclick="redirectToAnotherPage( {{ $room->id }}, {{$reserv_room->res_startdate}}, {{$reserv_room->res_enddate}})"  class="boxRoom" id="box{{ $key + 1 }}" data-room-id="{{ $room->id }}" >
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
            {{ $room->id }}
        </span>
    </div>
@endforeach
<script>
    function redirectToAnotherPage(idValue, reserv_st , reserv_ed) {
        reserv_s = reserv_st.toString();
        reserv_e = reserv_ed.toString();

        var newUrl = '/roominfo/' + idValue + '/' + reserv_st + '/' + reserv_ed;
        // Redirect to the new page
        window.location.href = newUrl;
    }
</script>


{{-- @push('scripts')
<script>
    document.querySelectorAll('.boxRoom').forEach(box => {
        box.addEventListener('click', () => {
            const roomId = box.getAttribute('data-room-id');
            const path = '{{ route('test', ':id') }}'.replace(':id', roomId);
            window.location.href = path;
        });
    });
</script>
@endpush --}}

</div>



            <div class="row">
                {{-- <label for="">{{$startDate}}</label>
                <label for="">{{$endDate}}</label> --}}
                @foreach ($rooms as $key => $room)
                    {{-- <label for="">{{$room->ro_id}}</label>
                    <label for="">{{$room->ro_name}}</label>
                    <label for="">{{$room->ro_size}}</label>
                    <label for="">{{$room->ro_price}}</label>
                    <label for="">----------</label> --}}
                    <div class="boxRoom" id="box{{ $key + 1 }}" >
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
                    </div>
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



            {{-- <div class="row">
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
        </div> --}}

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


@endsection
