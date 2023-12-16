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
$routes->get('/keluar', 'Otentikasi::logout'); //fungsi logout

//Admin Panel
$routes->get('/Admin', 'AdminController::index');

$routes->get('/newuser', 'AdminController::newuser');
$routes->get('/newuserdata', 'AdminController::getDatanewuser'); //Ajax newuser
$routes->put('/terima/(:segment)', 'AdminController::accuser/$1'); //fungsi terima user
$routes->delete('/tolak/(:segment)', 'AdminController::disaccuser/$1'); //fungsi tolak user

$routes->get('/user', 'AdminController::user');
$routes->get('/userdata', 'AdminController::getDatauser'); //Ajax newuser
$routes->delete('/hapus/(:segment)', 'AdminController::deleteuser/$1'); //fungsi hapus user


$routes->get('/peminjaman', 'AdminController::peminjaman');
$routes->get('/jadwal', 'AdminController::jadwal');



// User Panel

$routes->get('/Peminjam', 'MemberController::index');