<?php

namespace App\Controllers;

class CountryController extends BaseController
{
public function listClientCountry(){
        $enp = 'api/country/client';
        $dataBody = [
            "country" => $this->request->getVar('country')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        try {
            $data = [
                "clients" => $parseData
            ];
            echo json_encode($data);
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
        }
        
    }
    public function listBankCountry(){
        $enp = 'api/country/bank';
        $dataBody = [
            "country" => $this->request->getVar('country'),
            "userid" => $this->sesi->get('userid')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        try {
            $data = [
                "banks" => $parseData
            ];
            echo json_encode($data);
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
        }
        
    }
    public function listBankAccounts(){
        $enp = 'api/country/bankAcc';
        $dataBody = [
            "country" => $this->request->getVar('country'),
            "bankID" => $this->request->getVar('bankID'),
            "clientID" => $this->request->getVar('clientID'),
            "userid" => $this->sesi->get('userid')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        try {
            $data = [
                "banks" => $parseData
            ];
            echo json_encode($data);
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
        }
    }
}