<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'welcome');
$routes->get('notfound', 'Auth::notfound');






// Admin - Manage Data
$routes->group('admin', ['filter' => 'role:1'], function ($routes) {
	$routes->get('manage-user', 'Admin\ManageUser::index');
	$routes->get('manage-user/un-verified', 'Admin\ManageUser::user_unverified');

	$routes->get('manage-user/(:any)', 'Admin\ManageUser::detail/$1');
	$routes->put('manage-user/user_activation', 'Admin\ManageUser::user_activation');
	$routes->delete('manage-user/hard_delete', 'Admin\ManageUser::hard_delete');

	// Articles
	$routes->get('articles', 'Admin\ArticleController::index');
    $routes->get('articles/create', 'Admin\ArticleController::create');
    $routes->post('articles/store', 'Admin\ArticleController::store');
    $routes->get('articles/edit/(:num)', 'Admin\ArticleController::edit/$1');
    $routes->post('articles/update/(:num)', 'Admin\ArticleController::update/$1');
	$routes->delete('articles/hard_delete/(:num)', 'Admin\ArticleController::hard_delete/$1');

	// organisasi
	$routes->get('organization', 'Admin\OrganizationController::index');
	$routes->get('organization/create', 'Admin\OrganizationController::create');
	$routes->post('organization/store', 'Admin\OrganizationController::store');
	$routes->get('organization/edit/(:num)', 'Admin\OrganizationController::edit/$1');
	$routes->post('organization/update/(:num)', 'Admin\OrganizationController::update/$1');
	$routes->delete('organization/hard_delete', 'Admin\OrganizationController::hard_delete');

	// Route Kas RW
	$routes->get('keuangan_rw', 'KeuanganRWController::index');
	$routes->get('keuangan_rw/create', 'KeuanganRWController::create');
	$routes->post('keuangan_rw/store', 'KeuanganRWController::store');
	$routes->get('keuangan_rw/edit/(:num)', 'KeuanganRWController::edit/$1');
	$routes->post('keuangan_rw/update/(:num)', 'KeuanganRWController::update/$1');
	$routes->delete('keuangan_rw/hard_delete', 'KeuanganRWController::hard_delete');

	// Route Todos
	$routes->get('todo', 'TodoController::index');
	$routes->get('todo/create', 'TodoController::create');
	$routes->post('todo/store', 'TodoController::store');
	$routes->post('todo/update/(:num)', 'TodoController::update/$1');
	$routes->get('todo/edit/(:num)', 'TodoController::edit/$1');
	$routes->post('todo/delete/(:num)', 'TodoController::delete/$1');

	// Route Data Warga
	$routes->get('warga', 'WargaController::index');
	$routes->get('warga/create', 'WargaController::create');
	$routes->post('warga/store', 'WargaController::store');
	$routes->get('warga/edit/(:num)', 'WargaController::edit/$1');
	$routes->post('warga/update/(:num)', 'WargaController::update/$1');
	$routes->post('warga/delete/(:num)', 'WargaController::delete/$1');


});

// Admin - Pengaduan
$routes->group('admin', ['filter' => 'role:1,2'], function ($routes) {
	$routes->get('pengaduan', 'Admin\Pengaduan::index');
	$routes->get('pengaduan/masuk', 'Admin\Pengaduan::pengaduan_masuk');
	$routes->get('pengaduan/(:num)', 'Pengaduan::detail/$1');
	$routes->get('pengaduan/di-proses', 'Admin\Pengaduan::pengaduan_diproses');
	$routes->get('pengaduan/selesai', 'Admin\Pengaduan::pengaduan_diselesaikan');
	$routes->delete('pengaduan/(:num)', 'Admin\Pengaduan::soft_delete/$1');
	$routes->put('pengaduan/(:num)', 'Admin\Pengaduan::approval/$1');

});



// user pengaduan
$routes->get('pengaduan', 'Pengaduan::index', ['filter' => 'role:3']);
$routes->get('pengaduan/(:num)', 'Pengaduan::detail/$1', ['filter' => 'role:3']);
$routes->delete('pengaduan/(:num)', 'Pengaduan::soft_delete/$1', ['filter' => 'role:3']);

// user pengajuan
$routes->get('pengajuan', 'Pengajuan::index', ['filter' => 'role:3']);
$routes->get('pengajuan/(:num)', 'Pengajuan::detail/$1', ['filter' => 'role:3']);
$routes->delete('pengajuan/(:num)', 'Pengajuan::soft_delete/$1', ['filter' => 'role:3']);

$routes->get('user/ubah-password', 'User::ubah_password');

// user article

$routes->get('articles', 'showPost\showPost::index');
$routes->get('articles/(:num)', 'showPost\showPost::show/$1');

// user organisasi

$routes->get('organizations', 'ShowStruktur\ShowStruktur::index');
$routes->get('organizations/(:num)', 'ShowStruktur\ShowStruktur::show/$1');

// app/config/Routes.php
$routes->get('keuangan_rw', 'KeuanganRWController::index');
$routes->get('data_warga_rw', 'DataWargaRWController::index');


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
