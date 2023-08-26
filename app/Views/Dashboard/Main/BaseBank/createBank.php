<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<link rel="stylesheet" type="text/css" href="/assets/libs/toastr/build/toastr.min.css">
<link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

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
                            <div class="column">
                                <div class="col-md-6 mb-3">
                                    <label for="pickCountry" class="form-label">Country</label>
                                    <select id="pickCountry" name="country" class="form-control select2 ">
                                        <option value="">choose country</option>
                                        <?php if($dataCountry != null):?>
                                        <?php foreach ($dataCountry as $listCountry): ?>
                                        <option value="<?=$listCountry->id?>"><?=$listCountry->name?></option>
                                        <?php endforeach;?>
                                        <?php else:?>
                                        <?php endif;?>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="formrow-firstname-input" class="form-label">Bank Name</label>
                                        <input type="text" class="form-control" name="bankName"
                                            id="formrow-firstname-input" placeholder="Bank Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="formrow-firstname-input" class="form-label">Universal Name</label>
                                        <input type="text" class="form-control" name="universalName"
                                            id="formrow-firstname-input" placeholder="Universal Name">
                                    </div>

                                </div>
                                

                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
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
<script src="/assets/libs/select2/js/select2.min.js"></script>
<!-- form advanced init -->
<script src="/assets/js/pages/form-advanced.init.js"></script>


<?php $this->endSection();?>