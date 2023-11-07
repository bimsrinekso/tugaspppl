$(document).ready(function(){
    var columnBalance = [
        {
            data: null,
            render: function (data, type, row, meta) {
            return meta.row + 1;
            }
        },
 
        { data: 'transactionID' },
        { data: 'amount' },
        { data: 'namaCatBlc' },
        { data: 'typeName' },
        { data: 'username' },
        { data: 'tglbuat' },
        {
            data: 'idBlc',
            render: function (data, type, row, meta) {
                return `
                <a class="btn btn-outline-secondary btn-sm edit" onclick="cokModal(${data}, '${row.typeBlc}')" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                <a class="btn btn-outline-danger btn-sm" onclick="cbModal(${data})"><i class="fas fa-trash"></i></a>
            `;
            }
        }
     
    ];
    var orderBalance = [[0, 'asc']];
    generateTable('#datatable-all', '/dashboard/getbalance', columnBalance, orderBalance);
});