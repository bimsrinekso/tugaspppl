$(document).ready(function(){
    var columnBaseBank = [
        {
            data: null,
            render: function (data, type, row, meta) {
            return meta.row + 1;
            }
        },
        { data: 'bankName' },
        { data: 'universalName' },
        { data: 'cnName' },
        { data: 'nama' },
        {
            data: 'id',
            render: function (data, type, row, meta) {
                return `<a class="btn btn-outline-secondary btn-sm" href="baseBank/detail/${data}" title="Edit"><i class="fas fa-pencil-alt"></i></a>`;
            }
        }
     
    ];
    var orderBaseBank = [[0, 'asc']];
    generateTable('#datatable-all', '/dashboard/baseBank', columnBaseBank, orderBaseBank);

});