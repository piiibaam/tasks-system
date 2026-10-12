<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Public pages: accessible even when logged out
$routes->get('/', 'Home::index');
$routes->get('tasks', 'Tasks::index');
$routes->get('profile', 'Profile::index');
$routes->get('about', 'About::index');

// Login and logout
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

// Protected task management actions
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('tasks/new', 'Tasks::new');
    $routes->post('tasks/create', 'Tasks::create');

    $routes->get('tasks/edit/(:num)', 'Tasks::edit/$1');
    $routes->post('tasks/update/(:num)', 'Tasks::update/$1');

    // Archive is the soft-delete action
    $routes->post('tasks/archive/(:num)', 'Tasks::archive/$1');

    // Extra feature: archived tasks
    $routes->get('archives', 'Tasks::archives');
    $routes->post('tasks/unarchive/(:num)', 'Tasks::unarchive/$1');
});