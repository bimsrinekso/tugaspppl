<?php

namespace App\Controllers;

class Account extends BaseController
{
    public function editPassword(){
        return view('Dashboard/Account/changePassword');
    }
    public function updatePassword(){
        $userid = session()->get('userid');
        $enp = 'api/updatePassword';
        $dataBody = [
            'userid' => $userid,
            'password' => $this->request->getVar('password')
        ];
        $postData = $this->async->post($enp, $this->apiclient, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update password");
            return redirect()->to('dashboard/changePassword');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/changePassword');
        }
    }

    public function editProfile(){
        $userid = session()->get('userid');
        $enp = 'api/editProfile';
        $dataBody = [
            'userID' => $userid
        ];
        $postData = $this->async->post($enp, $this->apiclient, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $data = [
                "dataUser" => $parseData,
            ];
            return view('Dashboard/Account/editProfile', $data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('/dashboard/editProfile');
        }
    }

    public function updateProfile(){
        $enp = 'api/updateProfile';
        $dataBody = [
            'userid' => $this->sesi->get('userid'),
            'username'=> $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
        ];
        $postData = $this->async->post($enp, $this->apiclient, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update profile");
            return redirect()->to('/dashboard/editProfile');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('/dashboard/editProfile');
        }
    }
}