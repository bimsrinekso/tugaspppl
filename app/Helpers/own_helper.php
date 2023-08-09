<?php
if (!function_exists('formatKRW')) {
    function formatKRW($amount)
    {
        if($amount == '' || $amount == null){
            $amount = 0;
        }

        // Truncate to 2 decimal places without rounding
        $pos = strpos($amount, '.');
        if ($pos !== false) {
            $amount = substr($amount, 0, $pos + 4);
        }

        $formatter = new \NumberFormatter('id_ID', \NumberFormatter::CURRENCY);
        $formatter->setAttribute(\NumberFormatter::MAX_FRACTION_DIGITS, 3);
        $formatter->setAttribute(\NumberFormatter::MIN_FRACTION_DIGITS, 3);
        
        $formatted_amount = $formatter->formatCurrency($amount, 'IDR');

        return $formatted_amount;
    }
}



if (!function_exists('format_date')) {
    /**
     * Format a date using DateTime
     *
     * @param string $date The date in the format 'Y-m-d\TH:i:s.u\Z'
     * @param string $format The desired format, e.g., 'd-m-Y H:i:s'
     * @param string $timezone The desired timezone, default is 'Asia/Manila'
     * @return string The formatted date
     */
    function format_date(string $date, string $format, string $timezone = 'Asia/Manila'): string
    {
        $dateTime = DateTime::createFromFormat('Y-m-d\TH:i:s.u\Z', $date, new DateTimeZone('UTC'));
        
        if ($dateTime === false) {
            // Date parsing failed
            return 'Invalid date';
        }
        
        $targetTimezone = new DateTimeZone($timezone);
        $dateTime->setTimezone($targetTimezone);
        
        return $dateTime->format($format);
    }
}