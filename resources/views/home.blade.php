@extends('layouts.app') @section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Dashboard</h2>
    </div>
    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons-outlined">perm_identity</i>
                </div>
                <div class="content">
                    <div class="text">User</div>
                    <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">
                        {{ $user }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons-outlined">ballot</i>
                </div>
                <div class="content">
                    <div class="text">Order</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                        {{ $order }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons-outlined">ballot</i>
                </div>
                <div class="content">
                    <div class="text">Complete</div>
                    <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">
                        {{ $complete }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Bar Chart -->
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div id="barchart_material" style="width: 900px; height: 500px;"></div>
            <br>
            <br>
            <div id="curve_chart" style="width: 900px; height: 500px"></div>
        </div>
    <!-- #END# Bar Chart -->
    <!-- #END# Widgets -->
</div>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var orderChart = <?php echo $orderChart; ?>;
    var data = google.visualization.arrayToDataTable(orderChart);

    var options = {
        chart: {
        title: 'Order chart',
        // subtitle: 'Sales, Expenses, and Profit: 2014-2017',
        },
        bars: 'vertical' // Required for Material Bar Charts.
    };

    var chart = new google.charts.Bar(document.getElementById('barchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Year', 'Sales', 'Expenses'],
        ['2004',  1000,      400],
        ['2005',  1170,      460],
        ['2006',  660,       1120],
        ['2007',  1030,      540]
    ]);

    var options = {
        title: 'Company Performance',
        curveType: 'function',
        legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
    }
</script>

@endsection
