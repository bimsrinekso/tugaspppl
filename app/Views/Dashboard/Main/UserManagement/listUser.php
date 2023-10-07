<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<!-- DataTables -->
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
<link rel="stylesheet" type="text/css" href="/assets/libs/toastr/build/toastr.min.css"> 
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
    .loader {
            margin-top: 10px;
            width: 50px;
            height: 50px;
            border-radius: 100%;
            position: relative;
        }

        /* LOADER 1 */

        #loader-1:before,
        #loader-1:after {
            content: "";
            position: absolute;
            top: -10px;
            left: -10px;
            width: 100%;
            height: 100%;
            border-radius: 100%;
            border: 10px solid transparent;
            border-top-color: #3498db;
        }

        #loader-1:before {
            z-index: 100;
            animation: spin 1s infinite;
        }

        #loader-1:after {
            border: 10px solid #ccc;
        }

        @keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        .dataTables_scrollHeadInner{
            width:auto !important;
        }
</style>
<?php $this->endSection();?>
<?php $this->section('isKonten');?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title-desc">
                            <a class="btn btn-secondary waves-effect waves-light" href="<?= base_url('dashboard/createUser') ?> ">Create User</a>
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation" >
                              <button class="nav-link active"   id="helpdesk-tab" data-bs-toggle="tab" data-bs-target="#helpdesk" type="button" role="tab" aria-controls="helpdesk" aria-selected="false">Role Helpdesk</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link"  id="client-tab" data-bs-toggle="tab" data-bs-target="#client" type="button" role="tab" aria-controls="client" aria-selected="true">Role Client</button>
                            </li>
                            <li class="nav-item" role="presentation" >
                              <button class="nav-link"  id="member-tab" data-bs-toggle="tab" data-bs-target="#member" type="button" role="tab" aria-controls="member" aria-selected="false">Role Member</button>
                            </li>
                          </ul> 
                          <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="helpdesk" role="tabpanel" aria-labelledby="helpdesk-tab">
                                <table id="datatable-helpdesk" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>  
                            <div class="tab-pane fade" id="client" role="tabpanel" aria-labelledby="client-tab">
                                <table id="datatable-client" class="table table-bordered dt-responsive nowrap w-100 ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Merchant ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="member" role="tabpanel" aria-labelledby="member-tab">
                                <table id="datatable-member" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Created At</th>
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
            </div> <!-- end col -->
        </div> <!-- end row -->
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
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
<!-- End Page-content -->
<!-- End Page-content -->
<?php $this->endSection();?>
<?php $this->section('javascript');?>
<!-- Required datatable js -->
<!-- Required datatable js -->
<script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/libs/jszip/jszip.min.js"></script>
<script src="/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="/js/pages/datatables.init.js"></script>
<!-- date range -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<!-- validation init -->
<script src="/assets/js/pages/validation.init.js"></script>
<script src="/assets/libs/toastr/build/toastr.min.js"></script>

  <script>
    var columnHelpdesk = [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        }
      },
      { data: 'username' },
      { data: 'email' },
      { data: 'role_id' },
      {
        data: null,
                render: function (data, type, row) {
                    return moment(row.createdAt).subtract(7, 'hours').format('DD-MM-YYYY HH:mm:ss');
                }
      },
      {
        data: 'id',
        render: function (data, type, row, meta) {
          return `
                <a class="btn btn-outline-secondary btn-sm" href="editUser/${data}" title="Edit"><i class="fas fa-eye"></i></a>
                <a class="btn btn-outline-danger btn-sm edit" onclick="cbModal(${data})"><i class="fas fa-trash"></i></a>
            `;
        }
      }
     
    ];
    var orderHelpdesk= [[0, 'asc']];
    var columnClient = [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        }
      },
      { data: 'id' },
      { data: 'username' },
      { data: 'email' },
      { data: 'role_id' },
      {
        data: null,
                render: function (data, type, row) {
                    return moment(row.createdAt).subtract(7, 'hours').format('DD-MM-YYYY HH:mm:ss');
                }
      },
      {
        data: 'id',
        render: function (data, type, row, meta) {
           return `
                <a class="btn btn-outline-secondary btn-sm" href="editUser/${data}" title="Edit"><i class="fas fa-eye"></i></a>
                <a class="btn btn-outline-danger btn-sm edit" onclick="cbModal(${data})"><i class="fas fa-trash"></i></a>
            `;
        }
      }
    ];
    var orderClient = [[0, 'asc']];
    var columnMember = [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        }
      },
      { data: 'username' },
      { data: 'email' },
      { data: 'role_id' },
      {
        data: null,
                render: function (data, type, row) {
                    return moment(row.createdAt).subtract(7, 'hours').format('DD-MM-YYYY HH:mm:ss');
                }
      },
      {
        data: 'id',
        render: function (data, type, row, meta) {
           return `
                <a class="btn btn-outline-secondary btn-sm" href="editUser/${data}" title="Edit"><i class="fas fa-eye"></i></a>
                <a class="btn btn-outline-danger btn-sm edit" onclick="cbModal(${data})"><i class="fas fa-trash"></i></a>
            `;
        }
      }
    ];
    var orderMember = [[0, 'asc']];
  </script>

<script src="/assets/js/plugins/service/tableUsersManagement.js"></script>
  <script src="/assets/js/plugins/service/generateTable.js"></script>



  

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
    // 
    
    
    
    $("#btnCloseModal").on("click", function(){
        $("#noticeDelete").modal("hide");
    })
    function cbModal(id){
        $("#noticeDelete").modal("show");
        $("#formDelete").attr("action", "<?= base_url('dashboard/deleteUser'); ?>/" + id);
    }
</script>

<?php $this->endSection();?>