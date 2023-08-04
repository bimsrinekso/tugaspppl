<?php

namespace App\Controllers;

class VirtualAccount extends BaseController
{
    public function index()
    {
        $enp = 'api/va/listAccount';
        if ($this->sesi->get('role') == 1) {
            
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "allData" => $parseData->allData,
                "dataActive" => $parseData->dataActive,
                "dataInactive" => $parseData->dataInactive,
            ];
            return view('Dashboard/Main/virtualAccount/index', $data);
        } elseif($this->sesi->get('role') == 2) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apiclient, $dataBody);
            $parseData = $postData->response;
            $data = [
                "allData" => $parseData->allData,
                "dataActive" => $parseData->dataActive,
                "dataInactive" => $parseData->dataInactive,
            ];
            return view('Dashboard/Client/virtualAccount/index', $data);
        }else if ($this->sesi->get('role') == 4) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "allData" => $parseData->allData,
                "dataActive" => $parseData->dataActive,
                "dataInactive" => $parseData->dataInactive,
            ];
            return view('Dashboard/Helpdesk/virtualAccount/index', $data);
        }else{
            return view('Dashboard/Client/index');
        }
    }
    public function createAcc(){
        $role = $this->sesi->get('role');
        $enp = 'api/va/groupStatus';
        $getData = $this->async->get($enp, $this->apimain);
        $parseData = $getData->response;
        $enpClient = 'api/listClient';
        $getClient = $this->async->get($enpClient, $this->apimain);
        $parseClient = $getClient->response;
        $data;
        if($role == 1){
            $data = [
                "dataClient" => $parseClient,
                "groupStatus" => $parseData
            ];
            return view('Dashboard/Main/virtualAccount/createAcc', $data);
        }elseif($role == 4){
            $data = [
                "groupStatus" => $parseData
            ];
            return view('Dashboard/Helpdesk/virtualAccount/createAcc', $data);
        }
    }
    public function saveAcc(){
        $isValid = [
            'bank'=> 'required',
            'vaNumber' => 'required|regex_match[/^[0-9\-]+$/]',
            'holderName' => 'required',
            'payMethod' => 'required',
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/createAccount');
        }

        $enp = 'api/va/saveAccount';
        $dataBody = [
            'bank'=> $this->request->getVar('bank'),
            'vaNumber' => $this->request->getVar('vaNumber'),
            'holderName' => $this->request->getVar('holderName'),
            'payMethod' => $this->request->getVar('payMethod'),
            'status' => $this->request->getVar('status'),
            'userid' => $this->sesi->get('userid'),
            'idClient' => $this->request->getVar('clientID'),
            'action_by' => $this->sesi->get('username')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully add data VA Account");
            return redirect()->to('dashboard/listAccounts');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/createAccount');
        }
    }

    public function detailAcc($id = null){
        $role = $this->sesi->get('role');
        $enp = 'api/va/cekIdVa';
        $enpSts = 'api/va/groupStatus';
        $dataBody = [
            'idVa' => $id,
            'userid' => $this->sesi->get('userid')
        ];
        $getData = $this->async->get($enpSts, $this->apimain);
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        $parseStatus = $getData->response;
        $enpClient = 'api/listClient';
        $getClient = $this->async->get($enpClient, $this->apimain);
        $parseClient = $getClient->response;
        if($postData->status == '200'){
            if($role == 1){
                $data = [
                    "dataVa" => $parseData[0],
                    "groupStatus" => $parseStatus,
                    "dataClient" => $parseClient,
                ];
                return view('Dashboard/Main/virtualAccount/editAcc', $data);   
            }elseif($role == 4){
                $data = [
                    "dataVa" => $parseData[0],
                    "groupStatus" => $parseStatus
                ];
                return view('Dashboard/Main/virtualAccount/editAcc', $data);   
            }
            
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('dashboard/listAccounts');
        }
    }
    public function updateAcc($id = null){
        $enp = 'api/va/updateAccount';
        $dataBody = [
            'id' => $id,
            'bank'=> $this->request->getVar('bank'),
            'vaNumber' => $this->request->getVar('vaNumber'),
            'holderName' => $this->request->getVar('holderName'),
            'payMethod' => $this->request->getVar('payMethod'),
            'status' => $this->request->getVar('status'),
            'userid' => $this->sesi->get('userid'),
            'idClient' => $this->request->getVar('clientID'),
            'action_by' => $this->sesi->get('username')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update data VA Account");
            return redirect()->to('dashboard/listAccounts');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/editAccount');
        }
    }

    public function delAcc($id = null){
        $enp = 'api/va/delAccount';
        $dataBody = [
            'idVa' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully delete data VA Account");
            return redirect()->to('dashboard/listAccounts');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/listAccounts');
        }
    }
}
