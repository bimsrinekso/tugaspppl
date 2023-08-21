<?php

namespace App\Controllers;
class EstatementController extends BaseController
{
    public function listPending()
    {
        $enp = 'api/listPending';
        $role = $this->sesi->get('role');
        if ($role == 1 || $role == 4) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataPen" => $parseData->dataPen,
            ];
            if($role == 1){
                $enpCountry = 'api/country/list';
                $getDataCountry = $this->async->get($enpCountry, $this->apimain);
                $parseCountry = $getDataCountry->response;
                $data["dataCountry"] = $parseCountry;
                return view('Dashboard/Main/Deposit/eStatement', $data);
            }
            if($role == 4){
                return view('Dashboard/Helpdesk/Deposit/eStatement', $data);
            }
        } else{
            return redirect()->to('dashboard');
        }
    }
}