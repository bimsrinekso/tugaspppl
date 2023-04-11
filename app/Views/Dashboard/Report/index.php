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
        <div class="row">
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
                                    aria-controls="confirm" aria-selected="true">CONFIRMED</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reject-tab" onclick="cbHref(this)" data-bs-toggle="tab"
                                    data-bs-target="#reject" type="button" role="tab" aria-controls="reject"
                                    aria-selected="true">REJECTED</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="confirm" role="tabpanel"
                                aria-labelledby="confirm-tab">
                                <div class="row">
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
                                                        onclick="filterTgl()" type="button">Filter</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <table id="datatable-active" class="table table-striped table-bordered nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Trx ID</th>
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
                                        <?php if($trxDepoCon != null) :?>
                                        <div hidden><?= $i = 1; ?></div>
                                        <?php foreach($trxDepoCon as $listDepo):?>
                                        <tr>
                                            <td>
                                                <?= $i++ ?>
                                            </td>
                                            <td>
                                                <?= date("d-m-Y H:i:s", strtotime($listDepo->tglbuat))?>
                                            </td>
                                            <td>
                                                <?= $listDepo->trxId ?>
                                            </td>
                                            <td>
                                                <?= $listDepo->vaNumber ?>
                                            </td>
                                            <td>
                                                <?= $listDepo->bank ?>
                                            </td>
                                            <td>
                                                <?= $listDepo->holderName ?>
                                            </td>
                                            <td>
                                                Bank Transfer
                                            </td>
                                            <td>
                                                <?= $listDepo->userid ?>
                                            </td>
                                            <td>
                                                <?= $listDepo->senderName ?>
                                            </td>
                                            <td>
                                                <?= $listDepo->currency ?>
                                            </td>
                                            <td>
                                                <?= formatKrw($listDepo->amt) ?>
                                            </td>
                                            <td>
                                                 <?= formatKrw($listDepo->actualAmount) ?>
                                            </td>
                                            <td>
                                                <?= formatKrw($listDepo->amtVa) ?>
                                            </td>
                                            <td>
                                                <?= formatKrw($listDepo->amt - $listDepo->amtVa) ?>
                                            </td>
                                            
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="reject" role="tabpanel" aria-labelledby="reject-tab">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="daterange" class="control-label">Filter Date</label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control"
                                                        placeholder="Choose date range" name="daterangeRej"
                                                        id="daterange" value="" />
                                                </div>
                                                <div class="col-4">
                                                    <button class="btn btn-secondary waves-effect waves-light"
                                                        id="btnFilterRej" data-tabactive="datatable-active"
                                                        onclick="filterTgl()" type="button">Filter</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <table id="datatable-inactive" class="table  table-striped table-bordered nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Trx ID</th>
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
                                        <?php if($trxDepoRej != null):?>
                                            <div hidden><?= $i = 1; ?></div>
                                        <?php foreach($trxDepoRej as $listDepo):?>
                                        <tr>
                                        <td>
                                                <?= $i++ ?>
                                            </td>
                                            <td>
                                                <?= date("d-m-Y H:i:s", strtotime($listDepo->tglbuat))?>
                                            </td>
                                            <td>
                                                <?= $listDepo->trxId ?>
                                            </td>
                                            <td>
                                                <?= $listDepo->vaNumber ?>
                                            </td>
                                            <td>
                                                <?= $listDepo->bank ?>
                                            </td>
                                            <td>
                                                <?= $listDepo->holderName ?>
                                            </td>
                                            <td>
                                                Bank Transfer
                                            </td>
                                            <td>
                                                <?= $listDepo->userid ?>
                                            </td>
                                            <td>
                                                <?= $listDepo->senderName ?>
                                            </td>
                                            <td>
                                                <?= $listDepo->currency ?>
                                            </td>
                                            <td>
                                                <?= formatKrw($listDepo->amt) ?>
                                            </td>
                                            <td>
                                                 <?= formatKrw($listDepo->actualAmount) ?>
                                            </td>
                                            <td>
                                                <?= formatKrw($listDepo->amtVa) ?>
                                            </td>
                                            <td>
                                                <?= formatKrw($listDepo->amt - $listDepo->amtVa) ?>
                                            </td>
                                            
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
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
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="daterange" class="control-label">Filter Date</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" class="form-control" placeholder="Choose date range" name="daterangeAll" id="daterange" value="" />
                                            </div>
                                            <div class="col-4">
                                                <button class="btn btn-secondary waves-effect waves-light" id="btnFilterRun" data-tabactive="datatable-all" onclick="filterWd()" type="button">Filter</a>
                                            </div>
                                        </div>
                                      
                                    </div>
                                </div>
                                <table id="datatable-all" class="table table-bordered table-responsive nowrap w-100">
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
                                        <?php if($dataTrans != null):?>
                                            <div hidden><?= $i = 1; ?></div>
                                            <?php foreach($dataTrans as $listTrans):?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listTrans->idTransRWD ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listTrans->namestatus ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listTrans->paymentMethod ?> 
                                                    </td>
                                                    <td>
                                                        <?= formatKrw($listTrans->rwdAmount) ?>
                                                    </td>
                                                    <td>
                                                        <?= $listTrans->currency ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listTrans->bankName ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listTrans->accountNumber ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listTrans->cusBank ?> 
                                                    </td>
                                                    <td>
                                                        <?= date("d-m-Y", strtotime($listTrans->process))?> 
                                                    </td>
                                                    <td>
                                                        <?= date("d-m-Y", strtotime($listTrans->request))?>
                                                    </td>                                               
                                                    <td>
                                                        <?= $listTrans->remark ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listTrans->operator ?> 
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                        <?php endif; ?>
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
        tableConf = $("#datatable-active").DataTable({
            lengthChange: !1,
            buttons: ["copy", "excel", "pdf"],
            "scrollX": true,
            "bDestroy": true
        });
        tableConf.buttons().container().appendTo("#datatable-active_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
        tableRej = $("#datatable-inactive").DataTable({
            lengthChange: !1,
            buttons: ["copy", "excel", "pdf", "colvis"],
            "scrollX": true,
            "bDestroy": true
        });
        tableRej.buttons().container().appendTo("#datatable-inactive_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
        var tableWithdraw = $("#datatable-all").DataTable({
            lengthChange: !1,
            buttons: ["excel", "colvis", {
                text: 'Confirm',
                action: function ( e, dt, node, config ) {
                    $("#datatable-all").DataTable().search("Confirm").draw();
                },
            },{
                text: 'Rejected',
                action: function ( e, dt, node, config ) {
                    $("#datatable-all").DataTable().search("Rejected").draw();
                }}],
            "scrollX" : true,
            "bDestroy": true
        });
        tableWithdraw.buttons().container().appendTo("#datatable-all_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
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