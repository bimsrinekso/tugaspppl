<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.59.4/theme/material.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.58.3/codemirror.min.css">
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
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Detail Post</h4> 
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Body</label>
                        <div id="Body" class="codemirror-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection();?>
<?php $this->section('javascript');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/xml/xml.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/javascript/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/shell/shell.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.58.3/mode/php/php.min.js"></script>

<script>
    var isData = JSON.parse(`<?=$detailPost->body?>`);
    var prettyJson = JSON.stringify(isData, null, 2);
    const body = CodeMirror(document.getElementById('Body'),{
        value: prettyJson,
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
<?php $this->endSection();?>