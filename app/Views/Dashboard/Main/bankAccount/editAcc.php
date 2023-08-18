<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<link rel="stylesheet" type="text/css" href="/assets//libs/toastr/build/toastr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .setVisible {
    display: block;
}

.hidden {
    display: none;
}

</style>
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
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="pickSelect" class="form-label">Api</label>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" name="API" value="yes" type="radio" <?php if(!empty($dataBank->accUser)){echo "checked";}?>
                                            id="yesRadio" >
                                        <label class="form-check-label" for="yesRadio" >
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="API" value="no" type="radio" <?php if(empty($dataBank->accUser)){echo "checked";}?>
                                            id="noRadio">
                                        <label class="form-check-label" for="noRadio">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6 mb-3">
                                    <label for="pickCountry" class="form-label">Country</label>
                                    <select id="pickCountry" name="country" class="form-select select2">
                                        <option value=""></option>
                                        <?php if($dataCountry != null):?>
                                        <?php foreach ($dataCountry as $listCountry): ?>
                                            <?php if($dataBank->countryID==$listCountry->id ):?>
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
                                        <input type="text" name="accNumber" value="<?=$dataBank->accNumber?>" class="form-control" placeholder="Enter Account Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Holder Name</label>
                                        <input type="text" name="holderName" value="<?=$dataBank->holderName?>" class="form-control" placeholder="Enter Holder Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="formrow-inputState" class="form-label">Status</label>
                                        <select id="formrow-inputState" name="status" class="form-select">
                                            <?php foreach($groupStatus as $listStatus): ?>
                                                <?php if($dataBank->status == $listStatus->id):?>
                                                    <option value="<?= $listStatus->id ?>" selected><?= $listStatus->name ?></option>
                                                <?php else:?>
                                                    <option value="<?= $listStatus->id ?>"><?= $listStatus->name ?></option>
                                                <?php endif?>
                                                <?php endforeach ?> 
                                        </select>
                                    </div>
                                </div>
                            </div>                             
                            <div class="row hidden" id="apiForm">
                                    <div class="col-md-6 mb-3">
                                        <label for="pickApi" class="form-label">Api</label>
                                        <select id="pickApi" name="apiKeyID" class="form-select select2">
                                            <option value=""></option>
                                            <?php if($dataApi != null):?>
                                            <?php foreach ($dataApi as $listApi): ?>
                                                 <?php if($dataBank->accApi == $listApi->id):?>
                                                   <option value="<?=$listApi->id?>" selected><?=$listApi->apiKey?></option>
                                                <?php else:?>
                                                    <option value="<?=$listApi->id?>"><?=$listApi->apiKey?></option>
                                                <?php endif?>
                                            <?php endforeach;?>
                                            <?php else:?>
                                            <?php endif;?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Username</label>
                                            <input type="text" class="form-control" name="username"
                                                id="formrow-firstname-input" placeholder="Username" value="<?=$dataBank->accUser?>">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password"
                                                id="formrow-firstname-input" placeholder="Password" value="<?=$dataBank->accPw?>">
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
    function getClients(countryID, selectedClient) {
        $.ajax({
            url: '<?=base_url('dashboard/country/getClients')?>',
            method: 'POST',
            data: {
                country: countryID
            },
            dataType: 'json',
            success: function (response) {
                $('#pickClient').empty();
                if (response.clients) {
                    response.clients.forEach(function (client) {
                        $('#pickClient').append($('<option>', {
                            value: client.id,
                            text: client.name
                        }));
                    });
                    if (selectedClient !== null) {
                        $('#pickClient').val(selectedClient).trigger('change');
                        
                    }
                } else {
                    $('#pickClient').append($('<option>', {
                        value: '',
                        text: 'No clients found'
                    }));
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }
    function getBanks(countryID, selectedBank) {
        $.ajax({
            url: '<?=base_url('dashboard/country/getBanks')?>',
            method: 'POST',
            data: {
                country: countryID
            },
            dataType: 'json',
            success: function (response) {
                $('#pickBank').empty();
                if (response.banks) {
                    response.banks.forEach(function (banks) {
                        $('#pickBank').append($('<option>', {
                            value: banks.id,
                            text: banks.bankName
                        }));
                    });
                    if (selectedBank !== null) {
                        $('#pickBank').val(selectedBank).trigger('change');
                    }
                } else {
                    $('#pickBank').append($('<option>', {
                        value: '',
                        text: 'No banks found'
                    }));
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }
     $(document).ready(function () {
        $("#pickClient").select2({
            placeholder: {
                id: '',
                text: 'Choose Clients'
		     },
            language: "en",
        });
        $("#pickCountry").select2({
            placeholder: {
                id: '',
                text: 'Choose Country'
            },
            language: "en",
        });
        $("#pickBank").select2({
            placeholder: {
                id: '',
                text: 'Choose Bank'
            },
            language: "en",
        });
        $('#pickCountry').on('change', function () {
            var countryID = $(this).val();
            getClients(countryID);
            getBanks(countryID);
        })
        $("#pickApi").select2({
            placeholder: {
                id: '',
                text: 'Choose Api'
            },
            language: "en",
        });
        $('input[name="API"]').on('change', function () {
            if ($(this).val() === 'yes') {
                $('#apiForm').removeClass('hidden');
            } else {
                $('#apiForm').addClass('hidden');
            }
        });

        var selectedCountry = '<?=$dataBank->countryID?>';
        $('#pickCountry').val(selectedCountry).change();
        var selectedBank = '<?=$dataBank->lbID?>';
        var selectedClient = '<?=$dataBank->clientID?>';
        getClients(selectedCountry, selectedClient);
        getBanks(selectedCountry, selectedBank);
        
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