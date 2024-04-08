@extends('layout.Employee')



@section('title', 'จัดการห้องประชุม')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable({

                });
            });
        </script>

    </head>

    <body>
        wekekkkkkkk
        <br>
        <div class="btn-container">
            <a href="{{ url('/Manage_rooms/add-rooms') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add
                Room</a>
        </div>
        <table id="example" class="display" style="width:110%">
            <thead>
                <tr>
                    <th style="width: 10%">No.</th>
                    <th>Name</th>
                    <th>size</th>
                    <th>status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $rooms)
                    <tr>
                        <td>{{ $rooms->id }}</td>
                        <td>{{ $rooms->ro_name }}</td>
                        <td>
                            @if ($rooms->ro_size == 'S')
                                Small
                            @elseif($rooms->ro_size == 'M')
                                Medium
                            @else
                                Large
                            @endif
                        </td>
                        <td>
                            @if ($rooms->ro_avaliable == 1)
                                Available
                            @else
                                Unavailable
                            @endif
                        </td>
                        <td>
                            <form method="post" action="{{ route('titles_Employee.destroy-rooms', ['rooms' => $rooms]) }}"
                                style="display: inline;">
                                <a href="{{ route('titles_Employee.edit_rooms', ['rooms' => $rooms]) }}"
                                    class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" value="Delete"><i
                                        class="fas fa-trash-alt"></i> Delete</button>
                            </form>
                            <a href="" class="btn btn-warning"><i
                                    class="fas fa-edit"></i> i</a>
                        </td>
                    </tr>
                @endforeach

        </table>

    </body>

    </html>

@endsection
