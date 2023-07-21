<?php

namespace App\Controllers;

class UserManagement extends BaseController
{
    public function index()
    {
        $dataBody = [
            'userid' => $this->sesi->get('userid')
        ];
        $enpAll = 'api/allUsers';
        $enpUser = 'api/getClientUser';
        $enpMember = 'api/getMember';
        $postData = $this->async->post($enpAll, $this->apimain, $dataBody);
        $parseData = $postData->response;
        $data = [
            "dataClientUser" => $parseData->dataClient,
            "dataMember" => $parseData->dataMember,
            "dataHelpdesk" => $parseData->dataHelpdesk
        ];
        return view('Dashboard/Main/UserManagement/listUser', $data);
    }

    public function createUser()
    {
        $enp = 'api/createUser';
        $dataBody = [
            'userid' => $this->sesi->get('userid')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status = '200'){
            $data = [
                "role" => $parseData
            ];
            return view('Dashboard/Main/UserManagement/createUser', $data);
        }else{
            return redirect()->to('dashboard');
        }
    }

    public function saveUser(){
        $isValid = [
            'username' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required',
            'role' => 'required',
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/createUser');
        }
        $enp = 'api/saveUser';
        $dataBody = [
            'username'=> $this->request->getVar('username'),
            'email'=> $this->request->getVar('email'),
            'password'=> $this->request->getVar('password'),
            'roleID'=> $this->request->getVar('role'),
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully create User");
            return redirect()->to('dashboard/listUser');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/createUser');
        }
    }

    public function editUser($id = null){
        $enp = 'api/editUser';
        $dataBody = [
            'userID' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $data = [
                "dataUser" => $parseData,
            ];
            return view('Dashboard/Main/UserManagement/editUser', $data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('dashboard/listUser');
        }
    }

    public function updateUser($id = null){
        $enp = 'api/updateUser';
        $dataBody = [
            'userID' => $id,
            'username'=> $this->request->getVar('username'),
            'email'=> $this->request->getVar('email'),
            'roleID'=> $this->request->getVar('role'),
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update data User");
            return redirect()->to('dashboard/listUser');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/editUser/'. $id);
        }
    }

    public function delUser($id = null){
        $enp = 'api/delUser';
        $dataBody = [
            'userID' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully delete user");
            return redirect()->to('dashboard/listUser');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/listUser');
        }
    }
    
}
