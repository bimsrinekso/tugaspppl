<?php

namespace App\Controllers;

class BalanceCategory extends BaseController
{
     public function index()
     {
         return view('Dashboard/BalanceCategory/index');
     }
     public function getBlcCat()
     {
        $data = $this->catblc->select('*,balanceCategory.id as idBlcCat')->join('balanceType','balanceCategory.jenis = balanceType.id')->findAll();
        return $this->response->setJSON(['data' => $data]);
     }
     public function svCatBlc()
     {
        $dataCatBlc = [
            'namaCatBlc' => $this->request->getVar('categoryname'),
            'jenis' => $this->request->getVar('jenis'),
        ];
        try {
            $cekSave = $this->catblc->save($dataCatBlc);
            $saveData = [
                "success" => 200,
                "data" => $dataCatBlc,
                "statusSave" => $cekSave
            ];
            echo json_encode($saveData);
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
        }
     }
     public function getSingleCatBlc($id)
     {
        $data = $this->catblc->select('*,balanceCategory.id as idBlcCat')->join('balanceType','balanceCategory.jenis = balanceType.id')->where('balanceCategory.id',$id)->first();
        return $this->response->setJSON(['data' => $data]);
     }
     public function updateCatBlc()
     {
        $catBlcId = $this->request->getVar('catBlcId');
        $catBlcName = $this->request->getVar('nmCatBlc');
        $data = [
            'namaCatBlc' => $catBlcName,
            'jenis' => $this->request->getVar('jenis'),
        ];
        try {
            $cekSave = $this->catblc->update($catBlcId, $data);
            $saveData = [
                "success" => 200,
                "data" => $data,
                "statusSave" => $cekSave
            ];
            echo json_encode($saveData);
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
        }
     }

     public function delCatBlc($id)
     {
         $this->catblc->delete($id);
         $this->sesi->setFlashdata('sukses', 'Data berhasil dihapus');
         return redirect()->to('/dashboard/balancecategory');
     }

    //general function
    public function getBalanceCat()
    {
        $pickJenis = $this->request->getVar('jenisnya');
        $data = $this->catblc->select('*, balanceCategory.id as idBlcCat')->join('balanceType','balanceCategory.jenis = balanceType.id')->where('balanceCategory.jenis', $pickJenis)->get()->getResult();
        return $this->response->setJSON($data);
    }
}