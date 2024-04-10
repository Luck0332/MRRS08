@extends('layout.Employee')

@section('title', 'หน้าหลัก')
@section('content')
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
            /*margin: auto ;*/
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 25px;
            align-items: center;
            display: relative;
        }
        .info{
            margin: 25px;
           /*margin: auto ;*/
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 10px;
            
        }
        .top-content {
        display: grid;
        grid-template-columns: repeat(2, 1fr); /* Two columns */
        grid-template-rows: 1fr;
        gap: 10px;
    }
        .top-left-content{
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: 1fr;
            gap: 10px;
            justify-content: center;
            text-align: center;
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
            background-color: #DCF2F1;
            
        }
        .p {
            margin: 0px;
        }
    </style>
@section('content')
    <div class="container">
        <!-- content in card -->
        <div class="info">
        <div class="top-left-content">
            <div class="item">
                @if (isset($roomStatistics[0]))
                ห้องอันดับที่ 1
                    Room ID: {{ $roomStatistics[0]->id }} - {{ $roomStatistics[0]->ro_name }} มีการจองทั้งหมด{{ $roomStatistics[0]->reservation_count }} reservations
                @endif
            </div>
        <div class="less-pop-room">
            <div class="item">
                @if (isset($roomStatistics[1]))
                    Room ID: {{ $roomStatistics[1]->id }} - {{ $roomStatistics[1]->ro_name }} ({{ $roomStatistics[1]->reservation_count }} reservations)
                @endif
            </div>
            <div class="item">
                @if (isset($roomStatistics[2]))
                    Room ID: {{ $roomStatistics[2]->id }} - {{ $roomStatistics[2]->ro_name }} ({{ $roomStatistics[2]->reservation_count }} reservations)
                @endif
            </div>
        </div>
    </div>
            <!-- /.top-left-content -->

            <!-- top-right-content -->
            <div class="top-right-content">
                <!-- small card -->
                <div class="small-box" style="margin-bottom: 0px; width: 725px; color:#000000; background-color:#ECF4D6">
                    <div class="inner">
                        <h3>{{ $data['wait_reservation_count'] }}</h3>
                        <p>คำขอการจองห้อง</p>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <div class="small-box" style="margin-bottom: 0px; width: 725px; background-color: #DAFFFB;">
                    <div class="inner">
                        <h3>{{ $data['room_count'] }}</h3>
                        <p>จำนวนห้องประชุม</p>
                        <div class="icon">
                            <i class="fas fa-chart-pie" ></i>
                        </div>
                    </div>
                </div>

                <div class="small-box " style="margin-bottom: 0px; width: 725px;  background-color: #E0F4FF;">
                    <div class="inner">
                        <h3>{{ $data['user_count'] }}</h3>
                        <p>จำนวนพนักงาน</p>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.top-right-content -->

            <!-- bot-left-content -->
            <div class="item" style="display: flex; justify-content: center; align-items: center; height: 100%;">   
                <div class="card-header border-0 text-center" style="background-color: transparent;">
                    <div class="card-title " >
                        จำนวนห้อง </div>
                        <div class="container text-center">
                            <canvas id="myDoughnutChart" width="200" height="200"></canvas>
     
                    </div>
                </div>
            </div>
            <!-- bot-left-content -->


            <!-- bot-right-content -->
            
            <div class="item" style="display: flex; justify-content: center; align-items: center; height: 100%;">
                <div class="card-header border-0 text-center" style="background-color: transparent;">
                    <div class="card-title">
                        สถิติการจอง</div>

                        <div class="container">
                            <canvas id="reservationChart" width="550" height="300"></canvas>
                        </div>
                    </div>
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
                    backgroundColor: ['#818FB4', '#435585', '#363062'],
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
    document.addEventListener('DOMContentLoaded', function () {
    fetch('{{ route("reservations.byMonth") }}')
        .then(response => response.json())
        .then(data => {
            console.log(data);

            const months = [];
            const countsA = [];
            const countsR = [];

            // Assuming data contains counts for each month from 1 to 12
            for (let i = 1; i <= 12; i++) {
                months.push(i);
                const countA = data.dataA.find(item => item.month === i)?.count || 0;
                const countR = data.dataR.find(item => item.month === i)?.count || 0;
                countsA.push(countA);
                countsR.push(countR);
            }

            const ctx = document.getElementById('reservationChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'อนุมัติการจอง',
                        data: countsA,
                        backgroundColor:'rgba(75, 192, 192, 1)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: false
                    }, {
                        label: 'ปฏิเสธการจอง',
                        data: countsR,
                        backgroundColor: 'rgba(255, 99, 132, 1)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'เดือน'
                            },
                            type: 'linear',
                            min: 0,
                            max: 12,
                            stepSize: 1
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'จำนวนการจอง'
                            },
                            min: 0, // Start Y-axis at 0
                            max: Math.ceil(Math.max(...countsA, ...countsR) / 10) * 10, // Set max value rounded to the nearest 10
                            ticks: {
                                stepSize: 10 // Set the step size to 10 for scaling by 10
                            }
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
});

</script>

@endsection
