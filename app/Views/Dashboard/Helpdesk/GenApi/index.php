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
                            <a class="btn btn-secondary waves-effect waves-light" href="<?= base_url('dashboard/createApis') ?> ">Generate Api</a>
                        </div>
                        <hr>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="confirmed-tab" data-bs-toggle="tab" data-bs-target="#confirmed" type="button" role="tab" aria-controls="confirmed" aria-selected="false">Apis Data</button>
                            </li>
                          </ul> 
                          <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="confirmed" role="tabpanel" aria-labelledby="confirmed-tab">
                                <table id="datatable-all" class="table table-bordered w-100">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Api Key</th>
                                        <th>Public Key</th>
                                        <th>Private Key</th>
                                        <th>Status</th>
                                        <th>Details</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($allData != null): ?>
                                            <?php $i = 1; ?>
                                            <?php foreach($allData as $listApis):?>
                                                <tr>
                                                    <td><?=$i++?> </td>
                                                    <td> <?=$listApis->apiKey?></td>
                                                    <td> <?=substr($listApis->publicKey,0,50)?></td>
                                                    <td> <?=substr($listApis->privateKey,0,50)?></td>
                                                    <td <?=$listApis->is_allocated == 2 ? "style='color:#2ecc71;font-weight: 500;'" : "style='color:#e74c3c;font-weight: 500;'"?>> 
                                                        <?=$listApis->is_allocated == 1 ? "Used" : "Ready"?>
                                                    </td>
                                                    <td>
                                                    <a class="btn btn-outline-secondary btn-sm edit" href="<?= base_url('dashboard/detailApi/'. $listApis->id) ?> " title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach?>
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
        $('input[name="daterangeAll"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear',
                    format: 'DD/MM/YYY'
                }
            });
            $('input[name="daterangeAll"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });
            $('input[name="daterangeAll"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        $("#datatable").DataTable(), $("#datatable-all").DataTable({
            lengthChange: !1,
            buttons: ["excel", "colvis", {
                text: 'Confirm',
                action: function ( e, dt, node, config ) {
                    $("#datatable-all").DataTable().search("Confirm").draw();
                },
            },{
                text: 'Rejected',
                action: function ( e, dt, node, config ) {
                    $("#datatable-all").DataTable().search("Rejected").draw();
                }}],
            "scrollX" : true,
            "bDestroy": true
        }).buttons().container().appendTo("#datatable-all_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
    });
</script>
<?php $this->endSection();?>