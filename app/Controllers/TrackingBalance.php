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
            $data = [
                "dataTrack" => $parseData,
            ];
            return view('Dashboard/Main/TrackingBalance/index',$data);
        } elseif($this->sesi->get('role') == 2) {
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apiclient, $dataBody);
            $parseData = $postData->response;
            $data = [
                "dataTrack" => $parseData,
            ];
            return view('Dashboard/Client/TrackingBalance/index',$data);
        }   
    }
}
