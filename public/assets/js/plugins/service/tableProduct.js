$(document).ready(function(){
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


});