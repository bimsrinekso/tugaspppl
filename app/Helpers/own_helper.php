<?php
if (!function_exists('formatKRW')) {
    function formatKRW($amount)
    {
        $formatter = new \NumberFormatter('ko_KR', \NumberFormatter::CURRENCY);
        $formatter->setAttribute(\NumberFormatter::MAX_FRACTION_DIGITS, 3);
        $formatter->setAttribute(\NumberFormatter::MIN_FRACTION_DIGITS, 2); // Add this line

        if($amount == '' || $amount == null){
            $amount = 0;
        }
        $formatted_amount = $formatter->formatCurrency($amount, 'KRW');

        return $formatted_amount;
    }
}
