@extends('layouts.shop')

@section('content')
<div id="layoutSidenav_content">

    <main>
        <div class="container-fluid">
            <h1 class="mt-4" ><i class="fas fa-store mr-1"></i> ร้านของฉัน</h1><br>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-calculator mr-1"></i> ภาพรวม</div>
                        <div class="card-body">
                            <h1>{{($total)}}</h1>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-plus mr-1"></i> <i class="fas fa-minus mr-1"></i> เตือนนี้</div>
                        <div class="card-body">
                            <h1>{{($currentmonth)}}</h1>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-chart-area mr-1"></i> ยอดขายรายเดือน</div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                        <div class="card-footer small text-muted">Updated </div>
                    </div>
                </div>
                
                

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

@section('singlescript')
{{-- 
  <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
--}}
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
            ],
            datasets: [{
                label: "totalsale",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [   
                      @foreach($report as $month)
                          {{ $month . ','}}                                                                        
                      @endforeach
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: {{$maxvalue}},
                        maxTicksLimit: 5
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: false
            }
        }
    });

</script>
@endsection
