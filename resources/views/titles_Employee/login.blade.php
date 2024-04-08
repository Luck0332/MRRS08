<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('assets/dist/css/adminlte.min.css') }}">
    <!-- boootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <Style>
        h1{
            font-family: 'Inter';
            font-style: italic;
            font-weight: 900;
            font-size: 80px;
            line-height: 97px;
            color: #718BED;
            border: 1px solid #FFFFFF;
            text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        }
        .image-container{
            width: 200px;
            height: 300px;
        }
        .input-group{
            border-radius: 20px;
        }
        .input-group-text{
            background: #718BED;
            border: 1px solid #000000;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
        }
        .form-control{
            border: 1px solid #000000;
            border-radius: 10px;
        }
        .fas{
            color: #FFFFFF;
        }
        .btn-login{
            width: 252px;
            background: rgba(68, 109, 255, 0.616246);
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            text-align: center;
            margin: 0 auto;
        }
        #log-bot{
            font-family: sans-serif; /* Or a specific font name */
            font-weight: bold;
            color: #fff;
        }
    </Style>
</head>
<body>
    <!--full sceen -->
    <div class="container-fluid min-vh-100 d-flex p-0">
        <!-- relative logo hiding-->
        <div class="container-fluid d-none d-md-flex align-items-center justify-content-center flex-grow-1" style="background: linear-gradient(180deg, #5070E8 0%, rgba(80, 112, 232, 0.636) 57.4%, #97CCF2 100%);">
            <img src="{{ url('assets\dist\img\LOGOMRRS.png') }}" alt="LOGOMRRS">
        </div>
        <!-- relative login box-->
        <div class="container-fluid d-flex align-items-center justify-content-center max-width-md p-0">
            <div class="container-fluid d-flex justify-content-center max-width-md">
                <div style="transform: scale(1.20);">
                    <h1 style="margin: 10px;"><b>Welcome</b></h1>
                    <div class="card-body mb-5">
                        <div class="mb-5">
                            <form action="{{ url('login') }}" method="post">
                        @csrf
                        <div class="input-group mb-4">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            <input type="text"  name="username"class="form-control" placeholder="Username">
                        </div>
                        <div class="input-group mb-5">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="btn-login">
                            <button type="submit" class="btn" id="log-bot">Login</button>
                        </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- /.login-box -->
    </div>
<!-- jQuery -->
<script src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
