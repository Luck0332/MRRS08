@extends('layout.Employee')

@section('title', 'Edit User Account')


@section('content')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    {{-- <link rel="stylesaheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('assets/dist/css/adminlte.min.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class="container " >
        <div class="row justify-content-center my-5" style="width: 1200px;">
            <div class="col-md-8 ">
                <div class="card " >
                    <div class="card-header" style="background-color: #5E96EB; color:#fff">{{ __('Edit User Account') }}
                    <i class="fa-solid fa-xmark" id="closeCard" style="position: absolute ;    right: 10px; font-size: 24px" ></i></div>

                    <div class="card-body ">
                        <form method="POST" action="{{ route('titles_Employee.update_user', ['user' => $user]) }}">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3 justify-content-between">
                                <div class="col-md-5">
                                    <label for="first_name" class="form-label">{{ __('First Name') }}</label>
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name', $user->us_fname) }}" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-5">
                                    <label for="last_name" class="form-label">{{ __('Last Name') }}</label>
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name', $user->us_lname) }}" required autocomplete="last_name">

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-between">
                                <div class="col-md-5">
                                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->us_email) }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-5">
                                    <label for="mobile" class="form-label">{{ __('Mobile Number') }}</label>
                                    <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile', $user->us_tel) }}" required autocomplete="mobile">

                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-between">
                                <div class="col-md-5">
                                <label for="username" class="form-label">{{ __('Username') }}</label>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->us_name) }}" required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="col-md-5">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="กรอกรหัสผ่าน 8 หลักขึ้นไป">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="position" class="form-label">{{ __('Position') }}</label>
                                <select id="position" class="form-select @error('position') is-invalid @enderror" name="position" required>
                                    <option value="E" {{ old('position', $user->roles) == 'E' ? 'selected' : '' }}>E</option>
                                    <option value="M" {{ old('position', $user->roles) == 'M' ? 'selected' : '' }}>M</option>
                                    <option value="A" {{ old('position', $user->roles) == 'A' ? 'selected' : '' }}>A</option>
                                </select>

                                @error('position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function() {
        // Add click event handler to the close button
        $('#closeCard').click(function() {
            // Redirect to the desired route
            window.location.href = '{{url('/Manage_account')}}';
        });
    });
</script>
@endsection
