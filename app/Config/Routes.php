<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Guest\Guest::index', ['filter' => 'noauth']);

//LOGIN
$routes->get('/otentikasi', 'Otentikasi::index', ['filter' => 'logauth']); //halaman login
$routes->get('/signup', 'Otentikasi::signup'); //form signup
$routes->post('/masuk', 'Otentikasi::login'); //fungsi login
$routes->post('/daftar', 'Otentikasi::daftar'); //fungsi daftar member
$routes->get('/keluar', 'Otentikasi::logout'); //fungsi logout

//Admin Panel
$routes->get('/Admin', 'AdminController::index', ['filter' => 'auth']);

$routes->get('/newuser', 'AdminController::newuser');
$routes->get('/newuserdata', 'AdminController::getDatanewuser'); //Ajax newuser
$routes->put('/terima/(:segment)', 'AdminController::accuser/$1'); //fungsi terima user
$routes->delete('/tolak/(:segment)', 'AdminController::disaccuser/$1'); //fungsi tolak user

$routes->get('/user', 'AdminController::user');
$routes->get('/userdata', 'AdminController::getDatauser'); //Ajax newuser
$routes->delete('/hapus/(:segment)', 'AdminController::deleteuser/$1'); //fungsi hapus user


$routes->get('/peminjaman', 'AdminController::request');
$routes->get('/requestdata', 'AdminController::getDatarequest'); //Ajax request peminjaman
$routes->post('/terimapeminjaman/(:any)', 'AdminController::accpeminjaman/$1'); //fungsi terima pinjam
$routes->delete('/tolakpeminjaman/(:segment)', 'AdminController::disaccpeminjaman/$1'); //fungsi tolak pinjam

$routes->get('/jadwal', 'AdminController::jadwal');
$routes->get('/jadwaldata', 'AdminController::getDatajadwal');
$routes->delete('/hapusjadwal/(:segment)', 'AdminController::hapusjadwal/$1');

$routes->get('/ruangan', 'AdminController::ruangan');
$routes->get('/ubahruangan/(:segment)', 'AdminController::ubahruangan/$1');


// Member Panel
$routes->get('/Peminjam', 'MemberController::index', ['filter' => 'auth']);
$routes->get('/formpinjam/(:segment)', 'MemberController::formpinjam/$1'); //tampil form pinjam
$routes->post('/pinjam', 'MemberController::pinjam'); //pinjam

$routes->get('/jadwalpeminjaman', 'MemberController::jadwalpeminjaman'); //tampil Jadwal
$routes->get('/profilpeminjam', 'MemberController::profil'); //halaman profil
$routes->get('/profiluser/(:segment)', 'MemberController::profilUser/$1'); //halaman panel detail user
$routes->get('/profildata/(:segment)', 'MemberController::profilUserdata/$1'); //data detail user
$routes->get('/editprofil/(:segment)', 'MemberController::editprofil/$1'); // tampil form edit user
$routes->put('/editprofil/updateprofil/(:segment)', 'MemberController::updateprofil/$1'); //fungsi ubah user

