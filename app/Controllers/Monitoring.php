<?php

namespace App\Controllers;

class Monitoring extends BaseController
{
    public function index(){
        $enp1 = 'api/logMonitor/post';
        
        $dataBody1 = [
            'role' => $this->sesi->get('role')
        ];
        $postData1 = $this->async->post($enp1,  $this->apimain, $dataBody1);
        $parseData1 = $postData1->response;


        $enp2 = 'api/logMonitor/error';
        
        $dataBody2 = [
            'role' => $this->sesi->get('role')
        ];
        $postData2 = $this->async->post($enp2,  $this->apimain, $dataBody2);
        $parseData2 = $postData2->response;

        $enp3 = 'api/logMonitor/callback';
        
        $dataBody3 = [
            'role' => $this->sesi->get('role')
        ];
        $postData3 = $this->async->post($enp3,  $this->apimain, $dataBody3);
        $parseData3 = $postData3->response;

        
        $data =[
            'datapost' => $parseData1,
            'dataError'=>$parseData2,
            'datacb'=>$parseData3
        ];
        return view('Dashboard/Main/Monitoring/index',$data);
    }

     public function detailPost($id = null){
        $enp = 'api/logMonitor/detailPost';
        $dataBody = [
            'role' => $this->sesi->get('role'),
            'idpost' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $data = [
                "detailPost" => $parseData,
            ];
            // dd($parseData);
            return view('Dashboard/Main/Monitoring/detailPost',$data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry the data already updated");
            return redirect()->to('/dashboard/monitoringLog');
        }
    
    }
    
    public function detailCallback($id = null){
        $enp = 'api/logMonitor/detailCallback';
        $dataBody = [
            'role' => $this->sesi->get('role'),
            'idcb' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $data = [
                "detailCallBack" => $parseData,
            ];
            return view('Dashboard/Main/Monitoring/detailCallback',$data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry the data already updated");
            return redirect()->to('/dashboard/monitoringLog');
        }
    }

    public function editError($id = null){
        $enp = 'api/logMonitor/detailError';
        $dataBody = [
            'role' => $this->sesi->get('role'),
            'idlog' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $parseData->message = str_replace('`', "'", $parseData->message);
            $data = [
                "detailError" => $parseData,
            ];
            return view('Dashboard/Main/Monitoring/editError',$data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry the data already updated");
            return redirect()->to('/dashboard/monitoringLog');
        }
    }

    public function saveError($id=null){

    }
}
