<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<link rel="stylesheet" type="text/css" href="/assets//libs/toastr/build/toastr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Plugins css -->
<link href="/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

<?php $this->endSection();?>
<?php $this->section('isKonten');?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Create Account</h4>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Merchant Name</label>
                                        <input type="text" name="merchantName" class="form-control"
                                            placeholder="Enter Holder Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="formrow-inputState" class="form-label">Status</label>
                                        <select id="formrow-inputState" name="status" class="form-select">
                                            <?php foreach($groupStatus as $listStatus): ?>
                                            <option value="<?= $listStatus->id ?>"><?= $listStatus->name ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Qris Barcode</label>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">Qris</label>
                                    <input type="file" name="gambar" class="form-control" id="inputGroupFile01">
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="pickProvider" class="form-label">Provider</label>
                                        <select id="pickProvider" name="providerID" class="form-select select2">
                                            <option value="">Choose Provider</option>
                                            <?php if($dataProvider != null):?>
                                            <?php foreach ($dataProvider as $listProvider): ?>
                                            <option value="<?=$listProvider->id?>"><?=$listProvider->providerName?>
                                            </option>
                                            <?php endforeach;?>
                                            <?php else:?>
                                            <?php endif;?>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="formrow-firstname-input" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username"
                                            id="formrow-firstname-input" placeholder="Username">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="formrow-firstname-input" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            id="formrow-firstname-input" placeholder="Password">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-md">Submit</button>
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
<!-- End Page-content -->
<?php $this->endSection();?>
<?php $this->section('javascript');?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="/assets/libs/dropzone/min/dropzone.min.js"></script>

<!-- validation init -->
<script src="/assets/js/pages/validation.init.js"></script>
<script src="/assets/libs/toastr/build/toastr.min.js"></script>

<!-- toastr init -->
<script src="/assets/js/pages/toastr.init.js"></script>
<?php if(session()->getFlashdata('sukses')):?>
<script>
    toastr.success("<?= session()->getFlashData("
        sukses "); ?>");
</script>
<?php elseif(session()->getFlashdata('error')):?>
<script>
    toastr.error("<?= session()->getFlashData("
        error "); ?>");
</script>
<?php endif?>
<?php $this->endSection();?>