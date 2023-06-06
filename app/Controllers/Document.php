<?php

namespace App\Controllers;

class Document extends BaseController
{
    public function index()
    {
        if ($this->sesi->get('role') == 1) {
            return view('Dashboard/Main/Documentation/index');
        } elseif($this->sesi->get('role') == 2) {
            $enp = 'api/account/personalKey';
            $dataBody = [
                'userID' => $this->sesi->get('userid')
            ];
            $postData = $this->async->post($enp, $this->apiclient, $dataBody);
            $parseData = $postData->response;
            if (is_countable($parseData)) {
                $parseData = $parseData[0];
            }
            $data = [
                "dataKey" => $parseData,
            ];
            return view('Dashboard/Client/Documentation/index', $data);
        }
        
    }
}
