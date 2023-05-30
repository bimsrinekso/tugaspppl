<?php

namespace App\Controllers;

class Withdraw extends BaseController
{
    public function wdTrans()
    {
        $enp = 'api/wd/wdTrans';
        if ($this->sesi->get('role') == 1) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            if (is_object($parseData->dataTrans) && !is_countable($parseData->dataTrans)) {
                $parseData->dataTrans = [$parseData->dataTrans];
            }
            $data = [
                "dataTrans" => $parseData->dataTrans,
            ];
            return view('Dashboard/Main/Withdraw/wdTrans', $data);
        } elseif($this->sesi->get('role') == 2) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apiclient, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataTrans" => $parseData->dataTrans,
            ];
            return view('Dashboard/Client/Withdraw/wdTrans', $data);
        }
    }

    public function listPending()
    {
        $enp = 'api/wd/listPending';
        if ($this->sesi->get('role') == 1) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataPen" => $parseData->dataPen,
                
            ];
            return view('Dashboard/Main/Withdraw/listPending', $data);
        } elseif($this->sesi->get('role') == 2) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apiclient, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataPen" => $parseData->dataPen,
                
            ];
            return view('Dashboard/Client/Withdraw/listPending', $data);
        }
    }

    public function editWd($id = null){
        $enp = 'api/wd/editPending/' .$id;
        $dataBody = [
            'reqwd_id' => $id
        ];
        $postData = $this->async->get($enp, $this->apimain);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $data = [
                "dataRw" => $parseData[0],
            ];
            return view('Dashboard/Main/Withdraw/editPending', $data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('dashboard/withdrawPending');
        }
    }

    public function updateWd($id = null){
        $isValid = [
            'remark' => 'required',
            'status' => 'required',
            'status' => 'required',
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/withdrawPending/edit/'.$id);
        }
        $enp = 'api/wd/updatePending/' . $id;
        $dataBody = [
            'reqwd_id' => $id,
            'status'=> $this->request->getVar('status'), 
            'remark'=> $this->request->getVar('remark'), 
            'bankTransfer' => $this->request->getVar('bankTransfer'),
            'userID' => $this->sesi->get('userid'),
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update data Settlement");
            return redirect()->to('dashboard/withdrawPending');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/withdrawPending/edit/' .$id);
        }
    }
}
