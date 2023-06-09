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
            if (is_object($parseData->dataSettle) && !is_countable($parseData->dataSettle)) {
                $parseData->dataSettle = [$parseData->dataSettle];
            }
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
        $isValid = [
            'amount' => 'required',
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/createSettlement');
        }
        $enp = 'api/settle/createSettle';
        $amount= filter_var($this->request->getVar('amount'), FILTER_SANITIZE_NUMBER_INT);
        $dataBody = [
            'amount'=> $amount,
            'remark' => $this->request->getVar('remark'),
            'actionBy' => $this->sesi->get('userid')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully add data Settlement");
            return redirect()->to('dashboard/makeAdjustment');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/createSettlement');
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
            return redirect()->to('dashboard/makeAdjustment');
        }
    }

    public function updateSettle($id = null){
        $isValid = [
            'amount' => 'required',
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/editAdj/'.$id);
        }
        $enp = 'api/settle/updateSettle';
        $amount= filter_var($this->request->getVar('amount'), FILTER_SANITIZE_NUMBER_INT);
        $dataBody = [
            'settle_id' => $id,
            'amount'=> $amount,
            'remark' => $this->request->getVar('remark'),
            'actionBy' => $this->sesi->get('userid')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update data Settlement");
            return redirect()->to('dashboard/makeAdjustment');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/editAdj/'.$id);
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
            return redirect()->to('dashboard/makeAdjustment');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/makeAdjustment');
        }
    }

}

