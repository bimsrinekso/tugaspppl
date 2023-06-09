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
            <!-- <label for="startDate">Start Date:</label>
<input type="date" id="startDate">

<label for="endDate">End Date:</label>
<input type="date" id="endDate"> -->
<input type="text" id="dateRangePicker" name="asu" />
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
        <div class="container">
        <div class="col-md-4 pull-right">
            <div class="input-group input-daterange">

            <input type="text" id="min-date" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="From:">

            <div class="input-group-addon">to</div>

            <input type="text" id="max-date" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="To:">

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
                                <tr>
                                    <th>No</th>
                                    <th>Transaction ID</th>
                                    <th>Order No</th>
                                    <th>Remark</th>
                                    <th>Amount</th>
                                    <th>VA Fee</th>
                                    <th>Commission</th>
                                    <th>Bank Transfer</th>
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
    // Bootstrap datepicker
$('.input-daterange input').each(function() {
  $(this).datepicker('clearDates');
});


// Extend dataTables search
$.fn.dataTable.ext.search.push(
  function(settings, data, dataIndex) {
    var min = $('#min-date').val();
    var max = $('#max-date').val();
    var createdAt = data[2] || 0; // Our date column in the table

    if (
      (min == "" || max == "") ||
      (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
    ) {
      return true;
    }
    return false;
  }
);

// Re-draw the table when the a date range filter changes
$('.date-range-filter').change(function() {
  table.draw();
});

$('#tableSummary_filter').hide();
    // formatKrw = (money) => {
	// return new Intl.NumberFormat("id-ID", {
	// 	style: "currency",
	// 	currency: "KRW",
	// 	minimumFractionDigits: 0,
	// }).format(money);
    // };
    
    // formatDuid = (nominal) => {
    //     const convert = Intl.NumberFormat({
    //         minimumFractionDigits: 0,
    //         maximumFractionDigits: 0,
    //     });
    //     var parsing = convert.format(nominal).replace(',', '.');
    //     return parsing;
    // }
    
    // $('#dateRangePicker').daterangepicker({
    //     autoUpdateInput: false,
    //     locale: {
    //         cancelLabel: 'Clear',
    //         format: 'YYYY-MM-DD'
    //     }
    // });

    // var tableSummary = $('#tableSummary').DataTable({
    //   serverSide: true,
    //   ajax: {
    //     url: '<?=base_url("dashboard/filter/tracking")?>',
    //     type: 'POST',
    //     data: function (d) {
    //       // Tambahkan parameter filter berdasarkan rentang tanggal yang dipilih
    //         var dateRange = $('#dateRangePicker').val().split(' - ');
    //         d.startDate = dateRange[0];
    //         d.endDate = dateRange[1];
    //         return d;
    //     },  
       
    //   },
    //   columns: [
    //     {
    //     data: "id",
    //     },
    //     { data: 'idTransTB' },
    //     {
    //         data: function (row, type, set) {
    //         if (row.payFor === 1) {
    //             return row.dpOrderNo == null ? "-" : row.dpOrderNo;
    //         } else if (row.payFor === 2) {
    //             return row.wdOrderNo == null ? "-" : row.wdOrderNo;
    //         } else if (row.payFor === 3) {
    //             return '-';
    //         } else if (row.payFor === 4) {
    //             return '-';
    //         } else {
    //             return '-';
    //         }
    //         }
    //     },
    //     {
    //         data: 'payFor',
    //         render: function(data, type, row, meta) {
    //         if (data === 1) {
    //             return 'Deposit';
    //         } else if (data === 2) {
    //             return 'Withdraw';
    //         } else if (data === 3) {
    //             return 'Topup Client';
    //         } else if (data === 4) {
    //             return 'Ho Withdraw';
    //         } else {
    //             return 'Unknown';
    //         }
    //         }
    //     },
    //     {
    //         data: 'amountTB',
    //         render: function(data, type, row, meta) {
    //         var amountCondition = data === null;
    //         var formattedAmount = formatKrw(data);
    //         var payFor = row.payFor;
    //         var styleCondition = payFor === 1 || payFor === 3;
        
    //         var transactionAmount = styleCondition ? (amountCondition ? "-" : "+" + formattedAmount) : "-" + formattedAmount;
        
    //         var tdStyle = styleCondition ? (amountCondition ? "" : "color:#2ecc71;font-weight: 500;") : "color:#e74c3c;font-weight: 500;";
        
    //         return '<td><span style="' + tdStyle + '">' + transactionAmount + '</span></td>';
    //         }
    //     },      
    //     {
    //         data: 'amtVa',
    //         render: function(data, type, row, meta) {
    //         var payFor = row.payFor;
    //         var amtVaFormatted = payFor === 1 ? formatKrw(data) : "-";
        
    //         return amtVaFormatted;
    //         }
    //     },
    //     {
    //         data: function (row, type, set) {
    //         if (row.payFor === 1) {
    //             return formatKrw(row.depoCom);
    //         } else if (row.payFor === 2) {
    //             return formatKrw(row.wdCom);
    //         } else {
    //             return '-';
    //         }
    //         }
    //     },
    //     {
    //         data: 'bankTransfer',
    //         render: function(data, type, row, meta) {
    //         var btFormatted = (row.payFor == 2) ? formatKrw(data) : "-";
        
    //         return btFormatted;
    //         }
    //     },
    //     {
    //         data: 'lastBalance',
    //         render: function (data, type, row, meta) {
    //         return formatKrw(data);
    //         }
    //     },
    //     { data: 'name' },
    //     {
    //         data: 'submitTime',
    //         render: function(data, type, row, meta) {
    //         var date = new Date(data);
    //         var year = date.getFullYear();
    //         var month = ('0' + (date.getMonth() + 1)).slice(-2);
    //         var day = ('0' + date.getDate()).slice(-2);
    //         var hours = ('0' + date.getHours()).slice(-2);
    //         var minutes = ('0' + date.getMinutes()).slice(-2);
    //         var seconds = ('0' + date.getSeconds()).slice(-2);
    //         return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
    //         }
    //     },
    //     {
    //         data: 'updatedTime',
    //         render: function(data, type, row, meta) {
    //         var date = new Date(data);
    //         var year = date.getFullYear();
    //         var month = ('0' + (date.getMonth() + 1)).slice(-2);
    //         var day = ('0' + date.getDate()).slice(-2);
    //         var hours = ('0' + date.getHours()).slice(-2);
    //         var minutes = ('0' + date.getMinutes()).slice(-2);
    //         var seconds = ('0' + date.getSeconds()).slice(-2);
    //         return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
    //         }
    //     },
    //   ]
    // });

    // $('#dateRangePicker').on('apply.daterangepicker', function(ev, picker) {
    //   tableSummary.draw();
    // });
</script>
<?php $this->endSection();?>