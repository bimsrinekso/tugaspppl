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
                                                    <button class="btn btn-secondary waves-effect waves-light" id="btnFilterRun" data-tabactive="datatable-active" onclick="filterTgl()" type="button">Filter</a>
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                                <table id="datatable-active" class="table table-bordered  nowrap " style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Trx ID</th>
                                        <th>Order Number</th>
                                        <th>Virtual Account</th>
                                        <th>Bank</th>
                                        <th>Holder Name</th>
                                        <th>Payment Method</th>
                                        <th>Depositor</th>
                                        <th>Currency</th>
                                        <th>Client Name</th>
                                        <th>Depo At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($dataRun != null): ?>
                                            <?php $i = 1; ?>
                                            <?php foreach($dataRun as $listDepo) :?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listDepo->transactionID ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listDepo->dpOrderNo == null ? '-' : $listDepo->dpOrderNo?> 
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
                                                        <?= $listDepo->payMethod ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listDepo->forUser ?> 
                                                    </td>
                                                    <td>
                                                       KRW
                                                    </td>
                                                    <td>
                                                         <?= $listDepo->name ?>
                                                    </td>
                                                     <td>
                                                        <?= format_date($listDepo->dpcreat, 'd-m-Y H:i:s');?>
                                                     </td>
                                                   
                                                </tr>
                                                <?php endforeach;?>
                                            <?php endif;?>
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
                                                    <button class="btn btn-secondary waves-effect waves-light" id="btnFilterExp" data-tabactive="datatable-expired" onclick="filterTgl()" type="button">Filter</a>
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                                <table id="datatable-expired" class="table table-striped table-bordered nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trx ID</th>
                                            <th>Order Number</th>
                                            <th>Virtual Account</th>
                                            <th>Bank</th>
                                            <th>Holder Name</th>
                                            <th>Payment Method</th>
                                            <th>Depositor</th>
                                            <th>Currency</th>
                                            <th>Client Name</th>
                                            <th>Depo At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($dataExp != null) :?>
                                        <?php $i = 1; ?> 
                                            
                                            <?php foreach($dataExp as $listDepo) :?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listDepo->transactionID ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listDepo->dpOrderNo == null ? '-' : $listDepo->dpOrderNo?> 
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
                                                        <?= $listDepo->payMethod ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listDepo->forUser ?> 
                                                    </td>
                                                    <td>
                                                       KRW
                                                    </td>
                                                    <td>
                                                        <?= $listDepo->name ?> 
                                                    <td>
                                                        <?= format_date($listDepo->dpcreat, 'd-m-Y H:i:s'); ?>
                                                    </td>
                                                     
                                                   
                                                </tr>
                                                <?php endforeach;?>
                                            <?php endif;?>  
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
<script src="/js/pages/datatables.init.js"></script>
<!-- date range -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.33/moment-timezone-with-data.min.js"></script>
  <!-- validation init -->
  <script src="/assets/js/pages/validation.init.js"></script>
  <script src="/assets/libs/toastr/build/toastr.min.js"></script>

  <!-- toastr init -->
  <script src="/assets/js/pages/toastr.init.js"></script>

  <?php if(session()->getFlashdata('sukses')):?>
        <script>
              toastr.success("<?= session()->getFlashData("sukses"); ?>");
        </script>
    <?php elseif(session()->getFlashdata('error')):?>
        <script>
            toastr.error("<?= session()->getFlashData("error"); ?>");
        </script>
    <?php endif?>
<!-- <script>
    var targetFilter;
    var tableRun;
    var tableExp;
    var targetTgl = 'Run';
    const uang = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'KRW',
    minimumFractionDigits: 2, 
    maximumFractionDigits: 2, 
        });

    function cbHref(isi){
        var target = $(isi).data("bs-target");
        if(target == "#running"){
           targetFilter = "datatable-active";
           targetTgl = 'Run';
        }else{
            targetFilter = "datatable-expired";
            targetTgl = "Exp";
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
        var tableRun = $("#datatable-active tbody");
        var tableExpired = $("#datatable-expired tbody");
        var isTable = $("#"+targetFilter);
        if(targetFilter == "datatable-active"){
            tableRun.empty();
            tableRun.append(
                "<tr>" +
                "<td colspan='14'>" +
                "<center>" +
                "<div class='loader' id='loader-1'></div>" +
                "</center>" +
                "</td>" +
                "</tr>"
            );
            $.ajax({
                url: '<?=base_url("dashboard/monitorDepo")?>',
                method: "POST",
                xhrFields: {
                    withCredentials: true
                },
                dataType: "json",
                data: {
                    startDate: startDate,
                    endDate: endDate,
                    target: "running"
                },
                success: (response) => {
                    isTable.DataTable().destroy();
                    tableRun.empty();
                    var dataT = response["response"];
                    var i = 0;
                    $.each(dataT, function(a, b) {
                        var crtDate = new Date(b.dpcreat),
                            createdDate = moment(crtDate).format("DD-MM-YYYY");
                            i++;
                        tableRun.append(
                            "<tr>" +
                            "<td>" +
                            i +
                            "</td>" +
                            "<td>" +
                                b.transactionID +                           
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
                            b.payMethod +
                            "</td>" +
                            "<td>" +
                            b.forUserid +
                            "</td>" +
                            "<td>" +
                            b.forUser +
                            "</td>" +
                            "<td>" +
                            "KRW" +
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
                        scrollCollapse: true,
                        "bDestroy": true
                    });
                    ikiTable.buttons().container().appendTo("#"+targetFilter+"_wrapper .col-md-6:eq(0)"), $(
                    ".dataTables_length select").addClass("form-select form-select-sm");
                    $.fn.dataTable.tables( { visible: true, api: true } ).columns.adjust();
                }
            });
        }else{
            tableExpired.empty();
            tableExpired.append(
                "<tr>" +
                "<td colspan='14'>" +
                "<center>" +
                "<div class='loader' id='loader-1'></div>" +
                "</center>" +
                "</td>" +
                "</tr>"
            );
            $.ajax({
                url: '<?=base_url("dashboard/monitorDepo")?>',
                method: "POST",
                xhrFields: {
                    withCredentials: true
                },
                dataType: "json",
                data: {
                    startDate: startDate,
                    endDate: endDate,
                    target: "expired"
                },
                success: (response) => {
                    isTable.DataTable().destroy();
                    tableExpired.empty();
                    var dataT = response["response"];
                    var i = 0;
                    $.each(dataT, function(a, b) {
                        var crtDate = new Date(b.dpcreat),
                            createdDate = moment(crtDate).format("DD-MM-YYYY");
                            i++;
                        tableExpired.append(
                            "<tr>" +
                            "<td>" +
                            i +
                            "</td>" +
                            "<td>" +
                                b.transactionID +                           
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
                            b.payMethod +
                            "</td>" +
                            "<td>" +
                            b.forUserid +
                            "</td>" +
                            "<td>" +
                            b.forUser +
                            "</td>" +
                            "<td>" +
                            "KRW" +
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
                        scrollCollapse: true,
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
        targetFilter = $("#btnFilterRun").data("tabactive");
        $('input[name="daterangeRun"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear',
                    format: 'DD/MM/YYY'
                }
            });
            $('input[name="daterangeRun"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });
            $('input[name="daterangeRun"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
            $('input[name="daterangeExp"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear',
                    format: 'DD/MM/YYY'
                }
            });
            $('input[name="daterangeExp"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });
            $('input[name="daterangeExp"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
            $.fn.dataTable
        .tables( { visible: true, api: true } )
        .columns.adjust();
        });
       tableRun = $("#datatable-active").DataTable({
            lengthChange: false,
            buttons: ["copy", "excel", "pdf"],
            scrollCollapse: true,
            "bDestroy": true
        });
        tableRun.buttons().container().appendTo("#datatable-active_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
        tableExp = $("#datatable-expired").DataTable({
            lengthChange: false,
            buttons: ["copy", "excel", "pdf"],
            scrollCollapse: true,
            "bDestroy": true
        });
        tableExp.buttons().container().appendTo("#datatable-expired_wrapper .col-md-6:eq(0)");
    });
</script> -->

<script>
    var targetFilter;
    var tableRun;
    var tableExp;
    var targetTgl = 'Run';
    const uang = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'KRW',
    minimumFractionDigits: 0, //
    maximumFractionDigits: 2, //
        });

    function cbHref(isi){
        var target = $(isi).data("bs-target");
        if(target == "#running"){
           targetFilter = "datatable-active";
           targetTgl = 'Run';
        }else{
            targetFilter = "datatable-expired";
            targetTgl = "Exp";
        }
    }
    function formatDate(dateStr, isEndDate) {
    if (!dateStr || dateStr == '') return '';
    dateStr = dateStr.replace(/\//g, '-').trim();
    return dateStr.split("-").reverse().join("-") + (isEndDate ? ' 23:59:59' : ' 00:00:00');
}


function clearAndShowLoader(table){
        table.empty();
        table.append(
            "<tr>" +
            "<td colspan='14'>" +
            "<center>" +
            "<div class='loader' id='loader-1'></div>" +
            "</center>" +
            "</td>" +
            "</tr>"
        );
    }

    function formatCurrency(num) {
        num = parseFloat(num).toFixed(3);
        if(isNaN(num)){
            num = 0;
        }
        return uang.format(num);
    }

function populateTable(table, data){
        var i = 0;
        $.each(data, function(a, b) {
            console.log(data);
            var createdDate = moment.tz(b.dpcreat, "UTC").tz("Asia/Manila").format("DD-MM-YYYY HH:mm:ss");
            i++;
            table.append(
            "<tr>" +
            "<td>" + i +"</td>" +
            "<td>" + b.transactionID + "</td>" +
            "<td>" + (b.dpOrderNo == null ? "-" : b.dpOrderNo) + "</td>" +
            "<td>" + b.vaNumber +"</td>" +
            "<td>" +b.bank +"</td>" +
            "<td>" +b.holderName +"</td>" +
            "<td>" +b.payMethod +"</td>" +
            "<td>" +b.forUser +"</td>" +
            "<td>" +"KRW" +"</td>" +
            "<td>" +b.name +"</td>" +
            "<td>" +createdDate +"</td>" +
            "</tr>"
        );
        });
    }

function handleAjaxSuccess(response, isTable, table){
        isTable.DataTable().destroy();
        table.empty();
        populateTable(table, response["response"]);
        var ikiTable = isTable.DataTable({
            lengthChange: false,
            buttons: ["copy", "excel", "pdf"],
            scrollX: true,
            "bDestroy": true
        });
        ikiTable.buttons().container().appendTo("#"+targetFilter+"_wrapper .col-md-6:eq(0)");
        $(".dataTables_length select").addClass("form-select form-select-sm");
        $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
    }

    function filterTgl(){
        var tgl = $('input[name="daterange'+targetTgl+'"]').val();
        var splitTgl = tgl.split('-');
        var startDate = formatDate(splitTgl[0], false);
        var endDate = formatDate(splitTgl[1], true);
        var table = targetFilter == "datatable-active" ? $("#datatable-active tbody") : $("#datatable-expired tbody");
        var isTable = $("#"+targetFilter);

        clearAndShowLoader(table);
        
        $.ajax({
            url: '<?=base_url("dashboard/monitorDepo")?>',
            method: "POST",
            xhrFields: {
                withCredentials: true
            },
            dataType: "json",
            data: {
                startDate: startDate,
                endDate: endDate,
                target: targetFilter == "datatable-active" ? "running" : "expired"
            },
            success: (response) => {
                handleAjaxSuccess(response, isTable, table);
            }
        });
    }
    $(document).ready(function () {
        targetFilter = $("#btnFilterRun").data("tabactive");
        $('input[name="daterangeRun"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear',
                    format: 'DD/MM/YYY'
                }
            });
            $('input[name="daterangeRun"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });
            $('input[name="daterangeRun"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
            $('input[name="daterangeExp"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear',
                    format: 'DD/MM/YYY'
                }
            });
            $('input[name="daterangeExp"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });
            $('input[name="daterangeExp"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
            $.fn.dataTable
        .tables( { visible: true, api: true } )
        .columns.adjust();
        });
       tableRun = $("#datatable-active").DataTable({
            lengthChange: false,
            buttons: ["copy", "excel", "pdf"],
            "scrollX" : true,
            "bDestroy": true
        });
        tableRun.buttons().container().appendTo("#datatable-active_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
        tableExp = $("#datatable-expired").DataTable({
            lengthChange: false,
            buttons: ["copy", "excel", "pdf"],
            "scrollX" : true,
            "bDestroy": true
        });
        tableExp.buttons().container().appendTo("#datatable-expired_wrapper .col-md-6:eq(0)");
    });
</script>
<?php $this->endSection();?>