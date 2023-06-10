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

                        <h4 class="card-title">Pending Withdraw</h4>
                        <hr>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="true">PENDING</button>
                            </li>
                          </ul> 
                          <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                                 <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="daterange" class="control-label">Filter Date</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" class="form-control" placeholder="Choose date range" name="daterangeAll" id="daterange" value="" />
                                            </div>
                                            <div class="col-4">
                                                <button class="btn btn-secondary waves-effect waves-light" id="btnFilterRun" data-tabactive="datatable-buttons-scroll" onclick="filterTgl()" type="button">Filter</a>
                                            </div>
                                        </div>
                                      
                                    </div>
                                </div>    
                            <table id="datatable-buttons-scroll" class="table table-bordered nowrap table-responsive w-100">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Trx ID</th>
                                        <th>Order Number</th>
                                        <th>Payment Method</th>
                                        <th>Amount</th>
                                        <th>Currency</th>
                                        <th>Bank Name</th>
                                        <th>Customer Account Number</th>
                                        <th>Holder Name</th>
                                        <th>Client Name</th>
                                        <th>Request Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($dataPen != null): ?>
                                            <?php $i = 1; ?> 
                                            <?php foreach($dataPen as $listPenWd):?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?>
                                                    </td>
                                                    <td>
                                                        <?= $listPenWd->transactionID ?>
                                                    </td>
                                                    <td>
                                                        <?= $listPenWd->wdOrderNo == null ? '-' : $listPenWd->wdOrderNo ?>
                                                    </td>
                                                    <td>
                                                        <?= $listPenWd->paymentMethod ?>
                                                    </td>
                                                    <td>
                                                        <?= formatKrw($listPenWd->amount) ?>
                                                    </td>
                                                    <td>
                                                        <?= $listPenWd->currency ?>
                                                    </td>
                                                    <td>
                                                        <?= $listPenWd->bankName ?>
                                                    </td>
                                                    <td>
                                                        <?= $listPenWd->accountNumber ?>
                                                    </td>
                                                    <td>
                                                        <?= $listPenWd->holderName ?>
                                                    </td>
                                                    <td>
                                                        <?= $listPenWd->clientName ?>
                                                    </td>
                                                    <td>
                                                         <?= format_date($listPenWd->tglbuat, 'd-m-Y H:i:s');?>
                                                    </td>
                                                    <td><a href="<?= base_url("dashboard/withdrawPending/edit/" . $listPenWd->reqwd_id) ?>" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a></td>                                                
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

<!-- date range -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.33/moment-timezone-with-data.min.js"></script>

<!-- Datatable init js -->
<script src="/assets/js/pages/datatables.init.js"></script>
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
    $(document).ready(function () {
        $("#datatable").DataTable(), $("#datatable-buttons-scroll").DataTable({
            lengthChange: !1,
            buttons: ["copy", "excel", "pdf", "colvis"],
            scrollX:true
        }).buttons().container().appendTo("#datatable-buttons-scroll_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
    });
</script> -->

<script>
     var targetFilter = 'datatable-buttons-scroll';
    const uang = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'KRW',
    minimumFractionDigits: 2, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
    maximumFractionDigits: 2, // (causes 2500.99 to be printed as $2,501)
        });
    
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

    function populateTable(table, data) {
    var i = 0;
            $.each(data, function(a, b) {
                var createdDate = moment.tz(b.tglbuat, "UTC").tz("Asia/Manila").subtract(1, 'hour').format("DD-MM-YYYY HH:mm:ss");
            i++;
            table.append(
                    "<tr>" +
                    "<td>" + i + "</td>" +
                    "<td>" + b.transactionID + "</td>" +
                    "<td>" + (b.wdOrderNo == null ? "-" : b.wdOrderNo) + "</td>" +
                    "<td>" + b.paymentMethod + "</td>" +
                    "<td>" + b.amount + "</td>" +
                    "<td>" + b.currency + "</td>" +
                    "<td>" + b.bankName + "</td>" +
                    "<td>" + b.accountNumber + "</td>" +
                    "<td>" + b.holderName + "</td>" +
                    "<td>" + b.clientName + "</td>" +
                    "<td>" + createdDate+ "</td>" +
                    "<td><a href='<?= base_url("dashboard/withdrawPending/edit") ?>/"+b.reqwd_id+"' class='btn btn-outline-secondary btn-sm edit' title='Edit'><i class='fas fa-pencil-alt'></i></a></td>" +
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
        ikiTable.buttons().container().appendTo("#datatable-buttons-scroll_wrapper .col-md-6:eq(0)");
        $(".dataTables_length select").addClass("form-select form-select-sm");
        $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
    }

    function filterTgl(){
        var tgl = $('input[name="daterangeAll"]').val();
        var splitTgl = tgl.split('-');
        var startDate = formatDate(splitTgl[0], false);
        var endDate = formatDate(splitTgl[1], true);
        var table = $("#"+targetFilter+" tbody");
        var isTable = $("#"+targetFilter);

        clearAndShowLoader(table);
        
        $.ajax({
            url: '<?=base_url("dashboard/filterPending")?>',
            method: "POST",
            xhrFields: {
                withCredentials: true
            },
            dataType: "json",
            data: {
                startDate: startDate,
                endDate: endDate,
            },
            success: (response) => {
                handleAjaxSuccess(response, isTable, table);
            }
        });
    }
    $(document).ready(function () {
        $('input[name="daterangeAll"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear',
                    format: 'DD/MM/YYY'
                }
            });
            $('input[name="daterangeAll"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });
            $('input[name="daterangeAll"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        $("#datatable").DataTable(), $("#datatable-buttons-scroll").DataTable({
            lengthChange: !1,
            buttons: ["excel", "colvis", {
                text: 'Confirm',
                action: function ( e, dt, node, config ) {
                    $("#datatable-buttons-scroll").DataTable().search("Confirm").draw();
                },
            },{
                text: 'Rejected',
                action: function ( e, dt, node, config ) {
                    $("#datatable-buttons-scroll").DataTable().search("Rejected").draw();
                }}],
            "scrollX" : true,
            "bDestroy": true
        }).buttons().container().appendTo("#datatable-buttons-scroll_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
    });
</script>
<?php $this->endSection();?>