@extends('layout.Employee')

@section('title', 'Edit Room')

@section('content')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('assets/dist/css/adminlte.min.css') }}">

    <div class="container my-5">
        <div class="row justify-content-center my-5" style="width: 1200px;">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: #5E96EB; color:#fff">
                        {{ __('Edit Room') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('titles_Employee.update_rooms', ['rooms' => $rooms]) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="room" class="form-label">{{ __('Room Name') }}</label>
                                <input id="room" type="text" class="form-control @error('room') is-invalid @enderror"
                                    name="room" value="{{ old('room', $rooms->room_name) }}" required autocomplete="room"
                                    autofocus>

                                @error('room')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">{{ __('Price per Day') }}</label>
                                <input id="price" type="number"
                                    class="form-control @error('price') is-invalid @enderror" name="price"
                                    value="{{ old('price', $rooms->price_per_day) }}" required autocomplete="price">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-3 justify-content-between">
                                <div class="col-md-5">
                                    <label for="size_room" class="form-label">{{ __('Size') }}</label>
                                    <select id="size_room" class="form-select @error('size_room') is-invalid @enderror"
                                        name="size_room" required>
                                        <option value="S" {{ old('size_room', $rooms->size) == 'S' ? 'selected' : '' }}>Small</option>
                                        <option value="M" {{ old('size_room', $rooms->size) == 'M' ? 'selected' : '' }}>Medium</option>
                                        <option value="L" {{ old('size_room', $rooms->size) == 'L' ? 'selected' : '' }}>Large</option>
                                    </select>

                                    @error('size_room')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-5">
                                    <label for="capacity" class="form-label">{{ __('Capacity') }}</label>
                                    <input id="capacity" type="text"
                                        class="form-control @error('capacity') is-invalid @enderror" name="capacity"
                                        value="{{ old('capacity', $rooms->capacity) }}" required autocomplete="capacity">

                                    @error('capacity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="notation" class="form-label">{{ __('Notation') }}</label>
                                <input id="notation" type="text"
                                    class="form-control @error('notation') is-invalid @enderror" name="notation"
                                    value="{{ old('notation', $rooms->notation) }}" placeholder="- Meeting table, 1 large table">

                                @error('notation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status_room" class="form-label">{{ __('Room Status') }}</label>
                                <select id="status_room" class="form-select @error('status_room') is-invalid @enderror"
                                    name="status_room" required>
                                    <option value="1" {{ old('status_room', $rooms->status) == 1 ? 'selected' : '' }}>Available</option>
                                    <option value="0" {{ old('status_room', $rooms->status) == 0 ? 'selected' : '' }}>Unavailable</option>
                                </select>

                                @error('status_room')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="typeroom" class="form-label">{{ __('ประเภทห้องประชุม') }}</label>
                                <div>
                                    <input type="radio" id="public" name="typeroom" value="1" {{ old('typeroom', $rooms->ro_typeroom) == '1' ? 'checked' : '' }} required>
                                    <label for="public">{{ __('สาธารณะ') }}</label>
                                </div>
                                <div>
                                    <input type="radio" id="private" name="typeroom" value="0" {{ old('typeroom', $rooms->ro_typeroom) == '0' ? 'checked' : '' }} required>
                                    <label for="private">{{ __('ส่วนบุคคล') }}</label>
                                </div>
                                @error('typeroom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
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
<<<<<<< HEAD

=======
                        
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                <a href="{{ route('titles_Employee.edit_rooms', ['rooms' => $rooms]) }}"
                                    class="btn btn-warning" style="background-color: #d9d9d9;border-color: transparent">{{ __('Reset') }}</a>
                            </div>
                            
>>>>>>> parent of 493a3e2 (Merge branch 'Reserveeiuwueiei')
                        </form>
                    </div>
                </div>
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

