<?php

namespace App\Controllers;

class CalcComission extends BaseController
{
    public function indexCalc()
    {
        $enp = 'api/calcom/index';
        if ($this->sesi->get('role') == 1) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataCom" => $parseData->dataCom,
            ];
            return view('Dashboard/Main/Comission/index', $data);
        }
    }

    public function createCalc(){
        return view('Dashboard/Main/Comission/addCalc');
    }


    public function saveCom(){
        $isValid = [
            'amount' => 'required',
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/createCom');
        }
        $enp = 'api/calcom/createCom';
        $amount= filter_var($this->request->getVar('amount'), FILTER_SANITIZE_NUMBER_INT);
        $dataBody = [
            'amount'=> $amount,
            'actionBy' => $this->sesi->get('userid')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully add data Comission");
            return redirect()->to('dashboard/calculateComission');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/createCom');
        }
    }

    public function editCom($id = null){
        $enp = 'api/calcom/editCom';
        $dataBody = [
            'com_id' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $data = [
                "dataCom" => $parseData,
            ];
            return view('Dashboard/Main/Comission/editCom', $data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('dashboard/calculateComission');
        }
    }

    public function updateCom($id = null){
        $isValid = [
            'amount' => 'required',
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/editCom/'.$id);
        }
        $enp = 'api/calcom/updateCom';
        $amount= filter_var($this->request->getVar('amount'), FILTER_SANITIZE_NUMBER_INT);
        $dataBody = [
            'com_id' => $id,
            'amount'=> $amount,
            'actionBy' => $this->sesi->get('userid')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update data Comission");
            return redirect()->to('dashboard/calculateComission');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/editCom/'.$id);
        }
    }

    public function delCom($id = null){
        $enp = 'api/calcom/delCom';
        $dataBody = [
            'com_id' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully delete data Comission");
            return redirect()->to('dashboard/calculateComission');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/calculateComission');
        }
    }


    public function simulateCom(){
        $enp = 'api/calcom/simulateCom';
        $dataBody = [
            'fromdate'=> $this->request->getVar('fromdate'),
            'todate' => $this->request->getVar('todate'),
        ];
        try {
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            
            echo json_encode($postData);
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
        }      
    }
}
