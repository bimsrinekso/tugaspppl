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
                "totalKomisiDp" => $parseData->totalKomisiDp,
                "totalKomisiWd" => $parseData->totalKomisiWd,
                "totalBankTransfer" => $parseData->totalBankTransfer,
            ];
            return view('Dashboard/Main/index', $data);
        } elseif($this->sesi->get('role') == 2) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "totalTopup" => $parseData->totalTopup,
                "totalBlcClient" => $parseData->totalBlcClient,
                "totalDepo" => $parseData->totalDepo,
                "totalWd" => $parseData->totalWd,
                "totalHo" => $parseData->totalHo,
                "totalKomisiDp" => $parseData->totalKomisiDp,
                "totalKomisiWd" => $parseData->totalKomisiWd,
                "totalBankTransfer" => $parseData->totalBankTransfer,
            ];
            return view('Dashboard/Client/index', $data);
        } elseif($this->sesi->get('role') == 4) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            // dd($parseData);
            $data = [
                "totalUser" => $parseData->totalUser,
                "totalBlcClient" => $parseData->totalBlcClient,
                "totalDepo" => $parseData->totalDepo,
                "totalWd" => $parseData->totalWd,
                "totalBlcMain" => $parseData->totalBlcMain,
                "totalSettle" => $parseData->totalSettle,
                "totalHo" => $parseData->totalHo,
                "totalTopup" => $parseData->totalTopup,
                "totalKomisiDp" => $parseData->totalKomisiDp,
                "totalKomisiWd" => $parseData->totalKomisiWd,
                "totalBankTransfer" => $parseData->totalBankTransfer,
            ];
            return view('Dashboard/Helpdesk/index',$data );
        }else{
            return view('Dashboard/Helpdesk/index');
        }
    }
}
