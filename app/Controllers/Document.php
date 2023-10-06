<?php

namespace App\Controllers;

class Document extends BaseController
{
    public function index()
    {
        if ($this->sesi->get('role') == 1) {
            $enpBank = 'api/bank/getAll';
            $dataBody = [
                'userid' => $this->sesi->get('userid'),
            ];
            $listBank = $this->async->post($enpBank, $this->apimain, $dataBody);
            $parseBank = $listBank->response;
            $data = [
                "listBank" => $parseBank,
            ];
            return view('Dashboard/Main/Documentation/index', $data);
        } elseif($this->sesi->get('role') == 2) {
            $enp = 'api/account/personalKey';
            $dataBody = [
                'userID' => $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apiclient, $dataBody);
            $parseData = $postData->response;
            dd($parseData);
            if (is_countable($parseData)) {
                $parseData = $parseData[0];
            }
            $dataCC = [
                'userid' => $this->sesi->get('userid')
            ];
            $enpUserCC = 'api/country/userClientCountry';
            $postCC = $this->async->post($enpUserCC, $this->apimain, $dataCC);
            $parseCC = $postCC->response;
            $country = $parseCC->countryID;
            $dataCountry = [
                "country" => $country,
                "userid" => $this->sesi->get('userid')
            ];
            $enpBank = 'api/country/bank';
            $listBank = $this->async->post($enpBank, $this->apimain, $dataCountry);
            $parseBank = $listBank->response;
            $data = [
                "listBank" => $parseBank,
                "dataKey" => $parseData,
            ];
            return view('Dashboard/Client/Documentation/index', $data);
        }
        
    }
}
