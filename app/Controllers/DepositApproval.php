<?php

namespace App\Controllers;

class DepositApproval extends BaseController
{
    public function listApproval()
    {
        $enp = 'api/listApproval';
        $role = $this->sesi->get('role');
        if ($role == 1 || $role == 2 || $role == 4) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataApproval" => $parseData->dataApproval,
            ];
            if($role == 1){
                $enpCountry = 'api/country/list';
                $getDataCountry = $this->async->get($enpCountry, $this->apimain);
                $parseCountry = $getDataCountry->response;
                $data["dataCountry"] = $parseCountry;
                return view('Dashboard/Main/DepoApproval/listApproval', $data);
            }
            if($role == 2){
                return view('Dashboard/Client/DepoApproval/listApproval', $data);
            }
            if($role == 4){
                return view('Dashboard/Helpdesk/DepoApproval/listApproval', $data);
            }
        } else{
            return redirect()->to('dashboard');
        }
    }

    public function editApproval($id = null)
    {
        $role = $this->sesi->get('role');
        if($role == 2 && $role == 4){
            return redirect()->to('dashboard');
        }
        $enp = 'api/editApproval';
        $dataBody = [
            'iddepo' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $data = [
                "dataDepo" => $parseData,
            ];
            return view('Dashboard/Main/DepoApproval/editApproval', $data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry the data already updated");
            return redirect()->to('/dashboard/depoApproval');
        }
    }
    public function updateApproval($id = null){
        $isValid = [
            'actualAmount' => 'required',
            'approval' => 'required',
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/depoApproval/update/'.$id);
        }
        $role = $this->sesi->get('role');
        $enpPending = 'api/editApproval';
        $dataPending = [
            'iddepo' => $id
        ];
        $postPending = $this->async->post($enpPending, $this->apimain, $dataPending);
        $parsePending = $postPending->response;
        $enp = 'api/updateApproval';
        $amount= filter_var($this->request->getVar('actualAmount'), FILTER_SANITIZE_NUMBER_INT);
        $dataBody = [
            'iddepo' => $id,
            'actualAmount'=> $amount,
            'approval'=> $this->request->getVar('approval'),
            'actionBy'=> $this->sesi->get('userid'),
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update approval data");
            return redirect()->to('dashboard/depoApproval');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/depoApproval/update/'.$id);
        }
    }
}