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
        $start = $this->request->getVar('startDate');
        $end = $this->request->getVar('endDate');
        $param = $_REQUEST;
        $enpSm = 'api/reportSummary';
        $enpDp = 'api/reportDepo';
        $enpWd = 'api/reportWd';
        $enpCt = 'api/getReport';
        if ($this->sesi->get('role') == 1) {
            if ($start != '') {
                $dataBody = [
                    'userid'=> $this->sesi->get('userid'),
                    'param' => $param,
                    'startDate'=> $start,
                    'endDate'=> $end,
                ];
                $postDataSm = $this->async->post($enpSm, $this->apimain, $dataBody);
                $postDataDp = $this->async->post($enpDp, $this->apimain, $dataBody);
                $postDataWd = $this->async->post($enpWd, $this->apimain, $dataBody);
                $postDataCt = $this->async->post($enpCt, $this->apimain, $dataBody);
                $parseDataCt = $postDataCt->response;
                $response = [
                    "summary" => [
                        "draw" => isset($param['draw']) ? $param['draw'] : 0,
                        "recordsTotal" => $postDataSm->response->recordsTotal,
                        "recordsFiltered" => $postDataSm->response->recordsFiltered,
                        "data" => $postDataSm->response->data,
                        "weekWithdraw" => $parseDataCt->weekWithdraw,
                        "weekDeposit" => $parseDataCt->weekDeposit
                    ],
                    "deposit" => [
                        "draw" => isset($param['draw']) ? $param['draw'] : 0,
                        "recordsTotal" => $postDataDp->response->recordsTotal,
                        "recordsFiltered" => $postDataDp->response->recordsFiltered,
                        "data" => $postDataDp->response->data,
                        
                    ],
                    "withdraw" => [
                        "draw" => isset($param['draw']) ? $param['draw'] : 0,
                        "recordsTotal" => $postDataWd->response->recordsTotal,
                        "recordsFiltered" => $postDataWd->response->recordsFiltered,
                        "data" => $postDataWd->response->data,
                        
                    ]
                ];
                echo json_encode($response);
            } else {
                $dataBody = [
                    'userid'=> $this->sesi->get('userid'),
                    'param' => $param,
                ];
                $postDataSm = $this->async->post($enpSm, $this->apimain, $dataBody);
                $postDataDp = $this->async->post($enpDp, $this->apimain, $dataBody);
                $postDataWd = $this->async->post($enpWd, $this->apimain, $dataBody);
                $postDataCt = $this->async->post($enpCt, $this->apimain, $dataBody);
                $parseDataCt = $postDataCt->response;
                $response = [
                    "summary" => [
                        "draw" => isset($param['draw']) ? $param['draw'] : 0,
                        "recordsTotal" => $postDataSm->response->recordsTotal,
                        "recordsFiltered" => $postDataSm->response->recordsFiltered,
                        "data" => $postDataSm->response->data,
                        "weekWithdraw" => $parseDataCt->weekWithdraw,
                        "weekDeposit" => $parseDataCt->weekDeposit
                    ],
                    "deposit" => [
                        "draw" => isset($param['draw']) ? $param['draw'] : 0,
                        "recordsTotal" => $postDataDp->response->recordsTotal,
                        "recordsFiltered" => $postDataDp->response->recordsFiltered,
                        "data" => $postDataDp->response->data,
                        
                    ],
                    "withdraw" => [
                        "draw" => isset($param['draw']) ? $param['draw'] : 0,
                        "recordsTotal" => $postDataWd->response->recordsTotal,
                        "recordsFiltered" => $postDataWd->response->recordsFiltered,
                        "data" => $postDataWd->response->data,
                        
                    ]
                ];
                echo json_encode($response);
            }
        } else if($this->sesi->get('role') == 2) {
            if ($start != '') {
                $dataBody = [
                    'userid'=> $this->sesi->get('userid'),
                    'param' => $param,
                    'startDate'=> $start,
                    'endDate'=> $end,
                ];
                $postDataSm = $this->async->post($enpSm, $this->apimain, $dataBody);
                $postDataDp = $this->async->post($enpDp, $this->apimain, $dataBody);
                $postDataWd = $this->async->post($enpWd, $this->apimain, $dataBody);
                $postDataCt = $this->async->post($enpCt, $this->apimain, $dataBody);
                $parseDataCt = $postDataCt->response;
                $response = [
                    "summary" => [
                        "draw" => isset($param['draw']) ? $param['draw'] : 0,
                        "recordsTotal" => $postDataSm->response->recordsTotal == null ? 0 : $postDataSm->response->recordsTotal,
                        "recordsFiltered" => $postDataSm->response->recordsFiltered == null ? 0 : $postDataSm->response->recordsFiltered,
                        "data" => $postDataSm->response->data == null ? [] : $postDataSm->response->data,
                        "weekWithdraw" => $parseDataCt->weekWithdraw,
                        "weekDeposit" => $parseDataCt->weekDeposit
                    ],
                    "deposit" => [
                        "draw" => isset($param['draw']) ? $param['draw'] : 0,
                        "recordsTotal" => $postDataDp->response->recordsTotal == null ? 0 : $postDataDp->response->recordsTotal,
                        "recordsFiltered" => $postDataDp->response->recordsFiltered == null ? 0 :$postDataDp->response->recordsFiltered,
                        "data" => $postDataDp->response->data == null ? [] : $postDataDp->response->data,
                        
                    ],
                    "withdraw" => [
                        "draw" => isset($param['draw']) ? $param['draw'] : 0,
                        "recordsTotal" => $postDataWd->response->recordsTotal == null ? 0 : $postDataWd->response->recordsTotal,
                        "recordsFiltered" => $postDataWd->response->recordsFiltered == null ? 0 : $postDataWd->response->recordsFiltered,
                        "data" => $postDataWd->response->data == null ? [] : $postDataWd->response->data,
                        
                    ]
                ];
                echo json_encode($response);
            } else {
                $dataBody = [
                    'userid'=> $this->sesi->get('userid'),
                    'param' => $param,
                ];
                $postDataSm = $this->async->post($enpSm, $this->apiclient, $dataBody);
                $postDataDp = $this->async->post($enpDp, $this->apiclient, $dataBody);
                $postDataWd = $this->async->post($enpWd, $this->apiclient, $dataBody);
                $postDataCt = $this->async->post($enpCt, $this->apimain, $dataBody);
                $parseDataCt = $postDataCt->response;
                $response = [
                    "summary" => [
                        "draw" => isset($param['draw']) ? $param['draw'] : 0,
                        "recordsTotal" => $postDataSm->response->recordsTotal == null ? 0 : $postDataSm->response->recordsTotal,
                        "recordsFiltered" => $postDataSm->response->recordsFiltered == null ? 0 : $postDataSm->response->recordsFiltered,
                        "data" => $postDataSm->response->data == null ? [] : $postDataSm->response->data,
                        "weekWithdraw" => $parseDataCt->weekWithdraw,
                        "weekDeposit" => $parseDataCt->weekDeposit
                    ],
                    "deposit" => [
                        "draw" => isset($param['draw']) ? $param['draw'] : 0,
                        "recordsTotal" => $postDataDp->response->recordsTotal == null ? 0 : $postDataDp->response->recordsTotal,
                        "recordsFiltered" => $postDataDp->response->recordsFiltered == null ? 0 :$postDataDp->response->recordsFiltered,
                        "data" => $postDataDp->response->data == null ? [] : $postDataDp->response->data,
                        
                    ],
                    "withdraw" => [
                        "draw" => isset($param['draw']) ? $param['draw'] : 0,
                        "recordsTotal" => $postDataWd->response->recordsTotal == null ? 0 : $postDataWd->response->recordsTotal,
                        "recordsFiltered" => $postDataWd->response->recordsFiltered == null ? 0 : $postDataWd->response->recordsFiltered,
                        "data" => $postDataWd->response->data == null ? [] : $postDataWd->response->data,
                        
                    ]
                ];
                echo json_encode($response);
            }
        }
    }
}
