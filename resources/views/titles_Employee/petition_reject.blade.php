@extends('layout.Employee')

@section('title', 'คำร้องขอยกเลิก')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ url('assets/css.approvelist/approvelist.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <div class="flex-container">
        <div>
            <br>
            <span class="title">คำขอยกเลิก</span><br>
            <span class="number" style="font-size:40px;font-weight: bold; color:rgb(18, 18, 124)">{{$tableRowCount}}</span>
            <span>รายการ</span>
        </div>
    </div>


    <!-- แสดงข้อมูลสถานะ 'R' -->
    <div class="head">
        <button id="prev">คำขอยกเลิก</button>
    </div>
    <!-- แสดงข้อมูลสถานะ 'W' -->

    <table class="rwd-table">
        <thead>
            <tr>
                <th>#</th>
                <th>วันที่จอง</th>
                <th>สถานะห้องประชุม</th>
                <th>รหัสการจอง</th>
                <th>วันที่จะเข้าใช้</th>
                <th>รอดำเนินการ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rejectR as $reservation)
                <tr>
                    <td>{{ $reservation->room_id }}</td>
                    <td>{{ $reservation->created_at }}</td>
                    <td>{{ $reservation->res_status }}</td>
                    <td>{{ $reservation->res_serialcode}}</td>
                    <td>{{ $reservation->res_startdate }}</td>
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
                        <a class="custom-icon" onclick="openModal({{ $reservation->id }})">
                            <i class="fas fa-info-circle fa-lg" id="detail" style="color: #242424"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-footer">
        <ul class="pagination-sm m-0">
            {!! $rejectR->links('pagination::bootstrap-5') !!}
        </ul>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="modal-content">

                <!-- Modal Header -->
                <div class="modal-header" id="modal-header">

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        async function openModal(id) {
            console.log(id)
            const url = "{{ route('get-popup', ['id' => 1]) }}";
            await $.ajax({
                url: `{{url('/cluster8/Petition_reject_detail/')}}${id}`, // Update the URL according to your route
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
                    <div class="container">
                        <div class="details-section">
                            <h2>รายละเอียดผู้จอง</h2>
                                <ul>
                                    <li>
                                        <span class="label">ชื่อ :</span>
                                        <span class="value">${reserver_information.reserver_fname} ${reserver_information.reserver_lname}</span>
                                    </li>

                                    <li>
                                        <span class="label">ID Line :</span>
                                        <span class="value">${reserver_information.us_lineid}</span>
                                    </li>

                                    <li>
                                        <span class="label">เบอร์โทร :</span>
                                        <span class="value">${reserver_information.reserver_tel}</span>
                                    </li>

                                </ul>
                        </div>
                    </div>

                    <div class="container">
                        <div class="details-section">
                            <h2>รายละเอียดผู้จอง</h2>
                            <ul>
                                <li>
                                    <span class="label">วันที่จอง :</span>
                                    <span class="value">${reservations.res_startdate}</span>
                                </li>

                                <li>
                                    <span class="label">วาระการประชุม : </span>
                                    <span class="value">${reservations.agenda}</span>
                                </li>

                            </ul>
                        </div>
                    </div>


                    <div class="container">
                        <div class="details-section">
                            <h2>รายละเอียดห้อง</h2>
                            <ul>
                                <li>
                                <span class="label">ชื่อห้อง : </span>
                                <span class="value">${room.ro_name}</span>
                                </li>

                                <li>
                                <span class="label">ประเภทห้อง :  </span>
                                <span class="value">${roomType}</span>
                                </li>

                                <li>
                                <span class="label">รายละเอียด :  </span>
                                <span class="value">${roomDescriptionHTML} </span>
                                </li>

                            </ul>
                        </div>
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
    <style>
        .custom-alert {
            padding: 20px;
            background-color: #f2f2f2;
            color: #333;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            height: 200px;
            text-align: center;
            /* จัดตำแหน่งข้อความให้อยู่ตรงกลาง */
            display: flex;
            /* จัดวางเนื้อหาด้วย Flexbox */
            align-items: center;
            /* จัดวางตำแหน่งในแนวตั้งกลาง */
            justify-content: center;
            /* จัดวางตำแหน่งในแนวนอนกลาง */
        }

        .custom-alert h1 {
            font-size: 24px;
            /* กำหนดขนาดตัวหนังสือใหญ่ขึ้น */
            font-weight: bold;
            /* ทำให้ตัวหนังสือเป็นตัวหนา */
        }

        .success {
            font-size: 20px;
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }
    </style>
    <script>
        function approveStatus() {
            var approveAlert = document.createElement('div');
            approveAlert.textContent = "Approved successfully!";
            approveAlert.classList.add('custom-alert', 'success');
            document.body.appendChild(approveAlert);
            setTimeout(function() {
                approveAlert.remove();
            }, 3000);
        }

        function rejectStatus() {
            var rejectAlert = document.createElement('div');
            rejectAlert.textContent = "Rejected successfully!";
            rejectAlert.classList.add('custom-alert', 'error');
            document.body.appendChild(rejectAlert);
            setTimeout(function() {
                rejectAlert.remove();
            }, 3000);
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
