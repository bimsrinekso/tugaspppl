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
                        <h4 class="card-title mb-4">Create Bank</h4> 
                        <form action="" method="post">
                            <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="pickClient" class="form-label">Client</label>
                                        <select id="pickClient" name="clientID" class="form-select select2">
                                            <option value="">choose client</option>
                                            <?php if($dataClient != null):?>
                                            <?php foreach ($dataClient as $listClient): ?>
                                                <option value="<?=$listClient->id?>"><?=$listClient->name?></option>
                                            <?php endforeach;?>
                                            <?php else:?>
                                            <?php endif;?>
                                        </select>
                                    </div>
                                </div>
                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="formrow-firstname-input" class="form-label">Bank Name</label>
                                <input type="text" class="form-control" name="bankName" id="formrow-firstname-input" placeholder="Bank Name">
                            </div>
                            <div class="col-md-6">
                                <label for="formrow-firstname-input" class="form-label">Universal Name</label>
                                <input type="text" class="form-control" name="universalName" id="formrow-firstname-input" placeholder="Universal Name">
                            </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Bank Code</label>
                                        <input type="text" name="bankCode" class="form-control" placeholder="Enter Bank Code">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Region</label>
                                        <input type="text" name="region" class="form-control" placeholder="Enter Region">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                <label for="formrow-firstname-input" class="form-label">Region Code</label>
                                <input type="text" class="form-control" name="regionCode" id="formrow-firstname-input" placeholder="Region Code">
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