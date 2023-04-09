<?php

namespace App\Controllers;

class AuthRegis extends BaseController
{
    public function index()
    {
        if ($this->sesi->get('logged_in') == true) {
            return redirect()->to('dashboard');
        } else {
            return view('Auth/Register');
        }
    }

    public function saveRegis(){
        $dataBody = [
            "username" => $this->request->getVar('username'),
            "password" => $this->request->getVar('password'),
            "email" => $this->request->getVar('email')
        ];
        $enp = 'api/saveRegis';
        $postData = $this->async->post($enp, '', $dataBody);
        $res = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully regist");
            return redirect()->to('login');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('register');
        }
    }
    public function authLogout(){
        $this->sesi->destroy();
        return redirect()->to("login");
    }
}
