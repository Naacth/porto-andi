<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true); 

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Public Routes
$routes->get('/', 'Home::index');
$routes->get('/pendidikan', 'Home::pendidikan');
$routes->get('/aktivitas', 'Home::aktivitas');

// Auth Routes
$routes->get('/login', 'Auth::login');
$routes->post('/auth/attemptLogin', 'Auth::attemptLogin');
$routes->get('/logout', 'Auth::logout');

// Admin Routes (Protected)
// Let's redefine the admin group cleanly
$routes->get('/admin', 'Admin\Dashboard::index', ['filter' => 'auth']);

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'auth'], function($routes) {
    // Dashboard (Main /admin route is handled above, but /admin/ is handled here)
    $routes->get('/', 'Dashboard::index');

    // Activities
    $routes->get('aktivitas', 'Aktivitas::index');
    $routes->get('aktivitas/create', 'Aktivitas::create');
    $routes->post('aktivitas/save', 'Aktivitas::save');
    $routes->get('aktivitas/edit/(:num)', 'Aktivitas::edit/$1');
    $routes->post('aktivitas/update/(:num)', 'Aktivitas::update/$1');
    $routes->get('aktivitas/delete/(:num)', 'Aktivitas::delete/$1');

    // Biodata
    $routes->get('biodata', 'Biodata::index');
    $routes->get('biodata/create', 'Biodata::create');
    $routes->post('biodata/save', 'Biodata::save');
    $routes->get('biodata/edit/(:num)', 'Biodata::edit/$1');
    $routes->post('biodata/update/(:num)', 'Biodata::update/$1');
    
    // Pendidikan
    $routes->get('pendidikan', 'Pendidikan::index');
    $routes->get('pendidikan/create', 'Pendidikan::create');
    $routes->post('pendidikan/save', 'Pendidikan::save');
    $routes->get('pendidikan/edit/(:num)', 'Pendidikan::edit/$1');
    $routes->post('pendidikan/update/(:num)', 'Pendidikan::update/$1');
    $routes->get('pendidikan/delete/(:num)', 'Pendidikan::delete/$1');
});


if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
