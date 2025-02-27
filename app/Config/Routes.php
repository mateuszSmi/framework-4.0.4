<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->match(['get', 'post'], 'news/create', 'News::create');
$routes->match(['post'], 'news/delete', 'News::delete');

$routes->match(['post'], 'news/update', 'News::update');
$routes->get('news/update/(:segment)', 'News::update/$1', ['as' => 'updatenews']);

$routes->get('news/(:segment)', 'News::view/$1');
$routes->get('news/delete/(:segment)', 'News::delete/$1', ['as' => 'delnews']);
$routes->get('/', 'News::index', ['as' => 'aktualnosci_1']);
$routes->get('news', 'News::index');
$routes->get('onas', 'Onas::index', ['as' => 'onas']);
$routes->get('onas/(:segment)', 'Onas::view/$1');
$routes->get('(:any)', 'Pages::view/$1');

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}