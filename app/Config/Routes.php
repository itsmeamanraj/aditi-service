<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/login/auth', 'Home::auth');
$routes->get('/logout', 'Home::logout');
$routes->get('/service-list', 'Service::index');
$routes->get('/servicedetail/(:num)', 'Service::servicedetail/$1');

//admin routes
$routes->get('admin', 'Admin\AdminHome::index');
$routes->post('admin/login/auth', 'Admin\AdminHome::auth');
$routes->get('admin/logout', 'Admin\AdminHome::logout');
$routes->get('admin/dashboard', 'Admin\AdminHome::dashboard');
$routes->get('admin/create-user', 'Admin\AdminHome::create_user');
$routes->post('admin/save-user', 'Admin\AdminHome::save_user');
$routes->get('admin/edit-user/(:num)', 'Admin\AdminHome::edit_user/$1');
$routes->get('admin/delete-user/(:num)', 'Admin\AdminHome::delete_user/$1');
$routes->get('admin/create-tab(?:/(:num))?', 'Admin\AdminHome::create_tab/$1');
$routes->post('admin/edit-user', 'Admin\AdminHome::edit_user');
$routes->get('admin/delete-user/(:num)', 'Admin\AdminHome::delete_user/$1');


//services routes
$routes->get('admin/services/edit-services/(:num)', 'Admin\Service::edit_services/$1');
$routes->get('admin/services/edit-tab-services/(:num)/(:num)', 'Admin\Service::edit_tab_services/$1/$2');
$routes->get('admin/services/delete-service/(:num)', 'Admin\Service::delete_service/$1');
$routes->post('admin/services/edit-service-list', 'Admin\Service::edit_service_list');
$routes->post('admin/services/save_service_detailed', 'Admin\Service::save_service_detailed');
$routes->post('admin/services/save-service', 'Admin\Service::save_service');


//create-tab
$routes->post('admin/save-tab', 'Admin\AdminHome::save_tab');
$routes->post('admin/edit-tab', 'Admin\AdminHome::edit_tab');
$routes->get('admin/delete-tab/(:num)', 'Admin\AdminHome::delete_tab/$1');


