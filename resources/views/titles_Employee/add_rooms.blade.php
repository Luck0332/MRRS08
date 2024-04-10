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
    <div class="container">
        <div class="row justify-content-center mt-5" style="width: 1200px;">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Add Room') }}</div>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                {{-- form กรอกข้อมูล --}}
                    <form action="{{ route('titles_Employee.store_rooms') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')


                        <div class="mb-3">
                            <label for="room" class="form-label">{{ __('ห้องประชุม') }}</label>
                            <input type="text" class="form-control @error('room') is-invalid @enderror" id="room" name="room" value="{{ old('room') }}" placeholder="ห้องประชุม 101">
                            @error('room')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">ราคา/วัน</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" placeholder="0000">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-3 justify-content-between">
                            <div class="col-md-5">
                                <label for="size_room" class="form-label">ขนาด</label>
                                <select class="form-control @error('size_room') is-invalid @enderror" id="size_room" name="size_room" value="{{ old('size_room') }}">
                                    <option value="" disabled selected>เลือกขนาด</option>
                                    <option value="S">ขนาดเล็ก</option>
                                    <option value="M">ขนาดกลาง</option>
                                    <option value="L">ขนาดใหญ่</option>
                                </select>
                                @error('size_room')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <label for="capacity" class="form-label">ความจุของห้อง/คน</label>
                                <input type="text" class="form-control @error('capacity') is-invalid @enderror" id="capacity" name="capacity" value="{{ old('capacity') }}" placeholder="">

                                @error('capacity')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 justify-content-between">
                            <div class="col-md-5">
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
                            <div class="col-md-5">
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
                            <input type="text" class="form-control @error('notation') is-invalid @enderror" id="notation" name="notation"
                                placeholder="- โต็ะประชุมขนาดใหญ่ จำนวน 1 โต็ะ">

                            @error('notation')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>


                        {{-- code up load filr image here --}}
                        <div class="form-group">
                            <label for="image">อัปโหลดรูปภาพ (สูงสุด 3 รูป)</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" multiple>
                            <small id="imageHelp" class="form-text text-muted">เลือกรูปภาพได้สูงสุด 3 รูป</small>
                            <!-- แสดงรูปภาพที่เลือก -->
                            <div id="imagePreview" class="mt-2"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Submit</button>
                            <button type="reset" class="btn btn-default float-right">Reset</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('image').addEventListener('change',
        function() {
            var files = this.files;
            if (files.length > 3) {
                alert('คุณสามารถเลือกไฟล์รูปภาพได้สูงสุด 3 รูปเท่านั้น');
                this.value = ''; // ล้างไฟล์ที่เลือกให้ว่าง
                return false;
            }
            var preview = document.getElementById('imagePreview');
            preview.innerHTML = '';
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var reader = new FileReader();
                reader.onload = function(event) {
                    var img = document.createElement('img');
                    img.src = event.target.result;
                    img.style.maxWidth = '100px';
                    img.style.marginRight = '5px';
                    img.style.marginBottom = '5px';
                    preview.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
<<<<<<< HEAD
    <script>
    $(document).ready(function() {
        // Add click event handler to the close button
        $('#closeCard').click(function() {
            // Redirect to the desired route
            window.location.href = '{{url('/Manage_rooms')}}';
        });
    });
    </script>
=======
>>>>>>> parent of 493a3e2 (Merge branch 'Reserveeiuwueiei')
@endsection
