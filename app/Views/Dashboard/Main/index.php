<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda.min.css">
<style>
    .ladda-button {
        background: var(--bs-btn-bg);
        border: 0;
        padding: var(--bs-btn-padding-y) var(--bs-btn-padding-x);
        font-size: var(--bs-btn-font-size);
        cursor: pointer;
        color: #fff;
        border-radius: var(--bs-btn-border-radius);
        border: var(--bs-btn-border-width) solid var(--bs-btn-border-color);
        -webkit-appearance: none;
        -webkit-font-smoothing: antialiased;
        -webkit-tap-highlight-color: transparent;
    }
</style>
<?php $this->endSection();?>
<?php $this->section('isKonten');?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p>Cloudgenaera Dashboard</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="/assets/images/crypto/features-img/img-1.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <img src="<?= base_url('/assets/'.$_SESSION['avatar']) ?>" alt="" class="img-thumbnail rounded-circle">
                                </div>
                                <h5 class="font-size-15 text-truncate"><?= $_SESSION['username'] ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?=base_url('dashboard/filter/filterDash')?>" id="formFilterDash"
                                    method="post">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
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
                                        <div class="col-md-6 mb-3">
                                            <label for="pickClient" class="form-label">Client</label>
                                            <select id="pickClient" name="clientID" class="form-select select2">

                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" id="kirimBtn"
                                                class="btn btn-primary"
                                                data-style="zoom-in">Submit</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Total Balance Main</p>
                                        <h4 class="mb-0" id="blcMain"><?= defaultMoney($totalBlcMain, true)?></h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center ">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-briefcase-alt font-size-24"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Total Balance Client</p>
                                        <h4 class="mb-0" id="blcClient"><?= defaultMoney($totalBlcClient, true)?></h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center ">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bxs-wink-smile font-size-24"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Total Deposit</p>
                                        <h4 class="mb-0" id="totalDepo"><?= defaultMoney($totalDepo, true)?></h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center ">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx bxs-bank font-size-24"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Total Deposit Comission</p>
                                        <h4 class="mb-0" id="totalDepoCom"><?= defaultMoney($totalKomisiDp, true)?></h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center ">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bxs-credit-card font-size-24"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Total Withdraw</p>
                                        <h4 class="mb-0" id="totalWd"><?= defaultMoney($totalWd, true)?></h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center ">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bxs-wallet-alt font-size-24"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Total Withdraw Commision</p>
                                        <h4 class="mb-0" id="totalWdCom"><?= defaultMoney($totalKomisiWd, true)?></h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center ">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bxs-credit-card font-size-24"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Total Bank Transfer Withdraw</p>
                                        <h4 class="mb-0" id="totalBtWd"><?= defaultMoney($totalBankTransfer, true)?></h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center ">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bxs-wallet-alt font-size-24"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Total Settlement</p>
                                        <h4 class="mb-0" id="totalSettle"><?= defaultMoney($totalSettle, true)?></h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center ">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bxs-check-shield font-size-24"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Total Ho Withdraw</p>
                                        <h4 class="mb-0" id="totalHo"><?= defaultMoney($totalHo, true)?></h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center ">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bxs-check-shield font-size-24"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Total Topup Client</p>
                                        <h4 class="mb-0" id="totalTopUp"><?= defaultMoney($totalTopup, true)?></h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center ">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bxs-check-shield font-size-24"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
<?php $this->endSection();?>
<?php $this->section('javascript');?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/spin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda.min.js"></script>
<script src="/assets/js/formatCurrency.js"></script>
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
        $('#pickCountry').on('change', function () {
            var countryID = $(this).val();
            getClients(countryID);
        });
        $('#formFilterDash').submit(function (event) {
            var l = Ladda.create(document.querySelector('#kirimBtn'));
            var action = $(this).attr('action');
            var dataClient = $("#pickClient").val();
            event.preventDefault();
            l.start();
            let postData = {
                clientID: dataClient
            };
            $.ajax({
                url: action,
                method: 'POST',
                data: postData,
                dataType: 'json',
                success: function (response) {
                    l.stop();
                    $("#totalTopUp").html(formatCurrency(response['totalTopup'], response['locale'], response['currencyCode'], 3));
                    $("#totalHo").html(formatCurrency(response['totalHo'], response['locale'], response['currencyCode'], 3));
                    $("#totalSettle").html(formatCurrency(response['totalSettle'], response['locale'], response['currencyCode'], 3));
                    $("#totalBtWd").html(formatCurrency(response['totalBankTransfer'], response['locale'], response['currencyCode'], 3));
                    $("#totalWdCom").html(formatCurrency(response['totalKomisiWd'], response['locale'], response['currencyCode'], 3));
                    $("#totalWd").html(formatCurrency(response['totalWd'], response['locale'], response['currencyCode'], 3));
                    $("#totalDepoCom").html(formatCurrency(response['totalKomisiDp'], response['locale'], response['currencyCode'], 3));
                    $("#totalDepo").html(formatCurrency(response['totalDepo'], response['locale'], response['currencyCode'], 3));
                    $("#blcClient").html(formatCurrency(response['totalBlcClient'], response['locale'], response['currencyCode'], 3));
                    $("#blcMain").html(formatCurrency(response['totalBlcMain'], response['locale'], response['currencyCode'], 3));
                },
                error: function (xhr, status, error) {
                    l.stop();
                    console.error(xhr);
                }
            });
        });
    });
</script>
<?php $this->endSection();?>