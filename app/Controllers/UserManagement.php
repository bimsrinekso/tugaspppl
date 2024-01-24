<?php

namespace App\Controllers;

class UserManagement extends BaseController
{
    public function index()
    {
        $data = [
            'result' =>$this->grole->get()->getResult(),
        ];
        return view('Dashboard/UserManagement/index',$data);
    }
    public function getDataUser()
    {
        $data = $this->users->GetUsers();
        return $this->response->setJSON(['data' => $data]);
    }
    public function svUsers()
    {
        $dataUsers = [
            'id' => $this->trxID->custID(),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'role_id' => $this->request->getVar('role'),
            'avatar' => 'default.png'
        ];
        try {
            $this->users->insert($dataUsers);
            $saveData = [
                "success" => true,
                "data" => $dataUsers,
            ];
            echo json_encode($saveData);

        } catch (Exception $e) {
            error_log('Error occurred: ' . $e->getMessage());
            $errorData = [
                "error" => true,
                "message" => "Error occurred: " . $e->getMessage()
            ];
            echo json_encode($errorData);
        }
    }
    

    public function getDataSingleUser($id)
    {
        $data = $this->users->select('*')->where('id',$id)->first();
        return $this->response->setJSON(['data' => $data]);
    }

    public function updateUser()
    {
        $userId = $this->request->getVar('usrID');
        $data = [
            'username' => $this->request->getVar('usernm'),
            'email' => $this->request->getVar('eml'),
            'role_id' => $this->request->getVar('rl'),
        ];
        try {
            $cekSave = $this->users->update($userId, $data);
            $saveData = [
                "success" => 200,
                "data" => $data,
                "statusSave" => $cekSave
            ];
            echo json_encode($saveData);
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
        }
    }
    public function delUser($id)
    {
        $this->users->delete($id);
        $this->sesi->setFlashdata('sukses', 'Data berhasil dihapus');
        return redirect()->to('/dashboard/usermanagement');
    }

    public function getRole()
    {
       $data = $this->grole->getAll();
       return $this->response->setJSON(['data' => $data]);
    }
}