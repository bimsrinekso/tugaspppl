<?php

namespace App\Controllers;

class TrackingBalance extends BaseController
{
    public function index()
    {
        
        $enp = 'api/getTrack';
        if ($this->sesi->get('role') == 1) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
            $parseData = $postData->response;
            if (is_object($parseData) && !is_countable($parseData)) {
                $parseData = [$parseData];
            }
            $data = [
                "dataTrack" => $parseData,
            ];
            return view('Dashboard/Main/TrackingBalance/index',$data);
        } elseif($this->sesi->get('role') == 2) {
                $dataBody = [
                    'userid'=> $this->sesi->get('userid')
                ];
                $postData = $this->async->post($enp, $this->apiclient, $dataBody);
                if($postData->status == 200){
                    $parseData = $postData->response;
                    if (is_object($parseData) && !is_countable($parseData)) {
                        $parseData = [$parseData];
                    }
                $data = [
                    "dataTrack" => $parseData,
                ];
                return view('Dashboard/Client/TrackingBalance/index',$data);
            }else{
                $data = [
                    "dataTrack" => [],
                ];
                return view('Dashboard/Client/TrackingBalance/index',$data);
            }
            
        }   
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
