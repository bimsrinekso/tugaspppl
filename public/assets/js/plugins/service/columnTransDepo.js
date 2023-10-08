var columnListDpTrans = [
    {
        data: null,
        render: function (data, type, row, meta) {
            return meta.row + 1;
        }
    },
    {
        data: 'trxId'
    },
    {
        data: 'dpOrderNo',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = data;
            }
            return strData;
        }
    },
    {
        data: 'accNumber',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = data;
            }
            return strData;
        }
    },
    {
        data: 'bankName',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = data;
            }
            return strData;
        }
    },
    {
        data: 'holderName',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = data;
            }
            return strData;
        }
    },
    {
        data: 'merchantName',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = data;
            }
            return strData;
        }
    },
    {
        data: 'payMethod',
        render: function (data, type, row, meta) {
            var strData;
            if (data == 1) {
                strData = "Bank Transfer";
            } else {
                strData = "Qris";
            }
            return strData;
        }
    },
    {
        data: 'senderName'
    },
    {
        data: 'currency'
    },
    {
        data: 'amt',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = formatCurrency(data, row.locale, row.currencyCode, 0);
            }
            return strData;
        }
    },
    {
        data: 'actualAmount',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = formatCurrency(data, row.locale, row.currencyCode, 0);
            }
            return strData;
        }
    },
    {
        data: 'amtBt',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = formatCurrency(data, row.locale, row.currencyCode, 0);
            }
            return strData;
        }
    },
    {
        data: 'amtQr',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = formatCurrency(data, row.locale, row.currencyCode, 0);
            }
            return strData;
        }
    },
    {
        data: 'comission',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = formatCurrency(data, row.locale, row.currencyCode, 0);
            }
            return strData;
        }
    },
    {
        data: 'lastBalance',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = formatCurrency(data, row.locale, row.currencyCode, 0);
            }
            return strData;
        }
    },
    {
        data: 'clientName'
    },
    {
        data: 'tglUpdated',
        render: function (data, type, row, meta) {
            data = formatTgl(data);
            return data;
        }
    },
    {
        data: 'tglbuat',
        render: function (data, type, row, meta) {
            data = formatTgl(data);
            return data;
        }
    }

];
var orderListDpTrans = [
    [0, 'asc']
];


var columnListDpTransHc = [
    {
        data: null,
        render: function (data, type, row, meta) {
            return meta.row + 1;
        }
    },
    {
        data: 'trxId'
    },
    {
        data: 'dpOrderNo',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = data;
            }
            return strData;
        }
    },
    {
        data: 'accNumber',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = data;
            }
            return strData;
        }
    },
    {
        data: 'bankName',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = data;
            }
            return strData;
        }
    },
    {
        data: 'holderName',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = data;
            }
            return strData;
        }
    },
    {
        data: 'merchantName',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = data;
            }
            return strData;
        }
    },
    {
        data: 'payMethod',
        render: function (data, type, row, meta) {
            var strData;
            if (data == 1) {
                strData = "Bank Transfer";
            } else {
                strData = "Qris";
            }
            return strData;
        }
    },
    {
        data: 'senderName'
    },
    {
        data: 'currency'
    },
    {
        data: 'amt',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = formatCurrency(data, row.locale, row.currencyCode, 0);
            }
            return strData;
        }
    },
    {
        data: 'actualAmount',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = formatCurrency(data, row.locale, row.currencyCode, 0);
            }
            return strData;
        }
    },
    {
        data: 'amtBt',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = formatCurrency(data, row.locale, row.currencyCode, 0);
            }
            return strData;
        }
    },
    {
        data: 'amtQr',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = formatCurrency(data, row.locale, row.currencyCode, 0);
            }
            return strData;
        }
    },
    {
        data: 'comission',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = formatCurrency(data, row.locale, row.currencyCode, 0);
            }
            return strData;
        }
    },
    {
        data: 'lastBalance',
        render: function (data, type, row, meta) {
            var strData;
            if (data == null) {
                strData = "-";
            } else {
                strData = formatCurrency(data, row.locale, row.currencyCode, 0);
            }
            return strData;
        }
    },
    {
        data: 'tglUpdated',
        render: function (data, type, row, meta) {
            data = formatTgl(data);
            return data;
        }
    },
    {
        data: 'tglbuat',
        render: function (data, type, row, meta) {
            data = formatTgl(data);
            return data;
        }
    }
];
var orderListDpTransHc = [
    [0, 'asc']
];