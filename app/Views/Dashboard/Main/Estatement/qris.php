<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<!-- DataTables -->
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Responsive datatable examples -->
<link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<?php $this->endSection();?>
<?php $this->section('isKonten');?>
<div class="page-content">
    <div class="container-fluid">
    <div class="row mb-3">
            <div class="col-md-6">
                <h2>Management e-Statement Qris</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">List e-Statement Qris</h4>
                        <hr>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" onclick="cbHref(this)" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="true">PENDING</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="done-tab" onclick="cbHref(this)" data-bs-toggle="tab" data-bs-target="#done" type="button" role="tab" aria-controls="done" aria-selected="true">DONE</button>
                            </li>
                        </ul> 
                          <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="daterange" class="control-label">Filter Date</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" class="form-control" placeholder="Choose date range" name="daterangePen" id="daterange" value="" />
                                            </div>
                                            <div class="col-4">
                                                <button class="btn btn-secondary waves-effect waves-light" id="btnFilterPen" data-tabactive="datatable-active" onclick="filterTgl('#pendingStatement')" type="button">Filter</a>
                                            </div>
                                        </div>
                                      
                                    </div>
                                </div>
                                <table id="pendingStatement" class="table table-striped table-bordered nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>Merchant Name</th> -->
                                        <th>Grand Total</th>
                                        <th>Transaction Code</th>
                                        <th>Transfer Via</th>
                                        <th>Customer Name</th>
                                        <th>Country</th>
                                        <!-- <th>Client</th> -->
                                        <th>Transaction Date</th>
                                        <th>Scrap Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade show" id="done" role="tabpanel" aria-labelledby="done-tab">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="daterange" class="control-label">Filter Date</label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="Choose date range" name="daterangeDone" id="daterange" value="" />
                                                </div>
                                                <div class="col-4">
                                                    <button class="btn btn-secondary waves-effect waves-light" id="btnFilterDone" data-tabactive="datatable-done" onclick="filterTgl('#datatable-done')" type="button">Filter</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table id="datatable-done" class="table table-striped table-bordered nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <!-- <th>Merchant Name</th> -->
                                            <th>Grand Total</th>
                                            <th>Transaction Code</th>
                                            <th>Transfer Via</th>
                                            <th>Customer Name</th>
                                            <th>Country</th>
                                            <!-- <th>Client</th> -->
                                            <th>Transaction Date</th>
                                            <th>Scrap Date</th>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="/assets/js/plugins/service/generateTable.js"></script>
<script src="/assets/js/plugins/service/tableScrapQris.js"></script> 
<script>
    var targetFilter;
    var targetTgl = 'Pen';
    function cbHref(isi){
        var target = $(isi).data("bs-target");
        if(target == "#pen"){
        targetFilter = "#pendingStatement";
        targetTgl = 'Pen';
        } else {
            targetFilter = "#datatable-done";
            targetTgl = "Done";
        }
    }
      

    function filterTgl(targetFilter){
        var tgl = $('input[name="daterange'+targetTgl+'"]').val();
        var splitTgl = tgl.split('-');
        var startDate = formatDate(splitTgl[0], false);
        var endDate = formatDate(splitTgl[1], true);
        var table = targetFilter == "#pendingStatement" ? $("#pendingStatement tbody") : $("#datatable-done tbody");
        if (targetFilter == '#pendingStatement') {
            generateTable(targetFilter, '/dashboard/estatement/qris', columnPenStatement, orderPenStatement,startDate, endDate);
        } else {
            generateTable(targetFilter, '/dashboard/estatement/qris', columnDonStatement, orderDonStatement,startDate, endDate);
        }
        
        
    }
    $(document).ready(function () {
        targetFilter = $("#btnFilterPen").data("tabactive");
        ['daterangePen', 'daterangeDone'].forEach(function (inputName) {
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
            .tables( { visible: true, api: true } )
            .columns.adjust();
        });
    });
   

</script>
<?php $this->endSection();?>