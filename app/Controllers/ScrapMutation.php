<?php

namespace App\Controllers;

class ScrapMutation extends BaseController
{
    public function saveData(){
        $isValid = [
            'country' => 'required',
            'bank' => 'required',
            'client' => 'required',
            'mutation' => 'required'
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $response = [
                "status" => 400,
                "messages" => "Error",
                "response" => $oneline
            ];
            echo json_encode($response);
        }
        $dataBody = [
            'country' => $this->request->getVar('country'),
            'bank' => $this->request->getVar('bank'),
            'client' => $this->request->getVar('client'),
            'mutation' => $this->request->getVar('mutation')
        ];
        
        $response = [
            "status" => 200,
            "messages" => "Success",
            "response" => $dataBody
        ];
        echo json_encode($response);
    }
}