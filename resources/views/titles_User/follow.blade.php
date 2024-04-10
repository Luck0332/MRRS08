@extends('layout.User')

@section('title', 'ติดตามการจอง')
@section('content')
    <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/dist/css/follow.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css"
        href="{{ 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css' }}">
    <div class="f1">
        <form action="{{ route('search.Reserved') }}" method="POST">
            @csrf
            <div class="main">

                <div class="relative py-4 flex items-center">
                    <input type="text" name="search" class="input " placeholder="รหัสการจอง">
                    <button id="detail" type="submit" class="fa-solid btn fa-magnifying-glass ml-2"
                        style="text-decoration: none; padding-bottom: 20px;"></button>
                    <label for="text" class="absolute left-2 top-6 pt-1 pl-3 text-gray-500"></label>
                    <button id="detail" type="submit" class="fa-solid fa-magnifying-glass ml-2"
                        style="text-decoration: none;"></button>
                    <div class="databox">
                    </div>
        </form>
    </div>
    </div>
    </div>
    @isset($results)
        <div>
            <td>
                @foreach ($results as $re)
                    {{-- <img src="{{ asset('image/' . $re->ro_pic1) }}" alt="{{ $re->ro_name }}" width="200"> --}}

                    <br>
                    <div style="text-align: center;">
                        <div style="display: inline-block; text-align: left;">
                            <img src="{{ asset('image/' . $re->ro_pic1) }}" alt="{{ $re->ro_name }}" style="width: 500px;"><br>
                        </div>
                        <div style="display: inline-block; vertical-align: top; margin-left: 20px; font-size: ">
                            <table style="font-size: 18px">
                                <tr>
                                    <td style="text-align: left;">{{ 'รหัสการจอง : ' }}</td>
                                    <td style="text-align: left;">{{ $re->res_serialcode }}</td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;">{{ 'ห้องประชุม : ' }}</td>
                                    <td style="text-align: left;">{{ $re->ro_name }}</td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;">{{ 'ชื่อผู้จอง : ' }}</td>
                                    <td style="text-align: left;">{{ $re->reserver_fname }} {{ $re->reserver_lname }}</td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;">{{ 'วันที่จอง : ' }}</td>
                                    <td style="text-align: left;">{{ $re->res_startdate }}</td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;">{{ 'วันสิ้นสุดการจอง : ' }}</td>
                                    <td style="text-align: left;">{{ $re->res_enddate }}</td>
                                </tr>
                                <tr>

                            </table>
                            <div>
                                @if ($re->res_status == 'W')
                                    <i class="fa-solid fa-clock"></i>

                                    &nbsp;
                                    <text class = "fas text-secondary" style="font-size: 20px;">รอการอนุมัติ</text>

                                    <br>
                                    <form id="updateStatusForm" action="{{ route('Follow.update', ['id' => $re->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" name="newStatus"
                                            value="C"class="btn btn-danger large-button"
                                            style="height: 38px;">ยกเลิกการจอง</button>
                                    </form>
                                @elseif ($re->res_status == 'A')
                                    <i class="fas fa-check text-success" style="font-size: 20px;"></i>

                                    &nbsp;
                                    <text class = "fas text-success" style="font-size: 20px;">ได้รับการอนุมัติ</text>

                                    <br>
                                    <form id="updateStatusForm" action="{{ route('Follow.update', ['id' => $re->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" name="newStatus"
                                            value="Z"class="btn btn-danger large-button"
                                            style="height: 38px;">ยกเลิกการจอง</button>
                                    </form>
                                @elseif ($re->res_status == 'R' || $re->res_status == 'C')
                                    <br>
                                    <i class="fas fa-times-circle text-danger"></i>

                                    &nbsp;
                                    <text class = "fas text-danger" style="font-size: 20px;">ไม่ได้รับการอนุมัติ</text>

                                    <br>
                                @else
                                    <br>
                                    <i class="fas fa-clock text-danger"></i>
                                    &nbsp;
                                    <text class = "fas text-danger" style="font-size: 20px;">รอการยกเลิก</text>

                                    <br>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div>
                        {{ $re->ro_pic1 }}<br>
                    </div>
                    <div class="large">
                        {{ 'รหัสการจอง : ' }}
                        {{ $re->res_serialcode }}<br>
                        {{ 'ห้องประชุม : ' }}
                        {{ $re->ro_name }}<br>
                        {{ 'ชื่อผู้จอง : ' }}
                        {{ $re->reserver_fname }}
                        {{ $re->reserver_lname }}<br>
                        {{ 'วันที่จอง : ' }}
                        {{ $re->res_startdate }}<br>
                        {{ 'วันสิ้นสุดการจอง : ' }}
                        {{ $re->res_enddate }}<br>
                    </div>
                    <div class="large">
                        @if ($re->res_status == 'W')
                            <i class="fa-solid fa-clock-rotate-left">รออนุมัติ</i>
                            <br>
                            <br>
                            <br>
                            <button type="button" onclick="deleteUser()" class="btn btn-danger transparent-btn"
                                style="color: #FF0000;">
                                <div>
                                    {{ $re->ro_pic1 }}<br>
                                </div>
                                <div class="large">
                                    {{ 'รหัสการจอง : ' }}
                                    {{ $re->res_serialcode }}<br>
                                    {{ 'ห้องประชุม : ' }}
                                    {{ $re->ro_name }}<br>
                                    {{ 'ชื่อผู้จอง : ' }}
                                    {{ $re->reserver_fname }}
                                    {{ $re->reserver_lname }}<br>
                                    {{ 'วันที่จอง : ' }}
                                    {{ $re->res_startdate }}<br>
                                    {{ 'วันสิ้นสุดการจอง : ' }}
                                    {{ $re->res_enddate }}<br>
                                </div>
                                <div class="large">
                                    @if ($re->res_status == 'W')
                                        <i class="fa-solid fa-clock-rotate-left">รออนุมัติ</i>
                                        <br>
                                        <br>
                                        <br>
                                        <button type="button" onclick="deleteUser()" class="btn btn-danger transparent-btn"
                                            style="color: #FF0000;">
                                            <form id="updateStatusForm"
                                                action="{{ route('Follow.update', ['id' => $re->id]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" name="newStatus"
                                                    value="C"class="btn btn-danger large-button"></button>
                                            </form>
                                        @elseif ($re->res_status == 'A')
                                            <i class="fa-solid fa-check">ได้รับการอนุมัติ</i>
                                            <br>
                                            <br>
                                            <br>
                                            <button type="button" onclick="deleteUser()" class="btn btn-danger transparent-btn"
                                                style="color: #FF0000;">
                                            @else
                                                <i class="fa-solid fa-xmark">ไม่ได้รับการอนุมัติ</i>
                                    @endif
                                    <br>
                                </div>
                                <script>
                                    function deleteUser() {
                                        Swal.fire({
                                            title: "ต้องการยกเลิกการจอง ? ",
                                            text: "You won't be able to revert this!",
                                            icon: "warning",
                                            showCancelButton: true,
                                            confirmButtonColor: "#3085d6",
                                            cancelButtonColor: "#d33",
                                            confirmButtonText: "Yes, delete it!"
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                Swal.fire({
                                                    title: "Deleted!",
                                                    text: "Your file has been deleted.",
                                                    icon: "success"

                                                        <
                                                        form id = "updateStatusForm"
                                                    action = "{{ route('Follow.update', ['id' => $re->id]) }}"
                                                    method = "POST" >
                                                    @csrf
                                                    @method('PUT') <
                                                    button type = "submit"
                                                    name = "newStatus"
                                                    value = "z"
                                                    style = "border: none; background-color: white;" > < i class =
                                                    "fas fa-check-circle fa-lg"
                                                    style = "color: #63E6BE;" > < /i></button >
                                                    <
                                                    /form>
                                                });
                                            }
                                        });
                                    }

                                    function deleteUser2() {
                                        Swal.fire({
                                            title: "ต้องการยกเลิกการจอง ? ",
                                            text: "You won't be able to revert this!",
                                            icon: "warning",
                                            showCancelButton: true,
                                            confirmButtonColor: "#3085d6",
                                            cancelButtonColor: "#d33",
                                            confirmButtonText: "Yes, delete it!"
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                Swal.fire({
                                                    title: "Deleted!",
                                                    text: "Your file has been deleted.",
                                                    icon: "success"
                                                });
                                            }
                                        });
                                    }
                                </script>
                        @endif
                @endforeach
            </td>
        </div>
        @endif

    @endsection
