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
                        <h4 class="card-title mb-4">Create Top Up Client</h4> 
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Amount</label>
                                <input type="text" id="Amount" class="form-control" value="<?=$dataTopup->amount?>" name="amount" id="formrow-firstname-input" placeholder="Enter Amount">
                            </div>
                            <div class="mb-3">
                                    <label for="pickClient" class="form-label">Client</label>
                                    <select id="pickClient" name="clientID" class="form-select select2">
                                        <option value=""></option>
                                        <?php foreach ($dataCl as $listClient): ?>
                                            <?php if($dataTopup->idClient==$listClient->id ):?>
                                                <option value="<?=$dataTopup->idClient?>" selected="selected">
                                                    <?=$listClient->name?>
                                                </option>
                                                <?php else:?>
                                                <option value="<?=$listClient->id?>">
                                                    <?=$listClient->name?>
                                                </option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
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
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
    <?php endif?>
    <script>
        $(document).ready(function () {
        $("#pickClient").select2({
            placeholder: {
                id: '',
                text: 'Choose Clients'
		     },
            language: "en",
        });
    });
    </script>
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