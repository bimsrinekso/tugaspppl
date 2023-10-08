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
                                                    <button class="btn btn-secondary waves-effect waves-light" id="btnFilterPost" data-tabactive="datatable-post" onclick="filterTgl()" type="button">Filter</a>
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
                                        <?php if($datapost != null): ?>
                                            <?php $i = 1; ?>
                                            <?php foreach($datapost as $logPost) :?> 
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?=substr($logPost->body, 0, 100)?></td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm " href="<?= base_url('dashboard/detailPost/'. $logPost->id) ?>" title="Detail">
                                                    <i class='fa fa-eye'></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    <?php endif;?>
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
                                                    <button class="btn btn-secondary waves-effect waves-light" id="btnFilterCallback" data-tabactive="datatable-active" onclick="filterTgl()" type="button">Filter</a>
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
                                        <?php if($datacb != null): ?>
                                            <?php $i = 1; ?>
                                            <?php foreach($datacb as $logCb) :?> 
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?=$logCb->transactionID?></td>
                                            <td><?=$logCb->orderNo?></td>
                                            <td><?=substr($logCb->body, 0, 42)?></td>
                                            <td><?=$logCb->callbackUrl?></td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm " href="<?= base_url('dashboard/detailCallback/'.$logCb->id) ?>" title="Detail">
                                                    <i class='fa fa-eye'></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    <?php endif;?>
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
                                                    <button class="btn btn-secondary waves-effect waves-light" id="btnFilterError" data-tabactive="datatable-error" onclick="filterTgl()" type="button">Filter</a>
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
                                            <th>Status Fixing</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($dataError != null): ?>
                                            <?php $i = 1; ?>
                                            <?php foreach($dataError as $logError) :?>  
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?=substr($logError->message, 0, 101);?></td>
                                            <td></td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm" href="<?= base_url('dashboard/editErrorlog/'.$logError->id) ?>" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
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
<script src="/assets/js/pages/validation.init.js"></script>

<script>
    var targetFilter;
    var tableRun;
    var tableExp;
    var targetTgl = 'Post';

    function cbHref(isi){
        var target = $(isi).data("bs-target");
        if(target == "#post"){
           targetFilter = "datatable-post";
           targetTgl = 'Post';
        }else if(target == "#callback"){
            targetFilter = "datatable-callback";
            targetTgl = "Call";
        }else{
            targetFilter = "datatable-error";
            targetTgl = "Error";
        }
    }

    function formatDate(dateStr, isEndDate) {
        if (!dateStr || dateStr == '') return '';
        dateStr = dateStr.replace(/\//g, '-').trim();
        return dateStr.split("-").reverse().join("-") + (isEndDate ? ' 23:59:59' : ' 00:00:00');
    }

    function filterTgl(){
        var tgl = $('input[name="daterange'+targetTgl+'"]').val();
        var splitTgl = tgl.split('-');
        var startDate = formatDate(splitTgl[0], false);
        var endDate = formatDate(splitTgl[1], true);
        
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