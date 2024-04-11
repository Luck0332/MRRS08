@extends('layout.Employee')

@section('title', 'รายการจอง')
@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ url('assets/css.approved/approved.css') }}">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>

    <div class="head">
        <button id="prev">รายการ</button>
        <input type="search" placeholder="search" style="margin-left : 66%;">
    </div>

    <table class="rwd-table">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>วันที่เข้าใช้</th>
                <th>ชื่อผู้จอง</th>
                <th>ชื่อห้อง</th>
                <th>ประเภทห้อง</th>
                <th>รอดำเนินการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->res_startdate }}</td>
                    {{-- เริ่มต้นด้วยการตรวจสอบว่ามีข้อมูลของการจองนี้หรือไม่ --}}
                    {{-- @if (isset($reserver_information[$reservation->id]))
                <td>{{ $reserver_information[$reservation->id]->reserver_fname }}</td>
            @else --}}
                    @foreach ($reserver_information as $data)
                        @if ($data->id == $reservation->resinfo_id)
                            <td>{{ $data->reserver_fname }} {{ $data->reserver_lname }}</td>
                        @endif
                    @endforeach

                    {{-- เริ่มต้นด้วยการตรวจสอบว่ามีข้อมูลของห้องที่ตรงกับการจองนี้หรือไม่ --}}
                    {{-- @if (isset($room[$reservation->id]))
                <td>{{ $room[$reservation->id]->ro_name }}</td>
            @else
                <td>N/A</td>
            @endif --}}
                    @foreach ($room as $data)
                        @if ($data->id == $reservation->room_id)
                            <td>{{ $data->ro_name }}</td>
                        @endif
                    @endforeach

                    @foreach ($room as $data)
                        @if ($data->id == $reservation->room_id)
                            @if ($data->ro_typeroom == 1)
                                <td>สาธารณะ</td>
                            @else
                                <td>ส่วนบุคคล</td>
                            @endif
                        @endif
                    @endforeach
                    {{-- @if ($reservation->res_typeroom == 1)
                        <td>สาธารณะ</td>
                    @else
                        <td>ส่วนบุคคล</td>
                    @endif --}}
                    <td>
                        <!-- Add update functionality -->
                        <form class="btn btn-cancel"
                            action="{{ route('reservation_list_Cancel', ['id' => $reservation->id]) }}" method="POST"
                            id="update-form-{{ $reservation->id }}">
                            @csrf
                            @method('PUT')
                            <button type="button" class="buttons" id="buttons-title"
                                onclick="confirmUpdate('{{ $reservation->id }}')">ยกเลิก</button>
                        </form>
                        <a class="custom-icon" onclick="openModal({{ $reservation->id }})"><i
                                class="fas fa-info-circle fa-lg"></i></a>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    <div class="card-footer">
        <ul class="pagination pagination-sm ">
            {!! $reservations->links('pagination::bootstrap-5') !!}
        </ul>
    </div>
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
            const url = `{{ url('get-reservation-details') }}/1`
            await $.ajax({
                url: `{{ url('/get-reservation-details') }}/${id}`, // Update the URL according to your route
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
                    <h4 class="modal-title" >รายละเอียด ID ${reservations.id}</h4>
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
                    </div>`); // Populate the modal content with the received HTML
                    $('#myModal').modal('show'); // Show the modal
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        function confirmUpdate(id) {
            console.log(id);
            const url = `/get-reservation-details/${id}`;
            $.ajax({
                url: url,
                method: 'GET',
                success: function(data) {
                    console.log(data);
                    const reserver_information = data.data3;
                    const room = data.data2;
                    const reservations = data.data1;
                    const roomType = room.ro_typeroom ? "สาธารณะ" : "ส่วนบุคคล";
                    Swal.fire({
                        title: "ต้องการยกเลิกการจอง?",
                        text: "รหัสการจอง : " + reservations.res_serialcode,
                        icon: "warning",
                        input: 'text',
                        inputAttributes: {
                            autocapitalize: "off",
                            placeholder: "ระบุหมายเหตุการยกเลิก",
                        },
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "ยืนยัน",
                        cancelButtonText: "ยกเลิก",

                        preConfirm: (inputValue) => {
                            if (!inputValue) {
                                Swal.showValidationMessage("กรุณากรอกเหตุผลการจอง");
                            }
                            return inputValue;
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: "Updated!",
                                text: "Your data has been updated.",
                                icon: "success"
                            });
                            document.getElementById('update-form-' + id).submit();
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }


        var openModalButtons = document.querySelectorAll('.open-modal-btn');

        // Loop through each button and attach a click event listener
        openModalButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Get the reservation ID from the data attribute
                var reservationId = this.getAttribute('data-reservation-id');

                // Call the function to show the modal and pass the reservation ID
                showModal(reservationId);
            });
        });
    </script>

@endsection
