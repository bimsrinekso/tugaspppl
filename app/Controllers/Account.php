<?php

namespace App\Controllers;

class Account extends BaseController
{
    public function editPassword(){
        return view('Dashboard/Account/changePassword');
    }
    public function updatePassword(){
        $isValid = [
            'currentPw' => 'required',
            'password' => 'required|min_length[8]',
            'confirmPw' => [
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'The Confirmation Password field is required.',
                    'matches' => 'The Confirmation Password field does not match the Password field.',
                ]
            ]
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/changePassword');
        }
        $userid = session()->get('userid');
        $enp = 'api/updatePassword';
        $dataBody = [
            'userid' => $userid,
            'currentPw' => $this->request->getVar('currentPw'),
            'password' => $this->request->getVar('password')
        ];
        $postData = $this->async->post($enp, $this->apiclient, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update password");
            return redirect()->to('dashboard/changePassword');
        }else{
            $this->sesi->setFlashdata('error', $parseData);
            return redirect()->to('dashboard/changePassword');
        }
    }
}