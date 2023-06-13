<?php

namespace App\Controllers;



class ResetPassword extends BaseController
{
    public function index($token)
    {
        $dataBody =[
            'token' => $token,
        ];
        // dd($dataBody);
        $enp = 'api/resetPassword';
        $postData = $this->async->post($enp, '', $dataBody);
        // dd($postData);
        $res = $postData->response;
        if($postData->status == 200){
            
            // dd($postData);
            return view('Auth/ResetPassword',['token' => $token]);
        }else{
            // dd($postData);
            $this->sesi->setFlashdata('error', $res);
            return redirect()->to('forgot-password')->with('error', 'Invalid or expired token');
        }
        
    }

    public function updatePassword($token){
        $password = $this->request->getVar('password');
        $confirmpassword = $this->request->getVar('confirmpass');
        
        $isValid = [
            'password' => 'required',
            'confirmpass' => 'required'
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('reset-password/'.$token);
        }

        //Get User_Id
        $dataBody =[
            'token' => $token,
        ];
        $enp = 'api/resetPassword';
        $getData = $this->async->post($enp, '',$dataBody);
        $parseData= $getData->response->user_id;

        
        //Post Reset Password
        $dataBody =[
            'user_id' => $parseData,
            'password' => $password,
            'confirmPassword' => $confirmpassword
        ];

        $enp = 'api/changePassword';
        $postData = $this->async->post($enp, '', $dataBody);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
        $res = $postData->response;
        if($postData->status == 200){
            return redirect()->to('login')->with('sukses', 'Your password has been changed');
        }else{
            $this->sesi->setFlashdata('error', $res);
            return redirect()->to('reset-password/'.$token)->with('error', "Your password did'nt match");
        }

    }

}
