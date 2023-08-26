<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<link rel="stylesheet" type="text/css" href="/assets/libs/toastr/build/toastr.min.css">
<?php $this->endSection();?>
<?php $this->section('isKonten');?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3 text-primary">Simulation</h4>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">From Date</label>
                                <input type="date" class="form-control" id="fromdate">
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">To Date</label>
                                    <input type="date" class="form-control" id="todate">
                                </div>
                        </div>
                        <div class="col-lg-4">
                            <button type="button" id="subCom" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <div class="card-body border-top py-3">
                       
                        <div class="text-muted">
                            <p class="mb-1"><i class="mdi mdi-circle-medium align-middle text-primary me-1"></i> Total Deposit: <span class="font-size-14 text-muted" id="totalDepo"></span> </p>
                            <p class="mb-1"><i class="mdi mdi-circle-medium align-middle text-primary me-1"></i> Total Withdraw: <span class="font-size-14 text-muted" id="totalWd"></span></p>
                            <p class="mb-1"><i class="mdi mdi-circle-medium align-middle text-primary me-1"></i> Comission Deposit 1.2%: <span class="font-size-14 text-muted" id="simDepo"></span></p>
                            <p class="mb-1"><i class="mdi mdi-circle-medium align-middle text-primary me-1"></i> Comission Withdraw 1.5%: <span class="font-size-14 text-muted" id="simWd"></span></p>
                            <p class="mb-1"><i class="mdi mdi-circle-medium align-middle text-primary me-1"></i> Total Comission: <span class="font-size-14 text-muted" id="totalCom"></span></p>
                        </div>
                    </div>
                    <div class="card-body border-top py-3 bg-primary bg-soft">
                        <p class="mb-0">Before entering the commission every <span class="text-primary">16th or 1st</span>, this is a simulation of the total commission you get.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Create Commision</h4> 
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Amount</label>
                                <input type="text" id="Amount" class="form-control" value="<?=$dataCom->amount?>" name="amount" id="formrow-firstname-input" placeholder="Enter Amount">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->


    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
<?php $this->endSection();?>
<?php $this->section('javascript');?>
  <!-- validation init -->
  <script src="/assets/js/pages/validation.init.js"></script>
  <script src="/assets/libs/toastr/build/toastr.min.js"></script>

  <!-- toastr init -->
  <script src="/assets/js/pages/toastr.init.js"></script>

  <script>
    $("#subCom").click(function(){
        var fromdate = $("#fromdate").val();
        var todate = $("#todate").val();
        fromdate = fromdate + " 00:00:00";
        todate = todate + " 23:59:59"; 
        var duid = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'KRW',
        });
        $.ajax({
            url: "<?= base_url('dashboard/simulateCom') ?>",
            type: "post",
            data: {
                fromdate: fromdate,
                todate: todate
            },
            success: function(data){
                var parseData = JSON.parse(data);
                console.log(parseData);
                var totalDp = parseData['depo'][0]['total'];
                var totalWd = parseData['wd'][0]['totalWd'];
                var simDp = parseInt(totalDp) * 1.2 / 100;
                var simWd = parseInt(totalWd) * 1.5 / 100;
                var totalCom = parseInt(simDp) + parseInt(simWd);
                $("#totalDepo").html(duid.format(totalDp));
                $("#totalWd").html(duid.format(totalWd));
                $("#simDepo").html(duid.format(simDp));
                $("#simWd").html(duid.format(simWd));
                $("#totalCom").html(duid.format(totalCom));
            }
        })
    })
  </script>

<?php if(session()->getFlashdata('sukses')):?>
        <script>
              toastr.success("<?= session()->getFlashData("sukses"); ?>");
        </script>
    <?php elseif(session()->getFlashdata('error')):?>
        <script>
            toastr.error("<?= session()->getFlashData("error"); ?>");
        </script>
    <?php elseif(session()->getFlashdata('validation')):?>
        <script>
            toastr.error('<?= session()->getFlashData("validation"); ?>', '', {
                "timeOut": "5000",
                "escapeHtml": false,
                "closeButton": true,
                "positionClass": "toast-top-right"
            });
        </script>
    <?php endif?>
    <script>
        Amount.addEventListener('input', function(e){
        Amount.value = formatCurrency(this.value);
    });

    function formatCurrency(angka) {
        var number_string = angka.replace(/[^0-9]/g, '');
        var rupiah = Number(number_string);

        // Format as KRW with symbol and thousands separators
        var formattedAmount = 'Rp' + rupiah.toLocaleString('ko-KR');

        return formattedAmount;
    }
    </script>
<?php $this->endSection();?>