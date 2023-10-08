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
                        <h4 class="card-title">Monitoring Log</h4>
                        <div class="card-title-desc">
                            <p>All log Post, Callback and Error in here</p>
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="post-tab" onclick="cbHref(this)" data-bs-toggle="tab" data-bs-target="#post" type="button" role="tab" aria-controls="post" aria-selected="true">LOG POST</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="callback-tab" onclick="cbHref(this)" data-bs-toggle="tab" data-bs-target="#callback" type="button" role="tab" aria-controls="callback" aria-selected="true">LOG CALLBACK</button>
                            </li>
                            <li class="nav-item" role="presentation" >
                                <button class="nav-link" id="error-tab"  onclick="cbHref(this)" data-bs-toggle="tab" data-bs-target="#error" type="button" role="tab" aria-controls="error" aria-selected="false">LOG ERROR</button>
                            </li>
                        </ul> 
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="post" role="tabpanel" aria-labelledby="post-tab">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="daterange" class="control-label">Filter Date</label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="Choose date range" name="daterangePost" id="daterange" value="" />
                                                </div>
                                                <div class="col-4">
                                                    <button class="btn btn-secondary waves-effect waves-light" id="btnFilterPost" data-tabactive="datatable-post" onclick="filterTgl('#datatable-post')" type="button">Filter</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table id="datatable-post" class="table table-striped table-bordered nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Body</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="callback" role="tabpanel" aria-labelledby="callback-tab">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="daterange" class="control-label">Filter Date</label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="Choose date range" name="daterangeCallback" id="daterange" value="" />
                                                </div>
                                                <div class="col-4">
                                                    <button class="btn btn-secondary waves-effect waves-light" id="btnFilterCallback" data-tabactive="datatable-active" onclick="filterTgl('#datatable-callback')" type="button">Filter</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table id="datatable-callback" class="table table-bordered  nowrap " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Transaction ID</th>
                                            <th>Order No</th>
                                            <th>Body</th>
                                            <th>Callback URL</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="error" role="tabpanel" aria-labelledby="error-tab">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="daterange" class="control-label">Filter Date</label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="Choose date range" name="daterangeError" id="daterange" value="" />
                                                </div>
                                                <div class="col-4">
                                                    <button class="btn btn-secondary waves-effect waves-light" id="btnFilterError" data-tabactive="datatable-error" onclick="filterTgl('#datatable-error')" type="button">Filter</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table id="datatable-error" class="table table-striped table-bordered nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection();?>
<?php $this->section('javascript');?>
<!-- Required datatable js -->
<script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/libs/jszip/jszip.min.js"></script>
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
<script src="/assets/js/pages/validation.init.js"></script>t>
<script>
     var columnLogPost = [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        }
      },
      { data: 'body' },
      {
        data: 'id',
        render: function (data, type, row, meta) {
            return `<a class="btn btn-outline-secondary btn-sm" href="detailPost/${data}" title="Edit"><i class="fas fa-eye"></i></a>`;
        }
      }
     
    ];
    var orderLogPost = [[0, 'asc']];

    var columnLogCallBack = [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        }
      },
      { data: 'transactionID' },
      { data: 'orderNo' },
       { data: 'body' },
      { data: 'callbackUrl' },
      {
        data: 'id',
        render: function (data, type, row, meta) {
            return `<a class="btn btn-outline-secondary btn-sm" href="detailCallback/${data}" title="Edit"><i class="fas fa-eye"></i></a>`;
        }
      }
    ];
    var orderLogCallBack = [[0, 'asc']];

     var columnLogError = [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        }
      },
      { data: 'message' },
      {
        data: 'id',
        render: function (data, type, row, meta) {
            return `<a class="btn btn-outline-secondary btn-sm" href="editErrorlog/${data}" title="Edit"><i class="fas fa-eye"></i></a>`;
        }
      }
    ];
    var orderLogError = [[0, 'asc']];
</script>
<script src="/assets/js/plugins/service/generateTable.js"></script>
<script src="/assets/js/plugins/service/tableMonitoringLogs.js"></script>
<script>
    var targetFilter;
    var tableRun;
    var tableExp;
    var targetTgl = 'Post';

    function cbHref(isi){
        var target = $(isi).data("bs-target");
        if(target == "#post"){
           targetFilter = "#datatable-post";
           targetTgl = 'Post';
        }else if(target == "#callback"){
            targetFilter = "#datatable-callback";
            targetTgl = "Callback";
        }else{
            targetFilter = "#datatable-error";
            targetTgl = "Error";
        }
    }

    function filterTgl(targetFilter){
        var tgl = $('input[name="daterange'+targetTgl+'"]').val();
        var splitTgl = tgl.split('-');
        var startDate = formatDate(splitTgl[0], false);
        var endDate = formatDate(splitTgl[1], true);
        if(tgl == ''){
            if(targetFilter == '#datatable-post'){
                generateTable(targetFilter, '/dashboard/monitoringLog',columnLogPost, orderLogPost);
            }else if(targetFilter == '#datatable-callback'){
                generateTable(targetFilter, '/dashboard/monitoringLog', columnLogCallBack, orderLogCallBack);
            }else  if(targetFilter == '#datatable-error'){
                generateTable(targetFilter, '/dashboard/monitoringLog', columnLogError, orderLogError);
            }
        }else{
            if(targetFilter == '#datatable-post'){
                generateTable(targetFilter, '/dashboard/monitoringLog',columnLogPost, orderLogPost,startDate, endDate);
            }else if(targetFilter == '#datatable-callback'){
                generateTable(targetFilter, '/dashboard/monitoringLog', columnLogCallBack, orderLogCallBack,startDate, endDate);
            }else  if(targetFilter == '#datatable-error'){
                generateTable(targetFilter, '/dashboard/monitoringLog', columnLogError, orderLogError,startDate, endDate);
            }
        }
    }

    $(document).ready(function () {
        targetFilter = $("#btnFilterPost").data("tabactive");
        ['daterangePost', 'daterangeCallback', 'daterangeError'].forEach(function (inputName) {
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