<?php $this->extend('Inc/main');?>
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
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex flex-wrap">
                                    <h4 class="card-title mb-4">Overview</h4>
                                    <div class="ms-auto">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="pill"
                                                    href="#balance">Balance</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="pill"
                                                    href="#transactions">Transactions</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="pill" href="#fee">Fee</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="balance">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="card mini-stats-wid">
                                                        <div class="card-body">
                                                            <div class="d-flex">
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted fw-medium">Total
                                                                        Balance
                                                                    </p>
                                                                    <h4 class="mb-0" id="blcClient">
                                                                        <?= defaultMoney($totalBlcClient, true)?>
                                                                    </h4>
                                                                </div>

                                                                <div class="flex-shrink-0 align-self-center ">
                                                                    <div
                                                                        class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                                        <span
                                                                            class="avatar-title rounded-circle bg-primary">
                                                                            <i
                                                                                class="bx bxs-wink-smile font-size-24"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="transactions">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="card mini-stats-wid">
                                                        <div class="card-body">
                                                            <div class="d-flex">
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted fw-medium">Total
                                                                        Deposit</p>
                                                                    <h4 class="mb-0" id="totalDepo">
                                                                        <?= defaultMoney($totalDepo, true)?>
                                                                    </h4>
                                                                </div>

                                                                <div class="flex-shrink-0 align-self-center ">
                                                                    <div
                                                                        class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                                        <span
                                                                            class="avatar-title rounded-circle bg-primary">
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
                                                                    <p class="text-muted fw-medium">Total
                                                                        Withdraw</p>
                                                                    <h4 class="mb-0" id="totalWd">
                                                                        <?= defaultMoney($totalWd, true)?>
                                                                    </h4>
                                                                </div>

                                                                <div class="flex-shrink-0 align-self-center ">
                                                                    <div
                                                                        class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                                        <span
                                                                            class="avatar-title rounded-circle bg-primary">
                                                                            <i
                                                                                class="bx bxs-wallet-alt font-size-24"></i>
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
                                                                    <p class="text-muted fw-medium">Total
                                                                        Settlement</p>
                                                                    <h4 class="mb-0" id="totalSettle">
                                                                        <?= defaultMoney($totalSettle, true)?>
                                                                    </h4>
                                                                </div>

                                                                <div class="flex-shrink-0 align-self-center ">
                                                                    <div
                                                                        class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                                        <span
                                                                            class="avatar-title rounded-circle bg-primary">
                                                                            <i
                                                                                class="bx bxs-check-shield font-size-24"></i>
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
                                                                    <p class="text-muted fw-medium">Total Ho
                                                                        Withdraw
                                                                    </p>
                                                                    <h4 class="mb-0" id="totalHo">
                                                                        <?= defaultMoney($totalHo, true)?>
                                                                    </h4>
                                                                </div>

                                                                <div class="flex-shrink-0 align-self-center ">
                                                                    <div
                                                                        class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                                        <span
                                                                            class="avatar-title rounded-circle bg-primary">
                                                                            <i
                                                                                class="bx bxs-check-shield font-size-24"></i>
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
                                                                    <p class="text-muted fw-medium">Total Topup
                                                                    </p>
                                                                    <h4 class="mb-0" id="totalTopUp">
                                                                        <?= defaultMoney($totalTopup, true)?>
                                                                    </h4>
                                                                </div>

                                                                <div class="flex-shrink-0 align-self-center ">
                                                                    <div
                                                                        class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                                        <span
                                                                            class="avatar-title rounded-circle bg-primary">
                                                                            <i
                                                                                class="bx bxs-check-shield font-size-24"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="fee">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="card mini-stats-wid">
                                                        <div class="card-body">
                                                            <div class="d-flex">
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted fw-medium">Total
                                                                        Deposit
                                                                        Comission
                                                                    </p>
                                                                    <h4 class="mb-0" id="totalDepoCom">
                                                                        <?= defaultMoney($totalKomisiDp, true)?>
                                                                    </h4>
                                                                </div>

                                                                <div class="flex-shrink-0 align-self-center ">
                                                                    <div
                                                                        class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                                        <span
                                                                            class="avatar-title rounded-circle bg-primary">
                                                                            <i
                                                                                class="bx bxs-credit-card font-size-24"></i>
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
                                                                    <p class="text-muted fw-medium">Fee Bank
                                                                        Transfer
                                                                        Deposit</p>
                                                                    <h4 class="mb-0" id="komisiBt">
                                                                        <?= defaultMoney($komisiBt, true)?></h4>
                                                                </div>

                                                                <div class="flex-shrink-0 align-self-center ">
                                                                    <div
                                                                        class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                                        <span
                                                                            class="avatar-title rounded-circle bg-primary">
                                                                            <i class="bx bx bx-gift font-size-24"></i>
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
                                                                    <p class="text-muted fw-medium">Fee Qris
                                                                        Deposit</p>
                                                                    <h4 class="mb-0" id="komisiQr">
                                                                        <?= defaultMoney($komisiQr, true)?></h4>
                                                                </div>

                                                                <div class="flex-shrink-0 align-self-center ">
                                                                    <div
                                                                        class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                                        <span
                                                                            class="avatar-title rounded-circle bg-primary">
                                                                            <i class="bx bx bx-gift font-size-24"></i>
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
                                                                    <p class="text-muted fw-medium">Total
                                                                        Withdraw
                                                                        Commision</p>
                                                                    <h4 class="mb-0" id="totalWdCom">
                                                                        <?= defaultMoney($totalKomisiWd, true)?>
                                                                    </h4>
                                                                </div>

                                                                <div class="flex-shrink-0 align-self-center ">
                                                                    <div
                                                                        class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                                        <span
                                                                            class="avatar-title rounded-circle bg-primary">
                                                                            <i
                                                                                class="bx bxs-credit-card font-size-24"></i>
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
                                                                    <p class="text-muted fw-medium">Fee Bank
                                                                        Transfer
                                                                        Withdraw</p>
                                                                    <h4 class="mb-0" id="totalBtWd">
                                                                        <?= defaultMoney($totalBankTransfer, true)?>
                                                                    </h4>
                                                                </div>

                                                                <div class="flex-shrink-0 align-self-center ">
                                                                    <div
                                                                        class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                                        <span
                                                                            class="avatar-title rounded-circle bg-primary">
                                                                            <i class="bx bx bx-gift font-size-24"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
<!-- End Page-content -->
<?php $this->endSection();?>
<?php $this->section('javascript');?>
<?php $this->endSection();?>