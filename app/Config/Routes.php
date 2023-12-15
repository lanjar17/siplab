<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Guest\Guest::index');

//LOGIN
$routes->get('/otentikasi', 'Otentikasi::index'); //halaman login
$routes->get('/signup', 'Otentikasi::signup'); //form signup
$routes->post('/masuk', 'Otentikasi::login'); //fungsi login
$routes->post('/daftar', 'Otentikasi::daftar'); //fungsi daftar member

//Admin Panel
$routes->get('/admin', 'AdminController::index');
$routes->get('/newuser', 'AdminController::newuser');
$routes->get('/user', 'AdminController::user');
$routes->get('/peminjaman', 'AdminController::peminjaman');
$routes->get('/jadwal', 'AdminController::jadwal');


// User Panel

$routes->get('/member', 'MemberController::index');