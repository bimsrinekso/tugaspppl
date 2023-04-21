<?php

namespace App\Controllers;

class HoWithdraw extends BaseController
{
    public function index()
    {
        $enp = 'api/ho/listTrans';
        if ($this->sesi->get('role') == 1) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataPen" => $parseData->dataPen,
                "dataAll" => $parseData->dataAll,
            ];
            return view('Dashboard/Main/HoWd/index', $data);
        }
    }

    public function listClientHo()
    {
        $enp = 'api/ho/listClientHo';
        if ($this->sesi->get('role') == 2) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apiclient, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataPen" => $parseData->dataPen,
                "dataAll" => $parseData->dataTrans,
            ];
            return view('Dashboard/Client/HoWd/index', $data);
        }
    }

    public function reqHo()
    {
        $enpBl = 'api/getBlcCloud/';
        $dataBody = [
            'userid'=> $this->sesi->get('userid')
        ];
        $getData = $this->async->post($enpBl, $this->apiclient, $dataBody);
        $parseStatus = $getData->response;
        // dd($parseStatus);
        if($getData->status == '200'){
            $data = [
                "totalBlcClient" => $parseStatus->totalBlcClient,
            ];
            return view('Dashboard/Client/HoWd/makeHo', $data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('dashboard/makeHo');
        }
    }

    public function saveHo()
    {
        $enp = 'api/ho/saveClientHo';
        $dataBody = [
            'amount'=> $this->request->getVar('amount'),
            'userID' => $this->sesi->get('userid')
        ];
        $postData = $this->async->post($enp, $this->apiclient, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully add data Settlement");
            return redirect()->to('dashboard/makeHo');
        }else{
            $this->sesi->setFlashdata('error', $parseData);
            return redirect()->to('dashboard/makeHo');
        }
    }

    public function editWdHo($id = null)
    {
        $enp = 'api/ho/editWdHo';
        $dataBody = [
            'reqho_id' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $data = [
                "dataPen" => $parseData,
            ];
            return view('Dashboard/Main/HoWd/editTrans', $data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('dashboard/hoWithdraw');
        }
    }

    public function updateWdHo($id = null)
    {
        $enp = 'api/ho/updateWdHo';
        $dataBody = [
            'reqho_id' => $id,
            'status' => $this->request->getVar('status'),
            'remark'=> $this->request->getVar('remark') == null ? NULL : $this->request->getVar('remark'), 
            'bankTransfer' => $this->request->getVar('bankTransfer') == null ? NULL : $this->request->getVar('bankTransfer'),
            'action_by' => $this->sesi->get('userid')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update pending data");
            return redirect()->to('dashboard/hoWithdraw');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/hoWithdraw/edit');
        }
    }

    
}
