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

generateTable = (idTable, url, columns, order) => {
  var table;

  function fetchData(start, end) {
    $.ajax({
      url: url,
      data: {
        start: start,
        end: end
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
      success: function (data) {
        table.clear().rows.add(data).draw();
      },
      error: function (xhr, error, thrown) {
        console.log('XHR:', xhr);
        console.log('Error:', error);
        console.log('Thrown:', thrown);
      }
    });
  }

  function initializeTable() {
    table = $(idTable).DataTable({
      processing: false,
      serverSide: false,
      ajax: {
        url: url,
        data: function (d) {
          var dateRange = $('#date-range').val().split(' - ');
          var start = dateRange[0];
          var end = dateRange[1];
          d.start = start;
          d.end = end;
          console.log(d.start);
          console.log(d.end);
          console.log("sadasdsADSADSAD");
          console.log(start);
          console.log(end);
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
        complete: function () {
          $('#loader-1').remove();
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

    $('#date-range').daterangepicker({
      autoUpdateInput: false,
      locale: {
        cancelLabel: 'Clear'
      }
    });

    $('#date-range').on('apply.daterangepicker', function (ev, picker) {
      $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
    });

    $('#date-range').on('cancel.daterangepicker', function (ev, picker) {
      $(this).val('');
    });

    $('#filter-button').on('click', function () {
      var dateRange = $('#date-range').val().split(' - ');
      var start = dateRange[0];
      var end = dateRange[1];
      fetchData(start, end);
    });
  }

  initializeTable();
  //     table.on('order.dt search.dt', function () {
  //     let i = 1;

  //     table.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
  //         this.data(i++);
  //     });
  // }).draw();
  return table;
}

$(document).ready(function(){
  
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
        data: 'updatedTime',
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
      
    ];
    var orderSm = [[11, 'desc']];
    generateTable('#tableSummary', '/service/report/listSm', columnsSm, orderSm);
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
      var orderDepo = [[1, 'desc']];
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
      var orderWd = [[10, 'desc']];
      generateTable('#tableWd', '/service/report/listWd', columnsWd, orderWd);
});
