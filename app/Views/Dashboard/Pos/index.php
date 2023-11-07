<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<!-- DataTables -->
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/assets/libs/toastr/build/toastr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda.min.css">
<style>
  .ikiError {
    color: #ed2a26;
    font-size: 12px;
    font-weight: 400;
    font-family: 'Roboto', sans-serif;
    text-align: left;
    line-height: 26px;
  }

  .ladda-button {
    background: var(--bs-btn-bg);
    border: 0;
    padding: var(--bs-btn-padding-y) var(--bs-btn-padding-x);
    font-size: var(--bs-btn-font-size);
    cursor: pointer;
    color: #fff;
    border-radius: var(--bs-btn-border-radius);
    border: var(--bs-btn-border-width) solid var(--bs-btn-border-color);
    -webkit-appearance: none;
    -webkit-font-smoothing: antialiased;
    -webkit-tap-highlight-color: transparent;
  }
</style>
<?php $this->endSection();?>
<?php $this->section('isKonten');?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-custom pt-2" role="tablist">
                            <?php foreach($dataCat as $index => $listCat): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?= ($index == 0) ? 'active' : ''; ?>" data-bs-toggle="tab" href="#all-post<?=$index + 1?>" role="tab">
                                        <?=$listCat->categoryName?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="tab-content p-4">
                            <?php foreach($dataCat as $index => $listCat): ?>
                                <div class="tab-pane <?= ($index == 0) ? 'active' : ''; ?>" id="all-post<?=$index + 1?>" role="tabpanel">
                                    <div class="row">
                                        <?php foreach($dataPr as $key => $item): ?>
                                            <?php if ($item->categoryPr == $listCat->id): ?>
                                                <div class="col-xl-4 col-sm-4">
                                                    <div class="card text-center" style="background-color: bg-soft;">
                                                        <div class="card-body border border-primary">
                                                            <h5 class="card-title"><?=$item->nama_produk?></h5>
                                                            <p class="card-text">Harga: <?=$item->harga?></p>
                                                            <div>
                                                                <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light minus-btn" data-price="<?=$item->harga?>"><i class="fas fa-minus"></i></button>
                                                                <button type="button" class="btn btn-success btn-rounded waves-effect waves-light plus-btn" data-price="<?=$item->harga?>"><i class="fas fa-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="card">
                    <div class="card-body p-4">
                        <div>
                            <p class="text-muted">Order</p>
                            <div class="table-responsive">
                                <table class="table table-sm m-0">
                                    <thead>
                                        <tr>
                                            <th>Qty</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Order items will be displayed here -->
                                    </tbody>     
                                </table>
                            </div>
                            <h5 class="card-title pt-2">Total: <span id="total-amount">0</span></h5>
                        </div>
                        <div class="mb-3">
                            <label for="uang">Uang Pembeli</label>
                            <input id="uang" name="uang" type="text" class="uang-input form-control" placeholder="Price" oninput="updateKembalian()">
                        </div>
                        <div class="mb-3">
                            <label for="kembalian">Kembalian</label>
                            <input id="kembalian" name="kembalian" type="text" class="kembalian form-control" placeholder="kembalian" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection();?>
<?php $this->section('javascript');?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/spin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda.min.js"></script>
<!-- Required datatable js -->
<script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/libs/jszip/jszip.min.js"></script>
<script src="/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<!-- <script src="/assets/js/pages/validation.init.js"></script> -->
<script src="/js/pages/datatables.init.js"></script>
<script src="/assets/libs/jquery-validation/jquery.validate.min.js"></script>
<script>
        uang.addEventListener('input', function(e){
        uang.value = formatCurrency(this.value);
    });

    function formatCurrency(angka) {
        var number_string = angka.replace(/[^0-9]/g, '');
        var rupiah = Number(number_string);

        // Format as KRW with symbol and thousands separators
        var formattedAmount = 'Rp' + rupiah.toLocaleString('ko-KR');

        return formattedAmount;
    }
    let totalAmount = 0;
    const orderItems = new Map();

    function formatRupiah(number) {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(number);
    }

    function updateTotal() {
        totalAmount = 0;
        const orderTable = document.querySelector('.table-sm');
        const tbody = document.createElement('tbody');
        tbody.innerHTML = '';

        for (const [productName, item] of orderItems) {
            const price = item.price;
            const quantity = item.quantity;
            const subtotal = price * quantity;

            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${quantity}</td>
                <td>${productName}</td>
                <td>${formatRupiah(price)}</td>
                <td>${formatRupiah(subtotal)}</td>
            `;
            tbody.appendChild(row);

            totalAmount += subtotal;
        }

        if (orderTable) {
            orderTable.innerHTML = `
                <thead>
                    <tr>
                        <th>Qty</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
            `;
            orderTable.appendChild(tbody);
        }

        const totalAmountFormatted = formatRupiah(totalAmount);
        const totalAmountElement = document.getElementById('total-amount');
        if (totalAmountElement) {
            totalAmountElement.textContent = totalAmountFormatted;
        }
    }

    const plusButtons = document.querySelectorAll('.plus-btn');
    plusButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const productName = button.parentElement.parentElement.querySelector('.card-title').textContent;
            const price = parseFloat(button.dataset.price);

            if (orderItems.has(productName)) {
                orderItems.get(productName).quantity++;
            } else {
                orderItems.set(productName, { price, quantity: 1 });
            }

            updateTotal();
        });
    });

    const minusButtons = document.querySelectorAll('.minus-btn');
    minusButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const productName = button.parentElement.parentElement.querySelector('.card-title').textContent;

            if (orderItems.has(productName)) {
                const item = orderItems.get(productName);
                item.quantity--;

                if (item.quantity === 0) {
                    orderItems.delete(productName);
                }

                updateTotal();
            }
        });
    });

    function convertUang(amount) {
        return parseInt(amount.replace(/\D/g, ''));
    }
    function convertToNumber(uang) {
        uang = uang.replace(/\D/g, ''); // Remove non-numeric characters
        uang = uang.slice(0, -2); // Remove the last two digits
        return parseInt(uang);
    }

    function updateKembalian() {
        var totalAmountElement = document.getElementById('total-amount');
        var totalAmount = convertToNumber(totalAmountElement.innerText) || 0; // Convert to integer or default to 0 if NaN
        var uangPembeliElement = document.getElementById('uang');
        var uangPembeli = convertToNumber(uangPembeliElement.value) || 0; // Convert to integer or default to 0 if NaN
        console.log(totalAmountElement);
        console.log(totalAmount);
        var kembalian = uangPembeli - totalAmount;

        if (!isNaN(kembalian)) {
            document.getElementById('kembalian').value = kembalian.toLocaleString('id-ID');
        } else {
            console.error('Error: Unable to calculate kembalian. Please check your inputs.');
        }
    }
    function updateKembalian() {
        var totalAmountElement = document.getElementById('total-amount');
        var totalAmount = convertToNumber(totalAmountElement.innerText) || 0; // Convert to integer or default to 0 if NaN
        var uangPembeliElement = document.getElementById('uang');
        var uangPembeli = convertUang(uangPembeliElement.value) || 0; // Convert to integer or default to 0 if NaN
        console.log(totalAmountElement);
        console.log(totalAmount);

        var kembalian = uangPembeli - totalAmount;

        if (!isNaN(kembalian)) {
            document.getElementById('kembalian').value = kembalian.toLocaleString('id-ID');
        } else {
            console.error('Error: Unable to calculate kembalian. Please check your inputs.');
        }
    }
</script>
<?php $this->endSection();?>