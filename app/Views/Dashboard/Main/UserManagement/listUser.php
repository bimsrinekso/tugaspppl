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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title-desc">
                            <a class="btn btn-secondary waves-effect waves-light" href="<?= base_url('dashboard/createUser') ?> ">Create User</a>
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="running-tab"  data-bs-toggle="tab" data-bs-target="#running" type="button" role="tab" aria-controls="running" aria-selected="true">Role Client</button>
                            </li>
                            <li class="nav-item" role="presentation" >
                              <button class="nav-link" id="expired-tab"   data-bs-toggle="tab" data-bs-target="#expired" type="button" role="tab" aria-controls="expired" aria-selected="false">Role Member</button>
                            </li>
                          </ul> 
                          <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="running" role="tabpanel" aria-labelledby="running-tab">
                                <table id="datatable-active" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Merchant ID</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($dataClientUser != null): ?>
                                            <div hidden><?= $i = 1; ?> </div>
                                            <?php foreach($dataClientUser as $listUserClient) :?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listUserClient->id ?>
                                                    </td>
                                                    <td>
                                                        <?= $listUserClient->username ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listUserClient->email ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listUserClient->role_id ?> 
                                                    </td>
                                                    <td>
                                                        <?= date('d-m-Y', strtotime($listUserClient->createdAt))?>
                                                    </td>
                                                    <td>
                                                    <a class="btn btn-outline-secondary btn-sm edit" href="<?= base_url('dashboard/editUser/'. $listUserClient->id) ?> " title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-outline-danger btn-sm edit" data-bs-toggle="modal" data-bs-target="#hapus<?=$listUserClient->id?>">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach?>
                                            <?php foreach($dataClientUser as $listUserClient) : ?>
                                                <div class="modal fade" id="hapus<?=$listUserClient->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="<?=base_url("dashboard/deleteUser/". $listUserClient->id)?>" method="post">
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
                                            <?php endif;?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="expired" role="tabpanel" aria-labelledby="expired-tab">
                                <table id="datatable-expired" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($dataMember != null): ?>
                                            <div hidden><?= $i = 1; ?> </div>
                                            <?php foreach($dataMember as $listMember) :?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listMember->username ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listMember->email ?> 
                                                    </td>
                                                    <td>
                                                        <?= $listMember->role_id ?> 
                                                    </td>
                                                    <td>
                                                        <?= date('d-m-Y', strtotime($listMember->createdAt))?>
                                                    </td>
                                                    <td>
                                                    <a class="btn btn-outline-secondary btn-sm edit" href="<?= base_url('dashboard/editUser/'. $listMember->id) ?> " title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-outline-danger btn-sm edit" data-bs-toggle="modal" data-bs-target="#hapus<?=$listMember->id?>">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach?>
                                            <?php foreach($dataMember as $listMap) : ?>
                                                <div class="modal fade" id="hapus<?=$listMember->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="<?=base_url("dashboard/deleteUser/". $listMember->id)?>" method="post">
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
<!-- <script src="/js/pages/datatables.init.js"></script> -->
<!-- date range -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <!-- validation init -->
  <script src="/assets/js/pages/validation.init.js"></script>
  <script src="/assets/libs/toastr/build/toastr.min.js"></script>

  <!-- toastr init -->
  <script src="/assets/js/pages/toastr.init.js"></script>

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
    var targetFilter;
    var tableRun;
    var tableExp;
    var targetTgl = 'Run';
    $(document).ready(function () {
        targetFilter = $("#btnFilterRun").data("tabactive");
        $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
            $.fn.dataTable
        .tables( { visible: true, api: true } )
        .columns.adjust();
        });
       tableRun = $("#datatable-active").DataTable({
            lengthChange: false,
            buttons: ["copy", "excel", "pdf"],
            scrollCollapse: true,
            "bDestroy": true
        });
        tableRun.buttons().container().appendTo("#datatable-active_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
        tableExp = $("#datatable-expired").DataTable({
            lengthChange: false,
            buttons: ["copy", "excel", "pdf"],
            scrollCollapse: true,
            "bDestroy": true
        });
        tableExp.buttons().container().appendTo("#datatable-expired_wrapper .col-md-6:eq(0)");
    });
</script>
<?php $this->endSection();?>