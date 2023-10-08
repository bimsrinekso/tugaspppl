var columnTrack = [{
        data: null,
        render: function (data, type, row, meta) {
            return meta.row + 1;
        }
    },
    {
        data: 'idTransTB',
    },
    {
        data: null,

        render: function (data, type, row) {
            const orderNo = (row.payFor == 1) ? row.dpOrderNo : (row.payFor == 2 ? row.wdOrderNo : "-");
            return orderNo == null ? '-' : orderNo;
        }
    },
    {
        data: 'payFor',
        render: function (data, type, row) {
            let labelPay = ['-', 'Deposit', 'Withdraw', 'Top Up Client', 'HO Withdraw', 'Adjustment', 'Debt'];
            return labelPay[data];
        }
    },
    {
        data: null,

        render: function (data, type, row) {
            var amountCondition = data === null;
            var formattedAmount = formatCurrency(row.amountTB, row.locale, row.currencyCode, 3);
            var payFor = row.payFor;
            var styleCondition = payFor === 1 || payFor === 3;
            var transactionAmount = styleCondition ? (amountCondition ? "-" : "+" + formattedAmount) : "-" + formattedAmount;
            var tdStyle = styleCondition ? (amountCondition ? "" : "color:#2ecc71;font-weight: 500;") : "color:#e74c3c;font-weight: 500;";
            return '<td><span style="' + tdStyle + '">' + transactionAmount + '</span></td>'
        }
    },
    {
        data: null,

        render: function (data, type, row) {
            if (row.payFor == 1) {
                return (row.amtVa === null ? "-" : "+" + formatCurrency(row.amtVa, row.locale, row.currencyCode, 3));
            } else {
                return "-";
            }
        }
    },
    {
        data: 'topupremark',
        render: function (data, type, row) {
            if (row.topupremark != null) {
                return data;
            } else {
                return "-";
            }
        }
    },
    {
        data: null,
        render: function (data, type, row) {
            return formatCurrency(row.lastBalance, row.locale, row.currencyCode, 3);
        }
    },
    {
        data: 'cnName',
    },
    {
        data: null,
        render: function (data, type, row) {
            return formatTgl(row.submitTime);
        }
    },
    {
        data: null,
        render: function (data, type, row) {
            return formatTgl(row.updatedTime);
        }
    }
];

var orderTrack = [
    [0, 'asc']
];
$(document).ready(function () {

    generateTable('#datatable-active', '/dashboard/trackingBalance', columnTrack, orderTrack);

});