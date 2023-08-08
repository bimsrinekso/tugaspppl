<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<link rel="stylesheet" type="text/css" href="/assets//libs/toastr/build/toastr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Plugins css -->

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
                                            placeholder="Enter Holder Name" value="<?=$dataQris->merchantName?>">
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="formrow-inputState" class="form-label">Status</label>
                                        <select id="formrow-inputState" name="status" class="form-select">
                                                <?php foreach($groupStatus as $listStatus): ?>
                                                <?php if($dataQris->status == $listStatus->id):?>
                                                    <option value="<?= $listStatus->id ?>" selected><?= $listStatus->name ?></option>
                                                <?php else:?>
                                                    <option value="<?= $listStatus->id ?>"><?= $listStatus->name ?></option>
                                                <?php endif?>
                                                <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Qris Barcode</label>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">Qris</label>
                                    <input type="file" name="gambar" class="form-control" id="inputGroupFile01" <?=$dataQris->gambar?>>
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