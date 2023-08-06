<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<link rel="stylesheet" type="text/css" href="/assets/libs/toastr/build/toastr.min.css">   
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .setVisible{
        visibility: hidden;
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
                        <h4 class="card-title mb-4">Edit Mapping</h4> 
                        <form action="" method="post">
                            <div class="column">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                    <div class="form-check mb-3">
                                            <input class="form-check-input" name="userType" value="client" type="radio" id="clientRadio" <?php if(!empty($dataGrClient[0]->idApi)){echo "checked";}?>>
                                            <label class="form-check-label" for="clientRadio">
                                                    Client
                                                </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="userType" value="helpdesk" type="radio" id="helpdeskRadio" <?php if(empty($dataGrClient[0]->idApi)){echo "checked";}?>>
                                            <label class="form-check-label" for="helpdeskRadio">
                                                    Helpdesk
                                                </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                        <label for="pickCountry" class="form-label">Country</label>
                                        <select id="pickCountry" name="country" class="form-select select2">
                                            <option value=""></option>
                                            <?php if($dataCountry != null):?>
                                            <?php foreach ($dataCountry as $listCountry): ?>
                                                <?php if($dataGrClient[0]->countryID==$listCountry->id ):?>
                                                    <option value="<?=$listCountry->id?>" selected="selected"><?=$listCountry->name?></option>
                                                    <?php else:?>
                                                        <option value="<?=$listCountry->id?>"><?=$listCountry->name?></option>
                                                    <?php endif?>
                                               
                                            <?php endforeach;?>
                                            <?php else:?>
                                            <?php endif;?>
                                        </select>
                                </div>
                                <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="pickClient" class="form-label">Client</label>
                                        <select id="pickClient" name="clientID" class="form-select select2">
                                           
                                      
                                        </select>
                                    </div>
                                </div>
                                <div id="apiForm" class="col-lg-6 <?php if(empty($dataGrClient->idApi)){echo "setVisible";}?>">
                                    <div class="mb-3">
                                        <label for="pickApi" class="form-label">Api</label>
                                        <select id="pickApi" name="apiKeyID" class="form-select select2">
                                            <option value=""></option>
                                            <option value="<?=$dataGrClient[0]->idApi?>" selected="selected"><?=$dataGrClient[0]->apiKey?></option>
                                            <?php if($dataApi != null):?>
                                            <?php foreach ($dataApi as $listApi): ?>
                                                <option value="<?=$listApi->id?>"><?=$listApi->apiKey?></option>
                                            <?php endforeach;?>
                                            <?php else:?>
                                            <?php endif;?>
                                        </select>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="pickUser" class="form-label">User</label>
                                        <select id="pickUser" name="UserID" class="form-select select2">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                
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
    function getUserType(type, selectedUser){
        $.ajax({
            url: '<?=base_url('dashboard/mapping/getUserType')?>',
            method: 'POST',
            data: {
                userType: type
            },
            dataType: 'json',
            success: function (response) {
                $('#pickUser').empty();
                if (response.users) {
                    response.users.forEach(function (user) {
                        $('#pickUser').append($('<option>', {
                            value: user.id,
                            text: user.username
                        }));
                    });
                    if (selectedUser !== null) {
                        $('#pickUser').val(selectedUser).trigger('change');
                    }
                } else {
                    $('#pickUser').append($('<option>', {
                        value: '',
                        text: 'No users found'
                    }));
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }
    function getClients(countryID, selectedClient){
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
        $('input[name="userType"]').on('change', function () {
            if ($(this).val() === 'client') {
                $('#apiForm').removeClass('setVisible');
                getUserType('client');
            } else {
                $('#apiForm').addClass('setVisible');
                getUserType('helpdesk');
            }
        });
        $("#pickCountry").select2({
            placeholder: {
                id: '',
                text: 'Choose Country'
		     },
            language: "en",
        });
        $('#pickCountry').on('change', function(){
            var countryID = $(this).val();
            getClients(countryID);
        })
        var selectedCountry = '<?=$dataGrClient[0]->countryID?>';
        var selectedUser = '<?=$dataGrClient[0]->userid?>';
        var selectedClient = '<?=$dataGrClient[0]->idCl?>'
        $('#pickCountry').trigger('change',selectedCountry);
        var typeUser = '<?= !empty($dataGrClient[0]->idApi) ? "client" : "helpdesk" ?>';
        console.log(typeUser);
        getUserType(typeUser, selectedUser);
        getClients(selectedCountry, selectedClient);
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