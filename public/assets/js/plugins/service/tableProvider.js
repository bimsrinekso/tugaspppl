$(document).ready(function(){
    var columnProvider = [
        {
            data: null,
            render: function (data, type, row, meta) {
            return meta.row + 1;
            }
        },
        { data: 'providerName' },
        { data: 'cnName' },
        {
            data: 'id',
            render: function (data, type, row, meta) {
                return `<a class="btn btn-outline-secondary btn-sm" href="editProvider/${data}" title="Edit"><i class="fas fa-pencil-alt"></i></a>`;
            }
        }
     
    ];
    var orderProvider = [[0, 'asc']];
    generateTable('#datatable-all', '/dashboard/provider', columnProvider, orderProvider);

});