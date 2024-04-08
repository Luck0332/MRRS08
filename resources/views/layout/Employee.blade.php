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
        <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/dist/css/sidbar.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://kit.fontawesome.com/e71f46c45f.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        @section('sidebar')
        <aside>
            <p href="Homepage"> Menu </p>
            <a href="Employee" class="sidebar-link  ">
              <i class="" aria-hidden="true"></i>
              หน้าหลัก
            </a>
            <a href="Reserve" class="sidebar-link ">
              <i class="" aria-hidden="true"></i>
              จองห้อง
            </a>
            <a href="Petition" class="sidebar-link ">
              <i class="" aria-hidden="true"></i>
              คำร้องขอ
            </a>
            <a href="Reservation_list" class="sidebar-link ">
              <i class="" aria-hidden="true"></i>
              รายการจองห้อง
            </a>
            <a href="Statistics" class="sidebar-link ">
              <i class="" aria-hidden="true"></i>
              สถิติการจอง
            </a>
            <a href="Manage_account" class="sidebar-link ">
              <i class="" aria-hidden="true"></i>
              จัดการบัญชี
            </a>
            <a href="Manage_rooms" class="sidebar-link ">
              <i class="" aria-hidden="true"></i>
              จัดการห้องประชุม
            </a>

            <a href="Accout" id="Accout">
                <i class="" aria-hidden="true"></i>
                Accout
            </a>
            <p id="line"></p>
            <a href="Homepage" id="Logout">
                <i class="" aria-hidden="true"></i>
                ออกจากระบบ
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
          
        <div class="container ">
            @yield('content')
        </div>
    </body>
</html>
