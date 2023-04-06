<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $enp = 'api/dataDashboard';
        if ($this->sesi->get('role') == 1) {
            
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "totalUser" => $parseData->totalUser,
                "totalBlcClient" => $parseData->totalBlcClient,
                "totalDepo" => $parseData->totalDepo,
                "totalWd" => $parseData->totalWd,
                "totalBlcMain" => $parseData->totalBlcMain,
                "totalSettle" => $parseData->totalSettle,
                "totalHo" => $parseData->totalHo,
                "totalTopup" => $parseData->totalTopup,
            ];
            return view('Dashboard/Main/index', $data);
        } elseif($this->sesi->get('role') == 2) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "totalUser" => $parseData->totalUser,
                "totalBlcClient" => $parseData->totalBlcClient,
                "totalDepo" => $parseData->totalDepo,
                "totalWd" => $parseData->totalWd,
                "totalHo" => $parseData->totalHo,
                'currency' => $this->currency
            ];
            return view('Dashboard/Client/index', $data);
        }else{
            return view('Dashboard/Client/index');
        }
    }
}
