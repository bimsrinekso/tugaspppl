<?php

namespace App\Controllers;

class Bank extends BaseController
{
    public function index(){
        $enp = 'api/bank/getAll';
        $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
        $getData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $getData->response;
        $data = [
            "allData" => $parseData,
        ];
        return view('Dashboard/Main/BaseBank/index', $data);   
    }

    public function createBank(){
        $role = $this->sesi->get('role');
        $enpClient = 'api/listClient';
        $getClient = $this->async->get($enpClient, $this->apimain);
        $parseClient = $getClient->response;
        $data;
        if($role == 1){
            $data = [
                "dataClient" => $parseClient,
            ];
             return view('Dashboard/Main/BaseBank/createBank', $data);
        }elseif($role == 4){
            
            return view('Dashboard/Helpdesk/BaseBank/createBank');  
        }
        
    }

    public function saveBank(){
         $isValid = [
            'bankName' => 'required',
            'bankCode' => 'required',
            'region' => 'required',
            'regionCode' => 'required',
            'universalName' => 'required',
            
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/baseBank/create');
        }
        $enp = 'api/bank/saveBank';
        $dataBody = [
            'userid' => $this->sesi->get('userid'),
            'bankName' => $this->request->getVar('bankName'),
            'bankCode' => $this->request->getVar('bankCode'),
            'region' => $this->request->getVar('region'),
            'regionCode' => $this->request->getVar('regionCode'),
            'universalName' => $this->request->getVar('universalName'),
            'clientID' => $this->request->getVar('clientID'),
            'actionBy' => $this->sesi->get('userid'),
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully add new Bank");
            return redirect()->to('dashboard/baseBank');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/baseBank');
        }   
    }

    public function detailBank($id = null){
        $enp = 'api/bank/detailBank';
        $dataBody = [
            'bankID' => $id
        ];
        $role = $this->sesi->get('role');
        $enpClient = 'api/listClient';
        $getClient = $this->async->get($enpClient, $this->apimain);
        $parseClient = $getClient->response;
        $data;
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){       
            if($role == 1){
                $data = [                 
                    "dataBank" => $parseData,
                    "dataClient" => $parseClient,
                ];
                return view('Dashboard/Main/BaseBank/detailBank', $data);
            }elseif($role == 4){
                $data = [
                    "dataBank" => $parseData,
                ];               
                return view('Dashboard/Helpdesk/BaseBank/detailBank',$data);  
            }
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('dashboard/baseBank');
        }
        
    }
    public function updateBank($id = null){
        $enp = 'api/bank/updateBank';
        $dataBody = [
            'bankID' => $id,
            'userid' => $this->sesi->get('userid'),
            'bankName' => $this->request->getVar('bankName'),
            'bankCode' => $this->request->getVar('bankCode'),
            'region' => $this->request->getVar('region'),
            'regionCode' => $this->request->getVar('regionCode'),
            'universalName' => $this->request->getVar('universalName'),
            'clientID' => $this->request->getVar('clientID'),
            'actionBy' => $this->sesi->get('userid'),
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update Bank");
            return redirect()->to('dashboard/baseBank');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/baseBank');
        }   
    }
}