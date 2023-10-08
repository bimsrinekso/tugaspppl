var columnPenStatement = [{
        data: null,
        render: function (data, type, row, meta) {
            return meta.row + 1;
        }
    },
    {
        data: null,
        render: function (data, type, row) {
            return formatCurrency(row.grandTotal, row.locale, row.currencyCode, 0);
        }
    },
    {
        data: 'transactionCode'
    },
    {
        data: 'issuerName'
    },
    {
        data: 'customerName'
    },
    {
        data: 'cnName'
    },
    {
        data: null,
        render: function (data, type, row) {
            return formatTgl(row.transactionTime);
        }
    },
    {
        data: null,
        render: function (data, type, row) {
            return formatTgl(row.createdAt);
        }
    }

];
var orderPenStatement = [
    [0, 'asc']
];

var columnDonStatement = [{
        data: null,
        render: function (data, type, row, meta) {
            return meta.row + 1;
        }
    },
    {
        data: null,
        render: function (data, type, row) {
            return formatCurrency(row.grandTotal, row.locale, row.currencyCode, 0);
        }
    },
    {
        data: 'transactionCode'
    },
    {
        data: 'issuerName'
    },
    {
        data: 'customerName'
    },
    {
        data: 'cnName'
    },
    {
        data: null,
        render: function (data, type, row) {
            return formatTgl(row.transactionTime);
        }
    },
    {
        data: null,
        render: function (data, type, row) {
            return formatTgl(row.createdAt);
        }
    }

];
var orderDonStatement = [
    [0, 'asc']
];

$(document).ready(function () {

    generateTable('#pendingStatement', '/dashboard/estatement/qris', columnPenStatement, orderPenStatement);

    generateTable('#datatable-done', '/dashboard/estatement/qris', columnDonStatement, orderDonStatement);

});