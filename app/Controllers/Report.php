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
    private function generateResponse($postData, $param) {
        $parseDataCt = $postData['api/getReport']->response;
    
        return [
            "summary" => $this->generateRecord($postData['api/reportSummary']->response, $param, $parseDataCt),
            "deposit" => $this->generateRecord($postData['api/reportDepo']->response, $param),
            "withdraw" => $this->generateRecord($postData['api/reportWd']->response, $param),
        ];
    }
    
    private function generateRecord($response, $param, $parseDataCt = null) {
        $record = [
            "draw" => isset($param['draw']) ? $param['draw'] : 0,
            "recordsTotal" => $response->recordsTotal ?? 0,
            "recordsFiltered" => $response->recordsFiltered ?? 0,
            "data" => $response->data ?? [],
        ];
    
        if ($parseDataCt) {
            $record['weekWithdraw'] = $parseDataCt->weekWithdraw;
            $record['weekDeposit'] = $parseDataCt->weekDeposit;
        }
    
        return $record;
    }
    public function listSm()
    {   
        $start = $this->request->getVar('startDate');
        $end = $this->request->getVar('endDate');
        $param = $_REQUEST;

        $endpoints = ['api/reportSummary', 'api/reportDepo', 'api/reportWd', 'api/getReport'];
        $role = $this->sesi->get('role');

        $dataBody = [
            'userid'=> $this->sesi->get('userid'),
            'param' => $param,
        ];

        if ($start) {
            $dataBody['startDate'] = $start;
            $dataBody['endDate'] = $end;
        }

        $postData = [];
        foreach ($endpoints as $endpoint) {
            $api = $role == 1 ? $this->apimain : $this->apiclient;
            $postData[$endpoint] = $this->async->post($endpoint, $api, $dataBody);
        }

        $response = $this->generateResponse($postData, $param);
        echo json_encode($response);
    }
}
