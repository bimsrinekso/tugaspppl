<?php

namespace App\Controllers;

class Pos extends BaseController
{
     public function index()
     {
        $dataCat = $this->catpr->Get()->getResult();
        $dataPr = $this->product->Get()->getResult();
        $data = [
            'dataCat' => $dataCat,
            'dataPr' => $dataPr,
        ];
        return view('Dashboard/Pos/index',$data);
     }
}