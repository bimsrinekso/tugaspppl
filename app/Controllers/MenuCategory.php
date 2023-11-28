<?php

namespace App\Controllers;

class MenuCategory extends BaseController
{
     public function index()
     {
         return view('Dashboard/MenuCategory/index');
     }
     public function getMenuCat()
     {
        $data = $this->catpr->getCatMn();
        return $this->response->setJSON(['data' => $data]);
     }
     public function svCatMenu()
     {
        $dataCatMenu = [
            'categoryName' => $this->request->getVar('categoryname'),
        ];
        try {
            $cekSave = $this->catpr->save($dataCatMenu);
            $saveData = [
                "success" => 200,
                "data" => $dataCatMenu,
                "statusSave" => $cekSave
            ];
            echo json_encode($saveData);
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
        }
     }
     public function getSingleCatMenu($id)
     {
        $data = $this->catpr->select('*')->where('id',$id)->first();
        return $this->response->setJSON(['data' => $data]);
     }
     public function updateCatMenu()
     {
        $catMenuId = $this->request->getVar('catMenuId');
        $catMenuName = $this->request->getVar('nameCatMenu');
        $data = [
            'categoryName' => $catMenuName,
        ];
        try {
            $cekSave = $this->catpr->update($catMenuId, $data);
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

     public function delCatMenu($id)
     {
         $this->catpr->delete($id);
         $this->sesi->setFlashdata('sukses', 'Data berhasil dihapus');
         return redirect()->to('/dashboard/menucategory');
     }
}