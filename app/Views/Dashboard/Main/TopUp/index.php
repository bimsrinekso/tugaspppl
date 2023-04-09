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

                        <h4 class="card-title">List Topup</h4>
                        <div class="card-title-desc">
                            <p>You can create, edit, delete and report topup
                            </p>
                            <a class="btn btn-secondary waves-effect waves-light" href="<?= base_url('dashboard/createTopup') ?> ">Create Topup</a>
                        </div>
                       
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">ALL</button>
                            </li>
                          </ul> 
                          <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                <table id="datatable-all" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Transaction ID</th>
                                        <th>Amount</th>
                                        <th>Operator</th>
                                        <th>Client Name</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>       
                                    <tbody>
                                        <?php if ($dataTopup != null) : ?>
                                            <div hidden><?= $i = 1; ?></div> 
                                            <?php foreach($dataTopup as $listTopup): ?>
                                                <tr>
                                                    <td><?= $i++ ?> </td>
                                                    <th><?= $listTopup->transactionID == null ? "-" : $listTopup->transactionID?></th>
                                                    <td><?= formatKrw($listTopup->amount) ?> </td>
                                                    <td><?= $listTopup->username ?> </td>
                                                    <td><?= $listTopup->clientName ?> </td>
                                                    <td> <?= date('d-m-Y', strtotime($listTopup->tglbuat))?> </td>
                                                    <td><a class="btn btn-outline-secondary btn-sm edit" href="<?= base_url('dashboard/editTopup/'. $listTopup->idtopup) ?> " title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-outline-danger btn-sm edit" data-bs-toggle="modal" data-bs-target="#hapus<?=$listTopup->idtopup?>">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                </td>
                                                </tr>
                                            <?php endforeach;?> 
                                            <?php foreach($dataTopup as $listTopup) : ?>
                                                        <div class="modal fade" id="hapus<?=$listTopup->idtopup?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="<?=base_url("dashboard/deleteTopup/". $listTopup->idtopup)?>" method="post">
                                                                        <input value="DELETE" type="hidden" name="_method" name="id">
                                                                        <div class="modal-body">
                                                                            <p>Are you sure want to delete this data?</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                        <?php else:?>
                    
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
<script src="/assets/libs/toastr/build/toastr.min.js"></script>

<!-- toastr init -->
<script src="/js/pages/toastr.init.js"></script>
<!-- Datatable init js -->
<script src="/js/pages/datatables.init.js"></script>
<script>
    $(document).ready(function () {
        $("#datatable").DataTable(), $("#datatable-all").DataTable({
            lengthChange: !1,
            buttons: ["excel", "colvis"],
            "scrollX" : true,
        }).buttons().container().appendTo("#datatable-all_wrapper .col-md-6:eq(0)"), $(
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