<?php

namespace App\Controllers;

class AccountQris extends BaseController
{
    public function index()
    {
        $enp = 'api/qris/listAccount';
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
            return view('Dashboard/Main/qrisAccount/index', $data);
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
            return view('Dashboard/Client/qrisAccount/index', $data);
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
            return view('Dashboard/Helpdesk/qrisAccount/index', $data);
        }else{
            return view('Dashboard/Client/index');
        }
    }
    public function createAcc(){
        $role = $this->sesi->get('role');
        $enp = 'api/qris/groupStatus';
        $getData = $this->async->get($enp, $this->apimain);
        $parseData = $getData->response;
        $enpClient = 'api/listClient';
        $getClient = $this->async->get($enpClient, $this->apimain);
        $parseClient = $getClient->response;
        $data;
        $enpCountry = 'api/country/list';
        $getDataCountry = $this->async->get($enpCountry, $this->apimain);
        $parseCountry = $getDataCountry->response;
        $enpProvider = 'api/provider/listProvider';
        $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
        $getDataProvider = $this->async->post($enpProvider, $this->apimain, $dataBody );
        
        $parseDataProvider = $getDataProvider->response;
        if($role == 1){
            $data = [
                "dataClient" => $parseClient,
                "groupStatus" => $parseData,
                "dataCountry" => $parseCountry,
                "dataProvider" => $parseDataProvider
            ];
            
            return view('Dashboard/Main/qrisAccount/createAcc', $data);
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
                "listBank" => $parseBank,
                "dataProvider" => $parseDataProvider
            ];
            return view('Dashboard/Helpdesk/qrisAccount/createAcc', $data);
        }
    }
    public function saveAcc(){
        $role = $this->sesi->get('role');
       
        $isValid;
        if($role == 1){
            $isValid = [
                'merchantName' => 'required',
                'gambar' => 'uploaded[gambar]',
                'country' => 'required',
                'providerID' => 'required'
            ];
        }
        if($role == 4){
            $isValid = [
                'merchantName' => 'required',
                'gambar' => 'uploaded[gambar]',
                'providerID' => 'required'
            ];
        }
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/createQris');
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
        $enp = 'api/qris/saveAccount';
        $merchantName = $this->request->getVar('merchantName');
        $qris = $this->request->getFile('gambar');
        $qrisPath;
        if ($qris->isValid() && !$qris->hasMoved())
        {
            $qrisExtension = $qris->getClientExtension();
            $qrisName = date('YmdHis') . '-qris-' . $this->sanitizeFilename($merchantName) . '-' . $qris->getRandomName($qrisExtension);
            $qrisPath = 'gambar/qris/' . $qrisName;
            $qris->move('gambar/qris', $qrisName);
        }
        $dataBody = [
            'merchantName'=> $this->request->getVar('merchantName'),
            'status' => $this->request->getVar('status'),
            'userid' => $this->sesi->get('userid'),
            'idClient' => $clientID,
            'action_by' => $this->sesi->get('username'),
            'country' => $country,
            'username' =>$this->request->getVar('username'),
            'password' =>$this->request->getVar('password'),
            'providerID' =>$this->request->getVar('providerID'),
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody, $qrisPath, 'gambar');
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully add data Qris Account");
            return redirect()->to('dashboard/qrisAccounts');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/createQris');
        }
    }

    public function detailAcc($id = null){
        $role = $this->sesi->get('role');
        $enp = 'api/qris/cekIdQris';
        $enpSts = 'api/qris/groupStatus';
        $dataBody = [
            'idQris' => $id,
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
        $enpProvider = 'api/provider/listProvider';
        $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
        $getDataProvider = $this->async->post($enpProvider, $this->apimain, $dataBody );
        
        $parseDataProvider = $getDataProvider->response;
        if($postData->status == '200'){
            if($role == 1){
                $data = [
                    "dataQris" => $parseData[0],
                    "groupStatus" => $parseStatus,
                    "dataClient" => $parseClient,
                    "dataCountry" => $parseCountry,
                    "dataProvider" => $parseDataProvider
                ];
             
                return view('Dashboard/Main/qrisAccount/editAcc', $data);   
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
                $data = [
                    "dataQris" => $parseData[0],
                    "groupStatus" => $parseStatus,
                    "dataProvider" => $parseDataProvider
                ];
                
                return view('Dashboard/Helpdesk/qrisAccount/editAcc', $data);   
            }elseif($role == 2){
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
                $data = [
                    "dataQris" => $parseData[0],
                    "groupStatus" => $parseStatus,
                ];
                return view('Dashboard/Client/qrisAccount/editAcc', $data);   
            }
            
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('dashboard/qrisAccounts');
        }
    }
    public function updateAcc($id = null){
        $role = $this->sesi->get('role');
        $isValid;
        $isValid;
        if($role == 1){
            $isValid = [
                'merchantName' => 'required',
                'country' => 'required',
                'providerID' => 'required'
            ];
        }
        if($role == 4){
            $isValid = [
                'merchantName' => 'required',
                'providerID' => 'required'
            ];
        }
        if($role == 2){
            $isValid = [
                'merchantName' => 'required',
                'providerID' => 'required'
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
        if($role == 2){
            $dataCC = [
                'userid' => $this->sesi->get('userid')
            ];
            $enpUserCC = 'api/country/userClientCountry';
            $postCC = $this->async->post($enpUserCC, $this->apimain, $dataCC);
            $parseCC = $postCC->response;
            $country = $parseCC->countryID;
            $clientID = $parseCC->client_id;
        }
        $enp = 'api/qris/updateAccount';
        $merchantName = $this->request->getVar('merchantName');
        $qris = $this->request->getFile('gambar');
        $qrisPath = '';

        if ($qris != NULL && $qris->isValid() && !$qris->hasMoved()) {
            $qrisExtension = $qris->getClientExtension();
            $qrisName = date('YmdHis') . '-qris-' . $this->sanitizeFilename($merchantName) . '-' . $qris->getRandomName($qrisExtension);
            $qrisPath = 'gambar/qris/' . $qrisName;
            $qris->move('gambar/qris', $qrisName);
        }

        $dataBody = [
            'id' => $id,
            'merchantName' => $merchantName,
            'status' => $this->request->getVar('status'),
            'userid' => $this->sesi->get('userid'),
            'idClient' => $clientID,
            'action_by' => $this->sesi->get('username'),
            'country' => $country,
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'providerID' => $this->request->getVar('providerID'),
        ];

        if ($qrisPath !== '') {
            $postData = $this->async->post($enp, $this->apimain, $dataBody, $qrisPath, 'gambar');
        } else {
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
        }

        $parseData = $postData->response;

        if ($postData->status == '200') {
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully updated data Qris Account");
            return redirect()->to('dashboard/qrisAccounts');
        } else {
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/editAccount');
        }



        
        
       
        
    }

    public function delAcc($id = null){
        $enp = 'api/qris/delAccount';
        $dataBody = [
            'idQris' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully delete data VA Account");
            return redirect()->to('dashboard/qrisAccounts');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/qrisAccounts');
        }
    }
}
