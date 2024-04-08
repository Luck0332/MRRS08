@extends('layout.Employee')

@section('title', 'รายการจอง')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="{{ url('assets/css.approved/approved.css') }}">
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

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
            <th>ขนาดห้อง</th>
            <th>รอดำเนินการ</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reservations as $reservation)
        @if ($reservation->res_status == 'A')
        <tr>
            <td>{{ $reservation->id}}</td>
            <td>{{ $reservation->res_serialcode }}</td>
            <td>{{ $reservation->res_startdate }}</td>
            <td>{{ $reservation->reserver_id }}</td>
            <td>{{ $reservation->res_typeroom }}</td>
            <td>
                <!-- Add update functionality -->
                <form class="btn btn-cancel"
                    action="{{ route('reservation_list_Cancel', ['id' => $reservation->id]) }}"
                    method="POST" id="update-form-{{ $reservation->id }}">
                    @csrf
                    @method('PUT')
                    <button type="button" onclick="confirmUpdate('{{ $reservation->id }}')">ยกเลิก</button>
                </form>
                <a href="#" onclick="showModal('{{ $reservation->id }}')">
                    <i class="fas fa-info-circle fa-lg" style="color: #242424"></i>
                </a>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">รายละเอียด</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" id="modal-content">
                <!-- Reservation details will be loaded here -->
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmUpdate(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            input: 'text',
            inputAttributes: {
                autocapitalize: "off"
            },
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, update it!",
            preConfirm: (inputValue) => {
                if (!inputValue) {
                    Swal.showValidationMessage("Please enter required information");
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
    }

    function showModal(id) {
        $.ajax({
            url: '/get-reservation-details/' + id, // Update the URL according to your route
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#modal-content').html(data.html); // Populate the modal content with the received HTML
                $('#myModal').modal('show'); // Show the modal
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>

@endsection
