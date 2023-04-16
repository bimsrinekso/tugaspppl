formatTgl = (tgl) => {
    const date = new Date(tgl);
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    const hours = String(date.getHours()).padStart(2, '0');
    const minutes = String(date.getMinutes()).padStart(2, '0');
    const seconds = String(date.getSeconds()).padStart(2, '0');
    return `${year}/${month}/${day} ${hours}:${minutes}:${seconds}`;
  }
  async function generateExcel(list, webview, baris5){
      var wb = XLSX.utils.book_new();
      var ws = XLSX.utils.json_to_sheet([]);
      var judul = "DAFTAR TRANSAKSI " + webview;
      var namaFile = "DAFTAR-TRANSAKSI-"+webview;
      const baris1 = [
        {v: judul, t: 's', s:{font:{sz:18}}}
      ];
      XLSX.utils.sheet_add_aoa(ws, [baris1], { origin: 'A1' });
      XLSX.utils.sheet_add_aoa(ws, [['Export date: ' + new Date().toLocaleString()]], { origin: 'A2' });
      var iniStyle = {
        font: { bold: true }, fill: { fgColor: { rgb: 'C5C5C5' } }
      };
      const baris4 = [
        { v: 'Tanggal Transaksi', t: 's', s: iniStyle },
        { v: 'Platform', t: 's', s: iniStyle },
        { v: 'Metode Pembayaran', t: 's', s: iniStyle },
        { v: 'Partner', t: 's', s: iniStyle },
        { v: 'Status Pembayaran', t: 's', s: iniStyle },
        { v: 'Jenis Layanan', t: 's', s: iniStyle },
      ];
      XLSX.utils.sheet_add_aoa(ws, [baris4], { origin: 'A4' });
      XLSX.utils.sheet_add_aoa(ws, [baris5], { origin: 'A5' });
      const baris7 = [
        { v: 'No', t: 's', s: iniStyle }, // a
        { v: 'User ID', t: 's', s: iniStyle }, // b
        { v: 'User ID Platform', t: 's', s: iniStyle }, // c
        { v: 'Nama User', t: 's', s: iniStyle }, // d
        { v: 'ID Pesanan', t: 's', s: iniStyle }, // e
        { v: 'External ID', t: 's', s: iniStyle }, // f
        { v: 'Tanggal Transaksi', t: 's', s: iniStyle }, // g
        { v: 'Nama Konsumen', t: 's', s: iniStyle }, // h
        { v: 'Email', t: 's', s: iniStyle }, // i
        { v: 'No Hp', t: 's', s: iniStyle }, // j
        { v: 'Alamat Pemesanan', t: 's', s: iniStyle }, // k
        { v: 'Lokasi', t: 's', s: iniStyle }, // l
        { v: 'Jenis Layanan', t: 's', s: iniStyle }, // m
        { v: 'Tanggal Pelaksanaan Layanan', t: 's', s: iniStyle }, // n
        { v: 'Detail Layanan', t: 's', s: iniStyle }, // o
        { v: 'Status Layanan', t: 's', s: iniStyle }, // p
        { v: 'Partner', t: 's', s: iniStyle }, // q
        { v: 'Platform', t: 's', s: iniStyle }, // r
        { v: 'Promo', t: 's', s: iniStyle }, // s
        { v: 'Nominal Tambahan', t: 's', s: iniStyle }, // t
        { v: 'Nominal Transaksi', t: 's', s: iniStyle }, // u
        { v: 'Status Transaksi', t: 's', s: iniStyle }, // v
        { v: 'Metode Pembayaran', t: 's', s: iniStyle }, // w
        { v: 'Tanggal Pembayaran', t: 's', s: iniStyle }, // x
        { v: 'No VA / No Reff', t: 's', s: iniStyle }, // y
      ];
      XLSX.utils.sheet_add_aoa(ws, [baris7], { origin: 'A7' });
      let compareData = {};
      // let cekCompare = {}
      let data = list;
      // console.log(data);
      for (let i = 0; i < data.length; i++) {
        let item = data[i];
        // console.log(item);
        var hitung = i + 1;
      
        var underPay = item.nominal_underpayment == null ? '-' : item.nominal_underpayment;
        var trxAmt = item.transaction_amount == null ? '-' : item.transaction_amount;
        // var totalNominal = parseInt(underPay) + parseInt(trxAmt);
        // var totalNominal = parseInt(trxAmt);
        // var cekData = {
        //   "transAmount": trxAmt,
        //   "kurangBayar": underPay,
        //   // "volumeTrans" : totalNominal,
        //   "code": item.code
        // }
        // cekCompare[i] = cekData;
        var idPromo = item.id_promo_generate == null ? '-' : item.id_promo_generate;
        // service status
        var serviceStatus = '-';
        if(item.partner_name.match(/sejasa/gi)){
          if (item.service_status == 1) {
            serviceStatus = "Menunggu Konfirmasi";
          } else if (item.service_status == 2) {
            serviceStatus = "Proses";
          } else if (item.service_status == 3) {
            serviceStatus = "Selesai";
          } else if (
            item.service_status == 4 &&
            item.service_cancel_status == 0 &&
            item.service_overpay_status == 0 && item.transaction_status != 3
          ) {
            serviceStatus = "Batal";
          } else if (
            item.service_status == 4 &&
            item.service_cancel_status >= 0 &&
            item.service_overpay_status >= 0 && item.transaction_status == 1
          ) {
            serviceStatus = "Refund";
          } else if (item.service_status == 5) {
            serviceStatus = "Kurang Bayar";
          } else {
            serviceStatus = "-";
          }
        }else if(item.partner_name.match(/arsitag/gi)){
          if (item.service_status == 1) {
            serviceStatus = "Request";
          } else if (item.service_status == 2) {
            serviceStatus = "Follow Up";
          } else if (item.service_status == 3) {
            serviceStatus = "Open";
          } else if (item.service_status == 4) {
            serviceStatus = "Closed";
          } else if (item.service_status == 5) {
            serviceStatus = "Confirmed";
          } else if (item.service_status == 6) {
            serviceStatus = "Project Start";
          } else if (item.service_status == 7) {
            serviceStatus = "On Progress";
          } else if (item.service_status == 8) {
            serviceStatus = "Finished";
          } else if (item.service_status == 99) {
            serviceStatus = "Discontinued";
          } else {
            serviceStatus = "-";
          }
        }else{
          if (item.service_status == 1) {
            serviceStatus = "Menunggu Konfirmasi";
          } else if (item.service_status == 2) {
            serviceStatus = "Proses";
          } else if (item.service_status == 3) {
            serviceStatus = "Selesai";
          } else if (
            item.service_status == 4 &&
            item.service_cancel_status == 0 &&
            item.service_overpay_status == 0 && item.transaction_status != 3
          ) {
            serviceStatus = "Batal";
          } else if (
            item.service_status == 4 &&
            item.service_cancel_status >= 0 &&
            item.service_overpay_status >= 0 && item.transaction_status == 1
          ) {
            serviceStatus = "Refund";
          } else if (item.service_status == 5) {
            serviceStatus = "Kurang Bayar";
          }else {
            serviceStatus = "-";
          }
        }
        // end service status
        let defaultStatus = ['Belum Dibayar', 'Terbayar', 'Dibatalkan', 'Kadaluarsa'];
              var tipePotongan = '-';
        if(item.tipePotongan == 1){
                          tipePotongan = idPromo + ' - ' + 'Cashback';
              }else if(item.tipePotongan == 2){
                          tipePotongan = idPromo + ' - ' +'Diskon';
              }
        // hindari null value dengan mengganti menjadi -
        var action_by = item.action_by == null ? '-' : item.action_by;
        var userAction = item.userAction == null ? '-' : item.userAction;
        var platUserid = item.platUserid == null? '-' : item.platUserid;
        var code = item.code == null ? '-' : item.code;
        var external_id = item.external_id == null ? '-' : item.external_id;
        var customer_name = item.customer_name == null ? '-' : item.customer_name;
        var email = item.email == null ? '-' : item.email;
        var handphone = item.handphone == null ? '-' : item.handphone;
        var address = item.address == null ? '-' : item.address;
        var location = item.location == null ? '-' : item.location;
        var jenis_layanan = item.category_name == null ? '-' : item.category_name; // belum disesuaikan
        var detail_layanan = item.category_name_child == null ? '-' : item.category_name_child; // belum disesuaikan
        var partner_name = item.partner_name == null ? '-' : item.partner_name;
        var platform_name = item.platform_name == null ? '-' : item.platform_name;
        var nominal_underpayment = item.nominal_underpayment == null ? '-' :item.nominal_underpayment;
        var transaction_amount = item.transaction_amount == null ? '-' : item.transaction_amount;
        var transaction_status = defaultStatus[item.transaction_status] == null ? '-' : defaultStatus[item.transaction_status];
        var isVa = item.payment_method != null ? 'VA': '-';
        var reff = item.reff == null ? '-' : item.reff; // belum disesuaikan
        // end null value
        compareData[i] = {
          "no" : hitung,
          "action_by": action_by,
          "userIdPlatform": platUserid,
          "userAction": userAction,
          "code": code,
          "external_id": external_id,
          "transaction_date": formatTgl(item.transaction_date),
          "customer_name": customer_name,
          "email": email,
          "handphone": handphone,
          "address": address,
          "location": location,
          "jenis_layanan": jenis_layanan,
          "implementation_date'": formatTgl(item.implementation_date),
          "detail_layanan": detail_layanan,
          "service_status": serviceStatus,
          "partner_name": partner_name,
          "platform_name": platform_name,
          "tipePotongan": tipePotongan,
          "nominal_underpayment": nominal_underpayment,
          "transaction_amount": transaction_amount,
          "transaction_status": transaction_status,
          "payment_method": isVa,
          "payment_date": formatTgl(item.payment_date),
          "reff": reff
        };
      }
      // console.log(cekCompare);
      // const compareDataArray = Object.values(compareData); // jadikan array
        const rateng = {
          border: {
            top: {style: 'thin'},
            bottom: {style: 'thin'},
            left: {style: 'thin'},
            right: {style: 'thin'}
          },
          alignment: {
            horizontal: 'center',
          },
        };
        const iniBorder = {
          border: {
            top: {style: 'thin'},
            bottom: {style: 'thin'},
            left: {style: 'thin'},
            right: {style: 'thin'}
          },
        };
        const compareDataArray = Object.values(compareData).map(row => {
          Object.keys(row).forEach(key => {
            if (row[key] === '-') {
              row[key] = {
                t: 's',
                v: row[key],
                s: rateng,
              };
            }else {
              var typeCell = 's';
              var columnStyle = key === "no" ? {...iniBorder, alignment: {horizontal: 'right'}} : iniBorder;
              if (key === "nominal_underpayment" || key === "transaction_amount") {
                typeCell = 'n';
                columnStyle.numFmt = "#,##0;-#,##0";
                columnStyle.alignment = {horizontal: 'left'};
              }
              row[key] = { 
                t: typeCell, 
                v: row[key], 
                s: columnStyle };
            }
          });
          return row;
        });
      XLSX.utils.sheet_add_json(ws, compareDataArray, { skipHeader: true, origin: 'A8' });
      range = XLSX.utils.decode_range(ws['!ref']);
      const colWidths = [
        { wpx: 50 }, // No
        { wpx: 300 }, // User ID
        { wpx: 100 }, // User ID Platform
        { wpx: 200 }, // Nama User
        { wpx: 150 }, // ID Pesanan
        { wpx: 150 }, // External ID
        { wpx: 150 }, // Tanggal Transaksi
        { wpx: 200 }, // Nama Konsumen
        { wpx: 200 }, // Email
        { wpx: 120 }, // No Hp
        { wpx: 350 }, // Alamat Pemesanan
        { wpx: 350 }, // Lokasi
        { wpx: 200 }, // Jenis Layanan
        { wpx: 200 }, // Tanggal Pelaksanaan Layanan
        { wpx: 200 }, // Detail Layanan
        { wpx: 200 }, // Status Layanan
        { wpx: 200 }, // Partner
        { wpx: 150 }, // Platform
        { wpx: 150 }, // Promo
        { wpx: 150 }, // Nominal Tambahan
        { wpx: 150 }, // Nominal Transaksi
        { wpx: 150 }, // Status Transaksi
        { wpx: 150 }, // Metode Pembayaran
        { wpx: 150 }, // Tanggal Pembayaran
        { wpx: 150 } // No VA / No Reff
      ];
      ws['!cols'] = colWidths;
      XLSX.utils.book_append_sheet(wb, ws, 'Daftar Transaksi');
      var filename = namaFile + '_' + new Date().toISOString().slice(0, 10) + '.xlsx';
      XLSX.writeFile(wb, filename);
  }
  $("#exportTranHome").on("click", async function (evt) {
      var button = $(this);
      var btnMuter = Ladda.create(button[0]);
      btnMuter.start();
      evt.preventDefault();
      var table = $('#tableTransaction').DataTable();
      let data = await table.rows().data().toArray();
      var webview = 'HOME SERVICE';
      var tglFilter = $('#divTableTransaction').find('#daterange').val() == '' ? '-':$('#divTableTransaction').find('#daterange').val();
      var platform = $('#divTableTransaction').find('#Platform option:selected').text();
      var payMethod =  $('#divTableTransaction').find('#paymentMethod option:selected').text();
      var partner = $('#divTableTransaction').find('#Partner option:selected').text();
      var status = $('#divTableTransaction').find('#Status option:selected').text();
      var layanan = $('#divTableTransaction').find('#Kategori option:selected').text();
      const baris5 = [
        tglFilter,
        platform,
        payMethod,
        partner,
        status,
        layanan
      ];
      generateExcel(data, webview, baris5);
      btnMuter.stop();
  });
  
  $("#exportTranProf").on("click", async function (evt) {
      var button = $(this);
      var btnMuter = Ladda.create(button[0]);
      btnMuter.start();
      evt.preventDefault();
      var table = $('#tableProvTransaction').DataTable();
      let data = await table.rows().data().toArray();
      var webview = 'PROFESIONAL LISTING';
      var tglFilter = $('#divTableProv').find('#daterange').val() == '' ? '-':$('#divTableProv').find('#daterange').val();
      var platform = $('#divTableProv').find('#Platform option:selected').text();
      var payMethod =  $('#divTableProv').find('#paymentMethod option:selected').text();
      var partner = $('#divTableProv').find('#Partner option:selected').text();
      var status = $('#divTableProv').find('#Status option:selected').text();
      var layanan = $('#divTableProv').find('#Kategori option:selected').text();
      const baris5 = [
        tglFilter,
        platform,
        payMethod,
        partner,
        status,
        layanan
      ];
      generateExcel(data, webview, baris5);
      btnMuter.stop();
  });
  
  $("#exportTranMarket").on("click", async function (evt) {
      var button = $(this);
      var btnMuter = Ladda.create(button[0]);
      btnMuter.start();
      evt.preventDefault();
      var table = $('#tableMarketTransaction').DataTable();
      let data = await table.rows().data().toArray();
      var webview = 'MARKTEPLACE';
      var tglFilter = $('#divTableMarket').find('#daterange').val() == '' ? '-':$('#divTableMarket').find('#daterange').val();
      var platform = $('#divTableMarket').find('#Platform option:selected').text();
      var payMethod =  $('#divTableMarket').find('#paymentMethod option:selected').text();
      var partner = $('#divTableMarket').find('#Partner option:selected').text();
      var status = $('#divTableMarket').find('#Status option:selected').text();
      var layanan = $('#divTableMarket').find('#Kategori option:selected').text();
      const baris5 = [
        tglFilter,
        platform,
        payMethod,
        partner,
        status,
        layanan
      ];
      generateExcel(data, webview, baris5);
      btnMuter.stop();
  });