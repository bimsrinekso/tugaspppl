<?php

namespace App\Controllers;

class DebtController extends BaseController
{
    public function indexDebt()
    {
        $enp = 'api/utang/index';
        if ($this->sesi->get('role') == 1) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            if (is_object($parseData->dataUtang) && !is_countable($parseData->dataUtang)) {
                $parseData->dataUtang = [$parseData->dataUtang];
            }
            $data = [
                "dataUtang" => $parseData->dataUtang,
            ];
            
            return view('Dashboard/Main/Debt/index', $data);
        }
        else if ($this->sesi->get('role') == 4) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            if (is_object($parseData->dataUtang) && !is_countable($parseData->dataUtang)) {
                $parseData->dataUtang = [$parseData->dataUtang];
            }
            $data = [
                "dataUtang" => $parseData->dataUtang,
            ];
            
            return view('Dashboard/Main/Debt/index', $data);
        }
    }

    public function createDebt(){
        $enp = 'api/listClient';
        $getData = $this->async->get($enp, $this->apimain);
        $parseData = $getData->response;
        $data = [
            "dataClient" => $parseData,
        ];
        return view('Dashboard/Main/Debt/addDebt', $data);
    }

    public function saveDebt(){
        $isValid = [
            'amount' => 'required',
            'clientID' => 'required'
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/createDebt');
        }
        $enp = 'api/utang/createUtang';
        $amount= filter_var($this->request->getVar('amount'), FILTER_SANITIZE_NUMBER_INT);
        $dataBody;
        if ($this->sesi->get('role') == 1) {
            $dataBody = [
                'amount'=> $amount,
                'note' => $this->request->getVar('note'),
                'actionBy' => $this->sesi->get('username'),
                'userid' => $this->sesi->get('userid'),
                'info_photo' =>$this->request->getFile('info_photo'),
                'clientID' => $this->request->getVar('clientID')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            if($postData->status == '200'){
                $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update data Debt");
                return redirect()->to('dashboard/listDebt');
            }else{
                $this->sesi->setFlashdata('error', "Sorry, check again your data");
                return redirect()->to('dashboard/createDebt');
            }
        }
        // else if ($this->sesi->get('role') == 2) {
        //     $dataBody = [
        //         'amount'=> $amount,
        //         'note' => $this->request->getVar('note'),
        //         'actionBy' => $this->sesi->get('username'),
        //         'userid' => $this->sesi->get('userid'),
        //         'info_photo' =>$this->request->getFile('info_photo')
        //     ];
        //     $postData = $this->async->post($enp, $this->apiclient, $dataBody);
        //     $parseData = $postData->response;
        //     if($postData->status == '200'){
        //         $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update data Debt");
        //         return redirect()->to('dashboard/listDebt');
        //     }else{
        //         $this->sesi->setFlashdata('error', "Sorry, check again your data");
        //         return redirect()->to('dashboard/createDebt');
        //     }
        // }
        
        // dd($dataBody);

        
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update data Debt");
            return redirect()->to('dashboard/listDebt');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/editDebt/'.$id);
        }
    }

    public function editDebt($id = null){
        $enp = 'api/utang/editUtang';
        $dataBody = [
            'utang_id' => $id,
            'userid' => $this->sesi->get('userid')
        ];
        if ($this->sesi->get('role') == 1) {
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            if($postData->status == '200'){
                $data = [
                    "dataUtang" => $parseData[0],
                ];
                // dd($data);
                return view('Dashboard/Main/Debt/editDebt', $data);
            }else{
                $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
                return redirect()->to('dashboard/listDebt');
            }
        }
        // else if ($this->sesi->get('role') == 2) {
        //     $postData = $this->async->post($enp, $this->apiclient, $dataBody);
        //     $parseData = $postData->response;
        //     if($postData->status == '200'){
        //         $data = [
        //             "dataUtang" => $parseData[0],
        //         ];
        //         // dd($data);
        //         return view('Dashboard/Main/Debt/editDebt', $data);
        //     }else{
        //         $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
        //         return redirect()->to('dashboard/listDebt');
        //     }
        // }
        

        
    }

    public function updatedebt($id = null){
        $isValid = [
            'amount' => 'required',
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/editDebt/'.$id);
        }
        $enp = 'api/utang/updateUtang';
        $amount= filter_var($this->request->getVar('amount'), FILTER_SANITIZE_NUMBER_INT);
      
        $dataBody = [
            'id' => $id,
            'amount'=> $amount,
            'note' => $this->request->getVar('note'),
            'actionBy' => $this->sesi->get('username'),
            'userid' => $this->sesi->get('userid'),
            'info_photo' =>$this->request->getFile('info_photo')
        ];
        // dd($dataBody);
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update data Debt");
            return redirect()->to('dashboard/listDebt');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/editDebt/'.$id);
        }
    }

    public function delDebt($id = null){
        $enp = 'api/utang/DelUtang';
        $dataBody = [
            'utang_id' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully delete data Debt");
            return redirect()->to('dashboard/listDebt');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/listDebt');
        }
    }
}
