generateTable = (idTable, url, columns, order, startDate, endDate) => {
  const jmlCol = columns.length;
  var table = $(idTable).DataTable({
    processing: false,
    serverSide: false,
    ajax: {
      url: url,
      type: 'POST',
      data: function (d) {
        d.draw = d.start / d.length + 1;
        if (typeof startDate != 'undefined' && typeof endDate != 'undefined') {
          d.startDate = startDate;
          d.endDate = endDate;
        }
        d.idTable = idTable;
      },
      dataSrc: 'data',
      beforeSend: function () {
        $(idTable + " tbody").empty();
        $(idTable + " tbody").append(
          "<tr>" +
          "<td colspan='" + jmlCol + "'>" +
          "<center>" +
          "<div class='loader' id='loader-1'></div>" +
          "</center>" +
          "</td>" +
          "</tr>"
        );
      },
      success: function (data) {
        console.log(data);
        $(idTable + " tbody").empty();
        table.clear().draw();
        if(data.data != null){
          table.rows.add(data.data).draw();
          table.column(0, {
            search: 'applied',
            order: 'applied'
          }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
          });
        }
        
      },
      error: function (xhr, error, thrown) {
        console.log('XHR:', xhr);
        console.log('Error:', error);
        console.log('Thrown:', thrown);
      }
    },
    columns: columns,
    lengthChange: false,
    lengthMenu: [
      [10, 25, 50, -1],
      [10, 25, 50, "All"]
    ],
    dom: 'Bfrtip',
    buttons: ["copy", "excel", "pdf"],
    scrollX: true,
    destroy: true,
    order: order,
    fixedColumns: true
  });
  return table;
}