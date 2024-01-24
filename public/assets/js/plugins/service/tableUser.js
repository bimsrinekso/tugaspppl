$(document).ready(function(){
    var columnUsers = [
        {
            data: null,
            render: function (data, type, row, meta) {
            return meta.row + 1;
            }
        },
        { data: 'username' },
        { data: 'email' },
        { data: 'role' },
        {
            data: 'id',
            render: function (data, type, row, meta) {
                return `
                <a class="btn btn-outline-secondary btn-sm edit" onclick="cokModal(${data},'${row.roleid}')" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                <a class="btn btn-outline-danger btn-sm" onclick="cbModal(${data})"><i class="fas fa-trash"></i></a>
            `;
            }
        }
     
    ];
    var orderUsers = [[0, 'asc']];
    generateTable('#datatable-all', '/dashboard/getuser', columnUsers, orderUsers);


});