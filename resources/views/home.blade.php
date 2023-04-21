@extends('layouts.admin')

@section('content-admin')
    <div class="row ">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Products</h5>
                                    <h2 class="mb-3 font-18">{{ $products }}</h2>
                                    <p class="mb-0"><span class="col-green">10%</span> Increase</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/img/banner/1.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15"> Categories</h5>
                                    <h2 class="mb-3 font-18">{{ $categories }}</h2>
                                    <p class="mb-0"><span class="col-orange">09%</span> Decrease</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/img/banner/2.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">tags</h5>
                                    <h2 class="mb-3 font-18">{{ $tags }}</h2>
                                    <p class="mb-0"><span class="col-green">18%</span>
                                        Increase</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/img/banner/3.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Roles</h5>
                                    <h2 class="mb-3 font-18">{{ $roles }}</h2>
                                    <p class="mb-0"><span class="col-green">42%</span> Increase</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/img/banner/4.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <canvas id="user-register" height="150px"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <canvas id="sales_for_mounth" height="300px"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        let year = <?php echo $year; ?>;
        let user = <?php echo $user; ?>;
        let meses = <?php echo $meses; ?>;
        let val_months = <?php echo $val_months; ?>;

        let barChartData = {
            labels: meses,
            datasets: [{
                label: 'usuarios',
                data: val_months,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgb(227, 34, 205, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgb(0, 113, 206, 0.2)',
                    'rgba(240, 208, 225, 0.2)',
                    'rgba(145, 116, 201, 0.2)',
                    'rgba(80, 146, 169, 0.2)',
                    'rgba(0, 0, 246, 0.2)',
                    'rgba(247, 139, 5, 0.2)',
                    'rgba(145, 0, 247, 0.2)',
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(227, 34, 205)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(0, 113, 206)',
                    'rgb(240, 208, 225)',
                    'rgb(145, 116, 201)',
                    'rgb(80, 146, 169)',
                    'rgb(0, 0, 246)',
                    'rgb(247, 139, 5)',
                    'rgb(145, 0, 247)',
                ],
                borderWidth: 1
            }]
        };

        window.onload = function () {
            let ctx = document.getElementById("user-register").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#c1c1c1',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Usuarios registrados por año'
                    }
                }
            });
            let ctx2 = document.getElementById("sales_for_mounth").getContext("2d");
            window.myBar = new Chart(ctx2, {
                type: 'pie',
                data: barChartData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#c1c1c1',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Usuarios registrados por año'
                    }
                }
            });
        };
    </script>
@endsection
