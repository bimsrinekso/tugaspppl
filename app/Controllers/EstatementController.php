<?php

namespace App\Controllers;
class EstatementController extends BaseController
{
    public function listPendingBank()
    {
        $enp = 'api/estatement/listBank';
        $role = $this->sesi->get('role');
        $dataBody = [
            'userid'=> $this->sesi->get('userid')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if ($role == 1) {
            $data = [
                "dataPending" => $parseData->dataPending,
                "dataDone" => $parseData->dataDone
            ];

            $enpCountry = 'api/country/list';
            $getDataCountry = $this->async->get($enpCountry, $this->apimain);
            $parseCountry = $getDataCountry->response;
            $data["dataCountry"] = $parseCountry;
            return view('Dashboard/Main/Estatement/bank', $data);
            
        } elseif($role == 4){
            $dataCC = [
                'userid' => $this->sesi->get('userid')
            ];
            $enpUserCC = 'api/country/userClientCountry';
            $postCC = $this->async->post($enpUserCC, $this->apimain, $dataCC);
            $parseCC = $postCC->response;
            $country = $parseCC->countryID;
            $dataCountry = [
                "country" => $country,
                "userid" => $this->sesi->get('userid')
            ];
            $enpBank = 'api/country/bank';
            $listBank = $this->async->post($enpBank, $this->apimain, $dataCountry);
            $parseBank = $listBank->response;
            $data = [
                "dataPending" => $parseData->dataPending,
                "dataDone" => $parseData->dataDone,
                "listBank" => $parseBank
            ];
            return view('Dashboard/Helpdesk/Estatement/bank', $data);
        }else{
            return redirect()->to('dashboard');
        }
    }
    public function index()
    {
        $role = $this->sesi->get('role');
        if ($role == 1) {
            return view('Dashboard/Main/Estatement/qris');
        } elseif($role == 4) {
            return view('Dashboard/Helpdesk/Estatement/qris');
        } else {
            return redirect()->to('dashboard');
        }
    }

    public function listPenQris() {
        $param = $_REQUEST;        
        $enpPen = 'api/estatement/listQrisPen';
        $enpDon = 'api/estatement/listQrisDon'; 
        $dataBody = [
            'userid' => $this->sesi->get('userid'),
            'param' => $param,
        ];
        if($param['idTable'] == '#pendingStatement'){
            $postData = $this->async->post($enpPen, $this->apimain, $dataBody);
        }else{
            $postData = $this->async->post($enpDon, $this->apimain, $dataBody);
        }
        $response = [
            "draw" => isset($param['draw']) ? $param['draw'] : 0,
            "recordsTotal" => $postData->response->recordsTotal,
            "recordsFiltered" => $postData->response->recordsFiltered,
            "data" => $postData->response->data,

        ];
    
        echo json_encode($response);
    }
}