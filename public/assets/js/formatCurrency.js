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