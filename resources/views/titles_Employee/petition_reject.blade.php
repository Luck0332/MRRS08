@extends('layout.Employee')

@section('title', 'คำร้องขอยกเลิก')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ url('assets/css.approvelist/approvelist.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <div class="flex-container">
        <div>
            <br>
            <span class="title">คำขอยกเลิก</span><br>
            <span class="number" style="font-size:40px;font-weight: bold; color:rgb(18, 18, 124)">{{$tableRowCount}}</span>
            <span>รายการ</span>
        </div>
    </div>
    <br><br>

    <!-- แสดงข้อมูลสถานะ 'R' -->
    <div class="head">
        <button id="prev">คำขอยกเลิก</button>
    </div>
    <!-- แสดงข้อมูลสถานะ 'W' -->

    <table class="rwd-table">
        <thead>
            <tr>
                <th>ไอดี</th>
                <th>วันที่เข้าใช้</th>
                <th>สถานะห้องประชุม</th>
                <th>เลขห้อง</th>
                <th>ประเภทของห้อง</th>
                <th>รอดำเนินการ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rejectR as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->updated_at }}</td>
                    <td>{{ $reservation->res_status }}</td>
                    <td>{{ $reservation->res_serialcode }}</td>
                    <td>{{ $reservation->res_typeroom }}</td>
                    <td>
                        <form id="updateStatusForm"
                            action="{{ route('Petition_statuses.updateR', ['id' => $reservation->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="newStatus" value="C" onclick="approveStatus()"
                                style="border: none; background-color: white;"><i class="fas fa-check-circle fa-lg"
                                    style="color: #63E6BE;"></i></button>
                            <button type="submit" name="newStatus" value="A" onclick="rejectStatus()"
                                style="border: none; background-color: white;"><i class="fas fa-times-circle fa-lg"
                                    style="color: #ff1a1a;"></i></button>
                        </form>
                    </td>
                    <td>
                        <a><i class="fas fa-info-circle fa-lg" id="detail" style="color: #242424"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-footer">
        <ul class="pagination-sm m-0" style="width: 100%">
            {!! $rejectR->links('pagination::bootstrap-5') !!}
        </ul>
    </div>
    <script>
        function approveStatus() {
            alert("Approved successfully!");
        }

        function rejectStatus() {
            alert("Rejected successfully!");
        }
    </script>

    <script>
        // เลือกตารางโดยใช้ class
        var table = document.querySelector('.rwd-table');

        // หาจำนวนของ elements <tr> ภายใน <tbody>
        var rowCount = table.querySelectorAll('tbody tr').length;

        // แสดงจำนวนตาราง
        console.log("จำนวนตาราง: " + rowCount);
    </script>

    <script>
        $(document).ready(function() {
            // เมื่อคลิกที่ pagination สำหรับข้อมูลสถานะ 'W'
            $(document).on('click', '#paginationW a', function(e) {
                e.preventDefault(); // ป้องกันการโหลดหน้าใหม่
                var pageUrl = $(this).attr('href'); // รับ URL ของหน้า pagination ที่ถูกคลิก
                loadReservations(pageUrl, '#tableW'); // เรียกใช้ฟังก์ชั่นเพื่อโหลดข้อมูลสำหรับสถานะ 'W'
            });

            // เมื่อคลิกที่ pagination สำหรับข้อมูลสถานะ 'R'
            $(document).on('click', '#paginationR a', function(e) {
                e.preventDefault(); // ป้องกันการโหลดหน้าใหม่
                var pageUrl = $(this).attr('href'); // รับ URL ของหน้า pagination ที่ถูกคลิก
                loadReservations(pageUrl, '#tableR'); // เรียกใช้ฟังก์ชั่นเพื่อโหลดข้อมูลสำหรับสถานะ 'R'
            });

            // ฟังก์ชั่นสำหรับโหลดข้อมูลสำหรับสถานะ 'W' หรือ 'R' ผ่าน AJAX
            function loadReservations(pageUrl, tableId) {
                $.ajax({
                    url: pageUrl, // ใช้ URL ที่ได้จาก pagination
                    success: function(response) {
                        var data = $(response).find(
                            tableId); // ค้นหาข้อมูลสำหรับสถานะที่เลือกใน response
                        $(tableId).html(data); // เปลี่ยนแท็บข้อมูลสำหรับสถานะที่เลือก
                    }
                });
            }
        });
    </script>
@endsection
