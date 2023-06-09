<?php

namespace App\Controllers;

class AuthLogin extends BaseController
{
    public function index()
    {
        if (isset($_SESSION['userid'])) {
            return redirect()->to('dashboard');
        } else {
            return view('Auth/Login');
        }
    }

    public function cekLogin(){
        $isValid = [
            'username' => 'required',
            'password' => 'required'
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('login');
        }
        
        $dataBody = [
            "username" => $this->request->getVar('username'),
            "password" => $this->request->getVar('password')
        ];
        $enp = 'api/cekLogin';
        $postData = $this->async->post($enp, '', $dataBody);
        $res = $postData->response;
        if($postData->status == 200){
            $isSession = [
                "avatar" => $res->avatar,
                "logged_in" => $res->logged_in,
                "role" => $res->role,
                "userid" => $res->userid,
                "username" => $res->username
            ];
            $this->sesi->set($isSession);
            return redirect()->to('dashboard');
        }else{
            $this->sesi->setFlashdata('error', $res);
            return redirect()->to('login');
        }
    }
    public function authLogout(){
        $this->sesi->destroy();
        return redirect()->to("login");
    }
}
