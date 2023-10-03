<?php

namespace App\Controllers;
class ScrapMutation extends BaseController
{
    public function saveData() {
        $role = $this->sesi->get('role');
        $mutation = $this->request->getFile('docFile');
        $isValid = [];
        $country = $this->request->getVar('country');
        $clientID = $this->request->getVar('clientID');
        if($role == 1){
            $isValid = [
                'country' => 'required',
                'bank' => 'required',
                'clientID' => 'required',
            ];
        }
        if($role == 4){
            $dataCC = [
                'userid' => $this->sesi->get('userid')
            ];
            $enpUserCC = 'api/country/userClientCountry';
            $postCC = $this->async->post($enpUserCC, $this->apimain, $dataCC);
            $parseCC = $postCC->response;
            $country = $parseCC->countryID;
            $clientID = $parseCC->client_id;
            $isValid = [
                'bank' => 'required',
            ];
        }
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/estatement/bank');
        }
        $nameDoc = '';
        if(!empty($mutation)){
            $fileName = $mutation->getName();
            $pecah = explode(".", $fileName);
            $dirUplod = WRITEPATH . 'uploads/document/mutation';
            $extension = end($pecah);
            $nameFile = reset($pecah);
            $nameDoc = rand() . "-mutation-" . $nameFile . "." . $extension;
            $validExt = array('pdf', 'CSV', 'csv', 'PDF');
            if (in_array($extension, $validExt)) {
                try {
                    $mutation->move($dirUplod, $nameDoc);
                } catch (\Exception $e) {
                    $pesan = 'Your file is coruppted';
                    $this->sesi->setFlashdata('error', $pesan);
                    return redirect()->to('dashboard/estatement/bank');
                }
            }else{
                $pesan = 'Your file is not valid';
                $this->sesi->setFlashdata('error', $pesan);
                return redirect()->to('dashboard/estatement/bank');
            }
            $mutationPath = $dirUplod . '/' . $nameDoc;
            $dataBody = [
                'country' => $country,
                'bankID' => $this->request->getVar('bank'),
                'clientID' => $clientID,
                'accBank' => $this->request->getVar('accBank'),
                'userid' => $this->sesi->get('userid')
            ];
            $enpCkBank = 'api/country/cekBankAcc';
            $cekAccBank = $this->async->post($enpCkBank, $this->apimain, $dataBody);
            if($cekAccBank->status == 200){
                $parseCk = $cekAccBank->response;
                $enpScrap = '';
                if($parseCk->universalName == "BRI"){
                    $enpScrap = 'api/scrap/bri';
                }elseif($parseCk->universalName == "BCA"){
                    $enpScrap = 'api/scrap/bca';
                }elseif($parseCk->universalName == "BNI"){
                    $enpScrap = 'api/scrap/bni';
                }elseif($parseCk->universalName == "Mandiri"){

                }
                $postData = $this->async->post($enpScrap, $this->apimain, $dataBody, $mutationPath, 'docFile');
                $parseData = $postData->response;
                if($postData->status == 200){
                    if(empty($parseData->data)){
                        $pesan = "Sorry your file e-statement not match with bank";
                        $this->sesi->setFlashdata('error', $pesan);
                        return redirect()->to('dashboard/estatement/bank');
                    }else{
                        $pesan = 'Success scrap data e-statement';
                        $this->sesi->setFlashdata('sukses', $pesan);
                        return redirect()->to('dashboard/estatement/bank');
                    }
                }else{
                    $pesan = $parseData;
                    $this->sesi->setFlashdata('error', $pesan);
                    return redirect()->to('dashboard/estatement/bank');
                }
            }else{
                $pesan = "Sorry you don't have access";
                $this->sesi->setFlashdata('error', $pesan);
                return redirect()->to('dashboard/estatement/bank');
            }
        }else{
            $pesan = 'Please upload your e-statement';
            $this->sesi->setFlashdata('error', $pesan);
            return redirect()->to('dashboard/estatement/bank');
        }
    }    
}