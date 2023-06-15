<?php

namespace App\Controllers;

class Profile extends BaseController
{
    public function index(){
        $userid = session()->get('userid');
        $enp1 = 'api/editProfile';
        $dataBody1 = [
            'userID' => $userid
        ];
        $postData1 = $this->async->post($enp1, $this->apiclient, $dataBody1);
        $parseData1 = $postData1->response;
        $enp = 'api/account/personalKey';
        $dataBody = [
            'userID' => $userid
        ];
        $postData = $this->async->post($enp, $this->apiclient, $dataBody);
        $parseData = $postData->response;
        if (is_countable($parseData)) {
            $parseData = $parseData[0];
        }
        if($postData->status == '200' && $postData1->status == '200'){
            $data = [
                "dataKey" => $parseData,
                "dataUser" => $parseData1,
            ];
            return view('Dashboard/Profile/index', $data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('dashboard/editProfile');
        }
        return view('Dashboard/Profile/index');
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
            return redirect()->to('dashboard/editProfile');
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
            $this->sesi->setFlashdata('sukses-password', "Congratulations, you have successfully update password");
            return redirect()->to('dashboard/editProfile');
        }else{
            $this->sesi->setFlashdata('error', $parseData);
            return redirect()->to('dashboard/editProfile');
        }
    }

    public function updateProfile(){
        $enp = 'api/updateProfile';
        $isValid = [
            'username' => 'required',
            'email' => 'required',
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/editProfile');
        }
        $dataBody = [
            'userid' => $this->sesi->get('userid'),
            'username'=> $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
        ];
        $postData = $this->async->post($enp, $this->apiclient, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses-profile', "Congratulations, you have successfully update profile");
            return redirect()->to('dashboard/editProfile');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/editProfile');
        }
    }
}