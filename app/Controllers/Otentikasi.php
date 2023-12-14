<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SistemModel;

class Otentikasi extends BaseController
{
    protected $sistemmodel;
    public function __construct()
    {
        $this->sistemmodel = new SistemModel();
    }

    public function index()
    {
        return view("login");
    }

    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $otentik = $this->sistemmodel->where(['username' => $username])->first();
        if ($otentik) {

            $verifikasi  = password_verify(md5($password), password_hash($otentik['password'], PASSWORD_DEFAULT));
            if ($verifikasi) {
                $sesi = [
                    'username'      => $otentik['username'],
                    'id_user'      => $otentik['id_user'],
                    'loggedIn'     => TRUE
                ];

                $remember = $this->request->getVar('remember-me');
                if (isset($remember)) {
                    $nama = 'username';
                    $nilai = $otentik['username'];
                    $durasi = strtotime('+7 days');
                    $path = "/";
                    setcookie($nama, $nilai, $durasi, $path);
                }

                session()->set($sesi);
                return redirect()->to('/admin');
            } else {
                session()->setFlashdata('pesan', 'Password salah');
                return redirect()->to('/otentikasi');
            }
        } else {
            session()->setFlashdata('pesan', 'Username tidak terdaftar!');
            return redirect()->to('/otentikasi');
        }
    }

    public function signup()
    {
        if ($this->request->isAjax()) {
            $hasil = ['data' => view('signup')];
        } else {
            exit('Data tidak dapat diload');
        }
        return $this->response->setJSON($hasil);
    }
}
