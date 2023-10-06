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

                        <h4 class="card-title">Data Tracking</h4>
                        <div class="card-title-desc">
                            <p>All tracking balance in here
                            </p>
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="running-tab" onclick="cbHref(this)" data-bs-toggle="tab" data-bs-target="#running" type="button" role="tab" aria-controls="running" aria-selected="true">All</button>
                            </li>
                            <!-- <li class="nav-item" role="presentation" >
                              <button class="nav-link" id="expired-tab"  onclick="cbHref(this)" data-bs-toggle="tab" data-bs-target="#expired" type="button" role="tab" aria-controls="expired" aria-selected="false">EXPIRED</button>
                            </li> -->
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
                                <table id="datatable-active" class="table table-bordered nowrap w-100">
                                <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Transaction ID</th>
                                            <th>Order No</th>
                                            <th>Remark</th>
                                            <th>Amount</th>
                                            <th>Commission</th>
                                            <th>Remark</th>
                                            <th>Last Balance</th>
                                            <th>Client Name</th>
                                            <th>Submit Time</th>
                                            <th>Update Time</th>
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
                                                    <button class="btn btn-secondary waves-effect waves-light" id="btnFilterExp" data-tabactive="datatable-expired" onclick="filterTgl()" type="button">Filter</a>
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
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
<!-- <script src="/js/pages/datatables.init.js"></script> -->
<!-- date range -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.33/moment-timezone-with-data.min.js"></script>
  <!-- validation init -->
  <script src="/assets/js/pages/validation.init.js"></script>
  <script src="/assets/libs/toastr/build/toastr.min.js"></script>

  <!-- toastr init -->
  <script src="/assets/js/pages/toastr.init.js"></script>

    <script>
        formatIdr = (money) => {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                minimumFractionDigits: 0,
            }).format(money);
        };
        var columnTrack = [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            { data: 'idTransTB',  },
            {
                data: null,
               
                render: function (data, type, row) {
                    const orderNo = (row.payFor == 1) ? row.dpOrderNo : (row.payFor == 2 ? row.wdOrderNo : "-");
                    return orderNo == null ? '-' : orderNo;
                }
            },
            { data: 'payFor',
                render: function (data, type, row) {
                    let labelPay = ['-', 'Deposit','Withdraw','Top Up Client','HO Withdraw','Adjustment','Debt'];
                    return labelPay[data];
            } },
            {
                data: null,
                
                render: function (data, type, row) {
                    if (row.payFor == 1 || row.payFor == 3) {
                        return (row.amountTB === null ? "-" : "+" + formatIdr(row.amountTB));
                    } else {
                        return "-" + formatIdr(row.amountTB);
                    }
                }
            },
            { data: null,
               
                render: function (data, type, row) {
                        if (row.payFor == 1 ) {
                            return (row.amtVa=== null ? "-" : "+" + formatIdr(row.amtVa));
                        } else {
                            return "-" ;
                        }
                    }
                },
            { data: 'topupremark', 
                render: function (data, type, row) {
                        if (row.topupremark != null ) {
                            return data;
                        } else {
                            return "-" ;
                        }
                    }
            },
            {
                data: null,
                title: 'Last Balance',
                render: function (data, type, row) {
                    return formatIdr(row.lastBalance);
                }
            },
            { data: 'name', title: 'Client Name' },
            {
                data: null,
                title: 'Submit Time',
                render: function (data, type, row) {
                    return moment(row.submitTime).subtract(7, 'hours').format('DD-MM-YYYY HH:mm:ss');
                }
            },
            {
                data: null,
                title: 'Update Time',
                render: function (data, type, row) {
                    return moment(row.updatedTime).subtract(7, 'hours').format('DD-MM-YYYY HH:mm:ss');
                }
            }
        ];

        var orderTrack = [[0, 'asc']];



    </script>
    <script src="/assets/js/plugins/service/generateTable.js"></script>
    <script src="/assets/js/plugins/service/tableTrackingBalance.js"></script>

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
    var tableRun;
    var tableExp;
    var targetTgl = 'Run';
    function cbHref(isi){
        var target = $(isi).data("bs-target");
        if(target == "#running"){
           targetFilter = "datatable-active";
           targetTgl = 'Run';
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
        ikiTable.buttons().container().appendTo("#datatable-active_wrapper .col-md-6:eq(0)");
        $(".dataTables_length select").addClass("form-select form-select-sm");
        $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
    }

    function filterTgl(){
        var tgl = $('input[name="daterangeRun"]').val();
        var splitTgl = tgl.split('-');
        var startDate = formatDate(splitTgl[0], false);
        var endDate = formatDate(splitTgl[1], true);
        var table = $(targetFilter+" tbody");

        clearAndShowLoader(table);
        generateTable('#datatable-active', '/dashboard/trackingBalance',columnTrack, orderTrack,startDate, endDate);
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
            scrollX: true,
            "bDestroy": true
        });
        tableRun.buttons().container().appendTo("#datatable-active_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
        tableExp = $("#datatable-expired").DataTable({
            lengthChange: false,
            buttons: ["copy", "excel", "pdf"],
            scrollX: true,
            "bDestroy": true
        });
        tableExp.buttons().container().appendTo("#datatable-expired_wrapper .col-md-6:eq(0)");
    });
</script>
<?php $this->endSection();?>