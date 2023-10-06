<?php

namespace App\Controllers;  

class TrackingBalance extends BaseController
{
    public function index()
    {
        $role = $this->sesi->get('role');
        if ($role == 1 || $role == 4) {
            return view('Dashboard/Main/TrackingBalance/index');
            
            
        } elseif($this->sesi->get('role') == 2) {
            return view('Dashboard/Client/TrackingBalance/index');
        }   
    }
    public function getTrack(){
        $param = $_REQUEST;        
        $enp = 'api/getTrack';
      
        $dataBody = [
            'userid' => $this->sesi->get('userid'),
            'param' => $param,
        ];
       
        
        $postData = $this->async->post($enp, $this->apimain, $dataBody);

        $response = [
            "draw" => isset($param['draw']) ? $param['draw'] : 0,
            "recordsTotal" => $postData->response->recordsTotal,
            "recordsFiltered" => $postData->response->recordsFiltered,
            "data" => $postData->response->data,

        ];
    
        echo json_encode($response);
    }

    public function filterTracking(){
        $enp = 'api/tracking/filter';
        if ($this->sesi->get('role') == 1) {
            $dataBody = [
                'startDate'=> $this->request->getVar('startDate'),
                'endDate'=> $this->request->getVar('endDate'),
                'target'=> $this->request->getVar('target'),
                'role' => $this->sesi->get('role')
            ];
            try {
                $postData = $this->async->post($enp, $this->apimain, $dataBody);  
                if (is_object($postData->response) && !is_countable($postData->response)) {
                    $postData->response = [$postData->response];
                } 
                echo json_encode($postData);
            } catch (\Exception $e) {
                echo json_encode($e->getMessage());
            }    
        } elseif($this->sesi->get('role') == 2) {
            $dataBody = [
                'startDate'=> $this->request->getVar('startDate'),
                'endDate'=> $this->request->getVar('endDate'),
                'target'=> $this->request->getVar('target'),
                'userid'=> $this->sesi->get('userid'),
                'role' => $this->sesi->get('role')
            ];
            try {
                $postData = $this->async->post($enp, $this->apiclient, $dataBody); 
                if (is_object($postData->response) && !is_countable($postData->response)) {
                    $postData->response = [$postData->response];
                } 
                echo json_encode($postData);
            } catch (\Exception $e) {
                echo json_encode($e->getMessage());
            }    
        }
          
    }
}
