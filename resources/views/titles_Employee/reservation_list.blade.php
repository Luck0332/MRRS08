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
                <form class="btn btn-cancel"
                action="{{ route('get-reservation-details', ['id' => $reservation->id]) }}"
                method="POST" id="update-form-{{ $reservation->id }}">
                @csrf
                @method('GET')
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Open modal
                  </button>
                </form>

            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

</div>
{{-- <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <p>This is a modal. You can put whatever content you want here.</p>
    </div>

  </div> --}}
</div>

{{-- <!-- The Modal -->
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
</div> --}}

{{-- <div class="modal fade show" id="exampleModalScrollable" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-modal="true" role="dialog" style="display: block;">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>This is some placeholder content to show the scrolling behavior for modals. We use repeated line breaks to demonstrate how content can exceed minimum inner height, thereby showing inner scrolling. When content becomes longer than the prefedined max-height of modal, content will be cropped and scrollable within the modal.</p>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          <p>This content should appear at the bottom after you scroll.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}


<!-- The Modal -->
 <div class="modal" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
  <div class="modal-content" id="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" id="modal-header">
      <h4 class="modal-title" >รายละเอียด</h4>
      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <h2>รายละเอียดผู้จอง</h2>
          @foreach ($data2 as $reserver_informations)
      <tr>{{ $reserver_informations->reserver_fname}}</tr>
      <tr>{{ $reserver_informations->us_lineid }}</tr>
      <tr>{{ $reserver_informations->reserver_tel }}</tr>
      @endforeach
          <h2>รายละเอียดการจอง</h2>
          @foreach ($data3 as $reserver_information)
          <tr>{{ $reserver_information->ro_name}}</tr>
          <tr>{{ $reserver_information->ro_description }}</tr>

          @endforeach
          <h2>รายละเอียดห้อง</h2>
          @foreach ($data2 as $rooms)
          <tr>{{ $rooms->ro_name}}</tr>
          <tr>{{ $rooms->ro_description }}</tr>
          @if ($rooms->ro_typeroom == '1')
          <tr>"สาธารณะ"</tr>
          @else
          <tr>"ส่วนบุคคล"</tr>
          @endif
          @endforeach
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

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

    // function showModal(id) {
    // $.ajax({
    //     url: '/get-reservation-details/' + id, // Update the URL according to your route
    //     type: 'GET',
    //     dataType: 'json',
    //     success: function(data) {
    //         $('#modal-content').html(data.html); // Populate the modal content with the received HTML
    //         $('#myModal').modal('show'); // Show the modal
    //     },
    //     error: function(xhr, status, error) {
    //         console.error(xhr.responseText);
    //     }
    // });


    // Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("openModalBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
function showModal(id) {
    // สร้าง HTML สำหรับแสดงรายละเอียดผู้จองและข้อมูลการจอง
    var modalContent = `
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" id="modal-content">
                    <div class="modal-header" id="modal-header">
                        <h4 class="modal-title">รายละเอียด</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <h2>รายละเอียดผู้จอง</h2>
                        <ul>
                            <li>First Name: John</li>
                            <li>Last Name: Doe</li>
                            <li>Email: john@example.com</li>
                        </ul>
                        <h2>รายละเอียดการจอง</h2>
                        <ul>
                            <li>Start Date: 2024-04-10</li>
                            <li>End Date: 2024-04-12</li>
                            <li>Room Type: Single Room</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    `;

    // แสดงกล่องโต้ตอบของ Swal.fire() พร้อม HTML ที่สร้างขึ้น
    Swal.fire({
        html: modalContent
    });
}


</script>

@endsection
