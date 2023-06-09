<?php

namespace App\Controllers;

class Deposit extends BaseController
{
    public function listDeposit()
    {
        $enp = 'api/listDepo';
        if ($this->sesi->get('role') == 1) {
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
            return view('Dashboard/Main/Deposit/listDeposit', $data);
        } elseif($this->sesi->get('role') == 2) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apiclient, $dataBody);
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
            return view('Dashboard/Client/Deposit/listDeposit', $data);
        }
    }

    public function listTrans()
    {
        $enp = 'api/listTrans';
        if ($this->sesi->get('role') == 1) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataCon" => $parseData->dataCon,
                "dataRej" => $parseData->dataRej,

            ];
            // dd($data);
            return view('Dashboard/Main/Deposit/listTrans', $data);
        } elseif($this->sesi->get('role') == 2) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apiclient, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataCon" => $parseData->dataCon,
                "dataRej" => $parseData->dataRej,

            ];
            // dd($data);
            return view('Dashboard/Client/Deposit/listTrans', $data);
        }
    }

    public function listPending()
    {
        $enp = 'api/listPending';
        if ($this->sesi->get('role') == 1) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataPen" => $parseData->dataPen,

            ];
            // dd($data);
            return view('Dashboard/Main/Deposit/listPending', $data);
        } elseif($this->sesi->get('role') == 2) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apiclient, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataPen" => $parseData->dataPen,

            ];
            return view('Dashboard/Client/Deposit/listPending', $data);
        }
    }

    public function editPending($id = null)
    {
        $enp = 'api/editPending';
        $dataBody = [
            'iddepo' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $data = [
                "dataDepo" => $parseData[0],
            ];
            return view('Dashboard/Main/Deposit/editPending', $data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('/dashboard/listAccounts');
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
