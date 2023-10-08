<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<!-- DataTables -->
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<?php $this->endSection();?>
<?php $this->section('isKonten');?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">List Deposit</h4>
                        <div class="card-title-desc">
                            <p>All Running and Expired Deposit in here
                            </p>
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="running-tab" onclick="cbHref(this)" data-bs-toggle="tab" data-bs-target="#running" type="button" role="tab" aria-controls="running" aria-selected="true">RUNNING</button>
                            </li>
                            <li class="nav-item" role="presentation" >
                              <button class="nav-link" id="expired-tab"  onclick="cbHref(this)" data-bs-toggle="tab" data-bs-target="#expired" type="button" role="tab" aria-controls="expired" aria-selected="false">EXPIRED</button>
                            </li>
                          </ul> 
                          <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="running" role="tabpanel" aria-labelledby="running-tab">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="daterange" class="control-label">Filter Date</label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="Choose date range" name="daterangeRun" id="daterange" value="" />
                                                </div>
                                                <div class="col-4">
                                                    <button class="btn btn-secondary waves-effect waves-light" id="btnFilterRun" data-tabactive="depoRun" onclick="filterTgl('#depoRun')" type="button">Filter</a>
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                                <table id="depoRun" class="table table-bordered  nowrap " style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Trx ID</th>
                                        <th>Order Number</th>
                                        <th>Account Number</th>
                                        <th>Bank</th>
                                        <th>Holder Name</th>
                                        <th>Payment Method</th>
                                        <th>Depositor</th>
                                        <th>Currency</th>
                                        <th>Depo At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="expired" role="tabpanel" aria-labelledby="expired-tab">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="daterange" class="control-label">Filter Date</label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="Choose date range" name="daterangeExp" id="daterange" value="" />
                                                </div>
                                                <div class="col-4">
                                                    <button class="btn btn-secondary waves-effect waves-light" id="btnFilterExp" data-tabactive="depoExpired" onclick="filterTgl('#depoExpired')" type="button">Filter</a>
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                                <table id="depoExpired" class="table table-striped table-bordered nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trx ID</th>
                                            <th>Order Number</th>
                                            <th>Account Number</th>
                                            <th>Bank</th>
                                            <th>Holder Name</th>
                                            <th>Payment Method</th>
                                            <th>Depositor</th>
                                            <th>Currency</th>
                                            <th>Depo At</th>
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
<!-- End Page-content -->
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

<!-- Datatable init js -->
<script src="/assets/js/pages/datatables.init.js"></script>
<!-- date range -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.33/moment-timezone-with-data.min.js"></script>
<!-- validation init -->
<script src="/assets/js/pages/validation.init.js"></script>
<script src="/assets/js/plugins/service/columnDeposit.js"></script>
<script src="/assets/js/plugins/service/generateTable.js"></script>

<script>
    var targetFilter;
    var tableRun;
    var tableExp;
    var targetTgl = 'Run';

    function cbHref(isi) {
        var target = $(isi).data("bs-target");
        if (target == "#running") {
            targetFilter = "depoRun";
            targetTgl = 'Run';
        } else {
            targetFilter = "depoExpired";
            targetTgl = "Exp";
        }
    }

    function filterTgl(targetFilter) {
        var tgl = $('input[name="daterange' + targetTgl + '"]').val();
        var splitTgl = tgl.split('-');
        var startDate = formatDate(splitTgl[0], false);
        var endDate = formatDate(splitTgl[1], true);
        var table = targetFilter == "depoRun" ? $("#depoRun tbody") : $("#depoExpired tbody");
        if(tgl == ''){
            generateTable(targetFilter, '/dashboard/monitorDepo', columnListDpHc, orderListDpHc);
        }else{
            generateTable(targetFilter, '/dashboard/monitorDepo', columnListDpHc, orderListDpHc, startDate, endDate);
        }
    }
    $(document).ready(function () {
        generateTable('#depoRun', '/dashboard/monitorDepo', columnListDpHc, orderListDpHc);
        generateTable('#depoExpired', '/dashboard/monitorDepo', columnListDpHc, orderListDpHc);
        targetFilter = $("#btnFilterRun").data("tabactive");
        ['daterangeRun', 'daterangeExp'].forEach(function (inputName) {
            $('input[name="' + inputName + '"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear',
                    format: 'DD/MM/YYYY'
                }
            });

            $('input[name="' + inputName + '"]').on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });

            $('input[name="' + inputName + '"]').on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });
        });

        $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
            $.fn.dataTable
                .tables({
                    visible: true,
                    api: true
                })
                .columns.adjust();
        });

    });
</script>
<?php $this->endSection();?>