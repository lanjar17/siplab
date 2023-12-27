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

    // public function login()
    // {
    //     $username = $this->request->getVar('username');
    //     $password = $this->request->getVar('password');
    //     $otentik = $this->sistemmodel->where(['username' => $username])->first();
    //     if ($otentik) {

    //         $verifikasi  = password_verify(md5($password), password_hash($otentik['password'], PASSWORD_DEFAULT));
    //         if ($verifikasi) {
    //             $sesi = [
    //                 'username'      => $otentik['username'],
    //                 'id_user'      => $otentik['id_user'],
    //                 'loggedIn'     => TRUE
    //             ];

    //             $remember = $this->request->getVar('remember-me');
    //             if (isset($remember)) {
    //                 $nama = 'username';
    //                 $nilai = $otentik['username'];
    //                 $durasi = strtotime('+7 days');
    //                 $path = "/";
    //                 setcookie($nama, $nilai, $durasi, $path);
    //             }

    //             session()->set($sesi);
    //             return redirect()->to('/admin');
    //         } else {
    //             session()->setFlashdata('pesan', 'Password salah');
    //             return redirect()->to('/otentikasi');
    //         }
    //     } else {
    //         session()->setFlashdata('pesan', 'Username tidak terdaftar!');
    //         return redirect()->to('/otentikasi');
    //     }
    // }

    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $otentik = $this->sistemmodel->where(['username' => $username])->first();
        if ($otentik) {
            $verifikasi  = password_verify(md5($password), password_hash($otentik['password'], PASSWORD_DEFAULT));
            if ($otentik['status'] == 1) {
                if ($verifikasi) {
                    $sesi = [
                        'username'      => $otentik['username'],
                        'id_user'      => $otentik['id_user'],
                        'level'         => $otentik['level'],
                        'nama_lengkap'  => $otentik['nama_lengkap'],
                        'avatar'        => $otentik['avatar'],
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
                    return redirect()->to($otentik['level']);
                } else {
                    session()->setFlashdata('pesan', 'Password salah');
                    return redirect()->to('/otentikasi');
                }
            } else {
                session()->setFlashdata('pesan', 'User '.$username.' belum aktif. Silahkan hubungi Admin');
                return redirect()->to('/otentikasi');
            }
        } else{
            session()->setFlashdata('pesan', 'Username tidak terdaftar!');
            return redirect()->to('/otentikasi');
        }
    }

    public function daftar()
    {
        $validasi = \Config\Services::validation();

        $valid = $this->validate([
            'nama_lengkap' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 4 karakter'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|min_length[5]|is_unique[users.username]',
                'errors' => [
                    'is_unique' => '{field} sudah terdaftar',
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 5 karakter'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[5]|regex_match[/^(?=.*?\d)(?=.*?[a-zA-Z])[a-zA-Z\d]+$/]',
                'errors' => [
                    'regex_match' => '{field} terdiri dari angka dan huruf',
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 10 karakter'
                ]
            ],
            'konfirmasi' => [
                'label' => 'Konfirmasi Password',
                'rules' => 'required|min_length[3]|matches[password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 10 karakter',
                    'matches' => '{field} tidak sesuai'
                ]
            ],
        ]);

        if (!$valid) {
            $alert1 =  $validasi->getError('nama_lengkap');
            $alert2 =  $validasi->getError('username');
            $alert3 =  $validasi->getError('password');
            $alert4 =  $validasi->getError('konfirmasi');

            session()->setFlashdata('eror1', $alert1);
            session()->setFlashdata('eror2', $alert2);
            session()->setFlashdata('eror3', $alert3);
            session()->setFlashdata('eror4', $alert4);

            return redirect()->to('/otentikasi');
        } else {
            if ($this->request->getFile('avatar')->getName() != '') {
                $avatar = $this->request->getFile('avatar');
                $avatar->move(ROOTPATH . 'public/img/avatar');
                $namaavatar = $avatar->getName();
            } else {
                $namaavatar = 'default.png';
            }
        }

        $data = [
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'bio' => '',
            'nip' => $this->request->getVar('nip'),
            'telepon' => $this->request->getVar('telepon'),
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),
            'avatar' => $namaavatar,
            'instansi' => $this->request->getVar('instansi'),
            'level' => 'Peminjam',
            'status' => 0
        ];

        $this->sistemmodel->save($data);

        session()->setFlashdata('sukses', 'Berhasil mendaftar member. Silahkan tunggu disetujui Admin');
        return redirect()->to('/otentikasi');
        // $pesan = [
        //     'sukses' => 'Data anggota berhasil diinput'
        // ];
        // return $this->response->setJSON($pesan);
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

    public function logout()
    {
        session()->destroy();
        $nama = 'username';
        $nilai = '';
        $durasi =  strtotime('-7 days');
        $path = '/';
        setcookie($nama, $nilai, $durasi, $path);
        
        return redirect()->to('/');
    }
}
