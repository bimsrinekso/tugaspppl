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
        return view('Dashboard/Main/MappingClient/listClient', $data);
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
            return redirect()->to('/dashboard/createMap');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/createMap');
        }
    }
}
