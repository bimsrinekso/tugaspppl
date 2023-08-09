<?php

namespace App\Controllers;

class GroupClient extends BaseController
{
    public function listClient()
    {
        $enp = 'api/listClient';
        $getData = $this->async->get($enp, $this->apimain);
        $parseData = $getData->response;
        $data = [
            "dataClient" => $parseData,
        ];
        return view('Dashboard/Main/DetailClient/listClient', $data);
    }

    public function createClient()
    {
        $role = $this->sesi->get('role');
        if($role == 1){
            $enp = 'api/country/list';
            $getData = $this->async->get($enp, $this->apimain);
            $parseData = $getData->response;
            $data = [
                "dataCountry" => $parseData,
            ];
            return view('Dashboard/Main/DetailClient/createClient', $data);
        }else{
            return redirect()->to('dashboard');
        }
    }

    
    public function saveClient(){
        $isValid = [
            'name' => 'required',
            'comBt' => 'required',
            'comQr' => 'required',
            'comDepo' => 'required',
            'comWd' => 'required',
            'country' => 'required'
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/createClient');
        }
        $enp = 'api/saveClient';
        $dataBody = [
            'name'=> $this->request->getVar('name'),
            'comBt'=> $this->request->getVar('comBt'),
            'comQr' => $this->request->getVar('comQr'),
            'comDepo'=> $this->request->getVar('comDepo'),
            'comWd'=> $this->request->getVar('comWd'),
            'country' => $this->request->getVar('country')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully add client");
            return redirect()->to('dashboard/listClients');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/createClient');
        }
    }


    public function editClient($id = null){
        $role = $this->sesi->get('role');
        if($role == 1 ){
            $enp = 'api/editClient';
            $dataBody = [
                'clientID' => $id
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            if($postData->status == '200'){
                $enpCountry = 'api/country/list';
                $getData = $this->async->get($enpCountry, $this->apimain);
                $parseCountry = $getData->response;
                $data = [
                    "dataClient" => $parseData,
                    "dataCountry" => $parseCountry,
                ];
                return view('Dashboard/Main/DetailClient/editClient', $data);
            }else{
                $this->sesi->setFlashdata('error', "Something wrong");
                return redirect()->to('dashboard/listClients');
            }
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('dashboard/listClients');
        }
    }

    public function updateClient($id = null){
        $isValid = [
            'name'=> 'required',
            'comBt'=> 'required',
            'comQr' => 'required',
            'comDepo'=> 'required',
            'comWd'=> 'required',
            'country'=> 'required'
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/editClient/'.$id);
        }
        $enp = 'api/updateClient';
        $dataBody = [
            'clientID' => $id,
            'name'=> $this->request->getVar('name'),
            'comBt'=> $this->request->getVar('comBt'),
            'comQr' => $this->request->getVar('comQr'),
            'comDepo'=> $this->request->getVar('comDepo'),
            'comWd'=> $this->request->getVar('comWd'),
            'country' => $this->request->getVar('country')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update data Client");
            return redirect()->to('dashboard/listClients');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/editClient/'.$id);
        }
    }

    public function delClient($id = null){
        $enp = 'api/delClient';
        $dataBody = [
            'clientID' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully delete data Client");
            return redirect()->to('dashboard/listClients');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/listClients');
        }
    }
}
