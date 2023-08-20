<?php

namespace App\Controllers;

class Deposit extends BaseController
{
    public function listDeposit()
    {
        $enp = 'api/listDepo';
        $role = $this->sesi->get('role');
        if ($role == 1 || $role == 2 || $role == 4) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            if (is_object($parseData->dataRun) && !is_countable($parseData->dataRun)) {
                $parseData->dataRun = [$parseData->dataRun];
            }
            if (is_object($parseData->dataExp) && !is_countable($parseData->dataExp)) {
                $parseData->dataExp = [$parseData->dataExp];
            }
            $data = [
                "dataRun" => $parseData->dataRun,
                "dataExp" => $parseData->dataExp,
            ];
            if($role == 1){
                return view('Dashboard/Main/Deposit/listDeposit', $data);
            }
            if($role == 2){
                return view('Dashboard/Client/Deposit/listDeposit', $data);
            }
            if($role == 4){
                // dd($data);
                return view('Dashboard/Helpdesk/Deposit/listDeposit', $data);
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
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataCon" => $parseData->dataCon,
                "dataRej" => $parseData->dataRej,

            ];
            if($role == 1){
                return view('Dashboard/Main/Deposit/listTrans', $data);
            }
            if($role == 2){
                return view('Dashboard/Client/Deposit/listTrans', $data);
            }
            if($role == 4){
                return view('Dashboard/Helpdesk/Deposit/listTrans', $data);
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
        $enp = 'api/updatePending';
        $amount= filter_var($this->request->getVar('actualAmount'), FILTER_SANITIZE_NUMBER_INT);
        $dataBody = [
            'iddepo' => $id,
            'actualAmount'=> $amount,
            'status'=> $this->request->getVar('status'),
            'actionBy'=> $this->sesi->get('userid')
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
        $enp = 'api/monitorDepo';
        if ($this->sesi->get('role') == 1) {
            $dataBody = [
                'startDate'=> $this->request->getVar('startDate'),
                'endDate'=> $this->request->getVar('endDate'),
                'target'=> $this->request->getVar('target'),
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
                'target'=> $this->request->getVar('target'),
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

    public function filterDate(){
        $enp = 'api/filterDate';
        if ($this->sesi->get('role') == 1) {
            $dataBody = [
                'startDate'=> $this->request->getVar('startDate'),
                'endDate'=> $this->request->getVar('endDate'),
                'target'=> $this->request->getVar('target'),
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
                'target'=> $this->request->getVar('target'),
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
}
