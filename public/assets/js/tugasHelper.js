function trxId() {
    var now = new Date();
    var year = now.getFullYear().toString().substr(-2);
    var month = now.getMonth() + 1;
    if (month < 10) {
        month = "0" + month;
    }
    var calcDig = 100000000; // 8 digit
    var val = Math.floor(1000 * calcDig + Math.random() * 9000 * calcDig);
    var strVal = '' + val;
    var splitVal = strVal.match(/.{1,4}/g).join('-');
    var fixTrx = year + month + '-' + splitVal;
    return fixTrx;
}

function detectCurrency(locale, currencyCode, digit) {
    locale = locale.replace('_', '-');
    const money = new Intl.NumberFormat(locale, {
        style: 'currency',
        currency: currencyCode,
        minimumFractionDigits: digit,
        maximumFractionDigits: digit,
    });

    return money;
}

function formatCurrency(num, locale, currencyCode, digit) {
    num = parseFloat(num).toFixed(3);
    if (isNaN(num)) {
        num = 0;
    }
    return detectCurrency(locale, currencyCode, digit).format(num);
}


function formatDate(dateStr, isEndDate) {
    if (!dateStr || dateStr == '') return '';
    dateStr = dateStr.replace(/\//g, '-').trim();
    return dateStr.split("-").reverse().join("-") + (isEndDate ? ' 23:59:59' : ' 00:00:00');
}

function formatTgl(tgl){
    const date = new Date(tgl);
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    const hours = String(date.getHours()).padStart(2, '0');
    const minutes = String(date.getMinutes()).padStart(2, '0');
    const seconds = String(date.getSeconds()).padStart(2, '0');
    return `${day}-${month}-${year} ${hours}:${minutes}:${seconds}`;
}

function clearAndShowLoader(table) {
    table.empty();
    table.append(
        "<tr>" +
        "<td colspan='14'>" +
        "<center>" +
        "<div class='loader' id='loader-1'></div>" +
        "</center>" +
        "</td>" +
        "</tr>"
    );
}