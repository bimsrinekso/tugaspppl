<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<link rel="stylesheet" type="text/css" href="/assets/libs/toastr/build/toastr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                                <label for="pickCountry" class="form-label">Country</label>
                                        <select id="pickCountry" name="country" class="form-select select2">
                                            <option value=""></option>
                                            <?php if($dataCountry != null):?>
                                                <?php foreach ($dataCountry as $listCountry): ?>
                                                <?php if($dataClient->countryID == $listCountry->id ):?>
                                                    <option value="<?=$listCountry->id?>" selected="selected">
                                                    <?=$listCountry->name?>
                                                    </option>
                                                    <?php else:?>
                                                    <option value="<?=$listCountry->id?>">
                                                        <?=$listCountry->name?>
                                                    </option>
                                                <?php endif;?>
                                            <?php endforeach;?>
                                            <?php else:?>
                                            <?php endif;?>
                                        </select>
                                    </div>
                            </div>                             
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Client Name</label>
                                        <input type="text" value="<?=$dataClient->name?>" name="name" class="form-control" placeholder="Input your Client name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Comission Bank Transfer</label>
                                        <input type="number" step=".01" value="<?=$dataClient->comBt?>" name="comBt" class="form-control" placeholder="Input your va">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Comission Qris</label>
                                        <input type="number" step=".01" value="<?=$dataClient->comQr?>" name="comQr" class="form-control" placeholder="Input your comission Qris">
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Comission Deposit</label>
                                        <input type="number" step=".01" value="$dataClient->comDepo?>" name="comDepo" class="form-control" placeholder="Input your comission">
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Comission Withdraw</label>
                                        <input type="number" step=".01" value="<?=$dataClient->comWd?>" name="comWd" class="form-control" placeholder="Input your comission">
                                    </div>
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
<?php $this->endSection();?>
<?php $this->section('javascript');?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!-- validation init -->
  <script src="/assets/js/pages/validation.init.js"></script>
  <script src="/assets/libs/toastr/build/toastr.min.js"></script>
  <!-- toastr init -->
  <script src="/assets/js/pages/toastr.init.js"></script>
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