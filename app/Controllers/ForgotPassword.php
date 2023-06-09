<?php

namespace App\Controllers;



class ForgotPassword extends BaseController
{
    public function index()
    {
        return view('Auth/ForgotPassword');
    }
    public function forgotPassword()
    {
        $data = $this->request->getVar('email');
        $isValid = [
            'email' => 'required',
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('forgot-password');
        }
        $dataBody =[
            'email' => $data,
        ];
        // dd($dataBody);
        $enp = 'api/forgotPassword';
        $postData = $this->async->post($enp, '', $dataBody);
        // dd($postData);
        $res = $postData->response;
        if($postData->status == 200){
            
            // dd($postData);
            $this->sesi->setFlashdata('sukses', "Congratulation, your email has been sent ");
        }else{
            // dd($res);
            $this->sesi->setFlashdata('error', $res);
            return redirect()->to('forgot-password');
        }

        // dd($data);
        return view('Auth/ForgotPassword');
    }
    
}
