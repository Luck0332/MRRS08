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
                                    <text class = "fas text-danger" style="font-size: 20px;">คำขอจองถูกยกเลิก</text>

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
                 @endforeach
            </td>
        </div>
    @endisset
@endsection
