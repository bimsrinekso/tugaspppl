$(document).ready(function(){
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


});