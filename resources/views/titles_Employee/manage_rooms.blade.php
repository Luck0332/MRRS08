@extends('layout.Employee')

@section('title', 'จัดการห้องประชุม')

@section('content')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    .content {
        display: flex;
        margin-top: 20px;
    }

    .card {

    }

    .card-header h3 {
        margin: 0;
    }

    .btn-container {
        margin-bottom: 20px;
    }

    .table th {
        background-color: #3b81f2;
        color: #fff;
    }

    .table th,
    .table td {
        text-align: center;
        vertical-align: middle;
        border: transparent;
    }

    .table th:first-child,
    .table td:first-child {
        text-align: left;
    }

    .table th:last-child,
    .table td:last-child {
        text-align: center;
    }

    .transparent-btn {
        background-color: transparent;
        border-color: transparent;
        color: #000;
        font-size: 24px;
    }

    .delete-btn {
        color: #FF0000 !important;
    }

    .btn-circle {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: #fff;
        border-color: transparent;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        transition: transform 0.2s ease-in-out;
        position: absolute;
        bottom: 20px;
        right: 20px;
    }

    .btn-circle i {
        font-size: 28px;
        color: #5E96EB;
    }

    .btn-circle:hover {
        transform: translateY(-2px);
        background-color: transparent;
        border-color: transparent;
    }

</style>

<section class="content">
    <div class="row justify-content-center" style="width: 1300px; height: 700px;">
        <div class="col">
            <div class="card" >
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10%">No.</th>
                                    <th>Name</th>
                                    <th>Size</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $key => $room)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $room->ro_name }}</td>
                                    <td>
                                        @if ($room->ro_size == 'S')
                                        Small
                                        @elseif($room->ro_size == 'M')
                                        Medium
                                        @else
                                        Large
                                        @endif
                                    </td>
                                    <td>
                                        @if ($room->ro_available == 1)
                                        Available
                                        @else
                                        Unavailable
                                        @endif
                                    </td>
                                    <td>
                                        <form method="post"
                                            action="{{ route('titles_Employee.destroy-rooms', ['rooms' => $room]) }}"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('titles_Employee.edit_rooms', ['rooms' => $room]) }}"
                                                class="btn btn-warning transparent-btn">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <button type="submit" class="btn btn-danger transparent-btn">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="btn-container">
                        <a href="{{ url('/Manage_rooms/add-rooms') }}" class="btn btn-primary btn-circle">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="card-footer clearfix text-center">
                    <ul class="pagination pagination-sm m-0">
                        {!! $rooms->links('pagination::bootstrap-4') !!}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "language": {
                "paginate": {
                    "next": '<i class="fas fa-chevron-right"></i>',
                    "previous": '<i class="fas fa-chevron-left"></i>'
                },
                "search": '<i class="fas fa-search"></i> Search:',
                "zeroRecords": "No matching records found",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "Showing 0 to 0 of 0 entries"
            }
        });
    });

</script>

@endsection
