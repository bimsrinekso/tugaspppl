<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\UsersModel;
use App\Models\ProductModel;
use App\Models\CategoryProductModel;
use App\Models\TrackingBalanceModel;
use App\Models\BalanceCategoryModel;
use App\Models\BalanceTypeModel;
use App\Models\BalanceModel;
use App\Models\trxModel;
/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    public function __construct(){
        $this->sesi = session();
        $this->response = service('response');
        $this->valid = \Config\Services::validation();
        $this->gambar = \Config\Services::image();
        $this->trxID = new trxModel();
        $this->users = new UsersModel();
        $this->product = new ProductModel();
        $this->catpr = new CategoryProductModel();
        $this->trxblc = new TrackingBalanceModel();
        $this->catblc = new BalanceCategoryModel();
        $this->typeblc = new BalanceTypeModel();
        $this->blc = new BalanceModel();
	}
    protected function sanitizeFilename(string $filename): string
    {
        $filename = preg_replace('/[^a-zA-Z0-9\._-]/', '', $filename);
        return $filename;
    }
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['own_helper', 'form'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
}
