<?php

namespace App\Controllers;

class UserManagement extends BaseController
{
    public function index()
    {
        $enpUser = 'api/getClientUser';
        $enpMember = 'api/getMember';
        $getUser = $this->async->get($enpUser, $this->apimain);
        $getMember = $this->async->get($enpMember, $this->apimain);
        $parseUser = $getUser->response;
        $parseMember = $getMember->response;
        $data = [
            "dataClientUser" => $parseUser,
            "dataMember" => $parseMember,
        ];
        return view('Dashboard/Main/UserManagement/listUser', $data);
    }

    public function createUser()
    {
        return view('Dashboard/Main/UserManagement/createUser');
    }

    public function saveUser(){
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
