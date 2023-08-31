<?php

namespace App\Controllers;

class ProviderController extends BaseController
{
    public function index()
    {
        $enp = 'api/provider/listProvider';
        $dataBody = [
            'userid'=> $this->sesi->get('userid')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        $data = [
            "dataProvider" => $parseData,
        ];

        return view('Dashboard/Provider/index', $data);
    }
    public function createProvider(){
        $role = $this->sesi->get('role');
        $enp = 'api/qris/groupStatus';
        $getData = $this->async->get($enp, $this->apimain);
        $parseData = $getData->response;
        $enpClient = 'api/listClient';
        $getClient = $this->async->get($enpClient, $this->apimain);
        $parseClient = $getClient->response;
        $enpCountry = 'api/country/list';
        $getDataCountry = $this->async->get($enpCountry, $this->apimain);
        $parseCountry = $getDataCountry->response;
        $data = [
                "dataClient" => $parseClient,
                "dataCountry" => $parseCountry,
        ];
        return view('Dashboard/Provider/createProvider', $data);
    }
    
    public function saveProvider(){
        $role = $this->sesi->get('role');
        $isValid = [
                'providerName' => 'required',
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/createProvider');
        }
        $enp = 'api/provider/saveProvider';
        $providerName = $this->request->getVar('providerName');
        $dataBody = [
            'providerName'=> $this->request->getVar('providerName'),
            'userid' => $this->sesi->get('userid'),
            'country' => $this->request->getVar('country')
        ];
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
        $data;
        $enpCountry = 'api/country/list';
        $getDataCountry = $this->async->get($enpCountry, $this->apimain);
        $parseCountry = $getDataCountry->response;
       
        if($postData->status == '200'){
            $data = [
                "dataCountry" => $parseCountry,
                "dataProvider" => $parseData
            ];
            return view('Dashboard/Provider/editProvider', $data);    
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
        $enp = 'api/provider/updateProvider';
        $dataBody = [
            'providerID' => $id,
            'providerName'=> $this->request->getVar('providerName'),
            'userid' => $this->sesi->get('userid'),
            'country' => $this->request->getVar('country')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update data VA Account");
            return redirect()->to('dashboard/provider');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/editProvider/'. $id);
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
