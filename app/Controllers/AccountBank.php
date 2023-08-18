<?php

namespace App\Controllers;

class AccountBank extends BaseController
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
            
            return view('Dashboard/Main/bankAccount/index', $data);
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
            return view('Dashboard/Client/bankAccount/index', $data);
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
            return view('Dashboard/Helpdesk/bankAccount/index', $data);
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
        $enpCountry = 'api/country/list';
        $getDataCountry = $this->async->get($enpCountry, $this->apimain);
        $parseCountry = $getDataCountry->response;


        $enpAPI = 'api/listApi';
        $getDataAPI = $this->async->get($enpAPI, $this->apimain);
        $parseDataAPI = $getDataAPI->response;
        if($role == 1){
            $data = [
                "dataClient" => $parseClient,
                "groupStatus" => $parseData,
                "dataCountry" => $parseCountry,
                "dataApi" => $parseDataAPI,
            ];
            
            return view('Dashboard/Main/bankAccount/createAcc', $data);
        }elseif($role == 4){
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
                "groupStatus" => $parseData,
                "dataCountry" => $parseCountry,
                "listBank" => $parseBank
            ];
            return view('Dashboard/Helpdesk/bankAccount/createAcc', $data);
        }
    }
    public function saveAcc(){
        $role = $this->sesi->get('role');
        $isValid;
        if($role == 1){
            $isValid = [
                'bank'=> 'required',
                'accNumber' => 'required|regex_match[/^[0-9\-]+$/]',
                'holderName' => 'required',
                'country' => 'required'
            ];
        }
        if($role == 4){
            $isValid = [
                'bank'=> 'required',
                'accNumber' => 'required|regex_match[/^[0-9\-]+$/]',
                'holderName' => 'required',
            ];
        }
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/createAccount');
        }
        $country;
        $clientID;
        if($role == 1){
            $country = $this->request->getVar('country');
            $clientID = $this->request->getVar('clientID');
            
        }
        if($role == 4){
            $dataCC = [
                'userid' => $this->sesi->get('userid')
            ];
            $enpUserCC = 'api/country/userClientCountry';
            $postCC = $this->async->post($enpUserCC, $this->apimain, $dataCC);
            $parseCC = $postCC->response;
            $country = $parseCC->countryID;
            $clientID = $parseCC->client_id;
        }
        $enp = 'api/va/saveAccount';
        $dataBody = [
            'bank'=> $this->request->getVar('bank'),
            'accNumber' => $this->request->getVar('accNumber'),
            'holderName' => $this->request->getVar('holderName'),
            'status' => $this->request->getVar('status'),
            'userid' => $this->sesi->get('userid'),
            'idClient' => $clientID,
            'action_by' => $this->sesi->get('username'),
            'country' => $country,
            'apiKeyID'=> $this->request->getVar('apiKeyID'),
            'username'=> $this->request->getVar('username'),
            'password'=> $this->request->getVar('password'),
            'api'=> $this->request->getVar('API')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully add data VA Account");
            return redirect()->to('dashboard/bankAccounts');
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
        $enpCountry = 'api/country/list';
        $getDataCountry = $this->async->get($enpCountry, $this->apimain);
        $parseCountry = $getDataCountry->response;
        $enpAPI = 'api/listApi';
        $getDataAPI = $this->async->get($enpAPI, $this->apimain);
        $parseDataAPI = $getDataAPI->response;
        if($postData->status == '200'){
            if($role == 1){
                $data = [
                    "dataBank" => $parseData[0],
                    "groupStatus" => $parseStatus,
                    "dataClient" => $parseClient,
                    "dataCountry" => $parseCountry,
                    "dataApi" => $parseDataAPI,
                ];
                // dd($data);
                return view('Dashboard/Main/bankAccount/editAcc', $data);   
            }elseif($role == 4){
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
                    "dataBank" => $parseData[0],
                    "groupStatus" => $parseStatus,
                    "listBank" => $parseBank
                ];
                return view('Dashboard/Helpdesk/bankAccount/editAcc', $data);   
            }
            
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('dashboard/bankAccounts');
        }
    }
    public function updateAcc($id = null){
        $role = $this->sesi->get('role');
        $isValid;
        if($role == 1){
            $isValid = [
                'bank'=> 'required',
                'accNumber' => 'required|regex_match[/^[0-9\-]+$/]',
                'holderName' => 'required',
                'country' => 'required'
            ];
        }
        if($role == 4){
            $isValid = [
                'bank'=> 'required',
                'accNumber' => 'required|regex_match[/^[0-9\-]+$/]',
                'holderName' => 'required',
            ];
        }
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to(previous_url());
        }
        $country;
        $clientID;
        if($role == 1){
            $country = $this->request->getVar('country');
            $clientID = $this->request->getVar('clientID');
        }
        if($role == 4){
            $dataCC = [
                'userid' => $this->sesi->get('userid')
            ];
            $enpUserCC = 'api/country/userClientCountry';
            $postCC = $this->async->post($enpUserCC, $this->apimain, $dataCC);
            $parseCC = $postCC->response;
            $country = $parseCC->countryID;
            $clientID = $parseCC->client_id;
        }
        $enp = 'api/va/updateAccount';
        $dataBody = [
            'id' => $id,
            'bank'=> $this->request->getVar('bank'),
            'accNumber' => $this->request->getVar('accNumber'),
            'holderName' => $this->request->getVar('holderName'),
            'status' => $this->request->getVar('status'),
            'userid' => $this->sesi->get('userid'),
            'idClient' => $clientID,
            'action_by' => $this->sesi->get('username'),
            'country' => $country
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update data VA Account");
            return redirect()->to('dashboard/bankAccounts');
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
            return redirect()->to('dashboard/bankAccounts');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/bankAccounts');
        }
    }
}
