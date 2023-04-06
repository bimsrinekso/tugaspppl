<?php
namespace App\Models;
use CodeIgniter\Model;
class CurrencyModel extends Model{
    
    public function format($number)
    {
        $formatter = new \NumberFormatter('ko-KR', \NumberFormatter::CURRENCY);
        $formatter->setTextAttribute(\NumberFormatter::CURRENCY_CODE, 'KRW');
        $formatter->setSymbol(\NumberFormatter::CURRENCY_SYMBOL, '₩');
        return $formatter->formatCurrency($number, 'KRW');
    }
}