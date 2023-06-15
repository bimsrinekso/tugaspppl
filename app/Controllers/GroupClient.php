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
        return view('Dashboard/Main/DetailClient/createClient');
    }

    
    public function saveClient(){
        $isValid = [
            'name' => 'required',
            'va' => 'required',
            'comDepo' => 'required',
            'comWd' => 'required',
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
            'va'=> $this->request->getVar('va'),
            'comDepo'=> $this->request->getVar('comDepo'),
            'comWd'=> $this->request->getVar('comWd'),
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
        $enp = 'api/editClient';
        $dataBody = [
            'clientID' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $data = [
                "dataClient" => $parseData,
            ];
            return view('Dashboard/Main/DetailClient/editClient', $data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('dashboard/listClients');
        }
    }

    public function updateClient($id = null){
        $isValid = [
            'name'=> 'required',
            'va'=> 'required',
            'comDepo'=> 'required',
            'comWd'=> 'required',
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
            'va'=> $this->request->getVar('va'),
            'comDepo'=> $this->request->getVar('comDepo'),
            'comWd'=> $this->request->getVar('comWd'),
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
    

    public function listMap()
    {
        $enp = 'api/listGroupCl';
        if ($this->sesi->get('role') == 1) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataMap" => $parseData,
            ];
            return view('Dashboard/Main/MappingClient/listMap', $data);
        }
    }

    public function editMap($id = null){
        $enp = 'api/editGroupCl';
        $enpApi = 'api/listApi';
        $enpUser = 'api/getClientUser';
        $enpClient = 'api/listClient';
        $getUser = $this->async->get($enpUser, $this->apimain);
        $getClient = $this->async->get($enpClient, $this->apimain);
        $getData = $this->async->get($enpApi, $this->apimain);
        $parseUser = $getUser->response;
        $parseClient = $getClient->response;
        $parseApi = $getData->response;
        $dataBody = [
            'groupClientID' => $id,
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $data = [
                "dataGrClient" => $parseData,
                "dataUser" => $parseUser,
                "dataClient" => $parseClient,
                "dataApi" => $parseApi 
            ];
            return view('Dashboard/Main/MappingClient/editMap', $data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('dashboard/listMap');
        }
    }

    public function updateMap($id = null){
        $enp = 'api/updateGroupCl';
        $dataBody = [
            'groupClientID'=> $id,
            'clientID' => $this->request->getVar('clientID'),
            'userID' => $this->request->getVar('UserID'),
            'apiID' => $this->request->getVar('apiKeyID')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update data Client");
            return redirect()->to('dashboard/listMap');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/editMap/'.$id);
        }
    }

    public function createMap()
    {
        $enp = 'api/listApi';
        $enpUser = 'api/getClientUser';
        $enpClient = 'api/listClient';
        $getUser = $this->async->get($enpUser, $this->apimain);
        $getClient = $this->async->get($enpClient, $this->apimain);
        $getData = $this->async->get($enp, $this->apimain);
        $parseUser = $getUser->response;
        $parseClient = $getClient->response;
        $parseData = $getData->response;
        $data = [
            "dataUser" => $parseUser,
            "dataClient" => $parseClient,
            "dataApi" => $parseData
        ];
        return view('Dashboard/Main/MappingClient/createMap', $data);
    }

    public function saveMap(){
        $isValid = [
            'apiKeyID'=> 'required',
            'UserID'=> 'required',
            'clientID'=> 'required',
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/createMap');
        }
        $enp = 'api/saveGroupCl';
        $dataBody = [
            'apiKeyID'=> $this->request->getVar('apiKeyID'),
            'userID'=> $this->request->getVar('UserID'),
            'clientID' => $this->request->getVar('clientID')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully mapping");
            return redirect()->to('dashboard/listMap');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/createMap');
        }
    }

    public function delMap($id = null){
        $enp = 'api/deleteGroupCl';
        $dataBody = [
            'groupClientID' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully delete data Map Client");
            return redirect()->to('dashboard/listMap');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/listMap');
        }
    }
}
