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
            // dd($data);
            if($role == 1){
                $enpCountry = 'api/country/list';
                $getDataCountry = $this->async->get($enpCountry, $this->apimain);
                $parseCountry = $getDataCountry->response;
                $data["dataCountry"] = $parseCountry;
                return view('Dashboard/Main/Estatement/bank', $data);
            }
            if($role == 4){
                return view('Dashboard/Helpdesk/Estatement/bank', $data);
            }
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
            if($role == 1){
                return view('Dashboard/Main/Estatement/qris', $data);
            }
            if($role == 4){
                return view('Dashboard/Helpdesk/Estatement/qris', $data);
            }
        } else{
            return redirect()->to('dashboard');
        }
    }
}