<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<!-- DataTables -->
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
<link rel="stylesheet" type="text/css" href="/assets/libs/toastr/build/toastr.min.css">      

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
    .loader {
            margin-top: 10px;
            width: 50px;
            height: 50px;
            border-radius: 100%;
            position: relative;
        }

        /* LOADER 1 */

        #loader-1:before,
        #loader-1:after {
            content: "";
            position: absolute;
            top: -10px;
            left: -10px;
            width: 100%;
            height: 100%;
            border-radius: 100%;
            border: 10px solid transparent;
            border-top-color: #3498db;
        }

        #loader-1:before {
            z-index: 100;
            animation: spin 1s infinite;
        }

        #loader-1:after {
            border: 10px solid #ccc;
        }

        @keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
</style>
<?php $this->endSection();?>
<?php $this->section('isKonten');?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-6">
                <h2>Management Report</h2>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-end">
                    <div class="form-group">
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                            data-bs-target="#filter-container" aria-expanded="false" aria-controls="filter-container"
                            title="Filter & Urutkan Data">
                            <i class="fas fa-filter"></i>
                        </button>
                        <a href="#" class="btn btn-primary" onclick="location.reload();" title="Refresh Data">
                            <i class="fas fa-redo"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-12" id="filter-container">
                <div class="card">
                    <div class="card-body">
                    <div class="column" class="mb-2">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="daterange" class="control-label">Filter Date</label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control"
                                                        placeholder="Choose date range" name="daterangeConf"
                                                        id="daterange" value="" />
                                                </div>
                                                <div class="col-4">
                                                    <button class="btn btn-secondary waves-effect waves-light"
                                                        id="btnFilterCon" data-tabactive="datatable-active"
                                                        onclick="filterTgl()" type="button">Filter</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <button class="btn btn-success waves-effect waves-light"
                                                        id="btnFilterCon" data-tabactive="datatable-active"
                                                        type="button"><i class="fas fa-file-excel"></i> Export to Excel</button>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex flex-wrap align-items-start">
                            <h5 class="card-title me-2">Summary Report</h5>
                        </div>
                        <table id="tableSummary" class="table table-striped table-bordered nowrap w-100">
                            <thead>
                                <th>
                                    Opening Balance
                                </th>
                                <th>
                                    Deposit
                                </th>
                                <th>
                                    VA FEE
                                </th>
                                <th>Withdraw</th>
                                <th>Bank Charge</th>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap align-items-start">
                            <h5 class="card-title me-2">Statistik Per Week <?= $rangeHari ?></h5>
                        </div>
                        <hr class="mb-4">
                        
                        <div class="apex-charts" data-colors='["--bs-primary", "--bs-warning"]' id="area-chart" dir="ltr"></div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Deposit Transaction</h4>
                        <hr>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="confirm-tab" onclick="cbHref(this)"
                                    data-bs-toggle="tab" data-bs-target="#confirm" type="button" role="tab"
                                    aria-controls="confirm" aria-selected="true">ALL</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="confirm" role="tabpanel"
                                aria-labelledby="confirm-tab">
                                <table id="tableDepo" class="table table-striped table-bordered nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Trx ID</th>
                                            <th>Status</th>
                                            <th>Virtual Account</th>
                                            <th>Bank</th>
                                            <th>Holder Name</th>
                                            <th>Payment Method</th>
                                            <th>User ID</th>
                                            <th>Depositor</th>
                                            <th>Currency</th>
                                            <th>Amount</th>
                                            <th>Actual Amount</th>
                                            <th>Fee</th>
                                            <th>Actual Input</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Withdraw Transaction</h4>
                        <hr>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="confirmed-tab" data-bs-toggle="tab" data-bs-target="#confirmed" type="button" role="tab" aria-controls="confirmed" aria-selected="false">ALL</button>
                            </li>
                          </ul> 
                          <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="confirmed" role="tabpanel" aria-labelledby="confirmed-tab">
                                <table id="tableWd" class="table table-bordered table-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trx ID</th>
                                            <th>Status</th>
                                            <th>Payment Method</th>
                                            <th>Amount</th>
                                            <th>Currency</th>
                                            <th>Bank Name</th>
                                            <th>Customer Account Number</th>
                                            <th>Holder Name</th>
                                            <th>Request Date</th>
                                            <th>Processed On</th>
                                            <th>Remark</th>
                                            <th>Operator</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                          </div>
                        
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
<?php $this->endSection();?>
<?php $this->section('javascript');?>
    <!-- Required datatable js -->
    <script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="/assets/libs/jszip/jszip.min.js"></script>
    <script src="/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

    <!-- Responsive examples -->
    <script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- date range -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- Datatable init js -->
    <script src="/assets/js/pages/datatables.init.js"></script>
    <!-- validation init -->
    <script src="/assets/js/pages/validation.init.js"></script>
    <script src="/assets/libs/toastr/build/toastr.min.js"></script>

    <!-- toastr init -->
    <script src="/assets/js/pages/toastr.init.js"></script>
    <script src="/assets/js/tableReport.js"></script>
    <script src="/assets/js/plugins/service/tableReport.js"></script>
    <!-- apexcharts -->
    <script src="/assets/libs/apexcharts/apexcharts.min.js"></script>
<?php if(session()->getFlashdata('sukses')):?>
        <script>
              toastr.success("<?= session()->getFlashData("sukses"); ?>");
        </script>
    <?php elseif(session()->getFlashdata('error')):?>
        <script>
            toastr.error("<?= session()->getFlashData("error"); ?>");
        </script>
    <?php endif?>
<script>
    var weekDeposit = "<?php echo json_encode($weekDeposit); ?>;";
    weekDeposit = weekDeposit.split(",");
    var weekWithdraw = "<?php echo json_encode($weekWithdraw); ?>;"
    weekWithdraw = weekWithdraw.split(",");
    $(document).ready(function () {
        tableSummary = $("#tableSummary").DataTable({
            lengtChange: !1,
            "scrollX": true,
            "bDestroy": true
        })
        // tableConf = $("#datatable-active").DataTable({
        //     lengthChange: !1,
        //     "scrollX": true,
        //     "bDestroy": true
        // });
        tableRej = $("#datatable-inactive").DataTable({
            lengthChange: !1,
            "scrollX": true,
            "bDestroy": true
        });
        var tableWithdraw = $("#datatable-all").DataTable({
            lengthChange: !1,
            "scrollX" : true,
            "bDestroy": true
        });
        targetFilter = $("#btnFilterCon").data("tabactive");
        $('input[name="daterangeConf"]').daterangepicker({
            timePicker: true,
            autoUpdateInput: false,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                cancelLabel: 'Clear',
                format: 'DD/MM/YYY hh:mm A'
            }
        });
        $('input[name="daterangeConf"]').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY hh:mm A') + ' - ' + picker.endDate.format(
                'DD/MM/YYYY hh:mm A'));
        });
        $('input[name="daterangeConf"]').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });
        $('input[name="daterangeRej"]').daterangepicker({
            timePicker: true,
            autoUpdateInput: false,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                cancelLabel: 'Clear',
                format: 'DD/MM/YYY hh:mm A'
            }
        });
        $('input[name="daterangeRej"]').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY hh:mm A') + ' - ' + picker.endDate.format(
                'DD/MM/YYYY hh:mm A'));
        });
        $('input[name="daterangeRej"]').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });
        $('input[name="daterangeAll"]').daterangepicker({
            timePicker: true,
            autoUpdateInput: false,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                cancelLabel: 'Clear',
                format: 'DD/MM/YYY hh:mm A'
            }
        });
        $('input[name="daterangeAll"]').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY hh:mm A') + ' - ' + picker.endDate.format(
                'DD/MM/YYYY hh:mm A'));
        });
        $('input[name="daterangeAll"]').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });
    });

    function getChartColorsArray(e) {
        if (null !== document.getElementById(e)) {
            var t = document.getElementById(e).getAttribute("data-colors");
            if (t) return (t = JSON.parse(t)).map(function (e) {
                var t = e.replace(" ", "");
                if (-1 === t.indexOf(",")) {
                    var r = getComputedStyle(document.documentElement).getPropertyValue(t);
                    return r || t
                }
                var a = e.split(",");
                return 2 != a.length ? t : "rgba(" + getComputedStyle(document.documentElement)
                    .getPropertyValue(a[0]) + "," + a[1] + ")"
            });
            console.warn("data-colors Attribute not found on:", e)
        }
    }
    var options, chart, areaChartColors = getChartColorsArray("area-chart");
    areaChartColors && (options = {
        series: [{
            name: "Deposit",
            data: weekDeposit
        }, {
            name: "Withdraw",
            data: weekWithdraw
        }],
        chart: {
            height: 350,
            type: "area",
            toolbar: {
                show: !1
            }
        },
        colors: areaChartColors,
        dataLabels: {
            enabled: !1
        },
        stroke: {
            curve: "smooth",
            width: 2
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                inverseColors: !1,
                opacityFrom: .45,
                opacityTo: .05,
                stops: [20, 100, 100, 100]
            }
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return cvUang.format(value);
                }
            },
        },
        xaxis: {
            categories: ["Sun", "Mon", "Tues", "Wed", "Thus", "Fri", "Sat"],
            labels: {
                formatter: function (value) {
                    return value;
                }
            }
        },
        markers: {
            size: 3,
            strokeWidth: 3,
            hover: {
                size: 4,
                sizeOffset: 2
            }
        },
        legend: {
            position: "top",
            horizontalAlign: "right"
        }
    }, (chart = new ApexCharts(document.querySelector("#area-chart"), options)).render());
</script>
<?php $this->endSection();?>