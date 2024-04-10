@extends('layout.Employee')

@section('title', 'Add User Account')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5" style="width: 1200px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Add User Account') }}</div>

                <div class="card-body" >
                    <form method="POST" action="{{ route('titles_Employee.store') }}">
                        @csrf

                        <!-- First Name and Last Name -->
                        <div class="row mb-3 justify-content-between">
                            <div class="col-md-5">
                                <label for="first_name" class="form-label">{{ __('First Name') }}</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <label for="last_name" class="form-label">{{ __('Last Name') }}</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email and Mobile Number -->
                        <div class="row mb-3 justify-content-between">
                            <div class="col-md-5">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <label for="mobile" class="form-label">{{ __('Mobile Number') }}</label>
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required >
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Username, Position, and Password -->
                        <div class="row mb-3 justify-content-between">
                            <div class="col-md-5">
                                <label for="username" class="form-label">{{ __('Username') }}</label>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <label for="position" class="form-label">{{ __('Position') }}</label>
                                <select id="position" class="form-select @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}" required>
                                    <option value="" disabled selected>Select a position</option>
                                    <option value="E">E</option>
                                    <option value="M">M</option>
                                    <option value="A">A</option>
                                </select>
                                @error('position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <!-- Password and Confirm Password -->
                        <div class="row mb-3 justify-content-between">
                            <div class="col-md-5">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="กรอกรหัสผ่าน 8 หลักขึ้นไป">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <label for="confirm_password" class="form-label">{{ __('Confirm Password') }}</label>
                                <input id="confirm_password" type="password" class="form-control" name="confirm_password" required placeholder="ยืนยันรหัสผ่าน">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Add User') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
