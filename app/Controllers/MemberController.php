<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SistemModel;
use App\Models\MemberModel;
use App\Models\JadwalModel;
use App\Models\RuanganModel;
use App\Models\PeminjamanModel;
use CodeIgniter\I18n\Time;



class MemberController extends BaseController
{

    protected $sistemmodel;
    protected $jadwalmodel;
    protected $membermodel;
    protected $ruanganmodel;
    protected $peminjamanmodel;
    private $session = null;

    public function __construct()
    {
        $this->sistemmodel = new SistemModel();
        $this->jadwalmodel = new JadwalModel();
        $this->membermodel = new MemberModel();
        $this->ruanganmodel = new RuanganModel();
        $this->peminjamanmodel = new PeminjamanModel();
    }


    public function index()
    {
        $this->session = session();
        $nama = $this->session->get('nama_lengkap');
        $username = $this->session->get('username');
        $data = [
            'ruangan' => $this->ruanganmodel->findAll(),
            'user' => $this->sistemmodel->findAll(),
            'ruangan2' => $this->ruanganmodel->getruangan(),
            'nama' => $nama,
            'username' => $username
        ];
        return view('member/dashboard', $data);
    }


    public function formpinjam($id_ruangan)
    {

        if ($this->request->isAjax()) {
            $this->session = session();
            $item = $this->ruanganmodel->getruangan($id_ruangan);
            $member = $this->session->get('username');
            $id_user = $this->session->get('id_user');
            $data = [
                'ruang' => $item,
                'user' => $member,
                'id_user'   => $id_user
                // 'id_ruangan' => $item['id_ruangan'],
                // 'kode' => $item['kode'],
                // 'nama_ruangan' => $item['nama_ruangan'],

            ];
            $hasil = [
                'data' => view('member/formpinjam', $data),
            ];
        } else {
            exit('Data tidak dapat diload');
        }
        return $this->response->setJSON($hasil);
    }

    public function pinjam()
    {

        $input = [
            'id_peminjam' => NULL,
            'id_user' => $this->request->getVar('id_user'),
            'id_ruangan' => $this->request->getVar('id_ruangan'),
            'jam_mulai' => $this->request->getVar('jam_mulai'),
            'jam_berakhir' => $this->request->getVar('jam_berakhir'),
            'tanggal' => $this->request->getVar('tanggal'),
        ];
        $this->peminjamanmodel->save($input);
        session()->setFlashdata('ahai', 'Berhasil meminjam, silahkan tunggu disetujui admin');
        return redirect()->to('Peminjam');
    }

    public function jadwalpeminjaman()
    {
        $this->session = session();
        $nama = $this->session->get('nama_lengkap');
        $username = $this->session->get('username');
        $data = [
            'user' => $this->sistemmodel->jadwal(),
            'nama'  => $nama,
            'username' => $username
        ];
        return view('member/jadwalpeminjaman', $data);
    }

    public function profil()
    {
        $this->session = session();
        $nama = $this->session->get('nama_lengkap');
        $username = $this->session->get('username');
        $id = $this->session->get('id_user');
        $data = [
            'nama'  => $nama,
            'username' => $username,
            'id_user' => $id
        ];
        return view('member/profil', $data);
    }

    public function profilUser($id_user)
    {

        $this->session = session();
        $nama = $this->session->get('nama_lengkap');
        $username = $this->session->get('username');
        $user = $this->sistemmodel->find($id_user);
        $data = [

            'nama'  => $nama,
            'username' => $username,
            'item' => $user
        ];
        return view('member/profilpeminjam', $data);
    }

    // public function profilUserdata($id_user)
    // {
    //     if ($this->request->isAjax()) {
    //         $this->session = session();
    //         $nama = $this->session->get('nama_lengkap');
    //         $username = $this->session->get('username');
    //         $user = $this->sistemmodel->find($id_user);
    //         $data = [

    //             'nama'  => $nama,
    //             'username' => $username,
    //             'item' => $user
    //         ];
    //         $hasil = [
    //             'data' => view('member/profildata', $data),
    //         ];
    //     } else {
    //         exit('Data tidak dapat diload');
    //     }
    //     return $this->response->setJSON($hasil);
    // }

    public function editprofil($id_user)
    {
        if ($this->request->isAJAX()) {
            $item = $this->sistemmodel->find($id_user);
            $data = [
                'id_user' => $item['id_user'],
                'nama_lengkap' => $item['nama_lengkap'],
                'nip' => $item['nip'],
                'telepon' => $item['telepon'],
                'avatar' => $item['avatar']
            ];
            $hasil = [
                'data' => view('member/profilpeminjamedit', $data)
            ];
            return $this->response->setJSON($hasil);
        } else {
            exit('data tidak dapat diload');
        }
    }

    public function updateprofil($id_user)
    {
        $validasi = \Config\Services::validation();
        $valid = $this->validate([
            'nama_lengkap' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 3 karakter'
                ]
            ]
        ]);
        if (!$valid) {
            // $pesan = [
            //     'error' => [
            //         'nama_lengkap' => $validasi->getError('nama_lengkap'),
            //     ]
            // ];
            // session()->setFlashdata('yes', $pesan);
            $alert1 =  $validasi->getError('nama_lengkap');
            session()->setFlashdata('eror1', $alert1);
            return redirect()->to('/profiluser/' . $id_user);
        } else {
            $nama = $this->request->getVar('nama_lengkap');
            if ($this->request->getFile('avatar')->getName() != '') {
                $avatar = $this->request->getFile('avatar');
                $namaavatar = $avatar->getRandomName();
                $avatar->move(ROOTPATH . 'public/img/avatar', $namaavatar);
            } else {
                $namaavatar = $this->request->getVar('avalama');
            }

            $input = [
                'id_user' => $id_user,
                'nama_lengkap' => $nama,
                'nip' => $this->request->getVar('nip'),
                'telepon' => $this->request->getVar('telepon'),
                'avatar' => $namaavatar
            ];
            $this->sistemmodel->save($input);
            session()->setFlashdata('yes', 'Profil berhasil diupdate');
            return redirect()->to('/profiluser/' . $id_user);
            // $pesan = [
            //     'sukses' => 'Profil berhasil diupdate, silahkan refresh'
            // ];
            // return $this->response->setJSON($pesan);
        }
    }

    // public function jadwalpeminjaman()
    // {
    //     $this->request->isAJAX();

    //         $data = [
    //             'user' => $this->sistemmodel->jadwal(),
    //         ];
    //         $hasil = [
    //             'data' => view('member/jadwalpeminjaman', $data)
    //         ];
    //     // echo json_encode($hasil);
    //     return $this->response->setJSON($hasil);
    //     }


}
