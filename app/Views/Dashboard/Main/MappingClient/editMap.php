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
                        <h4 class="card-title mb-4">Create Virtual Account</h4> 
                        <form action="" method="post">
                            <div class="row">                               
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="pickApi" class="form-label">Api</label>
                                        <select id="pickApi" name="apiKeyID" class="form-select select2">
                                            <option value=""></option>
                                            <option value="<?=$dataGrClient[0]->idApi?>" selected><?=$dataGrClient[0]->apiKey?></option>
                                            <?php foreach ($dataApi as $listApi): ?>
                                                <option value="<?=$listApi->id?>"><?=$listApi->apiKey?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="pickClient" class="form-label">Client</label>
                                        <select id="pickClient" name="clientID" class="form-select select2">
                                            <option value=""></option>
                                            <?php foreach ($dataClient as $listClient): ?>
                                                <?php if($dataGrClient[0]->idCl==$listClient->id ):?>
                                                    <option value="<?=$dataGrClient[0]->idCl?>" selected="selected">
                                                        <?=$dataGrClient[0]->name?>
                                                    </option>
                                                    <?php else:?>
                                                    <option value="<?=$listClient->id?>">
                                                        <?=$listClient->name?>
                                                    </option>
                                                <?php endif;?>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="pickUser" class="form-label">User</label>
                                        <select id="pickUser" name="UserID" class="form-select select2">
                                            <option value=""></option>
                                            <?php foreach ($dataUser as $listUser): ?>
                                                <?php if($dataGrClient[0]->userid==$listUser->id ):?>
                                                    <option value="<?=$dataGrClient[0]->userid?>" selected="selected">
                                                        <?=$dataGrClient[0]->username?>
                                                    </option>
                                                    <?php else:?>
                                                    <option value="<?=$listUser->id?>"><?=$listUser->username?></option>
                                                <?php endif;?>
                                            <?php endforeach;?>
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
<?php $this->endSection();?>
<?php $this->section('javascript');?>
  <!-- validation init -->
  <script src="/assets/js/pages/validation.init.js"></script>
  <script src="/assets/libs/toastr/build/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!-- toastr init -->
  <script src="/js/pages/toastr.init.js"></script>

  <script>
    $(document).ready(function () {
        $("#pickApi").select2({
            placeholder: {
                id: '',
                text: 'Choose Api'
		     },
            language: "en",
        });
        $("#pickClient").select2({
            placeholder: {
                id: '',
                text: 'Choose Clients'
		     },
            language: "en",
        });
        $("#pickUser").select2({
            placeholder: {
                id: '',
                text: 'Choose Users'
		     },
            language: "en",
        });
    });
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