<?php

namespace App\Controllers;

class Monitoring extends BaseController
{
    public function index(){
        return view('Dashboard/Main/Monitoring/index');
    }
    public function listLogPost(){
        $param = $_REQUEST;        
        $enp = 'api/logMonitor/post';
        $enp1 = 'api/logMonitor/error'; 
        $enp2 = 'api/logMonitor/callback'; 
        $dataBody = [
            'role' => $this->sesi->get('role'),
            'param' => $param,
        ];
       
        
        if($param['idTable'] == '#datatable-post'){
            
             $postData = $this->async->post($enp, $this->apimain, $dataBody);
        }elseif($param['idTable'] == '#datatable-callback'){
             $postData = $this->async->post($enp2, $this->apimain, $dataBody);
        }else{
            $postData = $this->async->post($enp1, $this->apimain, $dataBody);
        }
        $response = [
            "draw" => isset($param['draw']) ? $param['draw'] : 0,
            "recordsTotal" => $postData->response->recordsTotal,
            "recordsFiltered" => $postData->response->recordsFiltered,
            "data" => $postData->response->data,

        ];
    
        echo json_encode($response);
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

    public function filterLogPost()
    {
        // $param = $_REQUEST;
        $enp = 'api/logMonitor/filterLogPost';
        // $enp1 = 'api/logMonitor/filterCallBack';
        // $enp2 = 'api/logMonitor/filterError';
        if ($this->sesi->get('role') == 1) {
            
            $dataBody = [
                'startDate'=> $this->request->getVar('startDate'),
                'endDate'=> $this->request->getVar('endDate'),
                'role' => $this->sesi->get('role')
            ];
            
            try {
                $postData = $this->async->post($enp, $this->apimain, $dataBody);
                // if($param['idTable'] == '#datatable-post'){
                // $postData = $this->async->post($enp, $this->apimain, $dataBody);
                // }elseif($param['idTable'] == '#datatable-callback'){
                //     $postData = $this->async->post($enp1, $this->apimain, $dataBody);
                // }else{
                //     $postData = $this->async->post($enp2, $this->apimain, $dataBody);
                // }
                echo json_encode($postData);
            } catch (\Exception $e) {
                echo json_encode($e->getMessage());
            }  
        }
    }

}
