<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<link rel="stylesheet" type="text/css" href="/assets/libs/toastr/build/toastr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.css" />
<style>
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
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Detail Api</h4>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Api Key</label>
                                <input type="text" value="<?=$dataApi->apiKey?>" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Public Key</label>
                            <div id="publicKey" class="codemirror-container"></div>
                            <button class="btn btn-primary mt-2" onclick="downloadKey(publicKeyEditor, 'public_key.pem')">Download Public Key</button>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Private Key</label>
                            <div id="privateKey" class="codemirror-container"></div>
                            <button class="btn btn-primary mt-2" onclick="downloadKey(privateKeyEditor, 'private_key.pem')">Download Private Key</button>
                        </div>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/javascript/javascript.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/shell/shell.min.js"></script>
  <!-- toastr init -->
  <script src="/assets/js/pages/toastr.init.js"></script>
  <script>
    const publicKeyEditor = CodeMirror(document.getElementById('publicKey'), {
    value: `<?=$dataApi->publicKey?>`,
    mode: 'shell',
    readOnly: true,
    lineNumbers: true,
    lineWrapping: true,
});

const privateKeyEditor = CodeMirror(document.getElementById('privateKey'), {
    value: `<?=$dataApi->privateKey?>`,
    mode: 'shell',
    readOnly: true,
    lineNumbers: true,
    lineWrapping: true,
});

function downloadKey(editor, fileName) {
    const text = editor.getValue();
    const blob = new Blob([text], { type: 'application/x-pem-file' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = fileName;
    link.click();
    URL.revokeObjectURL(link.href);
}
  </script>
<?php $this->endSection();?>