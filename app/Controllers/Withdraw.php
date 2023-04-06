<?php

namespace App\Controllers;

class Withdraw extends BaseController
{
    public function wdTrans()
    {
        $enp = 'api/wd/wdTrans';
        if ($this->sesi->get('role') == 1) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataTrans" => $parseData->dataTrans,
            ];
            return view('Dashboard/Main/Withdraw/wdTrans', $data);
        } elseif($this->sesi->get('role') == 2) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apiclient, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataTrans" => $parseData->dataTrans,
            ];
            return view('Dashboard/Client/Withdraw/wdTrans', $data);
        }
    }

    public function listPending()
    {
        $enp = 'api/wd/listPending';
        if ($this->sesi->get('role') == 1) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataPen" => $parseData->dataPen,
            ];
            return view('Dashboard/Main/Withdraw/listPending', $data);
        } elseif($this->sesi->get('role') == 2) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apiclient, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataPen" => $parseData->dataPen,
            ];
            return view('Dashboard/Client/Withdraw/listPending', $data);
        }
    }
}
