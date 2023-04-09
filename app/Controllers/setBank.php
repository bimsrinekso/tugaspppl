<?php

namespace App\Controllers;

class setBank extends BaseController
{
    public function index()
    {
        $enp = 'api/cekBank';
        if ($this->sesi->get('role') == 2) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apiclient, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataBank" => $parseData,
            ];
            if ($data['dataBank'] == null) {
                return view('Dashboard/Client/Bank/addBank');
            } else {
                return redirect()->to('dashboard/setBank/update');
            }
        }   
        
    }

    public function indexU()
    {
        $enp = 'api/cekBank';
        if ($this->sesi->get('role') == 2) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apiclient, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataBank" => $parseData,
            ];
            if ($data['dataBank'] == null) {
                return view('Dashboard/Client/Bank/addBank');
            } else {
                return view('Dashboard/Client/Bank/updateBank',$data);
            }
        }   
        
    }

    public function saveBank(){
        $enp = 'api/saveBank';
        $dataBody = [
            'bankName' => $this->request->getVar('bankName'),
            'accNumber' => $this->request->getVar('accNumber'),
            'holderName' => $this->request->getVar('holderName'),
            'userid' => $this->sesi->get('userid'),
        ];
        $postData = $this->async->post($enp, $this->apiclient, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully add data Settlement");
            return redirect()->to('dashboard/setBank');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/setBank');
        }
    }

    public function updateBank(){
        $enp = 'api/updateBank';
        $dataBody = [
            'bankName' => $this->request->getVar('bankName'),
            'accNumber' => $this->request->getVar('accNumber'),
            'holderName' => $this->request->getVar('holderName'),
            'userid' => $this->sesi->get('userid'),
        ];
        $postData = $this->async->post($enp, $this->apiclient, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully add data Settlement");
            return redirect()->to('dashboard/setBank/update');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/setBank/update');
        }
    }


}
