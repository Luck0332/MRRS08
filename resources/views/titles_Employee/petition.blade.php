@extends('layout.Employee')

@section('title', 'คำร้องขอจอง')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ url('assets/css.approvelist/approvelist.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>

        <div class="flex-container">
        <div>
            <center>
                <span class="title">คำขอการจอง</span><br>
                <span class="number"
                    style="font-size:40px;font-weight: bold; color:rgb(18, 18, 124)">{{ $tableRowCount }}</span>
                <span>รายการ</span>
            </center>
        </div>
    </div>
    <br><br>
    <div class="head">
        <button id="prev">คำขอการจอง</button>
        {{-- <input type="search" id="searchInput" onkeyup="searchTable()" placeholder="Search...">
        <button type="button" onclick="searchTable()">Search</button> --}}
    </div>

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
    <!-- แสดงข้อมูลสถานะ 'W' -->

    <table class="rwd-table">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>วันที่เข้าใช้</th>
                <th style="width: 19%">สถานะห้องประชุม</th>
                <th>เลขห้อง</th>
                <th>ประเภทของห้อง</th>
                <th>รอดำเนินการ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservationsW as $reservation)
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
                            <button type="submit" name="newStatus" value="A"
                                style="border: none; background-color: none;"><i class="fas fa-check-circle fa-lg"
                                    style="color: #63E6BE;"></i></button>
                            <button type="submit" name="newStatus" value="C"
                                style="border: none; background-color: none;"><i class="fas fa-times-circle fa-lg"
                                    style="color: #ff1a1a;"></i></button>
                        </form>
                    </td>
<<<<<<< HEAD
                    {{-- <td>
                        <a onclick="openModal({{ $reservation->id }})" class="btn open-modal-btn" data-bs-toggle="modal"
                            data-bs-target="#myModal"><i class="fas fa-info-circle fa-lg" id="detail"
                                style="color: #242424"></i></a>
                    </td> --}}
                    {{-- <td>
                        <a ><i class="fas fa-info-circle fa-lg" onclick="openModal({{$reservation->id}})"
                                style="color: #242424"></i></a>
                    </td> --}}
                    <td>
                        <a ><i class="fas fa-info-circle fa-lg" onclick="openModal({{$reservation->id}})"></i></a>

=======
                    <td>
                        <a><i class="fas fa-info-circle fa-lg" id="detail" style="color: #242424"></i></a>
>>>>>>> parent of 5dd7787 (popup)
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-footer">
        <ul class="pagination-sm m-0" style="width: 100%">
            {!! $reservationsW->links('pagination::bootstrap-5') !!}
        </ul>
    </div>
    <script>
        // เลือกตารางโดยใช้ class
        var table = document.querySelector('.rwd-table');

        // หาจำนวนของ elements <tr> ภายใน <tbody>
        var rowCount = table.querySelectorAll('tbody tr').length;

        // แสดงจำนวนตาราง
        console.log("จำนวนตาราง: " + rowCount);
    </script>
<<<<<<< HEAD
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" id="modal-header">

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
        </div>
      </div>
    <script>
        async function openModal(id) {
            console.log(id)
            const url = `{{ route('get-petition', ['id' => 1]) }}`
            await $.ajax({
                url: `/get-petition/${id}`, // Update the URL according to your route
                method: 'GET',
                success: function(data) {
                    console.log(data)
                    const reserver_information = data.data3;
                    const room = data.data2;
                    const reservations = data.data1
                    const roomType = room.ro_typeroom ? "สาธารณะ" : "ส่วนบุคคล";
                    // Generate HTML for room description list
                    const roomDescriptionHTML = `

                        ${room.ro_description.split(',').map(detail => `<tr>${detail.trim()}</tr></br>`).join('')}

                `;
                    $('#modal-content').html(`
                    <div class="modal-header" id="modal-header">
                    <h4 class="modal-title" >รายละเอียด</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <h2>รายละเอียดผู้จอง</h2>
                        <tr>ชื่อ: ${reserver_information.reserver_fname} ${reserver_information.reserver_lname}</tr>
                        </br><tr>${reserver_information.us_lineid} </tr>
                        </br><tr>${reserver_information.reserver_tel} </tr>
                        <h2>รายละเอียดการจอง</h2>
                        <tr>${reservations.res_startdate}</tr>
                        </br>
                        <tr>${reservations.agenda}</tr>

                        <h2>รายละเอียดห้อง</h2>
                        <tr>${room.ro_name}</tr>
                        </br>
                        ${roomDescriptionHTML}
                        <p>${roomType}</p>
                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>`); // Populate the modal content with the received HTML
                    $('#myModal').modal('show'); // Show the modal
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    </script>

=======

>>>>>>> parent of 5dd7787 (popup)
    <!-- แสดงข้อมูลสถานะ 'R' -->
    {{-- <a id="next" onclick="changeDataApprove()">คำขอยกเลิก</a>
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
            @foreach ($reservationsR as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->updated_at }}</td>
                    <td>{{ $reservation->res_status }}</td>
                    <td>{{ $reservation->res_serialcode }}</td>
                    <td>{{ $reservation->res_typeroom }}</td>
                    <td>
                        <form id="updateStatusForm"
                            action="{{ route('Petition_statuses.update', ['id' => $reservation->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="newStatus" value="C"
                                style="border: none; background-color: white;"><i class="fas fa-check-circle fa-lg"
                                    style="color: #63E6BE;"></i></button>
                            <button type="submit" name="newStatus" value="A"
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
    </table> --}}

    <!-- แสดง pagination สำหรับข้อมูลทั้งหมด -->

    <!-- แสดง pagination สำหรับข้อมูลสถานะ 'R' -->
    {{-- <div class="card-footer">
        <ul class="pagination-sm m-0" style="width: 100%">
            {!! $reservationsR->links('pagination::bootstrap-5') !!}
        </ul>
    </div> --}}
    {{-- <script>
        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("reservationsTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script> --}}

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
