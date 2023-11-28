<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<!-- DataTables -->
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />
<link rel="stylesheet" type="text/css" href="/assets/libs/toastr/build/toastr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda.min.css">
<style>
    .ikiError {
        color: #ed2a26;
        font-size: 12px;
        font-weight: 400;
        font-family: 'Roboto', sans-serif;
        text-align: left;
        line-height: 26px;
    }

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
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tracking Balance</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex flex-wrap">
                            <h4 class="card-title mb-4">Overview</h4>
                            <div class="ms-auto">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="pill" href="#balance">Balance</a>
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
                                                            <p class="text-muted fw-medium">Debit
                                                                Total
                                                            </p>
                                                            <h4 class="mb-0" style="color:red">
                                                                <?=defaultMoney($debit,true)?>
                                                            </h4>
                                                        </div>

                                                        <div class="flex-shrink-0 align-self-center ">
                                                            <div
                                                                class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                                <span class="avatar-title rounded-circle bg-primary">
                                                                    <i class="bx bxs-archive-in font-size-24"></i>
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
                                                            <p class="text-muted fw-medium">Credit
                                                                Total
                                                            </p>
                                                            <h4 class="mb-0" style="color:#13fc03">
                                                                <?=defaultMoney($credit,true)?>
                                                            </h4>
                                                        </div>

                                                        <div class="flex-shrink-0 align-self-center ">
                                                            <div
                                                                class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                                <span class="avatar-title rounded-circle bg-primary">
                                                                    <i class="bx bxs-archive-out font-size-24"></i>
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
                                                            <p class="text-muted fw-medium">Balance
                                                                Total
                                                            </p>
                                                            <h4 class="mb-0">
                                                                <?=defaultMoney($total,true)?>
                                                            </h4>
                                                        </div>

                                                        <div class="flex-shrink-0 align-self-center ">
                                                            <div
                                                                class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                                <span class="avatar-title rounded-circle bg-primary">
                                                                    <i class="bx bxs-wallet-alt font-size-24"></i>
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
        </div>
    </div>
</div>
</div>
<!-- container-fluid -->
</div>
<?php $this->endSection();?>
<?php $this->section('javascript');?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/spin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda.min.js"></script>
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
<!-- <script src="/assets/js/pages/validation.init.js"></script> -->
<script src="/js/pages/datatables.init.js"></script>
<script src="/assets/libs/jquery-validation/jquery.validate.min.js"></script>
<script>
    formatIdr = (money) => {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
        }).format(money);
    };
</script>
<script src="/assets/js/plugins/service/generateTable.js"></script>
<script src="/assets/js/plugins/service/tableTrackBlc.js"></script>

<script>
    $(document).ready(function () {
        $("#pickJenis").select2({
            placeholder: {
                id: '',
                text: 'Choose Type'
            },
            language: "en",
        });
        $("#pickCatBlc").select2({
            placeholder: {
                id: '',
                text: 'Choose Category'
            },
            language: "en",
        });
    });
    // Add event listener to a common parent element (e.g., a modal or a container)
</script>
<?php $this->endSection();?>