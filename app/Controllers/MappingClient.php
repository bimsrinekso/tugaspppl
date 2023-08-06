<?php

namespace App\Controllers;

class MappingClient extends BaseController
{
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
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('dashboard');
        }
    }

    public function editMap($id = null){
        $enp = 'api/editGroupCl';
        $enpApi = 'api/listApi';
        $enpUser = 'api/getClientUser';
        $enpClient = 'api/listClient';
        $enpHelpdesk = 'api/getHelpdesk';
        $getUser = $this->async->get($enpUser, $this->apimain);
        $getClient = $this->async->get($enpClient, $this->apimain);
        $getData = $this->async->get($enpApi, $this->apimain);
        $getHelpdesk = $this->async->get($enpHelpdesk, $this->apimain);
        $parseUser = $getUser->response;
        $parseHelpdesk = $getHelpdesk->response;
        $parseClient = $getClient->response;
        $parseApi = $getData->response;
        $enpCountry = 'api/country/list';
        $getData = $this->async->get($enpCountry, $this->apimain);
        $parseCountry = $getData->response;
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
                    "dataApi" => $parseApi,
                    "dataCountry" => $parseCountry
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
        $enpCountry = 'api/country/list';
        $getData = $this->async->get($enpCountry, $this->apimain);
        $parseCountry = $getData->response;
        $data = [
            "dataUser" => $parseUser,
            "dataClient" => $parseClient,
            "dataApi" => $parseData,
            "dataCountry" => $parseCountry
        ];
        return view('Dashboard/Main/MappingClient/createMap', $data);
    }

    public function getUserType(){
        $enpUser = 'api/getClientUser';
        $enpHelpdesk = 'api/getHelpdesk';
        $userType = $this->request->getVar('userType');
        if($userType == 'client'){
            $getUser = $this->async->get($enpUser, $this->apimain);
            $parseUser = $getUser->response;
            $data = [
                "users" => $parseUser 
            ];
            echo json_encode($data);
        }else{
            $getUser = $this->async->get($enpHelpdesk, $this->apimain);
            $parseUser = $getUser->response;
            $data = [
                "users" => $parseUser 
            ];
            echo json_encode($data);
        }
    }
    
    public function saveMap(){
        $isValid = [
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