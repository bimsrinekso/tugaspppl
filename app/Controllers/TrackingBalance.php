<?php

namespace App\Controllers;

class TrackingBalance extends BaseController
{
     public function index()
     {
        $today = date('Y-m-d');
        $month = date('m');
        // dd($month);
        //all
        $dataPos = $this->pos->select("SUM(cashIn) as masuk,SUM(cashOut) as keluar")->where('deleted_at IS NULL')->get()->getResult();
        $blcIn = $this->blc->select("SUM(amount) as balanceIn")->where('deleted_at IS NULL')->where("type",1)->get()->getResult();
        $blcOut = $this->blc->select("SUM(amount) as balaceOut")->where('deleted_at IS NULL')->where("type",2)->get()->getResult();
        $totalDebit = $dataPos[0]->keluar + $blcOut[0]->balaceOut;
        $totalKredit = $dataPos[0]->masuk + $blcIn[0]->balanceIn;
        $totalBalance = $totalKredit - $totalDebit;
        //day
        $dataPosDay = $this->pos->select("SUM(cashIn) as masuk,SUM(cashOut) as keluar")->where('DATE(created_at)', $today)->where('deleted_at IS NULL')->get()->getResult();
        $blcInDay = $this->blc->select("SUM(amount) as balanceIn")->where('DATE(created_at)', $today)->where('deleted_at IS NULL')->where("type",1)->get()->getResult();
        $blcOutDay = $this->blc->select("SUM(amount) as balaceOut")->where('DATE(created_at)', $today)->where('deleted_at IS NULL')->where("type",2)->get()->getResult();
        $totalDebitDay = $dataPosDay[0]->keluar + $blcOutDay[0]->balaceOut;
        $totalKreditDay = $dataPosDay[0]->masuk + $blcInDay[0]->balanceIn;
        $totalBalanceDay = $totalKreditDay - $totalDebitDay;
        //monthly
        $dataPosmt = $this->pos->select("SUM(cashIn) as masuk,SUM(cashOut) as keluar")->where('MONTH(created_at)', $month)->where('deleted_at IS NULL')->get()->getResult();
        $blcInmt = $this->blc->select("SUM(amount) as balanceIn")->where('MONTH(created_at)', $month)->where('deleted_at IS NULL')->where("type",1)->get()->getResult();
        $blcOutmt = $this->blc->select("SUM(amount) as balaceOut")->where('MONTH(created_at)', $month)->where('deleted_at IS NULL')->where("type",2)->get()->getResult();
        $totalDebitmt = $dataPosmt[0]->keluar + $blcOutmt[0]->balaceOut;
        $totalKreditmt = $dataPosmt[0]->masuk + $blcInmt[0]->balanceIn;
        $totalBalancemt = $totalKreditmt - $totalDebitmt;
        $data =  [
            "debit" => $totalDebit,
            "credit" =>$totalKredit,
            "total" =>$totalBalance,
            "debitday" => $totalDebitDay,
            "creditday" =>$totalKreditDay,
            "totalday" =>$totalBalanceDay,
            "debitmt" => $totalDebitmt,
            "creditmt" =>$totalKreditmt,
            "totalmt" =>$totalBalancemt
        
        ];
         return view('Dashboard/TrackingBalance/index',$data);
     }

     public function filterTrack()
     {
        $startDate = $this->request->getVar('startDate');
        $endDate = $this->request->getVar('endDate');
        if ($startDate == null) {
            $dataPos = $this->pos->select("SUM(cashIn) as masuk,SUM(cashOut) as keluar")
            ->where('deleted_at IS NULL')
            ->get()
            ->getResult();
            $blcIn = $this->blc->select("SUM(amount) as balanceIn")
            ->where('deleted_at IS NULL')
            ->where('type',1)
            ->get()
            ->getResult();
            $blcOut = $this->blc->select("SUM(amount) as balaceOut")
            ->where('deleted_at IS NULL')
            ->where('type',2)
            ->get()
            ->getResult();
        } else {
            $dataPos = $this->pos->select("SUM(cashIn) as masuk,SUM(cashOut) as keluar")
            ->where('created_at >=',$startDate)
            ->where('created_at <=',$endDate)
            ->where('deleted_at IS NULL')
            ->get()
            ->getResult();
            $blcIn = $this->blc->select("SUM(amount) as balanceIn")
            ->where('created_at >=',$startDate)
            ->where('created_at <=',$endDate)
            ->where('deleted_at IS NULL')
            ->where('type',1)
            ->get()
            ->getResult();
            $blcOut = $this->blc->select("SUM(amount) as balaceOut")
            ->where('created_at >=',$startDate)
            ->where('created_at <=',$endDate)
            ->where('deleted_at IS NULL')
            ->where('type',2)
            ->get()
            ->getResult();
        }

        $totalDebit = $dataPos[0]->keluar + $blcOut[0]->balaceOut;
        $totalKredit = $dataPos[0]->masuk + $blcIn[0]->balanceIn;
        $totalBalance = $totalKredit - $totalDebit;
        $response = [
            "debit" => $totalDebit,
            "credit" => $totalKredit,
            "total" => $totalBalance,
        ];
        return $this->response->setJSON($response);
     }
    
}