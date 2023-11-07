<?php

namespace App\Controllers;

class TrackingBalance extends BaseController
{
     public function index()
     {
         return view('Dashboard/TrackingBalance/index');
     }
     public function getDataPr()
     {
        $data = $this->product->getProduct();
        return $this->response->setJSON(['data' => $data]);
     }
     public function svProduct()
     {
        $price= filter_var($this->request->getVar('price'), FILTER_SANITIZE_NUMBER_INT);
        $dataProduk = [
            'nama_produk' => $this->request->getVar('productname'),
            'harga' => $price,
        ];
        try {
            $cekSave = $this->product->save($dataProduk);
            $saveData = [
                "success" => 200,
                "data" => $dataProduk,
                "statusSave" => $cekSave
            ];
            echo json_encode($saveData);
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
        }
     }
     public function getDataSinglePr($id)
     {
        $data = $this->product->select('*')->where('id',$id)->first();
        return $this->response->setJSON(['data' => $data]);
     }

     public function updateProduct()
     {
        $productId = $this->request->getVar('prID');
        $productName = $this->request->getVar('namePr');
        $productPrice = filter_var($this->request->getVar('price'), FILTER_SANITIZE_NUMBER_INT);
        $data = [
            'nama_produk' => $productName,
            'harga' => $productPrice,
        ];
        try {
            $cekSave = $this->product->update($productId, $data);
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
     public function delPr($id)
     {
         $this->product->delete($id);
         $this->sesi->setFlashdata('sukses', 'Data berhasil dihapus');
         return redirect()->to('/dashboard/product');
     }
}