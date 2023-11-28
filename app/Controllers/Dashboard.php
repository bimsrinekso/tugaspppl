<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
     public function Index()
     {
        $dataPie = $this->grpos->select('prID,prName, SUM(qty) AS total_qty_sold, prAmt, SUM(qty * prAmt) AS totalSold')->where('deleted_at IS NULL')->groupBy('prID')->orderBy('total_qty_sold','DESC')->limit(3)->get()->getResult();
        // dd($dataPie);
        $data = [
            'dataPie' => $dataPie,
        ];
         return view('Dashboard/index',$data);
     }

     public function getPie()
     {
        $data = $this->grpos->select('prID,prName, SUM(qty) AS total_qty_sold, prAmt, SUM(qty * prAmt) AS totalSold')->where('deleted_at IS NULL')->groupBy('prID')->orderBy('total_qty_sold','DESC')->limit(3)->get()->getResult();
        return $this->response->setJSON(['data' => $data]);
     }
}