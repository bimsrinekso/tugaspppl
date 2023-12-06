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
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="daterange" class="control-label">Filter Date</label>
                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control"
                            placeholder="Choose date range" name="daterangeConf"
                            id="daterange" value="" />
                    </div>
                    <div class="col-4">
                        <button class="btn btn-secondary waves-effect waves-light"
                            id="btnFilterCon" 
                            onclick="filterTgl()" type="button">Filter</a>
                    </div>
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
                                        <a class="nav-link active" data-bs-toggle="pill" href="#balance">All</a>
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
                                                            <p class="text-muted fw-medium">Outcome
                                                                Total
                                                            </p>
                                                            <h4 class="mb-0" style="color:red" id="debit">
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
                                                            <p class="text-muted fw-medium">Income
                                                                Total
                                                            </p>
                                                            <h4 class="mb-0" style="color:#13fc03" id="credit">
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
                                                            <h4 class="mb-0" id="total">
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
            <div class="col-lg-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-7">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">List Balance</h4>
                                        <div class="table-responsive">
                                            <table id="datatable-balance" class="table table-striped table-bordered nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>TrxID</th>
                                                        <th>Amount</th>
                                                        <th>Category</th>
                                                        <th>Type</th>
                                                        <th>Action By</th>
                                                        <th>Created At</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">List Pos</h4>
                                        <div class="table-responsive">
                                            <table id="datatable-pos" class="table table-striped table-bordered nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Transaction</th>
                                                        <th>Cash In</th>
                                                        <th>Cast Out</th>
                                                        <th>Actual Amount</th>
                                                        <th>Operator</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
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
<script src="/assets/js/plugins/service/tablePos.js"></script> 
<script src="/assets/js/plugins/service/tableBalance.js"></script> 

<script>
        var targetTgl = 'Conf';
        function filterTgl(){
            var tgl = $('input[name="daterange' + targetTgl + '"]').val();
            
            var splitTgl = tgl.split('-');
            var startDate = formatDate(splitTgl[0], false);
            var endDate = formatDate(splitTgl[1], true);
            var postData = {
                startDate: startDate,
                endDate: endDate
                };
                $.ajax({
                    url: '/dashboard/filtertrack',
                    type: 'POST',
                    data: postData,
                    dataType: 'json',
                    success: function (response) {
                        $("#debit").html(formatIdr(response['debit']));
                        $("#credit").html(formatIdr(response['credit']));
                        $("#total").html(formatIdr(response['total']));
                    },
                    error: function (response) {
                        console.log(response);
                    }
                });
            if (tgl == '') {
                generateTable('#datatable-balance', '/dashboard/getbalance', columnBalanceTb, orderBalance);
                generateTable('#datatable-pos', '/dashboard/getpos', columnposTb, orderpos);
            } else {
                generateTable('#datatable-balance', '/dashboard/getbalance', columnBalanceTb, orderBalance,startDate,endDate);
                generateTable('#datatable-pos', '/dashboard/getpos', columnposTb, orderpos,startDate,endDate);
            }

            
        }
    $(document).ready(function () {
        generateTable('#datatable-balance', '/dashboard/getbalance', columnBalanceTb, orderBalance);
        generateTable('#datatable-pos', '/dashboard/getpos', columnposTb, orderpos);
        ['daterangeConf'].forEach(function (inputName) {
            $('input[name="' + inputName + '"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear',
                    format: 'DD/MM/YYYY'
                }
            });

            $('input[name="' + inputName + '"]').on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });

            $('input[name="' + inputName + '"]').on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });
        });
    });
</script>
<?php $this->endSection();?>