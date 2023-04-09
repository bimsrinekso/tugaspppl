<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<link rel="stylesheet" type="text/css" href="/assets/libs/toastr/build/toastr.min.css">   
<?php $this->endSection();?>
<?php $this->section('isKonten');?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="column">
                <div class="col-lg-6">
                    <div class="card mini-stats-wid">
                        <div class="card-body bg-success bg-soft">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Total Balance</p>
                                    <h4 class="mb-0"><?= formatKrw($totalBlcClient) ?> </h4>
                                </div>
    
                                <div class="flex-shrink-0 align-self-center">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-top py-3">
                            <p class="mb-0"> If the total withdrawal that you requested exceeds your total balance, the system will automatically reject it.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Request HO Withdraw</h4> 
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Amount</label>
                                            <input type="text" name="amount" class="form-control" placeholder="Enter Amount">
                                        </div>
                                    </div>
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