@extends('layout.Employee')

@section('title', 'คำร้องขอยกเลิก')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ url('assets/css.approvelist/approvelist.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <div class="flex-container">
        <div>
            <center>
                <span class="title">คำขอยกเลิก</span><br>
                <span class="number"
                    style="font-size:40px;font-weight: bold; color:rgb(18, 18, 124)">{{ $tableRejectCount }}</span>
                <span>รายการ</span>
            </center>
        </div>
    </div>
    <br><br>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function changeDataApprove() {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/changeDataApprove', // เปลี่ยนเส้นทางให้สอดคล้องกับ route ใน Laravel
                type: 'POST',
                data: {
                    test01: "W"
                }, // ส่งค่า test01 ไปกับคำร้องขอ
                headers: {
                    'X-CSRF-TOKEN': csrfToken // ส่ง CSRF token ใน header
                },
                success: function(response) {
                    // Clear existing table rows
                    $('.rwd-table tbody').empty();

                    // Loop through each reservation in the response and append a new row to the table
                    $.each(response.reservations.data, function(index, reservation) {
                        // Construct HTML for a new table row
                        var newRow = '<tr>' +
                            '<td>' + reservation.id + '</td>' +
                            '<td>' + reservation.updated_at + '</td>' +
                            '<td>' + reservation.res_status + '</td>' +
                            '<td>' + reservation.res_serialcode + '</td>' +
                            '<td>' + reservation.res_typeroom + '</td>' +
                            '<td>' +
                            '<a href=""><i class="fas fa-check-circle fa-lg" style="color: #63E6BE;"></i></a>' +
                            '<a href=""><i class="fas fa-times-circle fa-lg" style="color: #ff1a1a;"></i></a>' +
                            '</td>' +
                            '<td>' +
                            '<a><i class="fas fa-info-circle fa-lg" id="detail" style="color: #242424"></i></a>' +
                            '</td>' +
                            '</tr>';
                        // Append the new row to the table body
                        $('.rwd-table tbody').append(newRow);
                    });
                },

                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        function changeDataReject() {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/changeDataReject', // เปลี่ยนเส้นทางให้สอดคล้องกับ route ใน Laravel
                type: 'POST',
                data: {
                    test01: "R"
                }, // ส่งค่า test01 ไปกับคำร้องขอ
                headers: {
                    'X-CSRF-TOKEN': csrfToken // ส่ง CSRF token ใน header
                },
                success: function(response) {
                    // Clear existing table rows
                    $('.rwd-table tbody').empty();

                    // Loop through each reservation in the response and append a new row to the table
                    $.each(response.reservations.data, function(index, reservation) {
                        // Construct HTML for a new table row
                        var newRow = '<tr>' +
                            '<td>' + reservation.id + '</td>' +
                            '<td>' + reservation.updated_at + '</td>' +
                            '<td>' + reservation.res_status + '</td>' +
                            '<td>' + reservation.res_serialcode + '</td>' +
                            '<td>' + reservation.res_typeroom + '</td>' +
                            '<td>' +
                            '<a href=""><i class="fas fa-check-circle fa-lg" style="color: #63E6BE;"></i></a>' +
                            '<a href=""><i class="fas fa-times-circle fa-lg" style="color: #ff1a1a;"></i></a>' +
                            '</td>' +
                            '<td>' +
                            '<a><i class="fas fa-info-circle fa-lg" id="detail" style="color: #242424"></i></a>' +
                            '</td>' +
                            '</tr>';
                        // Append the new row to the table body
                        $('.rwd-table tbody').append(newRow);
                    });
                },

                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    </script> --}}

    <!-- แสดงข้อมูลสถานะ 'R' -->
    <a id="next" onclick="changeDataApprove()">คำขอยกเลิก</a>
    <table class="rwd-table">
        <thead>
            <tr>
                <th>ลำดับ</th>
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
                            <button type="submit" name="newStatus" value="C"
                                style="border: none; background-color: none;"><i class="fas fa-check-circle fa-lg"
                                    style="color: #63E6BE;"></i></button>
                            <button type="submit" name="newStatus" value="A"
                                style="border: none; background-color: none;"><i class="fas fa-times-circle fa-lg"
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

    <!-- แสดง pagination สำหรับข้อมูลทั้งหมด -->

    <!-- แสดง pagination สำหรับข้อมูลสถานะ 'R' -->
    <div class="card-footer">
        <ul class="pagination-sm m-0" style="width: 100%">
            {!! $rejectR->links('pagination::bootstrap-5') !!}
        </ul>
    </div>

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
