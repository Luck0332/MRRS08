@extends('layout.Employee')

@section('title', 'Add Room')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <div class="container my-5">
        <div class="row justify-content-center" style="width: 1200px;">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: #5E96EB; color: #fff;">
                        {{ __('Add Room') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('titles_Employee.store_rooms') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="room" class="form-label">{{ __('Room Name') }}</label>
                                <input id="room" type="text" class="form-control @error('room') is-invalid @enderror"
                                    name="room" value="{{ old('room') }}" required autofocus>
                                @error('room')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="price" class="form-label">{{ __('Price per Day') }}</label>
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror"
                                    name="price" value="{{ old('price') }}" required>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="size_room" class="form-label">{{ __('Size') }}</label>
                                <select id="size_room" class="form-select @error('size_room') is-invalid @enderror"
                                    name="size_room" required>
                                    <option value="" disabled selected>Select Size</option>
                                    <option value="S">Small</option>
                                    <option value="M">Medium</option>
                                    <option value="L">Large</option>
                                </select>
                                @error('size_room')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="capacity" class="form-label">{{ __('Capacity') }}</label>
                                <input id="capacity" type="text"
                                    class="form-control @error('capacity') is-invalid @enderror" name="capacity"
                                    value="{{ old('capacity') }}" required>
                                @error('capacity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="typeroom" class="form-label">{{ __('Room Type') }}</label>
                                <div>
                                    <input type="radio" id="public" name="typeroom" value="1" checked>
                                    <label for="public">Public</label>
                                </div>
                                <div>
                                    <input type="radio" id="private" name="typeroom" value="0">
                                    <label for="private">Private</label>
                                </div>
                                @error('typeroom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status_room" class="form-label">{{ __('Room Status') }}</label>
                                <div>
                                    <input type="radio" id="available" name="status_room" value="1" checked>
                                    <label for="available">Available</label>
                                </div>
                                <div>
                                    <input type="radio" id="unavailable" name="status_room" value="0">
                                    <label for="unavailable">Unavailable</label>
                                </div>
                                @error('status_room')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">{{ __('Add Room') }}</button>
                                <a href="{{ route('titles_Employee.manage_rooms') }}"
                                    class="btn btn-secondary">{{ __('Cancel') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('image').addEventListener('change', function() {
            var files = this.files;
            var preview = document.getElementById('imagePreview');
            preview.innerHTML = ''; // Clear existing preview

            if (files.length > 3) {
                alert('You can only select up to 3 images.');
                this.value = ''; // Reset file input to prevent submission
                return false;
            }

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
@endsection
