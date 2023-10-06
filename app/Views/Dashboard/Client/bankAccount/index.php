<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<!-- DataTables -->
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
<link rel="stylesheet" type="text/css" href="/assets//libs/toastr/build/toastr.min.css">     
<?php $this->endSection();?>
<?php $this->section('isKonten');?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List Bank Accounts</h4>
                        <div class="card-title-desc">
                            <p>You can see list bank accounts
                            </p>
                        </div>
                       
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">ALL</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="active-tab" data-bs-toggle="tab" data-bs-target="#active" type="button" role="tab" aria-controls="active" aria-selected="false">ACTIVE</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="inactive-tab" data-bs-toggle="tab" data-bs-target="#inactive" type="button" role="tab" aria-controls="inactive" aria-selected="false">INACTIVE</button>
                            </li>
                          </ul> 
                          <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                <table id="tabListAll" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Account Number</th>
                                        <th>Bank</th>
                                        <th>Holder Name</th>
                                        <th>Client Name</th>
                                        <th>Country</th>
                                        <th>Operator</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
        
                                    <tbody>
                                        <?php if($allData != null): ?>
                                            <?php $i = 1;?>
                                            <?php foreach($allData as $listData): ?>
                                                <tr>
                                                <td>
                                                        <?=$i++?>
                                                    </td>
                                                    <td><?= $listData->accNumber ?> </td>
                                                    <td><?= $listData->bankName ?> </td>
                                                    <td><?= $listData->holderName ?> </td>
                                                    <td><?=$listData->clientName?></td>
                                                    <td><?=$listData->cnName?></td>
                                                    <td><?= $listData->action_by ?></td>
                                                    <td><?= $listData->status_name?></td>

                                                </tr>
                                            <?php endforeach; ?> 
                                        <?php else: ?>
        
                                            <?php endif ?> 
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="active" role="tabpanel" aria-labelledby="active-tab">
                                <table id="tabListActive" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Account Number</th>
                                        <th>Bank</th>
                                        <th>Holder Name</th>
                                        <th>Client Name</th>
                                        <th>Country</th>
                                        <th>Operator</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
        
                                    <tbody>
                                    <?php if($dataActive != null) : ?>
                                        <?php $i = 1;?>
                                        <?php foreach($dataActive as $listActive): ?>
                                                <tr>
                                                     <td>
                                                        <?=$i++?>
                                                    </td>
                                                    <td><?= $listActive->accNumber ?> </td>
                                                    <td><?= $listActive->bankName ?> </td>
                                                    <td><?= $listActive->holderName ?> </td>
                                                    <td><?=$listActive->clientName?></td>
                                                    <td><?=$listActive->cnName?></td>
                                                    <td><?= $listActive->action_by ?></td>
                                                    <td><?= $listActive->status_name?></td>
                                                </tr>
                                            <?php  endforeach ?> 
                                        <?php else: ?>
       
                                     <?php endif ?> 
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="inactive" role="tabpanel" aria-labelledby="inactive-tab">
                                <table id="tabListRun" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Account Number</th>
                                        <th>Bank</th>
                                        <th>Holder Name</th>
                                        <th>Client Name</th>
                                        <th>Country</th>
                                        <th>Operator</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
        
                                    <tbody>
                                        <?php if ($dataInactive != null) : ?>
                                            <?php $i = 1;?>
                                            <?php foreach($dataInactive as $listInactive): ?>
                                                <tr>
                                                <td>
                                                        <?=$i++?>
                                                    </td>
                                                    <td><?= $listInactive->accNumber ?> </td>
                                                    <td><?= $listInactive->bankName ?> </td>
                                                    <td><?= $listInactive->holderName ?> </td>
                                                    <td><?=$listInactive->clientName?></td>
                                                    <td><?=$listInactive->cnName?></td>
                                                    <td><?= $listInactive->action_by ?></td>
                                                    <td><?= $listInactive->status_name?></td>
                                                </tr>
                                                <?php  endforeach ?> 
                                            <?php else: ?>
        
                                        <?php endif ?> 
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
<script src="/assets/js/pages/validation.init.js"></script>
  <script src="/assets/libs/toastr/build/toastr.min.js"></script>

  <!-- toastr init -->
  <script src="/assets/js/pages/toastr.init.js"></script>
<script>
    $(document).ready(function () {
        $("#tabListAll").DataTable({
            lengthChange: !1,
            buttons: ["copy", "excel", "pdf", "colvis"]
        }).buttons().container().appendTo("#tabListAll_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
        $("#tabListActive").DataTable({
            lengthChange: !1,
            buttons: ["copy", "excel", "pdf", "colvis"]
        }).buttons().container().appendTo("#tabListActive_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
        $("#tabListRun").DataTable({
            lengthChange: !1,
            buttons: ["copy", "excel", "pdf", "colvis"]
        }).buttons().container().appendTo("#tabListRun_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
    });
</script>
<?php if(session()->getFlashdata('sukses')):?>
        <script>
              toastr.success("<?= session()->getFlashData("sukses"); ?>");
        </script>
    <?php elseif(session()->getFlashdata('error')):?>
        <script>
            toastr.error("<?= session()->getFlashData("error"); ?>");
        </script>
    <?php endif?>
<?php $this->endSection();?>