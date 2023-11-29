@extends('backend.header')
@section('title', 'Dashboard')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalOrders }}</h3>
                            <p>Số đơn hàng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$totalProducts}}</h3>
                            <p>Số lượng sản phẩm</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $totalUsers }}</h3>
                            <p>Số tài khoản</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$totalManu}}</h3>
                            <p>Hãng sản phẩm</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-font-weight">Biểu đồ đơn hàng hằng ngày</h3>
                        <canvas id="orderChart" width="400" height="200"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-font-weight">Biểu đồ sản phẩm hằng ngày theo loại</h3>
                        <canvas id="CategoryChart" width="400" height="200"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-font-weight">Biểu đồ sản phẩm theo hãng</h3>
                        <canvas id="ManuChart" width="400" height="200"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-font-weight">Biểu đồ sản phẩm theo loại</h3>
                        <canvas id="CateroriesChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script>
        $(document).ready(function() {
            //Đơn hàng
            $.ajax({
                url: "{{ route('getOrderData') }}",
                method: 'GET',
                success: function(data) {
                    var dates = [];
                    var counts = [];

                    data.forEach(function(item) {
                        dates.push(item.date);
                        counts.push(item.count);
                    });

                    var ctx = document.getElementById('orderChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: dates,
                            datasets: [{
                                label: 'Đơn hàng hằng ngày',
                                data: counts,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                },
                error: function(error) {
                    console.log('Error:', error); // Log any errors
                },
            });
            //Loại sản phẩm
            $.ajax({
                url: "{{ route('getCategoryData') }}",
                method: 'GET',
                success: function(data) {
                    var dates = [];
                    var counts = [];

                    data.forEach(function(item) {
                        dates.push(item.date);
                        counts.push(item.count);
                    });

                    var ctx = document.getElementById('CategoryChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: dates,
                            datasets: [{
                                label: 'Sản phẩm hằng ngày theo loại',
                                data: counts,
                                backgroundColor: '#ffc107',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                },
                error: function(error) {
                    console.log('Error:', error); // Log any errors
                },
            });
            //Sản phẩm theo hãng
            $.ajax({
                url: "{{ route('getManuData') }}",
                method: 'GET',
                success: function(data) {
                    var dates = [];
                    var counts = [];
                    var name = [];

                    data.forEach(function(item) {
                        dates.push(item.date);
                        counts.push(item.count);
                        name.push(item.brand);
                    });

                    var ctx = document.getElementById('ManuChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: name,
                            datasets: [{
                                label: 'Sản phẩm theo hãng',
                                data: counts,
                                backgroundColor: '#28a745',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                },
                error: function(error) {
                    console.log('Error:', error); // Log any errors
                },
            });
            //Sản phẩm theo loại
            $.ajax({
                url: "{{ route('getCategoryChart') }}",
                method: 'GET',
                success: function(data) {
                    var dates = [];
                    var counts = [];
                    var categories = [];

                    data.forEach(function(item) {
                        dates.push(item.date);
                        counts.push(item.count);
                        categories.push(item.category);
                    });

                    var ctx = document.getElementById('CateroriesChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: categories,
                            datasets: [{
                                label: 'Sản phẩm theo hãng',
                                data: counts,
                                backgroundColor: '#17a2b8',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                },
                error: function(error) {
                    console.log('Error:', error); // Log any errors
                },
            });
        });
    </script>
@endsection
