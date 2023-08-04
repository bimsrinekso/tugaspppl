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
                        <h4 class="card-title mb-4">Create Settlement</h4> 
                        <form action="" method="post">
                             <div class="mb-3">
                                        <label for="pickClient" class="form-label">Client</label>
                                        <select id="pickClient" name="clientID" class="form-select select2">
                                            <option value="">choose client</option>
                                            <?php if($dataClient != null):?>
                                            <?php foreach ($dataClient as $listClient): ?>
                                                <option value="<?=$listClient->id?>"><?=$listClient->name?></option>
                                            <?php endforeach;?>
                                            <?php else:?>
                                            <?php endif;?>
                                        </select>
                                    </div>
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Amount</label>
                                <input type="text" id="Amount" class="form-control" name="amount" id="formrow-firstname-input" placeholder="Enter Amount" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Remark</label>
                                <input type="text" class="form-control" name="remark" placeholder="Enter Remark">
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
  <script src="/js/pages/validation.init.js"></script>
  <script src="/assets/libs/toastr/build/toastr.min.js"></script>

  <!-- toastr init -->
  <script src="/js/pages/toastr.init.js"></script>

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
    <script>
        Amount.addEventListener('input', function(e){
        Amount.value = formatCurrency(this.value);
    });

    function formatCurrency(angka) {
        var number_string = angka.replace(/[^0-9]/g, '');
        var rupiah = Number(number_string);

        // Format as KRW with symbol and thousands separators
        var formattedAmount = '₩' + rupiah.toLocaleString('ko-KR');

        return formattedAmount;
    }
    </script>
<?php $this->endSection();?>