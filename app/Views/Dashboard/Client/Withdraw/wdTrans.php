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
                                                <button class="btn btn-secondary waves-effect waves-light" id="btnFilterRun" data-tabactive="datatable-all" onclick="filterTgl()" type="button">Filter</a>
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
                                        <?php if($dataTrans != null) :?>
                                            <?php $i = 1; ?>  
                                            <?php foreach($dataTrans as $listTranasWd): ?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listTranasWd->transactionID ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listTranasWd->namestatus ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listTranasWd->paymentMethod ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listTranasWd->amount ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listTranasWd->currency ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listTranasWd->bankName ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listTranasWd->accountNumber ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listTranasWd->cusBank ?> 
                                                    </td>
                                                    <td>
                                                        <?= date('d-m-Y', strtotime($listTranasWd->process))?> 
                                                    </td>
                                                    <td>
                                                        <?= date('d-m-Y', strtotime($listTranasWd->request))?> 
                                                    </td>                                               
                                                    <td>
                                                        <?= $listTranasWd->remark ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listTranasWd->operator ?> 
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
<script src="/js/pages/datatables.init.js"></script>
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
    const uang = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'KRW',
    minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
    maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
        });
    function filterTgl() {
        var tgl = $('input[name="daterangeAll"]').val();
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
        var tableWd = $("#datatable-all tbody");
        var isTable = $("#datatable-all");
        tableWd.empty();
        tableWd.append(
            "<tr>" +
            "<td colspan='14'>" +
            "<center>" +
            "<div class='loader' id='loader-1'></div>" +
            "</center>" +
            "</td>" +
            "</tr>"
        );
        $.ajax({
            url: '<?=base_url("dashboard/filterWd")?>',
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
                isTable.DataTable().destroy();
                tableWd.empty();
                var dataT = response["response"];
                var i = 0;
                console.log(dataT);
                $.each(dataT, function (a, b) {
                    var proDate = new Date(b.process),
                        prsDate = moment(proDate).format("DD-MM-YYYY");
                    var reqDate = new Date(b.request),
                        reqsDate = moment(reqDate).format("DD-MM-YYYY");
                    i++;
                    tableWd.append(
                        "<tr>" +
                        "<td>" +
                        i +
                        "</td>" +
                        "<td>" +
                        b.transactionID +
                        "</td>" +
                        "<td>" +
                        b.namestatus +
                        "</td>" +
                        "<td>" +
                        b.paymentMethod +
                        "</td>" +
                        "<td>" +
                        uang.format(b.amount) +
                        "</td>" +
                        "<td>" +
                        b.currency +
                        "</td>" +
                        "<td>" +
                        b.bankName +
                        "</td>" +
                        "<td>" +
                        b.accountNumber +
                        "</td>" +
                        "<td>" +
                        b.cusBank +
                        "</td>" +
                        "<td>" +
                        prsDate +
                        "</td>" +
                        "<td>" +
                        reqsDate +
                        "</td>" +
                        "<td>" +
                        b.remark +
                        "</td>" +
                        "<td>" +
                       b.operator +
                        "</td>" +
                        "</tr>"
                    );
                });
                var ikiTable = isTable.DataTable({
                        lengthChange: false,
                        buttons: ["excel", {
                        text: 'Confirm',
                        action: function ( e, dt, node, config ) {
                            $("#datatable-all").DataTable().search("Confirm").draw();
                        },
                    },{
                        text: 'Rejected',
                        action: function ( e, dt, node, config ) {
                            $("#datatable-all").DataTable().search("Rejected").draw();
                        }}],
                        scrollCollapse: true,
                        "bDestroy": true,
                        "scrollX" : true,
                    });
                    ikiTable.buttons().container().appendTo("#datatable-all_wrapper .col-md-6:eq(0)"), $(
                    ".dataTables_length select").addClass("form-select form-select-sm");
                    $.fn.dataTable.tables( { visible: true, api: true } ).columns.adjust();
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
        $("#datatable").DataTable(), $("#datatable-all").DataTable({
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
        }).buttons().container().appendTo("#datatable-all_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
    });
</script>
<?php $this->endSection();?>