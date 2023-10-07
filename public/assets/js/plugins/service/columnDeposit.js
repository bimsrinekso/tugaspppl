formatTgl = (tgl) => {
    const date = new Date(tgl);
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    const hours = String(date.getHours()).padStart(2, '0');
    const minutes = String(date.getMinutes()).padStart(2, '0');
    const seconds = String(date.getSeconds()).padStart(2, '0');
    return `${day}-${month}-${year} ${hours}:${minutes}:${seconds}`;
}

var columnListDp = [
    {
        data: null,
        render: function (data, type, row, meta) {
            return meta.row + 1;
        }
    },
    {
        data: 'transactionID'
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
        data: 'forUser'
    },
    {
        data: null,
        render: function (data, type, row, meta) {
            data = "-";
            return data;
        }
    },
    {
        data: 'name'
    },
    {
        data: 'dpcreat',
        render: function (data, type, row, meta) {
            data = formatTgl(data);
            return data;
        }
    }

];
var orderListDp = [
    [0, 'asc']
];


var columnListDpHc = [
    {
        data: null,
        render: function (data, type, row, meta) {
            return meta.row + 1;
        }
    },
    {
        data: 'transactionID'
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
        data: 'forUser'
    },
    {
        data: null,
        render: function (data, type, row, meta) {
            data = "-";
            return data;
        }
    },
    {
        data: 'dpcreat',
        render: function (data, type, row, meta) {
            data = formatTgl(data);
            return data;
        }
    }

];
var orderListDpHc = [
    [0, 'asc']
];