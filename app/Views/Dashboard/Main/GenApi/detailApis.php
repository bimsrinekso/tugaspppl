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
                        <h4 class="card-title mb-4">Detail Api</h4>                                
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Client Name</label>
                                <input type="text" value="<?=$dataApi->apiKey?>" class="form-control">
                            </div>
                        </div>      
                        <div class="mb-3">
                            <label class="form-label">Public Key</label>
                            <div class="form-floating">
                                <textarea class="form-control" style="height: 300px" readonly><?=$dataApi->publicKey?></textarea>
                            </div>  
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Private Key</label>
                            <div class="form-floating">
                                <textarea class="form-control" style="height: 300px" readonly><?=$dataApi->privateKey?></textarea>
                            </div>  
                        </div> 
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <input type="text" step=".01" <?=$dataApi->is_allocated == 2 ? "style='color:#2ecc71;font-weight: 500;'" : "style='color:#e74c3c;font-weight: 500;'"?> value="<?=$dataApi->is_allocated == 1 ? "Used" : "Ready"?>" class="form-control">
                            </div>
                        </div>
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
<?php $this->endSection();?>