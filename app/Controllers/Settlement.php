<?php

namespace App\Controllers;

class Settlement extends BaseController
{
    public function indexSettle()
    {
        $enp = 'api/settle/index';
        if ($this->sesi->get('role') == 1) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataSettle" => $parseData->dataSettle,
            ];
            return view('Dashboard/Main/Settle/index', $data);
        }
    }

    public function createSettle(){
        return view('Dashboard/Main/Settle/addSettle');
    }

    public function saveSettle(){
        $enp = 'api/settle/createSettle';
        $dataBody = [
            'amount'=> $this->request->getVar('amount'),
            'actionBy' => $this->sesi->get('userid')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully add data Settlement");
            return redirect()->to('/dashboard/makeSettlement');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('/dashboard/createSettlement');
        }
    }

    public function editSettle($id = null){
        $enp = 'api/settle/editSettle';
        $dataBody = [
            'settle_id' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $data = [
                "dataSettle" => $parseData,
            ];
            return view('Dashboard/Main/Settle/editSettle', $data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('/dashboard/makeSettlement');
        }
    }

    public function updateSettle($id = null){
        $enp = 'api/settle/updateSettle';
        $dataBody = [
            'settle_id' => $id,
            'amount'=> $this->request->getVar('amount'),
            'actionBy' => $this->sesi->get('userid')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update data Settlement");
            return redirect()->to('/dashboard/makeSettlement');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('/dashboard/editSettle');
        }
    }

    public function delSettle($id = null){
        $enp = 'api/settle/delSettle';
        $dataBody = [
            'settle_id' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully delete data Settlement");
            return redirect()->to('/dashboard/makeSettlement');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('/dashboard/makeSettlement');
        }
    }

}

