<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<link rel="stylesheet" type="text/css" href="/assets/libs/toastr/build/toastr.min.css">  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.59.4/theme/material.min.css" />

<style>
    .CodeMirror{
        height:auto !important;
    }

    .codemirror-container {
        border: 1px solid #ced4da;
        border-radius: 4px;
    }
    .toggle-switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 25px;
    }
    
    .toggle-switch input {
      display: none;
    }
    
    .toggle-switch-label {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      border-radius: 34px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    
    .toggle-switch-label:before {
      content: '';
      position: absolute;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background-color: #fff;
      top: 2px;
      left: 4px;
      transition: transform 0.3s;
    }
    
    .toggle-switch input:checked + .toggle-switch-label {
      background-color: #2196F3;
    }
    
    .toggle-switch input:checked + .toggle-switch-label:before {
      transform: translateX(32px);
    }

    code{
        font-weight:700;
    }
</style>
<?php $this->endSection();?>
<?php $this->section('isKonten');?>
<div class="page-content">
    <div class="container-fluid">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Error Log</h4> 
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Message</label>
                        <div id="Message" class="codemirror-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->endSection();?>
<?php $this->section('javascript');?>
  <!-- validation init -->
  <script src="/assets/js/pages/validation.init.js"></script>
  <script src="/assets/libs/toastr/build/toastr.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/xml/xml.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/javascript/javascript.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/shell/shell.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.58.3/mode/php/php.min.js"></script>
  
  <!-- toastr init -->
  <script src="/assets/js/pages/toastr.init.js"></script>
  
<script>
    var isData = `<?=$detailError->message?>`;
    const message = CodeMirror(document.getElementById('Message'),{
        value: isData,
        mode: 'application/json',
        theme: 'material',
        readOnly: true,
        lineNumbers: true,
        lineWrapping: true,
        matchBrackets: true,
        autoCloseBrackets: true,
        styleActiveLine: true,
        indentUnit: 2,
        tabSize: 4,
    })
</script>

<script>
    var restart = document.getElementById('restart');
    console.log(restart);
    var fixing = document.getElementById('fixing');
    console.log(fixing);
    var statusText1 = document.getElementById('statusText1');
    console.log(statusText1);
    var statusText2 = document.getElementById('statusText2');
    console.log(statusText2);

    restart.addEventListener("change", function() {
      if (this.checked) {
        statusText1.innerHTML = '<code style="color:green">Finished</code>';
      } else {
        statusText1.innerHTML = '<code>Pending</code>';
      }
    });
    
    fixing.addEventListener("change", function() {
      if (this.checked) {
        statusText2.innerHTML = '<code style="color:green">Finished</code>';
      } else {
        statusText2.innerHTML = '<code>Pending</code>';
      }
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