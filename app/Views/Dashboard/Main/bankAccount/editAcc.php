<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<link rel="stylesheet" type="text/css" href="/assets//libs/toastr/build/toastr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $this->endSection();?>
<?php $this->section('isKonten');?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Edit Account</h4> 
                        <form action="" method="post">
                            <div class="row">
                            <div class="col-md-6 mb-3">
                                    <label for="pickCountry" class="form-label">Country</label>
                                    <select id="pickCountry" name="country" class="form-select select2">
                                        <option value=""></option>
                                        <?php if($dataCountry != null):?>
                                        <?php foreach ($dataCountry as $listCountry): ?>
                                        <option value="<?=$listCountry->id?>"><?=$listCountry->name?></option>
                                        <?php endforeach;?>
                                        <?php else:?>
                                        <?php endif;?>
                                    </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                    <label for="pickBank" class="form-label">Bank</label>
                                    <select id="pickBank" name="bank" class="form-select select2">
                                        
                                    </select>
                            </div>
                            <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="pickClient" class="form-label">Client</label>
                                        <select id="pickClient" name="clientID" class="form-select select2">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Account Number</label>
                                        <input type="text" name="accNumber" value="<?=$dataVa->accNumber?>" class="form-control" placeholder="Enter Account Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Holder Name</label>
                                        <input type="text" name="holderName" value="<?=$dataVa->holderName?>" class="form-control" placeholder="Enter Holder Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="formrow-inputState" class="form-label">Status</label>
                                        <select id="formrow-inputState" name="status" class="form-select">
                                            <?php foreach($groupStatus as $listStatus): ?>
                                                <?php if($dataVa->status == $listStatus->id):?>
                                                    <option value="<?= $listStatus->id ?>" selected><?= $listStatus->name ?></option>
                                                <?php else:?>
                                                    <option value="<?= $listStatus->id ?>"><?= $listStatus->name ?></option>
                                                <?php endif?>
                                                <?php endforeach ?> 
                                        </select>
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
        <!-- end row -->


    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
<!-- End Page-content -->
<?php $this->endSection();?>
<?php $this->section('javascript');?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
     $(document).ready(function () {
        $("#pickClient").select2({
            placeholder: {
                id: '',
                text: 'Choose Clients'
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