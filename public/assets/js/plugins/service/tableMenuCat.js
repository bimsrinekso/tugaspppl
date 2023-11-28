$(document).ready(function(){
    var columnMenuCat = [
        {
            data: null,
            render: function (data, type, row, meta) {
            return meta.row + 1;
            }
        },
 
        { data: 'categoryName' },
        {
            data: 'id',
            render: function (data, type, row, meta) {
                return `
                <a class="btn btn-outline-secondary btn-sm edit" onclick="cokModal(${data})" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                <a class="btn btn-outline-danger btn-sm" onclick="cbModal(${data})"><i class="fas fa-trash"></i></a>
            `;
            }
        }
     
    ];
    var orderMenuCat = [[0, 'asc']];
    generateTable('#datatable-all', '/dashboard/getmenucat', columnMenuCat, orderMenuCat);


});