<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// $routes->get('/register', 'AuthRegis::index');
// $routes->post('/register', 'AuthRegis::saveRegis');
$routes->get('/login', 'AuthLogin::index');
$routes->post('/login', 'AuthLogin::cekLogin');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'role:main, client, helpdesk']);
$routes->get('/dashboard/logout', 'AuthLogin::authLogout', ['filter' => 'role:main, client,member,helpdesk']);
// dashboard

// list client
$routes->get('/dashboard/listClients', 'GroupClient::listClient', ['filter' => 'role:main']);
$routes->get('/dashboard/createClient', 'GroupClient::createClient', ['filter' => 'role:main']);
$routes->post('/dashboard/createClient', 'GroupClient::saveClient', ['filter' => 'role:main']);
$routes->get('/dashboard/editClient/(:num)', 'GroupClient::editClient/$1', ['filter' => 'role:main']);
$routes->post('/dashboard/editClient/(:num)', 'GroupClient::updateClient/$1', ['filter' => 'role:main']);
$routes->delete('/dashboard/deleteClient/(:num)', 'GroupClient::delClient/$1', ['filter' => 'role:main']);

//Mapping Client
$routes->get('/dashboard/listMap', 'MappingClient::listMap', ['filter' => 'role:main']);
$routes->get('/dashboard/editMap/(:num)', 'MappingClient::editMap/$1', ['filter' => 'role:main']);
$routes->post('/dashboard/editMap/(:num)', 'MappingClient::updateMap/$1', ['filter' => 'role:main']);
$routes->get('/dashboard/createMap', 'MappingClient::createMap', ['filter' => 'role:main']);
$routes->post('/dashboard/createMap', 'MappingClient::saveMap', ['filter' => 'role:main']);
$routes->post('/dashboard/mapping/getUserType', 'MappingClient::getUserType', ['filter' => 'role:main']);
$routes->post('/dashboard/mapping/getClients', 'MappingClient::listClientCountry', ['filter' => 'role:main']);
$routes->delete('/dashboard/deleteMap/(:num)', 'MappingClient::delMap/$1', ['filter' => 'role:main']);

//report
$routes->get('/dashboard/reportDaily', 'Report::index', ['filter' => 'role:main, client,helpdesk']);
$routes->get('/service/report/listDepo', 'Report::listDepo', ['filter' => 'role:main, client,helpdesk']);
$routes->get('/service/report/listWd', 'Report::listWd', ['filter' => 'role:main, client,helpdesk']);
$routes->post('/service/report/listSm', 'Report::listSm', ['filter' => 'role:main, client,helpdesk']);
// documentation
$routes->get('/dashboard/documentationAPI', 'Document::index', ['filter' => 'role:main, client,helpdesk']);
// log
$routes->get('/dashboard/monitoringLog', 'Monitoring::index', ['filter' => 'role:main,helpdesk']);
$routes->get('/dashboard/detailPost/(:any)', 'Monitoring::detailPost/$1', ['filter' => 'role:main,helpdesk']);
$routes->get('/dashboard/detailCallback/(:any)', 'Monitoring::detailCallback/$1', ['filter' => 'role:main,helpdesk']);
$routes->get('/dashboard/editErrorlog/(:any)', 'Monitoring::editError/$1', ['filter' => 'role:main,helpdesk']);
$routes->post('/dashboard/editErrorlog/(:any)', 'Monitoring::saveError/$1', ['filter' => 'role:main,helpdesk']);

//
$routes->get('/dashboard/listAccounts', 'VirtualAccount::index', ['filter' => 'role:main, client,helpdesk']);
$routes->get('/dashboard/createAccount', 'VirtualAccount::createAcc', ['filter' => 'role:main,helpdesk']);
$routes->post('/dashboard/createAccount', 'VirtualAccount::saveAcc', ['filter' => 'role:main,helpdesk']);
$routes->delete('/dashboard/deleteAccount/(:num)', 'VirtualAccount::delAcc/$1', ['filter' => 'role:main,helpdesk']);
$routes->get('/dashboard/editAccount/(:num)', 'VirtualAccount::detailAcc/$1', ['filter' => 'role:main, client,helpdesk']);
$routes->post('/dashboard/editAccount/(:num)', 'VirtualAccount::updateAcc/$1', ['filter' => 'role:main, client,helpdesk']);
//userm
$routes->get('/dashboard/createUser', 'UserManagement::createUser', ['filter' => 'role:main']);
$routes->post('/dashboard/createUser', 'UserManagement::saveUser', ['filter' => 'role:main']);
$routes->get('/dashboard/listUser', 'UserManagement::index', ['filter' => 'role:main']);
$routes->get('/dashboard/editUser/(:num)', 'UserManagement::editUser/$1', ['filter' => 'role:main']);
$routes->post('/dashboard/editUser/(:num)', 'UserManagement::updateUser/$1', ['filter' => 'role:main']);
$routes->delete('/dashboard/deleteUser/(:num)', 'UserManagement::delUser/$1', ['filter' => 'role:main']);

// setting profile
$routes->get('/dashboard/changePassword', 'Profile::editPassword', ['filter' => 'role:client']);
$routes->get('/dashboard/editProfile', 'Profile::index', ['filter' => 'role:client']);
$routes->post('/dashboard/editProfile', 'Profile::updateProfile', ['filter' => 'role:client']);
$routes->post('/dashboard/changePassword', 'Profile::updatePassword', ['filter' => 'role:client']);
$routes->get('/dashboard/personalKey', 'Profile::detailPersonalKey', ['filter' => 'role:client']);
//depo
$routes->get('/dashboard/listDeposit', 'Deposit::listDeposit', ['filter' => 'role:main, client,helpdesk']);
$routes->get('/dashboard/depoTransaction', 'Deposit::listTrans', ['filter' => 'role:main, client,helpdesk']);
$routes->get('/dashboard/depoPending', 'Deposit::listPending', ['filter' => 'role:main, client,helpdesk']);
$routes->get('/dashboard/depoPending/update/(:num)', 'Deposit::editPending/$1', ['filter' => 'role:main,helpdesk']);
$routes->post('/dashboard/depoPending/update/(:num)', 'Deposit::updatePending/$1', ['filter' => 'role:main,helpdesk']);
$routes->post('/dashboard/monitorDepo', 'Deposit::monitorDepo', ['filter' => 'role:main, client,helpdesk']);
$routes->post('/dashboard/monitorPending', 'Deposit::monitorPending', ['filter' => 'role:main, client,helpdesk']);
$routes->post('/dashboard/filterDate', 'Deposit::filterDate', ['filter' => 'role:main, client,helpdesk']);

//setbank
$routes->get('/dashboard/setBank', 'setBank::index', ['filter' => 'role:client']);
$routes->post('/dashboard/setBank', 'setBank::saveBank', ['filter' => 'role:client']);
$routes->get('/dashboard/setBank/update', 'setBank::indexU', ['filter' => 'role:client']);
$routes->post('/dashboard/setBank/update', 'setBank::updateBank', ['filter' => 'role:client']);

//wd
$routes->get('/dashboard/withdrawTrans', 'Withdraw::wdTrans', ['filter' => 'role:main, client,helpdesk']);
$routes->get('/dashboard/withdrawPending', 'Withdraw::listPending', ['filter' => 'role:main, client,helpdesk']);
$routes->get('/dashboard/withdrawPending/edit/(:num)', 'Withdraw::editWd/$1', ['filter' => 'role:main, client,helpdesk']);
$routes->post('/dashboard/withdrawPending/edit/(:num)', 'Withdraw::updateWd/$1', ['filter' => 'role:main, client,helpdesk']);
$routes->post('/dashboard/filterWd', 'Withdraw::filterWd', ['filter' => 'role:main, client,helpdesk']);
$routes->post('/dashboard/filterPending', 'Withdraw::filterPending', ['filter' => 'role:main, client,helpdesk']);

//settle
$routes->get('/dashboard/makeAdjustment', 'Settlement::indexSettle', ['filter' => 'role:main,helpdesk']);
$routes->get('/dashboard/createAdj', 'Settlement::createSettle', ['filter' => 'role:main,helpdesk']);
$routes->post('/dashboard/createAdj', 'Settlement::saveSettle', ['filter' => 'role:main,helpdesk']);
$routes->get('/dashboard/editAdj/(:num)', 'Settlement::editSettle/$1', ['filter' => 'role:main,helpdesk']);
$routes->post('/dashboard/editAdj/(:num)', 'Settlement::updateSettle/$1', ['filter' => 'role:main,helpdesk']);
$routes->delete('/dashboard/deleteAdj/(:num)', 'Settlement::delSettle/$1', ['filter' => 'role:main,helpdesk']);

// api
$routes->get('/dashboard/generateApis', 'GenerateApi::index', ['filter' => 'role:main']);
$routes->get('/dashboard/createApis', 'GenerateApi::createApis', ['filter' => 'role:main']);
$routes->post('/dashboard/createApis', 'GenerateApi::saveApis', ['filter' => 'role:main']);
$routes->get('/dashboard/detailApi/(:num)', 'GenerateApi::detailApi/$1', ['filter' => 'role:main']);
//

// base bank
$routes->get('/dashboard/baseBank', 'Bank::index', ['filter' => 'role:main,helpdesk']);
$routes->get('/dashboard/baseBank/create', 'Bank::createBank', ['filter' => 'role:main,helpdesk']);
$routes->post('/dashboard/baseBank/create', 'Bank::saveBank', ['filter' => 'role:main,helpdesk']);
$routes->get('/dashboard/baseBank/detail/(:any)', 'Bank::detailBank/$1', ['filter' => 'role:main,helpdesk']);
$routes->post('/dashboard/baseBank/detail/(:any)', 'Bank::updateBank/$1', ['filter' => 'role:main,helpdesk']);
//
$routes->get('/dashboard/calculateComission', 'CalcComission::indexCalc', ['filter' => 'role:main,helpdesk']);
$routes->get('/dashboard/createCom', 'CalcComission::createCalc', ['filter' => 'role:main,helpdesk']);
$routes->post('/dashboard/createCom', 'CalcComission::saveCom', ['filter' => 'role:main,helpdesk']);
$routes->get('/dashboard/editCom/(:num)', 'CalcComission::editCom/$1', ['filter' => 'role:main,helpdesk']);
$routes->post('/dashboard/editCom/(:num)', 'CalcComission::updateCom/$1', ['filter' => 'role:main,helpdesk']);
$routes->delete('/dashboard/deleteCom/(:num)', 'CalcComission::delCom/$1', ['filter' => 'role:main,helpdesk']);
$routes->post('/dashboard/simulateCom', 'CalcComission::simulateCom', ['filter' => 'role:main,helpdesk']);


$routes->get('/dashboard/hoWithdraw', 'HoWithdraw::index', ['filter' => 'role:main,helpdesk']);
$routes->get('/dashboard/hoWithdraw/edit/(:num)', 'HoWithdraw::editWdHo/$1', ['filter' => 'role:main,helpdesk']);
$routes->post('/dashboard/hoWithdraw/edit/(:num)', 'HoWithdraw::updateWdHo/$1', ['filter' => 'role:main,helpdesk']);
$routes->get('/dashboard/listHo', 'HoWithdraw::listClientHo', ['filter' => 'role:client']);
$routes->get('/dashboard/makeHo', 'HoWithdraw::reqHo', ['filter' => 'role:client']);
$routes->post('/dashboard/makeHo', 'HoWithdraw::saveHo', ['filter' => 'role:client']);
$routes->get('/dashboard/topUp', 'Topup::index', ['filter' => 'role:main,helpdesk']);
$routes->get('/dashboard/createTopup', 'Topup::createTopup', ['filter' => 'role:main,helpdesk']);
$routes->post('/dashboard/createTopup', 'Topup::saveTopup', ['filter' => 'role:main,helpdesk']);
$routes->get('/dashboard/editTopup/(:num)', 'Topup::editTopup/$1', ['filter' => 'role:main,helpdesk']);
$routes->post('/dashboard/editTopup/(:num)', 'Topup::updateTopup/$1', ['filter' => 'role:main,helpdesk']);
$routes->delete('/dashboard/deleteTopup/(:num)', 'Topup::delTopup/$1', ['filter' => 'role:main,helpdesk']);


$routes->get('/dashboard/trackingBalance', 'TrackingBalance::index', ['filter' => 'role:main,client,helpdesk']);
$routes->post('/dashboard/filter/tracking', 'TrackingBalance::filterTracking', ['filter' => 'role:main,client,helpdesk']);


//Forgot Pasword
$routes->get('/forgot-password', 'ForgotPassword::index');
$routes->post('/forgot-password', 'ForgotPassword::forgotPassword');

//Reset Password
$routes->get('/reset-password/(:segment)', 'ResetPassword::index/$1');
$routes->post('/reset-password/(:segment)', 'ResetPassword::updatePassword/$1');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
