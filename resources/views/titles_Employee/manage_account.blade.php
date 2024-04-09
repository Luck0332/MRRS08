@extends('layout.Employee')

@section('title', 'User Account Management')
@section('content')
        <title>User Account Management</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Bootstrap CSS -->
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ url('assets/css.buttonadd/add.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        {{--style นี้ท่าไม่ใช้หรืออยากเปลี่ยน หรือจะเอาไปแยกไฟล์จัดการได้เลย--}}
        <style>
            .content {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .card {
                width: 1300px;
                height: 700px;
            }

            .card-header h3 {
                margin: 0;
            }

            .btn-container {
                margin-bottom: 20px;
            }

            .table td,
            .table th {
                vertical-align: middle;
                border: transparent;
                

            }
            .table th{
                background-color: #3b81f2;
                color: #fff;
            }

            .btn-danger {
                margin-left: 5px;
            }

            .table {
                width: 100%;
            }

            .table th,
            .table td {
                text-align: center;
                vertical-align: middle;
                
            }

            .table th:first-child,
            .table td:first-child {
                text-align: left;
            }

            .table th:last-child,
            .table td:last-child {
                text-align: right;
            }
            .transparent-btn {
                background-color: transparent;
                border-color: transparent; /* Adjust border color as needed */
                color: #000000;
                font-size: 24px;
            }
            .delete-btn{
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
                bottom: 20px; /* Adjust the button position */
            }

            .btn-circle i {
                font-size: 28px;
                color: #5E96EB;
            }
            .btn-circle:hover {
                background-color: transparent;
                transform: translateY(-2px);
                border-color: transparent;
            }


        </style>


        {{--พวก section div ต่างอันไหนท่าไม่ได้ใช้ตกแต่ง ลบทิ้งได้ท่าไม่ได้เกี่ยวกับตัวระบบ--}}
        <section class="content " >
            <div class="row justify-content-center" >
                <div class="col">
                    {{--ตัว card กล่องทั้งหมด--}}
                    <div class="card" style="border-color: transparent;">
                        {{--ตัว card--}}
                        <div class="card-body" style="padding: 0px; border-color:transparent"  >

                            <div class="table-responsive-md" >
                                <table class="table table-bordered">
                                    <thead>
                                        {{--ตารางหัว culum --}}
                                        <tr>
                                            <th style="width: 10%">No.</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Mobile No.</th>
                                            <th>Start Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        {{--loop แสดงข้อมูล culum --}}
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $user->us_name }}</td>
                                                <td>{{ $user->us_fname }} {{ $user->us_lname }}</td>
                                                <td>{{ $user->us_tel }}</td>
                                                <td>{{ $user->startdate }}</td>
                                                <td>
                                                    <form id="delete-form-{{ $user->id }}" method="POST" action="{{ route('titles_Employee.destroy-user', ['user' => $user]) }}" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('titles_Employee.edit_user', ['user' => $user->id]) }}" class="btn btn-warning transparent-btn">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button type="button" onclick="deleteUser('{{ $user->id }}')" class="btn btn-danger transparent-btn" style="color: #FF0000;">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="btn-container d-flex justify-content-end mt-3">
                                <a href="{{ url('/Manage_account/add-user') }}" class="btn btn-primary btn-circle">
                                    <i class="fas fa-plus"></i>
                                    </a>
                            </div>
                        </div>
                        {{--ด้านใต้ card--}}
                        <div class="card-footer clearfix text-center">
                            
                            <ul class="pagination pagination-sm m-0">
                                {!! $users->links('pagination::bootstrap-4') !!}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
        <script>
            function deleteUser(userId) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                            
                        });

                        document.getElementById('delete-form-' + userId).submit();
                    }
                });
            }
        </script>
    </html>
@endsection

