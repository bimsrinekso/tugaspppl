<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<!-- DataTables -->
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
    <div class="row mb-3">
            <div class="col-md-6">
                <h2>Management e-Statement Bank</h2>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-end">
                    <div class="form-group">
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                            data-bs-target="#uploadMutasi" aria-expanded="false" aria-controls="uploadMutasi"
                            title="Upload Mutasi">
                            <i class="fas fa-filter"></i>
                        </button>
                        <a href="#" class="btn btn-primary" onclick="location.reload();" title="Refresh Data">
                            <i class="fas fa-redo"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-12" id="uploadMutasi">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Upload e-Statement</h4>
                    <hr>
                        <div class="row">
                            <form action="<?=base_url('dashboard/mutation/scrap')?>" method="post" id="formMutation" enctype="multipart/form-data">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="pickCountry" class="form-label">Country</label>
                                            <select id="pickCountry" name="country" class="form-select select2">
                                                <option value=""></option>
                                                <?php if($dataCountry != null):?>
                                                <?php foreach ($dataCountry as $listCountry): ?>
                                                <option value="<?=$listCountry->id?>"><?=$listCountry->name?></option>
                                                <?php endforeach;?>
                                                <?php else:?>
                                                <?php endif;?>
                                            </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                                <label for="pickClient" class="form-label">Client</label>
                                                <select id="pickClient" name="clientID" class="form-select select2">

                                                </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="pickBank" class="form-label">Bank</label>
                                            <select id="pickBank" name="bank" class="form-select select2">

                                            </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="pickAcc" class="form-label">Account Bank</label>
                                            <select id="pickAcc" name="accBank" class="form-select select2">

                                            </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="uploadMtt" class="form-label">File (pdf & excel only)</label>
                                            <input type="file" name="docFile" class="form-control" id="uploadMtt" required accept="..pdf, .csv, application/pdf, text/csv">
                                            <div id="fileValidationError" class="invalid-feedback">
                                                Please select a valid PDF or Excel file.
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">

                                        </div>
                                        <div class="col-3">
                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">List e-Statement Bank</h4>
                        <hr>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="true">PENDING</button>
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
                                                <button class="btn btn-secondary waves-effect waves-light" id="btnFilterRun" data-tabactive="datatable-active" onclick="filterTgl()" type="button">Filter</a>
                                            </div>
                                        </div>
                                      
                                    </div>
                                </div>
                                <table id="pendingStatement" class="table table-striped table-bordered nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Description</th>
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                        <th>Last Saldo</th>
                                        <th>Country</th>
                                        <th>Bank</th>
                                        <th>Holder Name</th>
                                        <th>Client</th>
                                        <th>Transaction Date</th>
                                        <th>Scrap Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($dataPending)):?>
                                            <?php $i =1;?>
                                        <?php foreach($dataPending as $listPending):?>
                                            <tr>
                                            <td><?=$i++?></td>
                                            <td><?= substr($listPending->deskripsi, 0, 30)?></td>
                                            <td><?=formatMoney($listPending->debit)?></td>
                                            <td><?=formatMoney($listPending->kredit)?></td>
                                            <td><?=formatMoney($listPending->lastSaldo)?></td>
                                            <td><?=$listPending->cnName?></td>
                                            <td><?=$listPending->universalName?></td>
                                            <td><?=$listPending->holderName?></td>
                                            <td><?=$listPending->clientName?></td>
                                            <td><?= format_date($listPending->mutationDate, 'd-m-Y H:i:s'); ?></td>
                                            <td><?= format_date($listPending->createdAt, 'd-m-Y H:i:s'); ?></td>
                                            </tr>
                                        <?php endforeach;?>
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
<script src="/assets/libs/toastr/build/toastr.min.js"></script>

<!-- toastr init -->
<script src="/assets/js/pages/toastr.init.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
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
     function getClients(countryID) {
        $.ajax({
            url: '<?=base_url('dashboard/country/getClients')?>',
            method: 'POST',
            data: {
                country: countryID
            },
            dataType: 'json',
            success: function (response) {
                $('#pickClient').empty();
                if (response.clients) {
                    response.clients.forEach(function (client) {
                        $('#pickClient').append($('<option>', {
                            value: client.id,
                            text: client.name
                        }));
                    });
                } else {
                    $('#pickClient').append($('<option>', {
                        value: '',
                        text: 'No clients found'
                    }));
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    function getBanks(countryID) {
        $.ajax({
            url: '<?=base_url('dashboard/country/getBanks')?>',
            method: 'POST',
            data: {
                country: countryID
            },
            dataType: 'json',
            success: function (response) {
                $('#pickBank').empty();
                if (response.banks) {
                    response.banks.forEach(function (banks) {
                        $('#pickBank').append($('<option>', {
                            value: banks.id,
                            text: banks.bankName
                        }));
                    });
                    var currentBankValue = $('#pickBank').val();
                    $('#pickBank').val(currentBankValue).select2().trigger('change');
                } else {
                    $('#pickBank').append($('<option>', {
                        value: '',
                        text: 'No banks found'
                    }));
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    function getBankAccounts(countryID, bankID, clientID) {
        $.ajax({
            url: '<?=base_url('dashboard/country/getBankAccounts')?>',
            method: 'POST',
            data: {
                country: countryID,
                bankID: bankID,
                clientID: clientID
            },
            dataType: 'json',
            success: async function (response) {
                $('#pickAcc').empty();
                if (response.banks) {
                    await response.banks.forEach(function (banks) {
                        $('#pickAcc').append($('<option>', {
                            value: banks.id,
                            text: banks.holderName
                        }));
                    });
                } else {
                    $('#pickAcc').append($('<option>', {
                        value: '',
                        text: 'No bank accounts found'
                    }));
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    $(document).ready(function () {
        $("#pickClient").select2({
            placeholder: {
                id: '',
                text: 'Choose Clients'
            },
            language: "en",
        });
        $("#pickCountry").select2({
            placeholder: {
                id: '',
                text: 'Choose Country'
            },
            language: "en",
        });
        $("#pickBank").select2({
            placeholder: {
                id: '',
                text: 'Choose Bank'
            },
            language: "en",
        });
        $("#pickAcc").select2({
            placeholder: {
                id: '',
                text: 'Choose Bank Accounts'
            },
            language: "en",
        });
        $('#pickCountry').on('change', function () {
            var countryID = $(this).val();
            getClients(countryID);
            getBanks(countryID);
        });

        $('#pickBank').on('change', function () {
            var countryID = $('#pickCountry').val();
            var bankID = $(this).val();
            var clientID = $("#pickClient").val();
            getBankAccounts(countryID, bankID, clientID);
        });

        $('#pickClient').on('change', function () {
            var countryID = $('#pickCountry').val();
            var bankID = $("#pickBank").val();
            var clientID = $(this).val();
            getBankAccounts(countryID, bankID, clientID);
        });
      
        $('input[name="daterangePen"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear',
                    format: 'DD/MM/YYY'
                }
            });
            $('input[name="daterangePen"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });
            $('input[name="daterangePen"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        $("#datatable").DataTable(), $("#pendingStatement").DataTable({
            lengthChange: !1,
            buttons: ["copy", "excel", "pdf"],
            "scrollX": true,
            scrollCollapse: true,
            "bDestroy": true
        }).buttons().container().appendTo("#pendingStatement_wrapper .col-md-6:eq(0)"), $(
            ".dataTables_length select").addClass("form-select form-select-sm");
    });
</script>
<?php $this->endSection();?>