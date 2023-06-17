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
        $enp = 'api/listClient';
        $getData = $this->async->get($enp, $this->apimain);
        $parseData = $getData->response;
        $data = [
            "dataClient" => $parseData,
        ];
        return view('Dashboard/Main/TopUp/createTopup',$data);
    }

    public function saveTopup(){
        $isValid = [
            'amount' => 'required',
            'remark' => 'required',
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/topUp');
        }
        $enp = 'api/topup/saveTopup';
        $amount= filter_var($this->request->getVar('amount'), FILTER_SANITIZE_NUMBER_INT);
        $dataBody = [
            'amount'=> $amount,
            'remark' => $this->request->getVar('remark'),
            'clientID'=> $this->request->getVar('clientID'),
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
        $enpcl = 'api/listClient';
        $getData = $this->async->get($enpcl, $this->apimain);
        $parseDataCl = $getData->response;
        $dataBody = [
            'topup_id' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $data = [
                "dataTopup" => $parseData,
                "dataCl" => $parseDataCl
            ];
            return view('Dashboard/Main/TopUp/editTopup', $data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('dashboard/topUp');
        }
    }

    public function updateTopup($id = null){
        $isValid = [
            'amount' => 'required',
            'remark' => 'required'
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/topUp');
        }
        $enp = 'api/topup/updateTopup';
        $amount= filter_var($this->request->getVar('amount'), FILTER_SANITIZE_NUMBER_INT);
        $dataBody = [
            'topup_id' => $id,
            'amount'=> $amount,
            'remark' => $this->request->getVar('remark'),
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

