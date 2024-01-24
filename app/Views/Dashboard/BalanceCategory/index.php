<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<!-- DataTables -->
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
<link rel="stylesheet" type="text/css" href="/assets/libs/toastr/build/toastr.min.css">
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
                    <h4 class="mb-sm-0 font-size-18">Balance Category</h4>
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
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Category</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Balance Category</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="<?=base_url('dashboard/svcatblc')?>" method="POST" id="formCatMenu" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="categoryname">Category Name</label>
                                                <input id="categoryname" name="categoryname" type="text" class="form-control" placeholder="Category Name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="pickJenis" class="form-label">Balance Type</label>
                                                <select id="pickJenis" name="jenis" class="form-select">
                                                    <option value="1">Pemasukan</option>
                                                    <option value="2">Pengeluaran</option>
                                                </select>
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
                                <button class="nav-link active" id="product-tab" data-bs-toggle="tab" data-bs-target="#product" type="button" role="tab" aria-controls="product" aria-selected="false">List Category</button>
                            </li>
                        </ul> 
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="product-tab">
                                <table id="datatable-all" class="table table-bordered w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Category Name</th>
                                            <th>Type</th>
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
                        <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" action="<?=base_url('dashboard/updateCatBlc')?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="idCatBlc" name="catBlcId" class="form-control">
                            <!-- Edit form fields go here -->
                            <div class="mb-3">
                                <label for="editCatBlc" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="editCatBlc" name="nmCatBlc">
                            </div>
                            <div class="mb-3">
                                <label for="editPickJenis" class="form-label">Balance Type</label>
                                <select id="editPickJenis" name="jenis" class="form-select">
                                </select>
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
<script src="/assets/js/plugins/service/tableBlcCat.js"></script> 
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
    $("#formCatMenu").validate({
        errorElement: 'span',
        errorClass: 'ikiError',
            rules: {
                categoryname: {
                    required: true,
                },
                jenis: {
                    required: true,
                },
            },
            messages: {
                categoryname: {
                    required: "Data tidak boleh kosong",
                },
                jenis: {
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
                        if(parseData['statusSave'] == true){
                            $('#exampleModal').modal('hide');
                            $('#exampleModal input').val('');
                            var columnBlcCat = [
                                {
                                    data: null,
                                    render: function (data, type, row, meta) {
                                    return meta.row + 1;
                                    }
                                },
                        
                                { data: 'namaCatBlc' },
                                {
                                    data: null,
                                
                                    render: function (data, type, row) {
                                        var jenisCondition = data === null;
                                        var type = row.jenis;
                                        var styleCondition = type == 1;
                                        var ikiDatane = styleCondition ? row.typeName : row.typeName;
                                        var tdStyle = styleCondition ? (jenisCondition ? "" : "color:#2ecc71;font-weight: 500;") : "color:#e74c3c;font-weight: 500;";
                                        return '<td><span style="' + tdStyle + '">' + ikiDatane + '</span></td>'
                                    }
                                },
                                {
                                    data: 'idBlcCat',
                                    render: function (data, type, row, meta) {
                                        return `
                                        <a class="btn btn-outline-secondary btn-sm edit" onclick="cokModal(${data})" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-outline-danger btn-sm" onclick="cbModal(${data})"><i class="fas fa-trash"></i></a>
                                    `;
                                    }
                                }
                            
                            ];
                            var orderBlcCat = [[0, 'asc']];
                            generateTable('#datatable-all', '/dashboard/getblccat', columnBlcCat, orderBlcCat);
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
    function cokModal(catBlcId) {
        $.ajax({
            url: '/dashboard/getsinglecatblc/' + catBlcId,
            type: 'GET',
            cache: false,
            success: function(categoryData) {
                $('#idCatBlc').val(categoryData.data.idBlcCat);
                $('#editCatBlc').val(categoryData.data.namaCatBlc);
                $('#editPickJenis').empty();

                if (categoryData.data.jenis === 1 || categoryData.data.jenis === '1') {
                    $('#editPickJenis').append($('<option>', {
                        value: '1',
                        text: categoryData.data.typeName,
                        selected: 'selected'
                    }));
                    $('#editPickJenis').append($('<option>', {
                        value: '2',
                        text: "Pengeluaran",
                    }));
                } else if (categoryData.data.jenis === 2 || categoryData.data.jenis === '2') {
                    $('#editPickJenis').append($('<option>', {
                        value: '1',
                        text: "Pemasukan",
                    }));
                    $('#editPickJenis').append($('<option>', {
                        value: '2',
                        text: categoryData.data.typeName,
                        selected: 'selected'
                    }));
                }
                $('#editModal').modal('show');
            }
        });
    }
    $(document).ready(function () {
        $('#editForm').validate({
            errorElement: 'span',
            errorClass: 'ikiError',
            rules: {
                categoryname: {
                    required: true,
                },
                price: {
                    required: true,
                }
            },
            messages: {
                categoryname: {
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
                            var columnBlcCat = [
                                {
                                    data: null,
                                    render: function (data, type, row, meta) {
                                    return meta.row + 1;
                                    }
                                },
                        
                                { data: 'namaCatBlc' },
                                {
                                    data: null,
                                
                                    render: function (data, type, row) {
                                        var jenisCondition = data === null;
                                        var type = row.jenis;
                                        var styleCondition = type == 1;
                                        var ikiDatane = styleCondition ? row.typeName : row.typeName;
                                        var tdStyle = styleCondition ? (jenisCondition ? "" : "color:#2ecc71;font-weight: 500;") : "color:#e74c3c;font-weight: 500;";
                                        return '<td><span style="' + tdStyle + '">' + ikiDatane + '</span></td>'
                                    }
                                },
                                {
                                    data: 'idBlcCat',
                                    render: function (data, type, row, meta) {
                                        return `
                                        <a class="btn btn-outline-secondary btn-sm edit" onclick="cokModal(${data})" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-outline-danger btn-sm" onclick="cbModal(${data})"><i class="fas fa-trash"></i></a>
                                    `;
                                    }
                                }
                            
                            ];
                            var orderBlcCat = [[0, 'asc']];
                            generateTable('#datatable-all', '/dashboard/getblccat', columnBlcCat, orderBlcCat);
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
        $("#formDelete").attr("action", "<?= base_url('dashboard/deletecatblc'); ?>/" + id);
    }
</script>
<?php $this->endSection();?>