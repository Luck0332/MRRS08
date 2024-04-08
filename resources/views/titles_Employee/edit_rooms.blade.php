@extends('layout.Employee')



@section('title', 'จัดการห้องประชุม')
@section('content')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('assets/dist/css/adminlte.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ url('assets/css.buttonadd/add.css') }}"> --}}

    <!-- Main content -->
    <section class="content flex">
        <br>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">แก้ไขห้องประชุม</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                {{-- form กรอกข้อมูล --}}
                <form action="{{ route('titles_Employee.update_rooms', ['rooms' => $rooms]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="room">ห้อง</label>
                        <input type="text" class="form-control" id="room" name="room"
                            placeholder="ห้องประชุม 101">
                    </div>
                    <div class="form-group">
                        <label for="price">ราคา/วัน</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="0000">
                    </div>

                    <div class="form-group">
                        <label for="size_room">ขนาด</label>
                        <select class="form-control" id="size_room" name="size_room">
                            <option value="" disabled selected></option>
                            <option value="S">ขนาดเล็ก</option>
                            <option value="M">ขนาดกลาง</option>
                            <option value="L">ขนาดใหญ่</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="capacity">ความจุของห้อง/คน</label>
                        <input type="text" class="form-control" id="capacity" name="capacity" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="typeroom">ประเภทห้องประชุม</label>
                        <div>
                            <input type="radio" id="public" name="typeroom" value="1" checked />
                            <label for="public">สาธารณะ</label>
                        </div>

                        <div>
                            <input type="radio" id="private" name="typeroom" value="0" />
                            <label for="private">ส่วนบุคคล</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status_room">สถานะห้องประชุม</label>
                        <div>
                            <input type="radio" id="available" name="status_room" value="1" checked />
                            <label for="available">พร้อมใช้งาน</label>
                        </div>

                        <div>
                            <input type="radio" id="unavailable" name="status_room" value="0" />
                            <label for="unavailable">ปรับปรุง</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="typesplit">สามารถแบ่งห้องได้</label>
                        <div>
                            <input type="radio" id="NoSplit" name="typesplit" value="1" checked />
                            <label for="NoSplit">No</label>
                        </div>

                        <div>
                            <input type="radio" id="YesSplit" name="typesplit" value="0" />
                            <label for="YesSplit">Yes</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="notation">หมายเหตุ</label>
                        <input type="text" class="form-control" id="notation" name="notation"
                            placeholder="- โต็ะประชุมขนาดใหญ่ จำนวน 1 โต็ะ">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <button type="reset" class="btn btn-default float-right">Reset</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
