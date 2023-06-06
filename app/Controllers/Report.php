<?php

namespace App\Controllers;

class Report extends BaseController
{
    public function index()
    {
        $enp = 'api/getReport';
            $dataBody = [
                'userid'=> $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apiclient, $dataBody);
            $parseData = $postData->response;
            $data = [
                "trxDepoCon"=> $parseData->trxDepoCon,
                "trxDepoRej"=> $parseData->trxDepoRej,
                "trxWdCon"=> $parseData->trxWdCon,
                "trxWdRej"=> $parseData->trxWdRej, 
                "weekWithdraw"=> $parseData->weekWithdraw,
                "weekDeposit"=> $parseData->weekDeposit,
                "rangeHari"=> $parseData->rangeHari,
                "dataTrans"=> $parseData->dataTrans,
            ];
        return view('Dashboard/Report/index', $data);
    }

    public function listDepo()
    {        
        $param = $_REQUEST;        
        $enp = 'api/reportDepo';
        $dataBody = [
            'userid'=> $this->sesi->get('userid'),
            'param' => $param
        ];
        $postData = $this->async->post($enp, $this->apiclient, $dataBody);
        $response = [
            "draw" => isset($param['draw']) ? $param['draw'] : 0,
            "recordsTotal" => $postData->response->recordsTotal,
            "recordsFiltered" => $postData->response->recordsFiltered,
            "data" => $postData->response->data
        ];
    
        echo json_encode($response);
    }

    public function listWd()
    {        
        $param = $_REQUEST;        
        $enp = 'api/reportWd';
        $dataBody = [
            'userid'=> $this->sesi->get('userid'),
            'param' => $param
        ];
        $postData = $this->async->post($enp, $this->apiclient, $dataBody);
        $response = [
            "draw" => isset($param['draw']) ? $param['draw'] : 0,
            "recordsTotal" => $postData->response->recordsTotal,
            "recordsFiltered" => $postData->response->recordsFiltered,
            "data" => $postData->response->data
        ];
    
        echo json_encode($response);
    }

    public function listSm()
    {        
        $param = $_REQUEST;        
        $enp = 'api/reportSummary';
        $dataBody = [
            'userid'=> $this->sesi->get('userid'),
            'param' => $param
        ];
        $postData = $this->async->post($enp, $this->apiclient, $dataBody);
        $response = [
            "draw" => isset($param['draw']) ? $param['draw'] : 0,
            "recordsTotal" => $postData->response->recordsTotal,
            "recordsFiltered" => $postData->response->recordsFiltered,
            "data" => $postData->response->data
        ];
    
        echo json_encode($response);
    }
}
