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
                {{-- @if ($re->ro_pic1)
                <img src='{!! asset($re->ro_pic1) !!}' width='50' height='50' class="img img-responsive" alt="">
            @else
                No Avatar
            @endif --}}
            <br>
            <img src="https://i.pinimg.com/736x/b3/b5/b6/b3b5b62ae1e40eb4d21c1859284639cf.jpg" alt="Meeting Room Image" style="width: 500px"> <br>
            
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

                    @if ($re->res_status == 'W')
                    <i class="fa-solid fa-clock"></i> รออนุมัติ
                        <form id="updateStatusForm"
                        action="{{ route('Follow.update', ['id' => $re->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" name="newStatus" value="C"class="btn btn-danger large-button"
                            ></button>
                    </form>

                    @elseif ($re->res_status == 'A')
                        <i class="fas fa-check text-success"></i> ได้รับการอนุมัติ <br>
                        <form id="updateStatusForm"
                        action="{{ route('Follow.update', ['id' => $re->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" name="newStatus" value="Z"class="btn btn-danger large-button"
                            ></button>
                    </form>

                    @elseif ($re->res_status == 'R'||$re->res_status == 'C')
                        <i class="fas fa-times-circle text-danger"></i> ไม่ได้รับการอนุมัติ
                        @else
                        <i class="fas fa-check text-success"></i> รอการยกเลิก
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
