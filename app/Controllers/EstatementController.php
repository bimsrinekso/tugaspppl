<?php

namespace App\Controllers;
class EstatementController extends BaseController
{
    public function listPendingBank()
    {
        $enp = 'api/estatement/listBank';
        $role = $this->sesi->get('role');
        if ($role == 1 || $role == 4) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataPending" => $parseData->dataPending,
                "dataDone" => $parseData->dataDone
            ];

                $enpCountry = 'api/country/list';
                $getDataCountry = $this->async->get($enpCountry, $this->apimain);
                $parseCountry = $getDataCountry->response;
                $data["dataCountry"] = $parseCountry;
                return view('Dashboard/Estatement/bank', $data);
            
        } else{
            return redirect()->to('dashboard');
        }
    }
    public function listPendingQris()
    {
        $enp = 'api/estatement/listQris';
        $role = $this->sesi->get('role');
        if ($role == 1 || $role == 4) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataPending" => $parseData->dataPending,
                "dataDone" => $parseData->dataDone
            ];
            return view('Dashboard/Estatement/qris', $data);
        } else{
            return redirect()->to('dashboard');
        }
    }
}