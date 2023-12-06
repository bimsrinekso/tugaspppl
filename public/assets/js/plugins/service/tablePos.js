
    var columnpos = [
        {
            data: null,
            render: function (data, type, row, meta) {
            return meta.row + 1;
            }
        },
        { data: 'transactionID' },
        { data: 'cashIn' },
        { data: 'cashOut' },
        { data: 'totalAmt' },
        { data: 'username' },
        {
            data: 'transactionID',
            render: function (data, type, row, meta) {
                return `
                <a class="btn btn-outline-secondary btn-sm edit" href="/dashboard/detailpos/${data}" title="Edit"><i class="fas fa-eye"></i></a>
                <a class="btn btn-outline-danger btn-sm" onclick="cokModal(${row.idPos})"><i class="fas fa-trash"></i></a>
            `;
            }
        }
     
    ];
    var columnposTb = [
        {
            data: null,
            render: function (data, type, row, meta) {
            return meta.row + 1;
            }
        },
        { data: 'transactionID' },
        { data: 'cashIn' },
        { data: 'cashOut' },
        { data: 'totalAmt' },
        { data: 'username' },    
    ];
    var orderpos = [[0, 'asc']];
    
    
// $(document).ready(function(){
//     var columnpos = [
//         {
//             data: null,
//             render: function (data, type, row, meta) {
//             return meta.row + 1;
//             }
//         },
//         { data: 'transactionID' },
//         { data: 'cashIn' },
//         { data: 'cashOut' },
//         { data: 'totalAmt' },
//         { data: 'username' },
//         {
//             data: 'transactionID',
//             render: function (data, type, row, meta) {
//                 return `
//                 <a class="btn btn-outline-secondary btn-sm edit" href="/dashboard/detailpos/${data}" title="Edit"><i class="fas fa-eye"></i></a>
//                 <a class="btn btn-outline-danger btn-sm" onclick="cokModal(${row.idPos})"><i class="fas fa-trash"></i></a>
//             `;
//             }
//         }
     
//     ];
//     var orderpos = [[0, 'asc']];
//     generateTable('#datatable-all', '/dashboard/getpos', columnpos, orderpos);
    
// });