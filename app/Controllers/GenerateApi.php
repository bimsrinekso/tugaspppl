<?php

namespace App\Controllers;

class GenerateApi extends BaseController
{
    public function index()
    { 
        $enp = 'api/getApi';
        $getData = $this->async->get($enp, $this->apimain);
        $parseData = $getData->response;
        $data = [
            "allData" => $parseData,
        ];
        return view('Dashboard/Main/GenApi/index', $data);   
    }

    public function createApis()
    { 
        return view('Dashboard/Main/GenApi/createApis');   
    }

    public function saveApis()
    { 
        $enp = 'api/genApi';
        $dataBody = [
            'userid' => $this->sesi->get('userid'),
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully generate api");
            return redirect()->to('dashboard/generateApis');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/generateApis');
        }   
    }

    public function detailApi($id = null){
        $enp = 'api/detailApi';
        $dataBody = [
            'apiID' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $data = [
                "dataApi" => $parseData[0],
            ];
            return view('Dashboard/Main/GenApi/detailApis', $data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('dashboard/generateApis');
        }
    }
}