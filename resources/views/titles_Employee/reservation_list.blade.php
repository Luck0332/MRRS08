@extends('layout.Employee')

@section('title', 'รายการจอง')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="{{ url('assets/css.approved/approved.css') }}">
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    <button type="button"  onclick="confirmUpdate('{{ $reservation->id }}')">ยกเลิก</button>
                </form>
                {{-- <i class="fas fa-info-circle fa-lg" style="color: #242424"></i>
            </a> --}}
                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">
                    Launch demo modal
                  </button> --}}
                    {{-- <i class="fas fa-info-circle fa-lg" style="color: #242424">
                <button type="button" style="display: none" onclick="showModal('{{ $reservation->id }}')"></button></i> --}}
                {{-- <a href="#" onclick="showModal('{{ $reservation->id }}')">
                    <i class="fas fa-info-circle fa-lg" style="color: #242424"></i>
                </a> --}}

                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Open modal
                </button> --}}
                <a class="custom-icon" ><i class="fas fa-info-circle fa-lg"  onclick="openModal({{$reservation->id}})"></i></a>
                </form>

            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

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
        const url = `{{ route('get-reservation-details', ['id' => 1]) }}`
        await $.ajax({
            url: `/get-reservation-details/${id}`, // Update the URL according to your route
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
                        <tr>ชื่อ :          ${reserver_information.reserver_fname} ${reserver_information.reserver_lname}</tr>
                        </br><tr>ID Line : ${reserver_information.us_lineid} </tr>
                        </br><tr>เบอร์โทร : ${reserver_information.reserver_tel} </tr>
                        <h2>รายละเอียดการจอง</h2>
                        <tr>วันที่จอง : ${reservations.res_startdate}</tr>                        </br>
                        <tr>วาระการจอง : ${reservations.agenda}</tr>

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

</script>

@endsection
