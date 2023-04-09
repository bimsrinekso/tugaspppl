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

                        <h4 class="card-title">List Transaction</h4>
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
                                            <th>Last Balance</th>
                                            <th>Depo At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($dataCon != null) :?>
                                        <div hidden><?= $i = 1; ?></div>
                                            <?php foreach($dataCon as $listTrans):?>
                                            <tr>
                                                <td>
                                                    <?= $i++ ?>
                                                </td>
                                                <td>
                                                    <?= $listTrans->trxId?>
                                                </td>
                                                <td>
                                                    <?= $listTrans->vaNumber?>
                                                </td>
                                                <td>
                                                    <?= $listTrans->bank?>
                                                </td>
                                                <td>
                                                    <?= $listTrans->holderName ?>
                                                </td>
                                                <td>
                                                    Bank Transfer
                                                </td>
                                                <td>
                                                    <?= $listTrans->userid ?>
                                                </td>
                                                <td>
                                                    <?= $listTrans->senderName ?>
                                                </td>
                                                <td>
                                                    <?= $listTrans->currency ?>
                                                </td>
                                                <td>
                                                    <?=  formatKrw($listTrans->amt) ?>
                                                </td>
                                                <td>
                                                    <?=  formatKrw($listTrans->actualAmount) ?>
                                                </td>
                                                <td>
                                                    <?=  formatKrw($listTrans->amtVa) ?>
                                                </td>
                                                <td>
                                                    <?=  formatKrw($listTrans->amt - $listTrans->amtVa) ?>
                                                </td>
                                                <td>
                                                    <?=  $listTrans->lastBalance == null ? "-" : formatKrw($listTrans->lastBalance)?>
                                                </td>
                                                <td>
                                                    <?= date('d-m-Y H:i:s', strtotime($listTrans->tglbuat))?>
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
                                            <th>Depo At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($dataRej != null) :?>
                                        <div hidden><?= $i = 1; ?></div>
                                            <?php foreach($dataRej as $listTrans):?>
                                            <tr>
                                                <td>
                                                    <?= $i++ ?>
                                                </td>
                                                <td>
                                                    <?= $listTrans->trxId?>
                                                </td>
                                                <td>
                                                    <?= $listTrans->vaNumber?>
                                                </td>
                                                <td>
                                                    <?= $listTrans->bank?>
                                                </td>
                                                <td>
                                                    <?= $listTrans->holderName ?>
                                                </td>
                                                <td>
                                                    Bank Transfer
                                                </td>
                                                <td>
                                                    <?= $listTrans->userid ?>
                                                </td>
                                                <td>
                                                    <?= $listTrans->senderName ?>
                                                </td>
                                                <td>
                                                    <?= $listTrans->currency ?>
                                                </td>
                                                <td>
                                                    <?=  formatKrw($listTrans->amt) ?>
                                                </td>
                                                <td>
                                                    <?=  formatKrw($listTrans->actualAmount) ?>
                                                </td>
                                                <td>
                                                    <?=  formatKrw($listTrans->amtVa) ?>
                                                </td>
                                                <td>
                                                    <?=  formatKrw($listTrans->amt - $listTrans->amtVa) ?>
                                                <td>
                                                    <?= date('d-m-Y H:i:s', strtotime($listTrans->tglbuat))?>
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
<script src="/js/pages/datatables.init.js"></script>

<!-- date range -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <!-- validation init -->
  <script src="/js/pages/validation.init.js"></script>
  <script src="/assets/libs/toastr/build/toastr.min.js"></script>

  <!-- toastr init -->
  <script src="/js/pages/toastr.init.js"></script>

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
    var targetFilter;
    var tableConf;
    var tableRej;
    var targetTgl = 'Conf';
    const uang = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'KRW',
    minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
    maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
        });

    function cbHref(isi){
        var target = $(isi).data("bs-target");
        if(target == "#confirm"){
           targetFilter = "datatable-active";
           targetTgl = 'Conf';
        }else{
            targetFilter = "datatable-inactive";
            targetTgl = "Rej";
        }
    }
    function filterTgl(){
        var tgl = $('input[name="daterange'+targetTgl+'"]').val();
        var splitTgl = tgl.split('-');
        var startDate;
        var endDate;
        if (splitTgl[0] == '') {
                startDate = '';
                endDate = '';
        } else {
            startDate = splitTgl[0];
            endDate = splitTgl[1];
            startDate = startDate.replace('/', '-');
            startDate = startDate.replace('/', '-');
            startDate = startDate.replace(' ', '');
            endDate = endDate.replace('/', '-');
            endDate = endDate.replace('/', '-');
            endDate = endDate.slice(1);
            // new date convert
            startDate = startDate.split("-").reverse().join("-");
            startDate = startDate + ' 00:00:00';
            endDate = endDate.split("-").reverse().join("-");
            endDate = endDate + ' 00:00:00';
        }
        var tableConfirm = $("#datatable-active tbody");
        var tableRejected = $("#datatable-inactive tbody");
        var isTable = $("#"+targetFilter);
        if(targetFilter == "datatable-active"){
            tableConfirm.empty();
            tableConfirm.append(
                "<tr>" +
                "<td colspan='14'>" +
                "<center>" +
                "<div class='loader' id='loader-1'></div>" +
                "</center>" +
                "</td>" +
                "</tr>"
            );
            $.ajax({
                url: '<?=base_url("dashboard/filterDate")?>',
                method: "POST",
                xhrFields: {
                    withCredentials: true
                },
                dataType: "json",
                data: {
                    startDate: startDate,
                    endDate: endDate,
                    target: "confirmed"
                },
                success: (response) => {
                    isTable.DataTable().destroy();
                    tableConfirm.empty();
                    var dataT = response["response"];
                    var i = 0;
                    $.each(dataT, function(a, b) {
                        var crtDate = new Date(b.tglbuat),
                            createdDate = moment(crtDate).format("DD-MM-YYYY");
                            i++;
                        tableConfirm.append(
                            "<tr>" +
                            "<td>" +
                            i +
                            "</td>" +
                            "<td>" +
                                b.trxId +                           
                            "</td>" +
                            "<td>" +
                            b.vaNumber +
                            "</td>" +
                            "<td>" +
                            b.bank +
                            "</td>" +
                            "<td>" +
                            b.holderName +
                            "</td>" +
                            "<td>" +
                            "Bank Transfer"+
                            "</td>" +
                            "<td>" +
                            b.userid +
                            "</td>" +
                            "<td>" +
                            b.senderName +
                            "</td>" +
                            "<td>" +
                            b.currency +
                            "</td>" +
                            "<td>" +
                            uang.format(b.amt) +
                            "</td>" +
                            "<td>" +
                            uang.format(b.actualAmount) +
                            "</td>" +
                            "<td>" +
                            uang.format(b.amtVa) +
                            "</td>" +
                            "<td>" +
                            (uang.format(b.amt - b.amtVa)) +
                            "</td>" +
                            "<td>" +
                            createdDate +
                            "</td>" +
                            "</tr>"
                        );
                    });
                    var ikiTable = isTable.DataTable({
                        lengthChange: false,
                        buttons: ["copy", "excel", "pdf"],
                        scrollX: true,
                        "bDestroy": true
                    });
                    ikiTable.buttons().container().appendTo("#"+targetFilter+"_wrapper .col-md-6:eq(0)"), $(
                    ".dataTables_length select").addClass("form-select form-select-sm");
                    $.fn.dataTable.tables( { visible: true, api: true } ).columns.adjust();
                }
            });
        }else{
            tableRejected.empty();
            tableRejected.append(
                "<tr>" +
                "<td colspan='14'>" +
                "<center>" +
                "<div class='loader' id='loader-1'></div>" +
                "</center>" +
                "</td>" +
                "</tr>"
            );
            $.ajax({
                url: '<?=base_url("dashboard/filterDate")?>',
                method: "POST",
                xhrFields: {
                    withCredentials: true
                },
                dataType: "json",
                data: {
                    startDate: startDate,
                    endDate: endDate,
                    target: "rejected"
                },
                success: (response) => {
                    isTable.DataTable().destroy();
                    tableRejected.empty();
                    var dataT = response["response"];
                    var i = 0;
                    $.each(dataT, function(a, b) {
                        var crtDate = new Date(b.tglbuat),
                            createdDate = moment(crtDate).format("DD-MM-YYYY");
                            i++;
                        tableRejected.append(
                            "<tr>" +
                            "<td>" +
                            i +
                            "</td>" +
                            "<td>" +
                                b.trxId +                           
                            "</td>" +
                            "<td>" +
                            b.vaNumber +
                            "</td>" +
                            "<td>" +
                            b.bank +
                            "</td>" +
                            "<td>" +
                            b.holderName +
                            "</td>" +
                            "<td>" +
                            "Bank Transfer"+
                            "</td>" +
                            "<td>" +
                            b.userid +
                            "</td>" +
                            "<td>" +
                            b.senderName +
                            "</td>" +
                            "<td>" +
                            b.currency +
                            "</td>" +
                            "<td>" +
                            uang.format(b.amt) +
                            "</td>" +
                            "<td>" +
                            uang.format(b.actualAmount) +
                            "</td>" +
                            "<td>" +
                            uang.format(b.amtVa) +
                            "</td>" +
                            "<td>" +
                            (uang.format(b.amt - b.amtVa)) +
                            "</td>" +
                            "<td>" +
                            createdDate +
                            "</td>" +
                            "</tr>"
                        );
                    });
                    var ikiTable = isTable.DataTable({
                        lengthChange: false,
                        buttons: ["copy", "excel", "pdf"],
                        scrollX: true,
                        "bDestroy": true
                    });
                    ikiTable.buttons().container().appendTo("#"+targetFilter+"_wrapper .col-md-6:eq(0)"), $(
                    ".dataTables_length select").addClass("form-select form-select-sm");
                    $.fn.dataTable.tables( { visible: true, api: true } ).columns.adjust();
                }
            });
        }
    }
    $(document).ready(function () {
        targetFilter = $("#btnFilterCon").data("tabactive");
        $('input[name="daterangeConf"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear',
                    format: 'DD/MM/YYY'
                }
            });
            $('input[name="daterangeConf"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });
            $('input[name="daterangeConf"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
            $('input[name="daterangeRej"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear',
                    format: 'DD/MM/YYY'
                }
            });
            $('input[name="daterangeRej"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });
            $('input[name="daterangeRej"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        $.fn.dataTable
        .tables( { visible: true, api: true } )
        .columns.adjust();
        });
       tableConf = $("#datatable-active").DataTable({
            lengthChange: !1,
            buttons: ["copy", "excel", "pdf"],
            "scrollX" : true,
            "bDestroy": true
        });
        tableConf.buttons().container().appendTo("#datatable-active_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
       tableRej = $("#datatable-inactive").DataTable({
            lengthChange: !1,
            buttons: ["copy", "excel", "pdf", "colvis"],
            "scrollX" : true,
            "bDestroy": true
        });
        tableRej.buttons().container().appendTo("#datatable-inactive_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
    });
</script>
<?php $this->endSection();?>