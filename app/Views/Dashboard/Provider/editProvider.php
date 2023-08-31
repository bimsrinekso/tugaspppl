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
                            <div class="column">
                                <div class="col-md-6 mb-3">
                                        <label for="pickCountry" class="form-label">Country</label>
                                        <select id="pickCountry" name="country" class="form-select select2">
                                            <option value=""></option>
                                            <?php if($dataCountry != null):?>
                                                <?php foreach ($dataCountry as $listCountry): ?>
                                                    <?php if($dataProvider->countryID==$listCountry->id ):?>
                                                            <option value="<?=$listCountry->id?>" selected="selected"><?=$listCountry->name?></option>
                                                            <?php else:?>
                                                                <option value="<?=$listCountry->id?>"><?=$listCountry->name?></option>
                                                            <?php endif?>
                                                <?php endforeach;?>
                                        <?php else:?>
                                        <?php endif;?>
                                        </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                        <label class="form-label">Provider Name</label>
                                        <input type="text" name="providerName" class="form-control"
                                            placeholder="Enter Provider Name" value="<?=$dataProvider->providerName?>">
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
<script>

    $(document).ready(function () {
        $("#pickCountry").select2({
            placeholder: {
                id: '',
                text: 'Choose Country'
            },
            language: "en",
        });
    })
</script>
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