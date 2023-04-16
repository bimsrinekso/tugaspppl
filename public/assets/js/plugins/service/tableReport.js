formatKrw = (money) => {
	return new Intl.NumberFormat("id-ID", {
		style: "currency",
		currency: "KRW",
		minimumFractionDigits: 0,
	}).format(money);
};
formatDuid = (nominal) => {
	const convert = Intl.NumberFormat({
		minimumFractionDigits: 0,
		maximumFractionDigits: 0,
	});
	var parsing = convert.format(nominal).replace(',', '.');
	return parsing;
}

generateTable = (idTable, url, columns, order) => {
    var table = $(idTable).DataTable({
        processing: false,
        serverSide: false,
        ajax: {
            url: url,
            data: function (d) {
                d.draw = d.start / d.length + 1;
            },
            dataSrc: 'data',
            beforeSend: function () {
                $(idTable + " tbody").empty();
                $(idTable + " tbody").append(
                    "<tr>" +
                    "<td colspan='14'>" +
                    "<center>" +
                    "<div class='loader' id='loader-1'></div>" +
                    "</center>" +
                    "</td>" +
                    "</tr>"
                );
            },
            error: function (xhr, error, thrown) {
                console.log('XHR:', xhr);
                console.log('Error:', error);
                console.log('Thrown:', thrown);
            }
        },
        columns: columns,
        lengthChange: true,
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        scrollX: true,
        destroy: true,
        order: order
    });
    return table;
}

$(document).ready(function(){
    // table depo
    var columnsDepo = [
        {
          data: null,
          render: function (data, type, row, meta) {
            return meta.row + 1;
          }
        },
        {
            data: 'tglbuat',
            render: function(data, type, row, meta) {
              var date = new Date(data);
              var year = date.getFullYear();
              var month = ('0' + (date.getMonth() + 1)).slice(-2);
              var day = ('0' + date.getDate()).slice(-2);
              var hours = ('0' + date.getHours()).slice(-2);
              var minutes = ('0' + date.getMinutes()).slice(-2);
              var seconds = ('0' + date.getSeconds()).slice(-2);
              return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
            }
          },
        { data: 'trxId' },
        { data: 'statusName' },
        { data: 'vaNumber' },
        { data: 'bank' },
        { data: 'holderName' },
        { data: null, defaultContent: 'Bank Transfer' },
        { data: 'userid' },
        { data: 'senderName' },
        { data: 'currency' },
        {
          data: 'amt',
          render: function (data, type, row, meta) {
            return formatKrw(data);
          }
        },
        {
          data: 'actualAmount',
          render: function (data, type, row, meta) {
            return formatKrw(data);
          }
        },
        {
          data: 'amtVa',
          render: function (data, type, row, meta) {
            return formatKrw(data);
          }
        },
        {
          data: null,
          render: function (data, type, row) {
            return formatKrw(row.amt - row.amtVa);
          }
        }
      ];
      var orderDepo = [[1, 'asc']];
      generateTable('#tableDepo', '/service/report/listDepo', columnsDepo, orderDepo);

      // table withdraw
      var columnsWd = [
        {
          data: null,
          render: function (data, type, row, meta) {
            return meta.row + 1;
          }
        },
        { data: 'idTransRWD' },
        { data: 'namestatus' },
        { data: 'paymentMethod' },
        {
            data: 'rwdAmount',
            render: function (data, type, row, meta) {
              return formatKrw(data);
            }
          },
        { data: 'currency' },
        { data: 'bankName' },
        { data: 'accountNumber'},
        { data: 'cusBank' },
        {
            data: 'process',
            render: function(data, type, row, meta) {
              var date = new Date(data);
              var year = date.getFullYear();
              var month = ('0' + (date.getMonth() + 1)).slice(-2);
              var day = ('0' + date.getDate()).slice(-2);
              var hours = ('0' + date.getHours()).slice(-2);
              var minutes = ('0' + date.getMinutes()).slice(-2);
              var seconds = ('0' + date.getSeconds()).slice(-2);
              return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
            }
          },
          {
            data: 'request',
            render: function(data, type, row, meta) {
              var date = new Date(data);
              var year = date.getFullYear();
              var month = ('0' + (date.getMonth() + 1)).slice(-2);
              var day = ('0' + date.getDate()).slice(-2);
              var hours = ('0' + date.getHours()).slice(-2);
              var minutes = ('0' + date.getMinutes()).slice(-2);
              var seconds = ('0' + date.getSeconds()).slice(-2);
              return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
            }
          },
          { data: 'remark' },
          { data: 'operator' },
      ];
      var orderWd = [[10, 'asc']];
      generateTable('#tableWd', '/service/report/listWd', columnsWd, orderWd);
})