<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<link rel="stylesheet" type="text/css" href="/assets/libs/toastr/build/toastr.min.css">   
<?php $this->endSection();?>
<?php $this->section('isKonten');?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Create Client</h4> 
                        <form action="" method="post">
                            <div class="row">                               
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Client Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Input your Client name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Va</label>
                                        <input type="number" step=".01" name="va" class="form-control" placeholder="Input your va">
                                    </div>
                                </div>
                            </div>
                            <div class="row">                               
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Comission Deposit</label>
                                        <input type="number" step=".01" name="comDepo" class="form-control" placeholder="Input your comission Deposit">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Comission Withdraw</label>
                                        <input type="number" step=".01" name="comWd" class="form-control" placeholder="Input your comission Withdraw">
                                    </div>
                                </div>
                            </div>
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
  <script src="/js/pages/toastr.init.js"></script>

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
<?php $this->endSection();?>