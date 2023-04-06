<?php
namespace App\Models;
use CodeIgniter\Model;
class AsyncModel extends Model{
    public function __construct(){
		$this->req = new \GuzzleHttp\Client();
        $this->url = 'http://localhost:8888/';
	}
	public function get($urlenp, $apikey)
    	{
		// get data api dengan async await
		$dataReq = $this->req->getAsync($this->url.$urlenp,[
		    'headers' => [
			'Content-Type: application/json',
			'apiKey' => $apikey
		    ]
		]);
		$iniResp = $dataReq->wait();
		$res = \json_decode($iniResp->getBody());
		return $res;
    	}
    public function post($urlenp, $apikey, $data)
    	{
		// post data api dengan async await
		$dataReq = $this->req->postAsync($this->url.$urlenp, [
		    'headers' => [
			'Content-Type: application/json',
			'apiKey' => $apikey
		    ],
		    'json' => $data,
		]);
		$iniResp = $dataReq->wait();
		$res = \json_decode($iniResp->getBody());
		return $res;
    }
}