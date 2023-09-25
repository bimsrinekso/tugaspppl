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
        $role = $this->sesi->get('role');
        $enp = 'api/country/bankAcc';
        $dataBody;
        if ($role == 1) {
            $dataBody = [
                "country" => $this->request->getVar('country'),
                "bankID" => $this->request->getVar('bankID'),
                "clientID" => $this->request->getVar('clientID'),
                "userid" => $this->sesi->get('userid')
            ];
        }elseif($role == 4){
            $dataCC = [
                'userid' => $this->sesi->get('userid')
            ];
            $enpUserCC = 'api/country/userClientCountry';
            $postCC = $this->async->post($enpUserCC, $this->apimain, $dataCC);
            $parseCC = $postCC->response;
            $country = $parseCC->countryID;
            $dataBody = [
                "country" => $country,
                "bankID" => $this->request->getVar('bankID'),
                "userid" => $this->sesi->get('userid')
            ];
        }
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