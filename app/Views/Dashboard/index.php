<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda.min.css">
<style>
    .ladda-button {
        background: var(--bs-btn-bg);
        border: 0;
        padding: var(--bs-btn-padding-y) var(--bs-btn-padding-x);
        font-size: var(--bs-btn-font-size);
        cursor: pointer;
        color: #fff;
        border-radius: var(--bs-btn-border-radius);
        border: var(--bs-btn-border-width) solid var(--bs-btn-border-color);
        -webkit-appearance: none;
        -webkit-font-smoothing: antialiased;
        -webkit-tap-highlight-color: transparent;
    }
</style>
<?php $this->endSection();?>
<?php $this->section('isKonten');?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-end">
                                <div class="input-group input-group-sm">
                                    <select class="form-select form-select-sm">
                                        <option value="JA" selected>Jan</option>
                                        <option value="DE">Dec</option>
                                        <option value="NO">Nov</option>
                                        <option value="OC">Oct</option>
                                    </select>
                                    <label class="input-group-text">Month</label>
                                </div>
                            </div>
                            <h4 class="card-title mb-4">Earning</h4>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="text-muted">
                                    <div class="mb-4">
                                        <p>This month</p>
                                        <h4>$2453.35</h4>
                                        <div><span class="badge badge-soft-success font-size-12 me-1"> + 0.2% </span> From previous period</div>
                                    </div>

                                    <div>
                                        <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View Details <i class="mdi mdi-chevron-right ms-1"></i></a>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <p class="mb-2">Last month</p>
                                        <h5>$2281.04</h5>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div id="line-chart" class="apex-charts" data-colors='["--bs-primary"]' dir="ltr"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Sales Analytics</h4>
                        <div>
                            <div id="donut-chart" data-colors='["--bs-primary", "--bs-success", "--bs-danger"]' class="apex-charts"></div>
                        </div>
                        <div class="text-center text-muted">
                            <div class="row" id="chart-data-container">
                            <!-- Chart data will be dynamically populated here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <!-- <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-end">
                                <div class="input-group input-group-sm">
                                    <select class="form-select form-select-sm">
                                        <option value="JA" selected>Jan</option>
                                        <option value="DE">Dec</option>
                                        <option value="NO">Nov</option>
                                        <option value="OC">Oct</option>
                                    </select>
                                    <label class="input-group-text">Month</label>
                                </div>
                            </div>
                            <h4 class="card-title mb-4">Top Selling product</h4>
                        </div>

                        <div class="text-muted text-center">
                            <p class="mb-2">Product A</p>
                            <h4>$ 6385</h4>
                            <p class="mt-4 mb-0"><span class="badge badge-soft-success font-size-11 me-2"> 0.6% <i class="mdi mdi-arrow-up"></i> </span> From previous period</p>
                        </div>

                        <div class="table-responsive mt-4">
                            <table class="table align-middle mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h5 class="font-size-14 mb-1">Product A</h5>
                                            <p class="text-muted mb-0">Neque quis est</p>
                                        </td>

                                        <td>
                                            <div id="radialchart-1" data-colors='["--bs-primary"]' class="apex-charts"></div>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-1">Sales</p>
                                            <h5 class="mb-0">37 %</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="font-size-14 mb-1">Product B</h5>
                                            <p class="text-muted mb-0">Quis autem iure</p>
                                        </td>

                                        <td>
                                            <div id="radialchart-2" data-colors='["--bs-success"]' class="apex-charts"></div>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-1">Sales</p>
                                            <h5 class="mb-0">72 %</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="font-size-14 mb-1">Product C</h5>
                                            <p class="text-muted mb-0">Sed aliquam mauris.</p>
                                        </td>

                                        <td>
                                            <div id="radialchart-3" data-colors='["--bs-danger"]' class="apex-charts"></div>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-1">Sales</p>
                                            <h5 class="mb-0">54 %</h5>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
<?php $this->endSection();?>
<?php $this->section('javascript');?>
<!-- <script src="/assets/js/pages/saas-dashboard.init.js"></script> -->
<script>
$(document).ready(function() {

    $.ajax({
        url: '/dashboard/getpie', 
        method: 'GET',
        dataType: 'json',
        success: function(dataPie) {

        console.log(dataPie.data);

        dataPie.data.forEach(function(item) {
            var html = '<div class="col-4">';
            html += '<div class="mt-4">';
            html += '<p class="mb-2 text-truncate">' + item.prName + '</p>';
            html += '<h5>Rp ' + item.totalSold + '</h5>';
            html += '</div>';
            html += '</div>';

            $('#chart-data-container').append(html);
        });

        updateChart(dataPie.data);
        },
        error: function(error) {
        console.error('Error fetching data:', error);
        }
    });

    function updateChart(data) {
        console.log(data);
        // Extract labels and series from the data
        var labels = data.map(function(item) { return item.prName; });
        var series = data.map(function(item) { return parseFloat(item.total_qty_sold); });

        var donutchartColors = getChartColorsArray("donut-chart");

        // Chart configuration options
        var options = {
        series: series,
        chart: {
            type: "donut",
            height: 262
        },
        labels: labels,
        colors: donutchartColors,
        legend: {
            show: !1
        },
        plotOptions: {
            pie: {
            donut: {
                size: "70%"
            }
            }
        }
        };

        // Create or update the chart
        if (!window.chart) {
        // If the chart does not exist, create a new one
        window.chart = new ApexCharts(document.querySelector("#donut-chart"), options);
        window.chart.render();
        } else {
        // If the chart exists, update its data
        window.chart.updateSeries(series);
        window.chart.updateOptions({ labels: labels });
        }
    }
    

    
});


</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/spin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda.min.js"></script>
<?php $this->endSection();?>