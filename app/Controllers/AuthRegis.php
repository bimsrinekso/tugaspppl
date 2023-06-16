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
        $isValid = [
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|valid_email'
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('register');
        }
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
