const cvUang = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'KRW'
});
var targetFilter;
var tableConf;
var tableRej;
var targetTgl = 'Conf';
const uang = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'KRW',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
});

function cbHref(isi) {
    var target = $(isi).data("bs-target");
    if (target == "#confirm") {
        targetFilter = "datatable-active";
        targetTgl = 'Conf';
    } else {
        targetFilter = "datatable-inactive";
        targetTgl = "Rej";
    }
}

function filterWd() {
    var tgl = $('input[name="daterangeAll"]').val();
    var splitTgl = tgl.split('-');
    var startDate;
    var endDate;
    if (splitTgl[0] == '') {
        startDate = '';
        endDate = '';
    } else {
        startDate = splitTgl[0];
        endDate = splitTgl[1];
        startDate = startDate.replace('/', '-');
        startDate = startDate.replace('/', '-');
        startDate = startDate.replace(' ', '');
        endDate = endDate.replace('/', '-');
        endDate = endDate.replace('/', '-');
        endDate = endDate.slice(1);
        // new date convert
        startDate = startDate.split("-").reverse().join("-");
        startDate = startDate + ' 00:00:00';
        endDate = endDate.split("-").reverse().join("-");
        endDate = endDate + ' 00:00:00';
    }
    var tableWd = $("#datatable-all tbody");
    var isTable = $("#datatable-all");
    tableWd.empty();
    tableWd.append(
        "<tr>" +
        "<td colspan='14'>" +
        "<center>" +
        "<div class='loader' id='loader-1'></div>" +
        "</center>" +
        "</td>" +
        "</tr>"
    );
    $.ajax({
        url: '/dashboard/filterWd',
        method: "POST",
        xhrFields: {
            withCredentials: true
        },
        dataType: "json",
        data: {
            startDate: startDate,
            endDate: endDate,
        },
        success: (response) => {
            isTable.DataTable().destroy();
            tableWd.empty();
            var dataT = response["response"];
            var i = 0;
            console.log(dataT);
            $.each(dataT, function (a, b) {
                var proDate = new Date(b.process),
                    prsDate = moment(proDate).format("DD-MM-YYYY");
                var reqDate = new Date(b.request),
                    reqsDate = moment(reqDate).format("DD-MM-YYYY");
                i++;
                tableWd.append(
                    "<tr>" +
                    "<td>" +
                    i +
                    "</td>" +
                    "<td>" +
                    b.transactionID +
                    "</td>" +
                    "<td>" +
                    b.namestatus +
                    "</td>" +
                    "<td>" +
                    b.paymentMethod +
                    "</td>" +
                    "<td>" +
                    uang.format(b.amount) +
                    "</td>" +
                    "<td>" +
                    b.currency +
                    "</td>" +
                    "<td>" +
                    b.bankName +
                    "</td>" +
                    "<td>" +
                    b.accountNumber +
                    "</td>" +
                    "<td>" +
                    b.cusBank +
                    "</td>" +
                    "<td>" +
                    prsDate +
                    "</td>" +
                    "<td>" +
                    reqsDate +
                    "</td>" +
                    "<td>" +
                    b.remark +
                    "</td>" +
                    "<td>" +
                    b.operator +
                    "</td>" +
                    "</tr>"
                );
            });
            var ikiTable = isTable.DataTable({
                lengthChange: false,
                buttons: ["excel", {
                    text: 'Confirm',
                    action: function (e, dt, node, config) {
                        $("#datatable-all").DataTable().search("Confirm").draw();
                    },
                }, {
                    text: 'Rejected',
                    action: function (e, dt, node, config) {
                        $("#datatable-all").DataTable().search("Rejected").draw();
                    }
                }],
                scrollCollapse: true,
                "bDestroy": true,
                "scrollX": true,
            });
            ikiTable.buttons().container().appendTo("#datatable-all_wrapper .col-md-6:eq(0)"), $(
                ".dataTables_length select").addClass("form-select form-select-sm");
            $.fn.dataTable.tables({
                visible: true,
                api: true
            }).columns.adjust();
        }
    });
}

function filterTgl() {
    var tgl = $('input[name="daterange' + targetTgl + '"]').val();
    var splitTgl = tgl.split('-');
    var startDate;
    var endDate;
    if (splitTgl[0] == '') {
        startDate = '';
        endDate = '';
    } else {
        startDate = splitTgl[0];
        endDate = splitTgl[1];
        startDate = startDate.replace('/', '-');
        startDate = startDate.replace('/', '-');
        startDate = startDate.replace(' ', '');
        endDate = endDate.replace('/', '-');
        endDate = endDate.replace('/', '-');
        endDate = endDate.slice(1);
        // new date convert
        startDate = startDate.split("-").reverse().join("-");
        startDate = startDate + ' 00:00:00';
        endDate = endDate.split("-").reverse().join("-");
        endDate = endDate + ' 00:00:00';
    }
    var tableConfirm = $("#datatable-active tbody");
    var tableRejected = $("#datatable-inactive tbody");
    var isTable = $("#" + targetFilter);
    if (targetFilter == "datatable-active") {
        tableConfirm.empty();
        tableConfirm.append(
            "<tr>" +
            "<td colspan='14'>" +
            "<center>" +
            "<div class='loader' id='loader-1'></div>" +
            "</center>" +
            "</td>" +
            "</tr>"
        );
        $.ajax({
            url: '/dashboard/filterDate',
            method: "POST",
            xhrFields: {
                withCredentials: true
            },
            dataType: "json",
            data: {
                startDate: startDate,
                endDate: endDate,
                target: "confirmed"
            },
            success: (response) => {
                isTable.DataTable().destroy();
                tableConfirm.empty();
                var dataT = response["response"];
                var i = 0;
                $.each(dataT, function (a, b) {
                    var crtDate = new Date(b.tglbuat),
                        createdDate = moment(crtDate).format("DD-MM-YYYY");
                    i++;
                    tableConfirm.append(
                        "<tr>" +
                        "<td>" +
                        i +
                        "</td>" +
                        "<td>" +
                        b.trxId +
                        "</td>" +
                        "<td>" +
                        b.vaNumber +
                        "</td>" +
                        "<td>" +
                        b.bank +
                        "</td>" +
                        "<td>" +
                        b.holderName +
                        "</td>" +
                        "<td>" +
                        "Bank Transfer" +
                        "</td>" +
                        "<td>" +
                        b.userid +
                        "</td>" +
                        "<td>" +
                        b.senderName +
                        "</td>" +
                        "<td>" +
                        b.currency +
                        "</td>" +
                        "<td>" +
                        uang.format(b.amt) +
                        "</td>" +
                        "<td>" +
                        uang.format(b.actualAmount) +
                        "</td>" +
                        "<td>" +
                        uang.format(b.amtVa) +
                        "</td>" +
                        "<td>" +
                        (uang.format(b.amt - b.amtVa)) +
                        "</td>" +
                        "<td>" +
                        createdDate +
                        "</td>" +
                        "</tr>"
                    );
                });
                var ikiTable = isTable.DataTable({
                    lengthChange: false,
                    buttons: ["copy", "excel", "pdf"],
                    scrollCollapse: true,
                    "bDestroy": true
                });
                ikiTable.buttons().container().appendTo("#" + targetFilter +
                    "_wrapper .col-md-6:eq(0)"), $(
                        ".dataTables_length select").addClass("form-select form-select-sm");
                $.fn.dataTable.tables({
                    visible: true,
                    api: true
                }).columns.adjust();
            }
        });
    } else {
        tableRejected.empty();
        tableRejected.append(
            "<tr>" +
            "<td colspan='14'>" +
            "<center>" +
            "<div class='loader' id='loader-1'></div>" +
            "</center>" +
            "</td>" +
            "</tr>"
        );
        $.ajax({
            url: 'dashboard/filterDate',
            method: "POST",
            xhrFields: {
                withCredentials: true
            },
            dataType: "json",
            data: {
                startDate: startDate,
                endDate: endDate,
                target: "rejected"
            },
            success: (response) => {
                isTable.DataTable().destroy();
                tableRejected.empty();
                var dataT = response["response"];
                var i = 0;
                $.each(dataT, function (a, b) {
                    var crtDate = new Date(b.tglbuat),
                        createdDate = moment(crtDate).format("DD-MM-YYYY");
                    i++;
                    tableRejected.append(
                        "<tr>" +
                        "<td>" +
                        i +
                        "</td>" +
                        "<td>" +
                        b.trxId +
                        "</td>" +
                        "<td>" +
                        b.vaNumber +
                        "</td>" +
                        "<td>" +
                        b.bank +
                        "</td>" +
                        "<td>" +
                        b.holderName +
                        "</td>" +
                        "<td>" +
                        "Bank Transfer" +
                        "</td>" +
                        "<td>" +
                        b.userid +
                        "</td>" +
                        "<td>" +
                        b.senderName +
                        "</td>" +
                        "<td>" +
                        b.currency +
                        "</td>" +
                        "<td>" +
                        uang.format(b.amt) +
                        "</td>" +
                        "<td>" +
                        uang.format(b.actualAmount) +
                        "</td>" +
                        "<td>" +
                        uang.format(b.amtVa) +
                        "</td>" +
                        "<td>" +
                        (uang.format(b.amt - b.amtVa)) +
                        "</td>" +
                        "<td>" +
                        createdDate +
                        "</td>" +
                        "</tr>"
                    );
                });
                var ikiTable = isTable.DataTable({
                    lengthChange: false,
                    buttons: ["copy", "excel", "pdf"],
                    scrollCollapse: true,
                    "bDestroy": true
                });
                ikiTable.buttons().container().appendTo("#" + targetFilter +
                    "_wrapper .col-md-6:eq(0)"), $(
                        ".dataTables_length select").addClass("form-select form-select-sm");
                $.fn.dataTable.tables({
                    visible: true,
                    api: true
                }).columns.adjust();
            }
        });
    }
}