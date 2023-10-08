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
                                        <input type="text" class="form-control" placeholder="Choose date range" name="daterangeConf" id="daterange" value="" />
                                        </div>
                                        <div class="col-4">
                                        <button class="btn btn-secondary waves-effect waves-light" id="btnFilterCon" data-tabactive="datatable-active" type="button">Filter</button>
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
                            <h5 class="card-title me-2">Statistik Per Week <?= $rangeHari ?></h5>
                        </div>
                        <hr class="mb-4">
                        
                        <div class="apex-charts" data-colors='["--bs-primary", "--bs-warning"]' id="area-chart" dir="ltr"></div>
                    </div>
                </div>
            </div>
           
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.33/moment-timezone-with-data.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- Datatable init js -->
    <script src="/assets/js/pages/datatables.init.js"></script>
    <!-- validation init -->
    <script src="/assets/js/pages/validation.init.js"></script>
    <script src="/assets/js/plugins/service/tableReport.js"></script>
    <!-- apexcharts -->
    <script src="/assets/libs/apexcharts/apexcharts.min.js"></script>
    <script>
        $(document).ready(function(){
            let weekDeposit = <?= $weekDeposit ?>;
            let weekWd = <?= $weekWithdraw ?>;

            appenStats(weekDeposit, weekWd);
        });
    </script>
 
<?php $this->endSection();?>