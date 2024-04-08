@extends('layout.Employee')

@section('title', 'จัดการบัญชี')
@section('content')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    {{-- <link rel="stylesaheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/dist/css/add_acc.css') }}">

    {{-- <link rel="stylesheet" href="{{ url('assets/css.buttonadd/add.css') }}"> --}}

    <!-- Main content -->
    <section class="content flex">
        <br>
        <div class="card">
            <div class="card-header"  id="card-header1" >
                <h3 class="card-title" >เพิ่มบัญชีผู้ใช้</h3>
                <a class="fas fa fa-times fa-lg" id="card-icon" style="float: right; color: #ffffff; font-size: 24px;" href="{{ url('/Manage_account') }}"></a>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                 <form action="{{ route('titles_Employee.store') }}" method="post">
                            @csrf
                            @method('post')
                <div class="form-row">

                    {{-- form กรอกข้อมูล --}}

                       <div class="form-box" id="formbox1">

                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Name">
                            </div>
                            <div class="form-group">
                                <label for="username">username:</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="username">
                            </div>
                            <div class="form-group">
                                <label for="password">password:</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="password">
                            </div>

                        </div>
                        <div class="form-box" id="formbox2">

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                                </div>

                                <div class="form-group">
                                    <label for="mobile">Mobile No.:</label>
                                    <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile No.">
                                </div>
                                <label for="position">ตำแหน่ง:</label>
                                <select class="form-control" id="position" name="position">
                                    <option value="" disabled selected>select a position</option>
                                    <option value="e">e</option>
                                    <option value="m">m</option>
                                    <option value="a">a</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="confirm_password">confirm password:</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                    placeholder="confirm password">
                            </div>

                        </div>

                </div>
                    <div class="form-group" id="button">
                        <button type="submit"  class="btn btn-info">submit</button>
                        {{-- <button type="reset" class="btn btn-default float-right">reset</button> --}}
                    </div>
                </form>
            </div>

        </div>

    </section>
@endsection
