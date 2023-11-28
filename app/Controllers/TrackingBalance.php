<?php

namespace App\Controllers;

class TrackingBalance extends BaseController
{
     public function index()
     {
        $dataPos = $this->pos->select("SUM(cashIn) as masuk,SUM(cashOut) as keluar")->where('deleted_at IS NULL')->get()->getResult();
        $blcIn = $this->blc->select("SUM(amount) as balanceIn")->where('deleted_at IS NULL')->where("type",1)->get()->getResult();
        $blcOut = $this->blc->select("SUM(amount) as balaceOut")->where('deleted_at IS NULL')->where("type",2)->get()->getResult();
        $totalDebit = $dataPos[0]->keluar + $blcOut[0]->balaceOut;
        $totalKredit = $dataPos[0]->masuk + $blcIn[0]->balanceIn;
        $totalBalance = $totalKredit - $totalDebit;
        $data =  [
            "debit" => $totalDebit,
            "credit" =>$totalKredit,
            "total" =>$totalBalance
        ];
         return view('Dashboard/TrackingBalance/index',$data);
     }
    
}