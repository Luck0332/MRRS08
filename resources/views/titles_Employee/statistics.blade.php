@extends('layout.Employee')

@section('title', 'สถิติการจอง')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('assets/dist/css/adminlte.min.css') }}">
        <!-- Bootstrap JS and Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .box-dashboard{
            background-color: rgb(255, 255, 255);
            width: 1320px ;
            margin: 75px;
            /*margin: auto ;*/
            border: black solid 5px;/*ทำไว้ดูเสร็จแล้วให้ลบทิ้ง*/
            border-radius: 25px;
            align-items: center;
        }
        .info{
            height: 753px;
            margin: 25px;
           /*margin: auto ;*/
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 10px;
        }
        .top-left-content{
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: 1fr;
            gap: 10px;
        }
        .less-pop-room{
            display: grid;
            grid-template: repeat(2, 1fr);
            gap: 10px;
        }
        .top-right-content{
            display: grid;
            grid-template: repeat(3, 1fr);
            gap: 10px;
        }
        .item{
            background-color: #fffbcfdc;
        }
        .p {
            margin: 0px;
        }
        .inner{
            width: 100px !important;
        }
    </style>
@section('content')
    <div class="box-dashboard">
        <!-- content in card -->
        <div class="info">
            <!-- top-left-content -->
            <div class="top-left-content">
                <div class="item">
                    first
                </div>
                <div class="less-pop-room">
                    <div class="item">
                        second
                    </div>
                    <div class="item">
                        third
                    </div>
                </div>
            </div>
            <!-- /.top-left-content -->

            <!-- top-right-content -->
            <div class="top-right-content">
                <!-- small card -->
                <div class="small-box bg-success" style="margin-bottom: 0px; width: 725px; height: 112.625px;">
                    <div class="inner">
                        <h3>53</h3>
                        <p">Total Booking Revenue</p>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <div class="small-box bg-danger" style="margin-bottom: 0px; width: 725px; height: 112.625px;">
                    <div class="inner">
                        <h3>{{ $data['room_count'] }}</h3>
                        <p>Total Conference Rooms</p>
                        <div class="icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>
                <div class="small-box bg-warning" style="margin-bottom: 0px; width: 725px; height: 112.625px; color:rgb(255, 255, 255) !important;">
                    <div class="inner">
                        <h3>{{ $data['user_count'] }}</h3>
                        <p>Registered Users</p>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.top-right-content -->

            <!-- bot-left-content -->
            <div class="item">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Reservation</h3>
                        <a href="javascript:void(0);">View Report</a>
                    </div>
                </div>
                <!-- d-flex -->
                <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span class="text-bold text-lg">$18,230.00</span>
                        <span>Reservations Over Time</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-success">
                            <i class="fas fa-arrow-up"></i> 33.1%
                        </span>
                        <span class="text-muted">Since last month</span>
                    </p>
                </div>
                <!-- /.d-flex -->
                <div class="position-relative mb-4">

                </div>
                <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                        <i class="fas fa-square text-green"></i> Approve
                    </span>
                    <span>
                        <i class="fas fa-square text-red"></i> Reject
                    </span>
                </div>
            </div>
            <!-- bot-left-content -->

            <!-- bot-right-content -->
            <div class="item justify-content-center">
                <div class="card-header border-0 justify-content-center">
                    <div class="card-title justify-content-center" >
                        <i class="far fa-chart-bar"></i>
                        จำนวนห้อง
                        <div class="container justify-content-center">
                            <canvas id="myDoughnutChart" width="300" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.bot-right-content -->
        </div>
        <!-- /.content in card -->
    </div>


<script>
    // JavaScript code for creating the doughnut chart
    var roomSizesData = @json($data['room_sizes']);
    var ctx = document.getElementById('myDoughnutChart').getContext('2d');

    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['ห้องขนาดเล็ก', 'ห้องขนาดกลาง', 'ห้องขนาดใหญ่'],
            datasets: [{
                    label: 'Room Sizes',
                    data: Object.values(roomSizesData), // Use room size counts from PHP variable
                    backgroundColor: ['#ff6384', '#36a2eb', '#ffce56'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(2) ;
                        }
                    }
                }
            }
        }
    });
</script>

@endsection
