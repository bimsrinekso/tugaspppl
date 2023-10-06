formatMoney = (money) => {
	return new Intl.NumberFormat("id-ID", {
		style: "currency",
		currency: "IDR",
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

function appenStats(dataDepo, dataWd){
    var weekDeposit = '' + dataDepo;
    weekDeposit = weekDeposit.split(",");
    var weekWithdraw = '' + dataWd;
    weekWithdraw = weekWithdraw.split(",");
    function getChartColorsArray(e) {
        if (null !== document.getElementById(e)) {
            var t = document.getElementById(e).getAttribute("data-colors");
            if (t) return (t = JSON.parse(t)).map(function (e) {
                var t = e.replace(" ", "");
                if (-1 === t.indexOf(",")) {
                    var r = getComputedStyle(document.documentElement).getPropertyValue(t);
                    return r || t
                }
                var a = e.split(",");
                return 2 != a.length ? t : "rgba(" + getComputedStyle(document.documentElement)
                    .getPropertyValue(a[0]) + "," + a[1] + ")"
            });
            console.warn("data-colors Attribute not found on:", e)
        }
    }
    var options, chart, areaChartColors = getChartColorsArray("area-chart");
    areaChartColors && (options = {
        series: [{
            name: "Deposit",
            data: weekDeposit
        }, {
            name: "Withdraw",
            data: weekWithdraw
        }],
        chart: {
            height: 350,
            type: "area",
            toolbar: {
                show: !1
            }
        },
        colors: areaChartColors,
        dataLabels: {
            enabled: !1
        },
        stroke: {
            curve: "smooth",
            width: 2
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                inverseColors: !1,
                opacityFrom: .45,
                opacityTo: .05,
                stops: [20, 100, 100, 100]
            }
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return formatDuid(value);
                }
            },
        },
        xaxis: {
            categories: ["Sun", "Mon", "Tues", "Wed", "Thus", "Fri", "Sat"],
            labels: {
                formatter: function (value) {
                    return value;
                }
            }
        },
        markers: {
            size: 3,
            strokeWidth: 3,
            hover: {
                size: 4,
                sizeOffset: 2
            }
        },
        legend: {
            position: "top",
            horizontalAlign: "right"
        }
    }, (chart = new ApexCharts(document.querySelector("#area-chart"), options)).render());
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
});

