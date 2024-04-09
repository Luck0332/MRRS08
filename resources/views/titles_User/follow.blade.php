@extends('layout.User')

@section('title', 'ติดตามการจอง')
@section('content')
    <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/dist/css/follow.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css"
        href="{{ 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css' }}">
    <div class="f1">
        <form action="{{ route('search.Reserved')}}" method="POST">
            @csrf
            <div class="main">
                {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
                <div class="relative py-4 flex items-center">
                    <input type="text" name="search" class="input " placeholder="รหัสการจอง">
                    <label for="text" class="absolute left-2 top-6 pt-1 pl-3 text-gray-500"></label>
                    <button id="detail" type="submit" class="fa-solid fa-magnifying-glass ml-2" style="text-decoration: none;"></button>
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
            {{$re->ro_pic1}}<br>
            {{'รหัสการจอง : '}}
            {{$re->res_serialcode}}<br>
            {{'ห้องประชุม : '}}
            {{$re->ro_name}}<br>
            {{'ชื่อผู้จอง : '}}
            {{$re->reserver_fname}}
            {{$re->reserver_lname}}<br>
            {{'วันที่จอง : '}}
            {{$re->res_startdate}}<br>
            {{'วันสิ้นสุดการจอง : '}}
            {{$re->res_enddate}}<br>
            @if ($re->res_status == 'W')
            <i class="fa-solid fa-clock-rotate-left">รออนุมัติ</i>
            <button type="button" onclick="deleteUser()" class="btn btn-danger transparent-btn" style="color: #FF0000;">
                <i class="fa-solid fa-trash-can"></i>
            @elseif ($re->res_status =='A')
            <i class="fa-solid fa-check">ได้รับการอนุมัติ</i>
            <button type="button" onclick="deleteUser()" class="btn btn-danger transparent-btn" style="color: #FF0000;">
                <i class="fa-solid fa-trash-can"></i>
            @else
            <i class="fa-solid fa-xmark">ไม่ได้รับการอนุมัติ</i>
            @endif
            <br>


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
                            });
                        }
                        });
                }
            </script>
            @endforeach
        </td>
    </div>
    @endisset

@endsection
