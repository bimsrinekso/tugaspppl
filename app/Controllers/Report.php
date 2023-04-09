<?php

namespace App\Controllers;

class Report extends BaseController
{
    public function index()
    {
        $enp = 'api/getReport';
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apiclient, $dataBody);
            $parseData = $postData->response;
            $data = [
                "trxDepoCon"=> $parseData->trxDepoCon,
                "trxDepoRej"=> $parseData->trxDepoRej,
                "trxWdCon"=> $parseData->trxWdCon,
                "trxWdRej"=> $parseData->trxWdRej, 
                "weekWithdraw"=> $parseData->weekWithdraw,
                "weekDeposit"=> $parseData->weekDeposit,
                "rangeHari"=> $parseData->rangeHari,
                "dataTrans"=> $parseData->dataTrans,
            ];
        return view('Dashboard/Report/index', $data);
    }
}
