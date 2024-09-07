<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Willkommen::index');

$routes->get('/surah', 'Surah::index');
$routes->get('/surah/find/(:any)', 'Surah::find/$1');
$routes->get('/surah/find', 'Surah::find');
$routes->get('/surah/viewer/(:any)', 'Surah::viewer/$1');
$routes->get('/surah/viewer', 'Surah::viewer');

$routes->get('/juz', 'Juz::index');
$routes->get('/juz/viewer', 'Juz::viewer');

$routes->get('/error404', 'Error404::index');
