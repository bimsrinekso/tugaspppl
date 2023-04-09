<?php

namespace App\Controllers;

class Topup extends BaseController
{
    public function index()
    {
        $enp = 'api/topup/index';
        if ($this->sesi->get('role') == 1) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataTopup" => $parseData->dataTopup,
            ];
            return view('Dashboard/Main/TopUp/index', $data);
        }
    }

    public function createTopup()
    {
        return view('Dashboard/Main/TopUp/createTopup');
    }

    public function saveTopup(){
        $enp = 'api/topup/saveTopup';
        $dataBody = [
            'amount'=> $this->request->getVar('amount'),
            'actionBy' => $this->sesi->get('userid')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully add data Topup");
            return redirect()->to('dashboard/topUp');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/topUp');
        }
    }

    public function editTopup($id = null){
        $enp = 'api/topup/editTopup';
        $dataBody = [
            'topup_id' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $data = [
                "dataTopup" => $parseData,
            ];
            return view('Dashboard/Main/TopUp/editTopup', $data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('dashboard/topUp');
        }
    }

    public function updateTopup($id = null){
        $enp = 'api/topup/updateTopup';
        $dataBody = [
            'topup_id' => $id,
            'amount'=> $this->request->getVar('amount'),
            'actionBy' => $this->sesi->get('userid')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update data Topup");
            return redirect()->to('dashboard/topUp');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/editSettle');
        }
    }

    public function delTopup($id = null){
        $enp = 'api/topup/delTopup';
        $dataBody = [
            'topup_id' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully delete data Topup");
            return redirect()->to('dashboard/topUp');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/topUp');
        }
    }
}

