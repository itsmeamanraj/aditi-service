<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/login/auth', 'Home::auth');
$routes->get('/logout', 'Home::logout');
$routes->get('/service-list', 'Service::index');
$routes->get('/servicedetail', 'Service::servicedetail');

