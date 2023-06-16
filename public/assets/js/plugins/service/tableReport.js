formatKrw = (money) => {
	return new Intl.NumberFormat("id-ID", {
		style: "currency",
		currency: "KRW",
		minimumFractionDigits: 0,
	}).format(money);
};

formatDuid = (nominal) => {
	const convert = Intl.NumberFormat({
		minimumFractionDigits: 2,
		maximumFractionDigits: 2,
	});
	var parsing = convert.format(nominal).replace(',', '.');
	return parsing;
}

function formatDate(dateStr, isEndDate) {
    if (!dateStr || dateStr == '') return '';
    dateStr = dateStr.replace(/\//g, '-').trim();
    return dateStr.split("-").reverse().join("-") + (isEndDate ? ' 23:59:59' : ' 00:00:00');
}
generateTable = (idTable, url, columns, order,dataSourceKey,startDate,endDate) => {
    var table = $(idTable).DataTable({
      processing: false,
      serverSide: false,
      ajax: {
          url: url,
          type: 'POST',
          data: function (d) {
            d.draw = d.start / d.length + 1;
            if(typeof startDate != 'undefined' && typeof endDate != 'undefined'){
                d.startDate = startDate;
                d.endDate = endDate;
            }
          },
          dataSrc: function(response) {
            console.log(response);
            return response[dataSourceKey].data;
          },
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

    $('input[name="daterangeConf"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear',
            format: 'YYYY-MM-DD'
        }
    });
    $('input[name="daterangeConf"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });
    $('input[name="daterangeConf"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    // table SM
    var columnsSm = [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        }
      },
      { data: 'idTransTB' },
      {
        data: function (row, type, set) {
          if (row.payFor === 1) {
            return row.dpOrderNo == null ? "-" : row.dpOrderNo;
          } else if (row.payFor === 2) {
            return row.wdOrderNo == null ? "-" : row.wdOrderNo;
          } else if (row.payFor === 3) {
            return '-';
          } else if (row.payFor === 4) {
            return '-';
          } else {
            return '-';
          }
        }
      },
      {
        data: 'payFor',
        render: function(data, type, row, meta) {
          if (data === 1) {
            return 'Deposit';
          } else if (data === 2) {
            return 'Withdraw';
          } else if (data === 3) {
            return 'Topup Client';
          } else if (data === 4) {
            return 'Ho Withdraw';
          } else {
            return 'Unknown';
          }
        }
      },
      {
        data: 'amountTB',
        render: function(data, type, row, meta) {
          var amountCondition = data === null;
          var formattedAmount = formatKrw(data);
          var payFor = row.payFor;
          var styleCondition = payFor === 1 || payFor === 3;
      
          var transactionAmount = styleCondition ? (amountCondition ? "-" : "+" + formattedAmount) : "-" + formattedAmount;
      
          var tdStyle = styleCondition ? (amountCondition ? "" : "color:#2ecc71;font-weight: 500;") : "color:#e74c3c;font-weight: 500;";
      
          return '<td><span style="' + tdStyle + '">' + transactionAmount + '</span></td>';
        }
      },      
      {
        data: 'amtVa',
        render: function(data, type, row, meta) {
          var payFor = row.payFor;
          var amtVaFormatted = payFor === 1 ? formatKrw(data) : "-";
    
          return amtVaFormatted;
        }
      },
      {
        data: function (row, type, set) {
          if (row.payFor === 1) {
            return formatKrw(row.depoCom);
          } else if (row.payFor === 2) {
            return formatKrw(row.wdCom);
          } else {
            return '-';
          }
        }
      },
      {
        data: 'bankTransfer',
        render: function(data, type, row, meta) {
          var btFormatted = (row.payFor == 2) ? formatKrw(data) : "-";
    
          return btFormatted;
        }
      },
      {
        data: 'lastBalance',
        render: function (data, type, row, meta) {
          return formatKrw(data);
        }
      },
      { data: 'name' },
      {
        data: 'submitTime',
        render: function(data, type, row, meta) {
          var date = moment.tz(data, "YYYY-MM-DDTHH:mm:ss.SSSZ", "UTC").tz("Asia/Manila").format("DD-MM-YYYY HH:mm:ss");
          return date;
        }
      },
      {
        data: 'updatedTime',
        render: function(data, type, row, meta) {
          var date = moment.tz(data, "YYYY-MM-DDTHH:mm:ss.SSSZ", "UTC").tz("Asia/Manila").format("DD-MM-YYYY HH:mm:ss");
          return date;
        }
      },
      
    ];
    var orderSm = [[11, 'desc']];
    generateTable('#tableSummary', '/service/report/listSm', columnsSm, orderSm,"summary");
            
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
              var date = moment.tz(data, "YYYY-MM-DDTHH:mm:ss.SSSZ", "UTC").tz("Asia/Manila").format("DD-MM-YYYY HH:mm:ss");
              return date;
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
      var orderDepo = [[1, 'desc']];
      generateTable('#tableDepo', '/service/report/listSm', columnsDepo, orderDepo,"deposit");

    //   table withdraw
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
              var date = moment.tz(data, "YYYY-MM-DDTHH:mm:ss.SSSZ", "UTC").tz("Asia/Manila").format("DD-MM-YYYY HH:mm:ss");
              return date;
            }
          },
          {
            data: 'request',
            render: function(data, type, row, meta) {
              var date = moment.tz(data, "YYYY-MM-DDTHH:mm:ss.SSSZ", "UTC").tz("Asia/Manila").format("DD-MM-YYYY HH:mm:ss");
              return date;
            }
          },
          { data: 'remark' },
          { data: 'operator' },
      ];
      var orderWd = [[10, 'desc']];
      generateTable('#tableWd', '/service/report/listSm', columnsWd, orderWd,"withdraw");

    $('#btnFilterCon').click(function () {
        var tgl = $('input[name="daterangeConf"]').val();
        var splitTgl = tgl.split('-');
        var startDate = formatDate(splitTgl[0], false);
        var endDate = formatDate(splitTgl[1], true);
        generateTable('#tableSummary', '/service/report/listSm', columnsSm, orderSm,"summary", startDate, endDate);
        generateTable('#tableWd', '/service/report/listSm', columnsWd, orderWd,"withdraw", startDate, endDate);
        generateTable('#tableDepo', '/service/report/listSm', columnsDepo, orderDepo,"deposit", startDate, endDate);
    });
});
