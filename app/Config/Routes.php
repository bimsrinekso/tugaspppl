<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->get('/regist', 'Login::regist');
$routes->post('/regist', 'Login::saveRegist');
$routes->post('/login', 'Login::cekLogin');
$routes->get('/logout', 'Login::isLogout');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'role:admin,kasir']);
// general
$routes->post('/dashboard/getbalancecategory', 'BalanceCategory::getBalanceCat');

// product
$routes->get('/dashboard/product', 'Product::index', ['filter' => 'role:admin']);
$routes->post('/dashboard/getproduct', 'Product::getDataPr', ['filter' => 'role:admin']);
$routes->get('/dashboard/getsingleproduct/(:num)', 'Product::getDataSinglePr/$1', ['filter' => 'role:admin']);
$routes->post('/dashboard/updateProduct', 'Product::updateProduct', ['filter' => 'role:admin']);
$routes->post('/dashboard/svproduct', 'Product::svProduct', ['filter' => 'role:admin']);
$routes->delete('/dashboard/deleteproduct/(:num)', 'Product::delPr/$1', ['filter' => 'role:admin']);

// pos
$routes->get('/dashboard/pos', 'Pos::index', ['filter' => 'role:admin,kasir']);

// tracking balance
$routes->get('/dashboard/trackingbalance', 'TrackingBalance::index', ['filter' => 'role:admin']);

// balance
$routes->get('/dashboard/balance', 'Balance::index', ['filter' => 'role:admin']);
$routes->post('/dashboard/svbalance', 'Balance::svBlc', ['filter' => 'role:admin']);
$routes->post('/dashboard/getbalance', 'Balance::getDataBlc', ['filter' => 'role:admin']);
$routes->get('/dashboard/getsingleblc/(:num)', 'Balance::getDataSingleBlc/$1', ['filter' => 'role:admin']);
$routes->post('/dashboard/updateBalance', 'Balance::updateBlc', ['filter' => 'role:admin']);
$routes->delete('/dashboard/deletebalance/(:num)', 'Balance::delBlc/$1', ['filter' => 'role:admin']);
// menu category
$routes->get('/dashboard/menucategory', 'MenuCategory::index', ['filter' => 'role:admin']);
$routes->post('/dashboard/getmenucat', 'MenuCategory::getMenuCat', ['filter' => 'role:admin']);
$routes->get('/dashboard/getsinglecatmenu/(:num)', 'MenuCategory::getSingleCatMenu/$1', ['filter' => 'role:admin']);
$routes->post('/dashboard/updateCatMenu', 'MenuCategory::updateCatMenu', ['filter' => 'role:admin']);
$routes->post('/dashboard/svcatmenu', 'MenuCategory::svCatMenu', ['filter' => 'role:admin']);
$routes->delete('/dashboard/deletecatmenu/(:num)', 'MenuCategory::delCatMenu/$1', ['filter' => 'role:admin']);

// balance category
$routes->get('/dashboard/balancecategory', 'BalanceCategory::index', ['filter' => 'role:admin']);
$routes->post('/dashboard/getblccat', 'BalanceCategory::getBlcCat', ['filter' => 'role:admin']);
$routes->get('/dashboard/getsinglecatblc/(:num)', 'BalanceCategory::getSingleCatBlc/$1', ['filter' => 'role:admin']);
$routes->post('/dashboard/updateCatBlc', 'BalanceCategory::updateCatBlc', ['filter' => 'role:admin']);
$routes->post('/dashboard/svcatblc', 'BalanceCategory::svCatBlc', ['filter' => 'role:admin']);
$routes->delete('/dashboard/deletecatblc/(:num)', 'BalanceCategory::delCatBlc/$1', ['filter' => 'role:admin']);

// user management
$routes->get('/dashboard/usermanagement', 'UserManagement::index', ['filter' => 'role:admin']);
$routes->post('/dashboard/getuser', 'UserManagement::getDataUser', ['filter' => 'role:admin']);
$routes->post('/dashboard/adduser', 'UserManagement::svUsers', ['filter' => 'role:admin']);
$routes->get('/dashboard/getsingleuser/(:num)', 'UserManagement::getDataSingleUser/$1', ['filter' => 'role:admin']);
$routes->post('/dashboard/updateuser', 'UserManagement::updateUser', ['filter' => 'role:admin']);
$routes->delete('/dashboard/deleteUser/(:num)', 'UserManagement::delUser/$1', ['filter' => 'role:admin']);