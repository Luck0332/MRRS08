<!-- Stored in resources/views/layouts/master.blade.php -->


<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>

            <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('assets/dist/css/adminlte.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


        <link rel="stylesheet" href="{{ url('assets/dist/css/sidbar.css') }}">

        @section('sidebar')
        <aside>
            <p href="Homepage"> Menu </p>
            <a href="User" class="sidebar-link">
                <i class="" aria-hidden="true"></i>
                จองห้อง
            </a>
            <a href="follow" class="sidebar-link">
                <i class="" aria-hidden="true"></i>
                ติดตามสถานะการจอง
            </a>
        </aside>

        <script>
            const activeLinks = document.querySelectorAll('.sidebar-link ,[href*="' + window.location.pathname + '"]');

            // วนลูปผ่าน element ทั้งหมด
            for (const activeLink of activeLinks) {
                if (activeLink.href.includes(window.location.pathname)) {
                    // ลบ element ออกจาก sidebar
                    activeLink.classList.add('active');

                }else{
                    activeLink.classList.remove('active');
                }
            }

          </script>

            @show
            <div class="container">
                @yield('content')
            </div>
    </body>
</html>
