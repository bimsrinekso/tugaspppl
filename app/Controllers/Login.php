<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        if($this->sesi->get('logged_in') == true){
            return redirect()->to('/');
        }else{
            $data = [
                'validation' => $this->valid
            ];
            return view('Auth/Login', $data);
        }
    }

    public function cekLogin(){
        $isValid = [
            'username' => 'required',
            'password' => 'required|min_length[6]',
        ];
        if (!$this->validate($isValid)) {
            return redirect()->to('/login')->withInput()->with('validation', '');
        }
        $user = $this->users->where("username", $this->request->getVar("username"))->first();
        // dd($user);
        if (!$user) {
            $this->sesi->setFlashdata('error', 'Username tidak ditemukan');
            return redirect()->to('/login');
        }else{
            $cekPw = password_verify($this->request->getVar("password"), $user->password);
            if(!$cekPw){
                $this->sesi->setFlashdata('error', 'Password salah');
                return redirect()->to('/login');
            }else {
                $ses_data = [
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'logged_in' => true,
                    'role' => $user->role_id,
                    'avatar' => $user->avatar
                ];
                $this->sesi->set($ses_data);
                return redirect()->to('/dashboard');
            }
        }
    }

    public function regist(){
        if($this->sesi->get('logged_in') == true){
            return redirect()->to('/');
        }else{
            $data = [
                'validation' => $this->valid
            ];
            return view('Auth/Register', $data);
        }
    }

    public function saveRegist(){
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
        $data = [
            'id' => $this->trxID->custID(),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'role_id' => 1,
            'avatar' => 'avatar/default.png'
        ];
        try {
            $daftar = $this->users->insert($data);
             $this->sesi->setFlashdata('sukses-buat', 'Selamat anda berhasil mendaftar');
             return redirect()->to('login');
        } catch (\Exception $e) {
         $e->getMessage();
        }
    }



 
    public function isLogout(){
        $this->sesi->destroy();
        return redirect()->to('/login');
    }
}