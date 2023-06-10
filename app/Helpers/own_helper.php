<?php
if (!function_exists('formatKRW')) {
    function formatKRW($amount)
    {
        $formatter = new \NumberFormatter('ko_KR', \NumberFormatter::CURRENCY);
        $formatter->setAttribute(\NumberFormatter::MAX_FRACTION_DIGITS, 2);
        $formatter->setAttribute(\NumberFormatter::MIN_FRACTION_DIGITS, 2); // Add this line

        if($amount == '' || $amount == null){
            $amount = 0;
        }
        $formatted_amount = $formatter->formatCurrency($amount, 'KRW');

        return $formatted_amount;
    }
}

if (!function_exists('format_date')) {
    /**
     * Format a date using DateTime
     *
     * @param string $date The date in the format 'Y-m-d\TH:i:s.u\Z'
     * @param string $format The desired format, e.g., 'd-m-Y H:i:s'
     * @param string $timezone The desired timezone, default is 'UTC'
     * @return string The formatted date
     */
    function format_date(string $date, string $format, string $timezone = 'UTC'): string
    {
        $dateTime = DateTime::createFromFormat('Y-m-d\TH:i:s.u\Z', $date, new DateTimeZone('UTC'));
        $dateTime->setTimezone(new DateTimeZone($timezone));
        return $dateTime->format($format);
    }
}

