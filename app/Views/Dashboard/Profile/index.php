<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<link rel="stylesheet" type="text/css" href="/assets/libs/toastr/build/toastr.min.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.css" /> 
<style>
    .CodeMirror{
        height:auto !important;
    }

    .codemirror-container {
        border: 1px solid #ced4da;
        border-radius: 4px;
    }
</style> 
<?php $this->endSection();?>
<?php $this->section('isKonten');?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card px-5 py-4">
                    <div class="tab-content tex-muted mt-md-0">
                        <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <h5 class="mb-3 mt-1">Profile</h5>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input type="text" value="<?=$dataUser->username?>" name="username" class="form-control" placeholder="Input your username" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" value="<?=$dataUser->email?>" name="email" class="form-control" placeholder="Input your email" required>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit " class="btn btn-primary waves-effect waves-light ">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            <h5 class="mb-3 mt-1">Settings</h5>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="curentPw" class="form-label">Current Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" name="currentPw" placeholder="Enter current password" aria-label="Current Password" aria-describedby="password-current" required>
                                                <button class="btn btn-light " type="button" id="password-current">
                                                    <i class="mdi mdi-eye-outline"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userpassword" class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" name="password" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" required>
                                                <button class="btn btn-light " type="button" id="password-addon">
                                                    <i class="mdi mdi-eye-outline"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="confirmPassword" class="form-label">Confirmation Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" name="confirmPw" placeholder="Enter confirm password" aria-label="Confirmation Password" aria-describedby="password-confirm" required>
                                                <button class="btn btn-light" type="button" id="password-confirm">
                                                    <i class="mdi mdi-eye-outline"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="v-pills-key" role="tabpanel" aria-labelledby="v-pills-key-tab">
                            <h5 class="mb-3 mt-1">Personal Key</h5>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label">Api Key</label>
                                        <input type="text" value="<?=$dataKey->apiKey?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Public Key</label>
                                        <div id="publicKey" class="codemirror-container"></div>
                                        <button id="downloadPublicKeyBtn" class="btn btn-primary mt-2" onclick="downloadKey(publicKeyEditor, 'public_key.pem')">Download Public Key</button>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Private Key</label>
                                        <div id="privateKey" class="codemirror-container"></div>
                                        <button id="downloadPrivateKeyBtn" class="btn btn-primary mt-2" onclick="downloadKey(privateKeyEditor, 'private_key.pem')">Download Private Key</button>
                                    </div>
                                </div>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                 <div class="card">
                    <div class="nav flex-column nav-pills py-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link mb-2 active" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a>
                        <a class="nav-link mb-2" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                        <a class="nav-link mb-2" id="v-pills-key-tab" data-bs-toggle="pill" href="#v-pills-key" role="tab" aria-controls="v-pills-key" aria-selected="false">Personal Key</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page-content -->
<?php $this->endSection();?>
<?php $this->section('javascript');?>
    <script src="/assets/libs/toastr/build/toastr.min.js"></script>
    <script src="/assets/js/pages/toastr.init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/javascript/javascript.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/shell/shell.min.js"></script>
    <!-- validation init -->
    <script src="/assets/js/pages/validation.init.js"></script>

  <script>
    $(document).ready(function() {
        $('#v-pills-key-tab').on('shown.bs.tab', function() {
            function downloadKey(editor, fileName) {
                const text = editor.getValue();
                const blob = new Blob([text], { type: 'application/x-pem-file' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = fileName;
                link.click();
                URL.revokeObjectURL(link.href);
            }
            let inpub = $('#publicKey').find(".CodeMirror");
            var totalInpub = inpub.length;
            if(totalInpub == 0){
                const publicKeyEditor = CodeMirror(document.getElementById('publicKey'), {
                    value: `<?=$dataKey->publicKey?>`,
                    mode: 'shell',
                    readOnly: true,
                    lineNumbers: true,
                    lineWrapping: true,
                });
                const downloadPublicKeyBtn = document.getElementById('downloadPublicKeyBtn');
                downloadPublicKeyBtn.addEventListener('click', function() {
                    downloadKey(publicKeyEditor, 'public_key.pem');
                });
            }
            let inpri = $('#privateKey').find(".CodeMirror");
            var totalInpri = inpri.length;
            if(totalInpri == 0){
                const privateKeyEditor = CodeMirror(document.getElementById('privateKey'), {
                    value: `<?=$dataKey->privateKey?>`,
                    mode: 'shell',
                    readOnly: true,
                    lineNumbers: true,
                    lineWrapping: true,
                });
                const downloadPrivateKeyBtn = document.getElementById('downloadPrivateKeyBtn');
                downloadPrivateKeyBtn.addEventListener('click', function() {
                    downloadKey(privateKeyEditor, 'private_key.pem');
                });
            }
        });
    });
  </script>

  <script>
    
  </script>
  
  <?php if(session()->getFlashdata('sukses-profile')):?>
        <script>
              toastr.success("<?= session()->getFlashData("sukses-profile"); ?>");
        </script>
    <?php elseif(session()->getFlashdata('sukses-password')):?>
        <script>
            toastr.error("<?= session()->getFlashData("sukses-password"); ?>");
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