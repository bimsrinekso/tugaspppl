<?php

namespace App\Controllers;

class Pos extends BaseController
{
     public function index()
     {
        $dataCat = $this->catpr->where('deleted_at IS NULL')->Get()->getResult();
        $dataPr = $this->product->where('deleted_at IS NULL')->orderBy('nama_produk','ASC')->Get()->getResult();
        $data = [
            'dataCat' => $dataCat,
            'dataPr' => $dataPr,
        ];
        return view('Dashboard/Pos/index',$data);
     }

     public function listPos()
     {
        return view('Dashboard/Pos/listpos');
     }

     public function getDataPos()
     {
        $data = $this->pos->select('transactionID,cashIn,cashOut,totalAmt,actionBy,username')->join("users","users.id = pos.actionBy", "left")->where('pos.deleted_at IS NULL')->orderBy('pos.created_at','DESC')->findAll();
        return $this->response->setJSON(['data' => $data]);
     }

     public function svPos()
     {
        $userID = $this->sesi->get('user_id');
        $cashIn= filter_var($this->request->getVar('uang'), FILTER_SANITIZE_NUMBER_INT);
        $cashOut= filter_var($this->request->getVar('kembalian'), FILTER_SANITIZE_NUMBER_INT);
        $transID = $this->trxID->trxId();
        $totalAmt = $cashIn-$cashOut;
        $dataPos = [
            'totalAmt' => $totalAmt,
            'transactionID' => $transID,
            'actionBy' => $userID,
            'cashIn' => $cashIn,
            'cashOut' => $cashOut,
        ];
        $orderItems = json_decode($this->request->getVar('order_items'), true);
        try {
            $cekSave = $this->pos->save($dataPos);
            if ($cekSave == true) {
                $posData = $this->pos->where('transactionID', $transID)->first();
                if ($posData) {
                    foreach ($orderItems as $item) {
                        $dataGrPos = [
                            'trxID' => $posData->transactionID,
                            'prName'=> $item['productName'],
                            'prID'=> $item['idProduct'],
                            'prAmt' => $item['price'],
                            'subTotal' => $item['price'] * $item['quantity'],
                            'qty' => $item['quantity'],
                        ];
        
                        $cekSaveGr = $this->grpos->insert($dataGrPos);
                    }
                    $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully save");
                    return redirect()->to('dashboard/pos');
                }
            }
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
        }
     }
}