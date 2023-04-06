<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<!-- DataTables -->
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />    
<?php $this->endSection();?>
<?php $this->section('isKonten');?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">List HO Withdraw</h4>
                        <div class="card-title-desc">
                            <p>You can create, edit, delete and report HO Withdraw
                            </p>
                            <a class="btn btn-secondary waves-effect waves-light" href="<?= base_url('dashboard/makeHo/'.session()->get('userid')) ?>">Make Ho Withdraw</a>
                        </div>
                       
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">Transaction</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="true">Pending</button>
                              </li>
                          </ul> 
                          <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                <table id="datatable-all" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trx ID</th>
                                            <th>Payment Method</th>
                                            <th>Amount</th>
                                            <th>Currency</th>
                                            <th>Bank Name</th>
                                            <th>Account Number</th>
                                            <th>Holder Name</th>
                                            <th>Created Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if($dataTrans != null): ?>
                                                <div hidden><?=  $i = 1; ?> </div>
                                                <?php foreach($dataTrans as $listTrans):?>
                                                    <tr>
                                                        <td>
                                                            <?= $i++ ?>
                                                        </td>
                                                        <td>
                                                            <?= $listTrans->transactionID ?>
                                                        </td>
                                                        <td>
                                                            <?= $listTrans->paymentMethod ?>
                                                        </td>
                                                        <td>
                                                            <?= $listTrans->amount ?>
                                                        </td>
                                                        <td>
                                                            <?= $listTrans->currency ?>
                                                        </td>
                                                        <td>
                                                            <?= $listTrans->bankName ?>
                                                        </td>
                                                        <td>
                                                            <?= $listTrans->accountNumber ?>
                                                        </td>
                                                        <td>
                                                            <?= $listTrans->holderName ?>
                                                        </td>
                                                        <td>
                                                            <?= date('d-m-Y', strtotime($listTrans->tglbuat))?>
                                                        </td>                                                 
                                                    </tr>
                                                    <?php endforeach;?> 
                                                <?php endif;?> 
                                        </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                                <table id="datatable-pending" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trx ID</th>
                                            <th>Payment Method</th>
                                            <th>Amount</th>
                                            <th>Currency</th>
                                            <th>Bank Name</th>
                                            <th>Account Number</th>
                                            <th>Holder Name</th>
                                            <th>Created Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($dataPen != null): ?>
                                                <div hidden><?=  $i = 1; ?> </div>
                                                <?php foreach($dataPen as $listPen):?>
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
                                                            <?= $listPen->amount ?>
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
                                                            <?= date('d-m-Y', strtotime($listPen->tglbuat))?>
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
<?php $this->endSection();?>
<?php $this->section('javascript');?>
<!-- Required datatable js -->
<script src="/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="/libs/jszip/jszip.min.js"></script>
<script src="/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="/js/pages/datatables.init.js"></script>
  <!-- validation init -->
  <script src="/js/pages/validation.init.js"></script>
  <script src="/libs/toastr/build/toastr.min.js"></script>

  <!-- toastr init -->
  <script src="/js/pages/toastr.init.js"></script>
<script>
    $(document).ready(function () {
        $("#datatable").DataTable(), $("#datatable-all").DataTable({
            lengthChange: !1,
            buttons: ["excel", "colvis"],
        }).buttons().container().appendTo("#datatable-all_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
        
        $("#datatable").DataTable(), $("#datatable-pending").DataTable({
            lengthChange: !1,
            buttons: ["excel", "colvis"],
        }).buttons().container().appendTo("#datatable-pending_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
    });
</script>
<?php $this->endSection();?>