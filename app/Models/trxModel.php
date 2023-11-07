<?php

namespace App\Models;

use CodeIgniter\Model;
class trxModel extends Model
{
    public function trxId()
    {
        $now = new \DateTime();
        $year = substr($now->format('Y'), -2);
        $month = $now->format('m');
        if ($month < 10) {
            $month = "0" . $month;
        }

        $random1 = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $random2 = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $random3 = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

        $fixTrx = $year . $month . '-' . $random1 . "-" . $random2 . "-" . $random3;
        return $fixTrx;
    }

    public function custID()
    {
        $now = new \DateTime();
        $numbers = '0123456789';
        $accountId = '';
        $year = substr($now->format('Y'), -2);
        $month = $now->format('m');
        if ($month < 10) {
            $month = "0" . $month;
        }
        for ($i = 0; $i < 16; $i++) {
            $accountId .= $numbers[rand(0, strlen($numbers) - 1)];
        }
        $result = $year . $month . substr($accountId, 0, 4) . substr($accountId, 4, 4);
        return $result;
    }

}