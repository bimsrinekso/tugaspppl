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
}