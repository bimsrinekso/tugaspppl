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

                        <h4 class="card-title">Pending Withdraw</h4>
                        <hr>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="true">PENDING</button>
                            </li>
                          </ul> 
                          <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                                <table id="datatable-buttons-scroll" class="table table-bordered dt-responsive nowrap w-100">
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
                                        <th>Request Date</th>
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
                                                        <?= formatKRW($listPenWd->amount) ?>
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
                                                        <?= date('d-m-Y H:i:s', strtotime($listPenWd->tglbuat))?>
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
        $("#datatable").DataTable(), $("#datatable-buttons-scroll").DataTable({
            lengthChange: !1,
            scrollX:true,
            autoWidth:true,
            buttons: ["copy", "excel", "pdf", "colvis"],
        }).buttons().container().appendTo("#datatable-buttons-scroll_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
    });
</script>
<?php $this->endSection();?>