<?php

namespace App\Controllers;

class UserManagement extends BaseController
{
    public function index()
    {
       
        return view('Dashboard/Main/UserManagement/listUser' );
    }
    public function allusers(){
        $param = $_REQUEST;        
        $enp = 'api/getClient';
        $enp1 = 'api/getMember'; 
        $enp2 = 'api/getHelpdesk'; 
        $dataBody = [
            'userid' => $this->sesi->get('userid'),
            'param' => $param,
        ];
       
        
        if($param['idTable'] == '#datatable-helpdesk'){
            
             $postData = $this->async->post($enp2, $this->apimain, $dataBody);
        }elseif($param['idTable'] == '#datatable-member'){
             $postData = $this->async->post($enp1, $this->apimain, $dataBody);
        }else{
            $postData = $this->async->post($enp, $this->apimain, $dataBody);
        }
        $response = [
            "draw" => isset($param['draw']) ? $param['draw'] : 0,
            "recordsTotal" => $postData->response->recordsTotal,
            "recordsFiltered" => $postData->response->recordsFiltered,
            "data" => $postData->response->data,

        ];
    
        echo json_encode($response);
    }

    public function createUser()
    {
        $enp = 'api/createUser';
        $dataBody = [
            'userid' => $this->sesi->get('userid')
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status = '200'){
            $data = [
                "role" => $parseData
            ];
            return view('Dashboard/Main/UserManagement/createUser', $data);
        }else{
            return redirect()->to('dashboard');
        }
    }

    public function saveUser(){
        $isValid = [
            'username' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required',
            'role' => 'required',
        ];
        if (!$this->validate($isValid)) {
            $html = $this->isvalid->listErrors();
            $oneline = preg_replace('/\s+/', ' ', $html);
            $this->sesi->setFlashdata('validation', $oneline);
            return redirect()->to('dashboard/createUser');
        }
        $enp = 'api/saveUser';
        $dataBody = [
            'username'=> $this->request->getVar('username'),
            'email'=> $this->request->getVar('email'),
            'password'=> $this->request->getVar('password'),
            'roleID'=> $this->request->getVar('role'),
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully create User");
            return redirect()->to('dashboard/listUser');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/createUser');
        }
    }

    public function editUser($id = null){
        $enp = 'api/editUser';
        $dataBody = [
            'userID' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $data = [
                "dataUser" => $parseData->dataUser,
                "dataRole" => $parseData->dataRole
            ];
            return view('Dashboard/Main/UserManagement/editUser', $data);
        }else{
            $this->sesi->setFlashdata('error', "Sorry, you are not allowed");
            return redirect()->to('dashboard/listUser');
        }
    }

    public function updateUser($id = null){
        $enp = 'api/updateUser';
        $dataBody = [
            'userID' => $id,
            'username'=> $this->request->getVar('username'),
            'email'=> $this->request->getVar('email'),
            'roleID'=> $this->request->getVar('role'),
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully update data User");
            return redirect()->to('dashboard/listUser');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/editUser/'. $id);
        }
    }

    public function delUser($id = null){
        $enp = 'api/delUser';
        $dataBody = [
            'userID' => $id
        ];
        $postData = $this->async->post($enp, $this->apimain, $dataBody);
        $parseData = $postData->response;
        if($postData->status == '200'){
            $this->sesi->setFlashdata('sukses', "Congratulations, you have successfully delete user");
            return redirect()->to('dashboard/listUser');
        }else{
            $this->sesi->setFlashdata('error', "Sorry, check again your data");
            return redirect()->to('dashboard/listUser');
        }
    }
    
}
