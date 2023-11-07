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
    .ikiError{
        color:#ed2a26;
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
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add Product</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="text-sm-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="<?=base_url('dashboard/svproduct')?>" method="POST" id="formProduct" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="productname">Product Name</label>
                                                <input id="productname" name="productname" type="text" class="form-control" placeholder="Product Name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="pickCat" class="form-label">Balance Type</label>
                                                <select id="pickCat" name="idcatMenu" class="form-select">
                                                    <option selected>Pilih</option>
                                                    <?php foreach($catMenu as $listCat) : ?>
                                                    <option value="<?=$listCat->id?>">
                                                        <?=$listCat->categoryName?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="price">Price</label>
                                                <input id="price" name="price" type="text" class="price-input form-control" placeholder="Price">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="product-tab" data-bs-toggle="tab" data-bs-target="#product" type="button" role="tab" aria-controls="product" aria-selected="false">List Product</button>
                            </li>
                        </ul> 
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="product-tab">
                                <table id="datatable-all" class="table table-bordered w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product Name</th>
                                            <th>Category Product</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Structure -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" action="<?=base_url('dashboard/updateProduct')?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="idProduct" name="prID" class="form-control">
                            <!-- Edit form fields go here -->
                            <div class="mb-3">
                                <label for="editProductName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="editProductName" name="namePr">
                            </div>
                            <div class="mb-3">
                                <label for="editpickCat" class="form-label">Balance Type</label>
                                <select id="editpickCat" name="catMn" class="form-select">
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="editProductPrice" class="form-label">Price</label>
                                <input type="text" class="price-input form-control" id="editProductPrice" name="price">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveChangesButton">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Hapus -->
        <div class="modal fade" id="noticeDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formDelete" method="post">
                        <input value="DELETE" type="hidden" name="_method" name="id">
                        <div class="modal-body">
                            <p>Are you sure want to delete this data?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnCloseModal" class="btn btn-primary">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Hapus -->
        
        <!-- end row -->
    </div>
    <!-- container-fluid -->
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
    formatIdr = (money) => {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
        }).format(money);
    };
</script>
<script src="/assets/js/plugins/service/generateTable.js"></script>
<script src="/assets/js/plugins/service/tableProduct.js"></script> 
<script>
    // Add event listener to a common parent element (e.g., a modal or a container)
    var modal1 = document.getElementById('exampleModal');
    var modal2 = document.getElementById('editModal');

    modal1.addEventListener('input', handleInput);
    modal2.addEventListener('input', handleInput);

    function handleInput(e) {
        if (e.target.classList.contains('price-input')) {
            var inputField = e.target;
            var formattedValue = formatCurrency(inputField.value);
            inputField.value = formattedValue;
        }
    }

    function formatCurrency(angka) {
        var number_string = angka.replace(/[^0-9]/g, '');
        var rupiah = Number(number_string);
        var formattedAmount = 'Rp' + rupiah.toLocaleString('id-ID');
        return formattedAmount;
    }
    $("#formProduct").validate({
        errorElement: 'span',
        errorClass: 'ikiError',
            rules: {
                productname: {
                    required: true,
                },
                catMenu: {
                    required: true,
                },
                price: {
                    required: true,
                }
            },
            messages: {
                productname: {
                    required: "Data tidak boleh kosong",
                },
                catMenu: {
                    required: "Data tidak boleh kosong",
                },
                price: {
                    required: "Data tidak boleh kosong",
                },
            },
            errorPlacement: function(error, element) { 
                error.insertAfter(element.parent("div")); 
            },
            submitHandler: function (form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        var parseData = JSON.parse(data);
                        console.log(parseData);
                        if(parseData['statusSave'] == true){
                            $('#exampleModal').modal('hide');
                            $('#exampleModal input').val('');
                            var columnProduct = [
                                {
                                    data: null,
                                    render: function (data, type, row, meta) {
                                    return meta.row + 1;
                                    }
                                },
                        
                                { data: 'nama_produk' },
                                { data: 'categoryName' },
                                {
                                    data: null,
                                    
                                    render: function (data, type, row) {
                                        return formatIdr(row.harga);
                                    }
                                },
                                {
                                    data: 'idPr',
                                    render: function (data, type, row, meta) {
                                        return `
                                        <a class="btn btn-outline-secondary btn-sm edit" onclick="cokModal(${data}, '${row.categoryName}')" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-outline-danger btn-sm" onclick="cbModal(${data})"><i class="fas fa-trash"></i></a>
                                    `;
                                    }
                                }
                            
                            ];
                            var orderProduct = [[0, 'asc']];
                            generateTable('#datatable-all', '/dashboard/getproduct', columnProduct, orderProduct);
                        }
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }
        });
    function clearAndShowLoader(table){
        table.empty();
        table.append(
            "<tr>" +
            "<td colspan='14'>" +
            "<center>" +
            "<div class='loader' id='loader-1'></div>" +
            "</center>" +
            "</td>" +
            "</tr>"
        );
    }
    function cokModal(productId, catNm) {
        var myDropdown = $('#editpickCat');
        myDropdown.empty();
        $.ajax({
            url: '/dashboard/getsingleproduct/' + productId,
            type: 'GET',
            cache: false,
            success: function(productData) {
                $('#idProduct').val(productData.data.id);
                $('#editProductName').val(productData.data.nama_produk);
                $('#editProductPrice').val(formatCurrency(productData.data.harga));
                $('#editpickCat').val(productData.data.categoryPr);
                $('#editModal').modal('show');
            }
        });
        
        $.ajax({
            url: '/dashboard/getmenucat',
            type: 'POST', 
            dataType: 'json',
            success: function (data) {
                data = data['data'];
                $.each(data, function (key, entry) {
                    var option = $('<option>', {
                        value: entry.id,
                        text: entry.categoryName
                    });
                    if (entry.categoryName === catNm) {
                        option.attr('selected', 'selected');
                    }
                    myDropdown.append(option);
                });

            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    $(document).ready(function () {
        $('#editForm').validate({
            errorElement: 'span',
            errorClass: 'ikiError',
            rules: {
                namePr: {
                    required: true,
                },
                price: {
                    required: true,
                }
            },
            messages: {
                namePr: {
                    required: "Data tidak boleh kosong",
                },
                price: {
                    required: "Data tidak boleh kosong",
                },
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element.parent("div"));
            },
            submitHandler: function (form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        var parseData = JSON.parse(data);
                        if(parseData['statusSave'] == true){
                            $('#editModal').modal('hide');
                            var columnProduct = [
                                {
                                    data: null,
                                    render: function (data, type, row, meta) {
                                    return meta.row + 1;
                                    }
                                },
                        
                                { data: 'nama_produk' },
                                { data: 'categoryName' },
                                {
                                    data: null,
                                    
                                    render: function (data, type, row) {
                                        return formatIdr(row.harga);
                                    }
                                },
                                {
                                    data: 'idPr',
                                    render: function (data, type, row, meta) {
                                        return `
                                        <a class="btn btn-outline-secondary btn-sm edit" onclick="cokModal(${data}, '${row.categoryName}')" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-outline-danger btn-sm" onclick="cbModal(${data})"><i class="fas fa-trash"></i></a>
                                    `;
                                    }
                                }
                            
                            ];
                            var orderProduct = [[0, 'asc']];
                            generateTable('#datatable-all', '/dashboard/getproduct', columnProduct, orderProduct);
                        }
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }
        });

        $('#saveChangesButton').click(function () {
            if ($('#editForm').valid()) {
                $('#editForm').submit();
                
            }
        });
    });
    $("#btnCloseModal").on("click", function(){
        $("#noticeDelete").modal("hide");
    })
    function cbModal(id){
        $("#noticeDelete").modal("show");
        $("#formDelete").attr("action", "<?= base_url('dashboard/deleteproduct'); ?>/" + id);
    }
</script>
<?php $this->endSection();?>