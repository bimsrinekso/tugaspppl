<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<!-- DataTables -->
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
<link rel="stylesheet" type="text/css" href="/assets/libs/toastr/build/toastr.min.css">      
<?php $this->endSection();?>
<?php $this->section('isKonten');?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">List Transaction Ho Withdraw</h4>
                        <hr>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">ALL</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="true">PENDING</button>
                            </li>
                          </ul> 
                          <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="alll-tab">
                                <table id="datatable-all" class="table table-striped table-bordered nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Trx ID</th>
                                        <th>Payment Method</th>
                                        <th>Amount</th>
                                        <th>Currency</th>
                                        <th>Bank Name</th>
                                        <th>Customer Account Number</th>
                                        <th>Holder Name</th>
                                        <th>Client Name</th>
                                        <th>Request Date</th>
                                        <th>Process Date</th>
                                        <th>Status</th>
                                        <th>Operator</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($dataAll != null) :?>
                                            <?php $i = 1; ?> 
                                            <?php foreach($dataAll as $listHo) :?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listHo->transactionID ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listHo->paymentMethod ?> 
                                                    </td>
                                                    <td>
                                                        <?= formatMoney($listHo->amount) ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listHo->currency ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listHo->bankName ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listHo->accountNumber ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listHo->cusBank ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listHo->clientName ?> 
                                                    </td>
                                                    <td>
                                                        <?= date('d-m-Y H:i:s', strtotime($listHo->request))?>
                                                    </td>
                                                    <td>
                                                        <?= date('d-m-Y H:i:s', strtotime($listHo->process))?>
                                                    </td>
                                                    <td>
                                                        <?= $listHo->namestatus ?> 
                                                    </td> 
                                                    <td>
                                                        <?= $listHo->operator ?> 
                                                    </td>                                  
                                                </tr>
                                                
                                            <?php endforeach;?>  
                                        <?php endif;?> 
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fad" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                                <table id="datatable-buttons-scroll" class="table table-striped table-bordered nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Trx ID</th>
                                        <th>Payment Method</th>
                                        <th>Amount</th>
                                        <th>Currency</th>
                                        <th>Bank Name</th>
                                        <th>Customer Account Number</th>
                                        <th>Holder Name</th>
                                        <th>Client Name</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($dataPen != null) :?>
                                        <?php $i = 1; ?> 
                                            <?php foreach($dataPen as $listPen) :?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listPen->transactionID ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listPen->paymentMethod ?> 
                                                    </td>
                                                    <td>
                                                        <?= formatMoney($listPen->amount) ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listPen->currency ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listPen->bankName ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listPen->accountNumber ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listPen->holderName ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listPen->clientName ?> 
                                                    </td>
                                                    <td>
                                                        <?= date('d-m-Y H:i:s', strtotime($listPen->tglbuat))?>
                                                    </td>
                                                    <td><a href="<?= base_url("dashboard/hoWithdraw/edit/" . $listPen->reqhos_id) ?> " class="btn btn-outline-secondary btn-sm edit" title="Edit">
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
    $(document).ready(function () {
        $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
            $.fn.dataTable
        .tables( { visible: true, api: true } )
        .columns.adjust();
        });
        $("#datatable").DataTable(), $("#datatable-buttons-scroll").DataTable({
            lengthChange: !1,
            buttons: ["excel", "pdf", "colvis"],
            "scrollX" : true,
        }).buttons().container().appendTo("#datatable-buttons-scroll_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");

        $("#datatable").DataTable(), $("#datatable-all").DataTable({
            lengthChange: !1,
            "scrollX" : true,
            buttons: ["excel", "colvis", {
                text: 'Confirm',
                action: function ( e, dt, node, config ) {
                    $("#datatable-all").DataTable().search("Confirm").draw();
                },
            },{
                text: 'Rejected',
                action: function ( e, dt, node, config ) {
                    $("#datatable-all").DataTable().search("Rejected").draw();
                }},{
                text: 'Pending',
                action: function ( e, dt, node, config ) {
                    $("#datatable-all").DataTable().search("Pending").draw();
                }}],
        }).buttons().container().appendTo("#datatable-all_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
    });
</script>
<?php $this->endSection();?>