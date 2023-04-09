<?php namespace App\Filters;
 
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AsyncModel;
class RoleManage implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        } else {
            $async = new AsyncModel();
            $userid = session()->get('userid');
            $dataBody = [
                'userid' => $userid
            ];
            $enp = 'api/cekSelf';
            $posData = $async->post($enp, '', $dataBody);
            $isRole = $posData->response->role;
            if(in_array($isRole, $arguments)){
                return;
            }else{
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }    
        }
    }
 
    //--------------------------------------------------------------------
 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
