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
                        <h4 class="card-title mb-4">Change Password</h4>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="curentPw" class="form-label">Current Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control" name="currentPw" placeholder="Enter current password"
                                                aria-label="Current Password" aria-describedby="password-current">
                                            <button class="btn btn-light " type="button" id="password-current"><i
                                                    class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userpassword" class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control" name="password" placeholder="Enter password"
                                                aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i
                                                    class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmPassword" class="form-label">Confirmation Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control" name="confirmPw" placeholder="Enter confirm password"
                                                aria-label="Confirmation Password" aria-describedby="password-confirm">
                                            <button class="btn btn-light " type="button" id="password-confirm"><i
                                                    class="mdi mdi-eye-outline"></i></button>
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
    <?php elseif(session()->getFlashdata('validation')):?>
        <script>
            toastr.error('<?= session()->getFlashData("validation"); ?>', '', {
                "timeOut": "5000",
                "escapeHtml": false,
                "closeButton": true,
                "positionClass": "toast-top-right"
            });
        </script>
    <?php endif?>
<?php $this->endSection();?>