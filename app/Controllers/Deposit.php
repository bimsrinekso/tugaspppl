<?php

namespace App\Controllers;

class Deposit extends BaseController
{
    public function listDeposit()
    {
        $role = $this->sesi->get('role');
        if ($role == 1 || $role == 2 || $role == 4) {
            if($role == 1){
                return view('Dashboard/Main/Deposit/listDeposit');
            }
            if($role == 2){
                return view('Dashboard/Client/Deposit/listDeposit');
            }
            if($role == 4){
                // dd($data);
                return view('Dashboard/Helpdesk/Deposit/listDeposit');
            }

        } else{
            return redirect()->to('dashboard');
        }
    }

    public function listTrans()
    {
        $enp = 'api/listTrans';
        $role = $this->sesi->get('role');
        if ($role == 1 || $role == 2 || $role == 4) {
            if($role == 1){
                return view('Dashboard/Main/Deposit/listTrans');
            }
            if($role == 2){
                return view('Dashboard/Client/Deposit/listTrans');
            }
            if($role == 4){
                return view('Dashboard/Helpdesk/Deposit/listTrans');
            }
            
        } else{
            return redirect()->to('dashboard');
        }
    }

    public function listPending()
    {
        $enp = 'api/listPending';
        $role = $this->sesi->get('role');
        if ($role == 1 || $role == 2 || $role == 4) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataPen" => $parseData->dataPen,
            ];
            if($role == 1){
                $enpCountry = 'api/country/list';
                $getDataCountry = $this->async->get($enpCountry, $this->apimain);
                $parseCountry = $getDataCountry->response;
                $data["dataCountry"] = $parseCountry;
                return view('Dashboard/Main/Deposit/listPending', $data);
            }
            if($role == 2){
                return view('Dashboard/Client/Deposit/listPending', $data);
            }
            if($role == 4){
                return view('Dashboard/Helpdesk/Deposit/listPending', $data);
            }
        } else{
            return redirect()->to('dashboard');
        }
    }

    public function editPending($id = null)
    {
        $role = $this->sesi->get('role');
        if($role == 2){
            return redirect()->to('dashboard');
        }
        $enp = 'api/editPending';
        $dataBody = [
            'iddepo' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $data = [
                "dataDepo" => $parseData,
            ];
            return view('Dashboard/Main/Deposit/editPending', $data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry the data already updated");
            return redirect()->to('/dashboard/depoPending');
        }
    }

    public function updatePending($id = null){
        $isValid = [
            'actualAmount' => 'required',
            'status' => 'required',
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/depoPending/update/'.$id);
        }
        $role = $this->sesi->get('role');
        $enpPending = 'api/editPending';
        $dataPending = [
            'iddepo' => $id
        ];
        $postPending = $this->async->post($enpPending, $this->apimain, $dataPending);
        $parsePending = $postPending->response;
        $enp = 'api/updatePending';
        $amount= filter_var($this->request->getVar('actualAmount'), FILTER_SANITIZE_NUMBER_INT);
        $dataBody = [
            'iddepo' => $id,
            'actualAmount'=> $amount,
            'status'=> $this->request->getVar('status'),
            'actionBy'=> $this->sesi->get('userid'),
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update pending data");
            return redirect()->to('dashboard/depoPending');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/depoPending/update/'.$id);
        }
    }

    public function monitorDepo(){
        $enp = 'api/listDepo';
        $param = $_REQUEST;        
        $dataBody = [
            'userid' => $this->sesi->get('userid'),
            'param' => $param,
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $response = [
            "draw" => isset($param['draw']) ? $param['draw'] : 0,
            "recordsTotal" => $postData->response->recordsTotal,
            "recordsFiltered" => $postData->response->recordsFiltered,
            "data" => $postData->response->data,

        ];
        echo json_encode($response);
    }

    public function monitorPending(){
        $enp = 'api/monitorPending';
        if ($this->sesi->get('role') == 1) {
            $dataBody = [
                'startDate'=> $this->request->getVar('startDate'),
                'endDate'=> $this->request->getVar('endDate'),
                'role' => $this->sesi->get('role')
            ];
            try {
                $postData = $this->async->post($enp, $this->apimain, $dataBody);  
                echo json_encode($postData);
            } catch (\Exception $e) {
                echo json_encode($e->getMessage());
            } 
        } elseif($this->sesi->get('role') == 2) {
            $dataBody = [
                'startDate'=> $this->request->getVar('startDate'),
                'endDate'=> $this->request->getVar('endDate'),
                'userid'=> $this->sesi->get('userid'),
                'role' => $this->sesi->get('role')
            ];
            try {
                $postData = $this->async->post($enp, $this->apiclient, $dataBody);  
                echo json_encode($postData);
            } catch (\Exception $e) {
                echo json_encode($e->getMessage());
            }
        }
              
    }

    public function monitorTrans(){
        $enp = 'api/listTrans';
        $param = $_REQUEST;        
        $dataBody = [
            'userid' => $this->sesi->get('userid'),
            'param' => $param,
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $response = [
            "draw" => isset($param['draw']) ? $param['draw'] : 0,
            "recordsTotal" => $postData->response->recordsTotal,
            "recordsFiltered" => $postData->response->recordsFiltered,
            "data" => $postData->response->data,

        ];
        echo json_encode($response);
    }
}
