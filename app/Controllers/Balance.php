<?php

namespace App\Controllers;

class Balance extends BaseController
{
     public function index()
     {
        $dataTipe = $this->typeblc->get()->getResult();
        $user = $this->sesi->get('user_id');
        $data = [
            'tipeBlc' => $dataTipe,
        ];
         return view('Dashboard/Balance/index',$data);
     }

     public function getDataBlc()
     {
        $startDate = $this->request->getVar('startDate');
        $endDate = $this->request->getVar('endDate');
        if ($startDate == null) {
            $data = $this->blc->getAll();
        } else {
            $data = $this->blc
            ->where('balance.created_at >=',$startDate)
            ->where('balance.created_at <=',$endDate)
            ->getAll();
            
        }
        // $data = $this->blc->getAll();
        return $this->response->setJSON(['data' => $data]);
     }

     public function svBlc()
     {
        $amount= filter_var($this->request->getVar('amount'), FILTER_SANITIZE_NUMBER_INT);
        $userID = $this->sesi->get('user_id');
        $dataBlc = [
            'amount' => $amount,
            'transactionID' => $this->trxID->trxId(),
            'actionBy' => $userID,
            'type' => $this->request->getVar('jenisnya'),
            'catBlc' => $this->request->getVar('catBlc'),
            'remark' => $this->request->getVar('remark'),
        ];
        try {
            $cekSave = $this->blc->save($dataBlc);
            $saveData = [
                "success" => 200,
                "data" => $dataBlc,
                "statusSave" => $cekSave
            ];
            echo json_encode($saveData);
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
        }
     }
     public function getDataSingleBlc($id)
     {
        $data = $this->blc->select('*')->where('id',$id)->first();
        return $this->response->setJSON(['data' => $data]);
     }

     public function updateBlc()
     {
        $blcID = $this->request->getVar('blcID');
        $amount= filter_var($this->request->getVar('amt'), FILTER_SANITIZE_NUMBER_INT);
        $userID = $this->sesi->get('user_id');
        $dataBlc = [
            'id' => $blcID,
            'amount' => $amount,
            'actionBy' => $userID,
            'type' => $this->request->getVar('jns'),
            'catBlc' => $this->request->getVar('blcT'),
            'remark' => $this->request->getVar('rmrk'),
        ];
        try {
            $cekSave = $this->blc->update($blcID,$dataBlc);
            $saveData = [
                "success" => 200,
                "data" => $dataBlc,
                "statusSave" => $cekSave
            ];
            echo json_encode($saveData);
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
        }
     }

     public function delBlc($id)
     {
        try {
            $cekDel = $this->blc->delete($id);
            $saveData = [
                "success" => 200,
                "statusSave" => $cekDel
            ];
            echo json_encode($saveData);
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
        }
     }
}