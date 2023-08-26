<?php

namespace App\Controllers;

class ProviderController extends BaseController
{
    public function index()
    {
        $enp = 'api/provider/listProvider';
        if ($this->sesi->get('role') == 1) {
            
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataProvider" => $parseData,
            ];

            return view('Dashboard/Main/Provider/index', $data);
        }else if ($this->sesi->get('role') == 4) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataProvider" => $parseData,
            ];
            return view('Dashboard/Helpdesk/Provider/index', $data);
        }
    }
    public function createProvider(){
        $role = $this->sesi->get('role');
        $enp = 'api/qris/groupStatus';
        $getData = $this->async->get($enp, $this->apimain);
        $parseData = $getData->response;
        $enpClient = 'api/listClient';
        $getClient = $this->async->get($enpClient, $this->apimain);
        $parseClient = $getClient->response;
        $data;
        if($role == 1){
            $data = [
                "dataClient" => $parseClient,
            ];
            
            return view('Dashboard/Main/Provider/createProvider', $data);
        }elseif($role == 4){
            return view('Dashboard/Helpdesk/Provider/createProvider');
        }
    }
    public function saveProvider(){
        $role = $this->sesi->get('role');
       
        $isValid;
        if($role == 1){
            $isValid = [
                'providerName' => 'required',
            ];
        }
        if($role == 4){
            $isValid = [
                'providerName' => 'required',
            ];
        }
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/createProvider');
        }
        $country;
        $clientID;
        if($role == 1){
            $clientID = $this->request->getVar('clientID');
        }
        if($role == 4){
            $dataCC = [
                'userid' => $this->sesi->get('userid')
            ];
            $enpUserCC = 'api/country/userClientCountry';
            $postCC = $this->async->post($enpUserCC, $this->apimain, $dataCC);
            $parseCC = $postCC->response;
            $clientID = $parseCC->client_id;
        }
        $enp = 'api/provider/saveProvider';
        $providerName = $this->request->getVar('providerName');
        $dataBody = [
            'providerName'=> $this->request->getVar('providerName'),
            'userid' => $this->sesi->get('userid'),
            'idClient' => $clientID,
        ];
        // dd($dataBody);
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully add data Qris Account");
            return redirect()->to('dashboard/provider');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/createProvider');
        }
    }

    public function detailProvider($id = null){
        $role = $this->sesi->get('role');
        $enp = 'api/provider/detailProvider';
        $dataBody = [
            'providerID' => $id,
            'userid' => $this->sesi->get('userid')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        $enpClient = 'api/listClient';
        $getClient = $this->async->get($enpClient, $this->apimain);
        $parseClient = $getClient->response;
        $data;
        if($postData->status == '200'){
            if($role == 1){
                $data = [
                    "dataCl" => $parseClient,
                    "dataProvider" => $parseData
                ];
             
                return view('Dashboard/Main/Provider/editProvider', $data);   
            }elseif($role == 4){
                $data = [
                    "dataProvider" => $parseData
                ];
                
                return view('Dashboard/Helpdesk/Provider/editProvider', $data);   
            }
            
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('dashboard/provider');
        }
    }
    public function updateProvider($id = null){
        $role = $this->sesi->get('role');
        $isValid;
        $isValid;
        if($role == 1){
            $isValid = [
                'providerName' => 'required',
            ];
        }
        if($role == 4){
            $isValid = [
                'providerName' => 'required',
            ];
        }
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to(previous_url());
        }
        $clientID;
        if($role == 1){
            $clientID = $this->request->getVar('clientID');
        }
        if($role == 4){
            $dataCC = [
                'userid' => $this->sesi->get('userid')
            ];
            $enpUserCC = 'api/country/userClientCountry';
            $postCC = $this->async->post($enpUserCC, $this->apimain, $dataCC);
            $parseCC = $postCC->response;
            $clientID = $parseCC->client_id;
        }
        $enp = 'api/provider/updateProvider';
        $dataBody = [
            'providerID' => $id,
            'providerName'=> $this->request->getVar('providerName'),
            'userid' => $this->sesi->get('userid'),
            'idClient' => $clientID,
        ];
        // dd($dataBody);
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update data VA Account");
            return redirect()->to('dashboard/provider');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/editProvider');
        }
    }

    public function delProvider($id = null){
        $enp = 'api/provider/deleteProvider';
        $dataBody = [
            'providerID' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully delete data VA Account");
            return redirect()->to('dashboard/provider');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/provider');
        }
    }
}
