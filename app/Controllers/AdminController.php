<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SistemModel;
use App\Models\JadwalModel;

class AdminController extends BaseController
{
    protected $sistemmodel;
    protected $jadwalmodel;
    public function __construct()
    {
        $this->sistemmodel = new SistemModel();
        $this->jadwalmodel = new JadwalModel();
    }

    public function index() :string
    {
        $data = [
            'count' => $this->sistemmodel->countbelumDiterima()
        ];
        return view('admin/dashboard', $data);
    }

    //NEW USER
    public function newuser()
    {
        $data = [
            'user' => $this->sistemmodel->belumDiterima(),
            'count' => $this->sistemmodel->countbelumDiterima()
        ];

        return view('admin/newuser', $data);
    }

    public function getDatanewuser()
    {
        if ($this->request->isAJAX()) {
            
            $data = [
                'user' => $this->sistemmodel->belumDiterima(),
            ];
            $hasil = [
                'data' => view('admin/newuserdata', $data)
            ];
            // echo json_encode($hasil);
        } else {
            exit('Data tidak dapat diakses :p');
        }
        return $this->response->setJSON($hasil);
    }

    public function accuser($id_user)
    {
        $input = [
            'id_user' => $id_user,
            'status' => "1"
        ];

        $this->sistemmodel->save($input);

        $pesan = [
            'sukses' => 'User diterima'
        ];
        return $this->response->setJSON($pesan);
        // if ($this->request->isAjax()) {
        //     $input = [
        //         'id_users' => $id_user,
        //         'status' => '1'
        //     ];
        //     $this->sistemmodel->save($input);
        //     $pesan = [
        //         'sukses' => 'User diterima'
        //     ];
        // } else {
        //     exit('tidak dapat memproses data');
        // }
        // return $this->response->setJSON($pesan);
    }

    public function disaccuser($id_user)
    {
        if ($this->request->isAjax()) {
            $this->sistemmodel->delete($id_user);
            $pesan = ['sukses' => "User ditolak"];
        } else {
            exit('tidak dapat memproses data');
        }
        return $this->response->setJSON($pesan);
    }
    //END NEW USER


    //USER (KELOLA USER)
    public function user()
    {
        $data = [
            'user' => $this->sistemmodel->findAll(),
            'count' => $this->sistemmodel->countbelumDiterima()
        ];
        return view('admin/user', $data);
    }

    public function getDatauser()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'user' => $this->sistemmodel->findAll(),
            ];
            $hasil = [
                'data' => view('admin/userdata', $data)
            ];
            // echo json_encode($hasil);
        } else {
            exit('Data tidak dapat diakses :p');
        }
        return $this->response->setJSON($hasil);
    }

    public function deleteuser($id_user)
    {
        if ($this->request->isAjax()) {
            $this->sistemmodel->delete($id_user);
            $pesan = ['sukses' => "User berhasil dihapus"];
        } else {
            exit('tidak dapat memproses data');
        }
        return $this->response->setJSON($pesan);
    }
    //END KELOLA USER


    //request peminjam
    public function request()
    {
        $data = [
            'user' => $this->sistemmodel->request(),
            'count' => $this->sistemmodel->countbelumDiterima()
        ];

        return view('admin/request', $data);
    }

    public function getDatarequest()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'user' => $this->sistemmodel->request(),
            ];
            $hasil = [
                'data' => view('admin/requestdata', $data)
            ];
            // echo json_encode($hasil);
        } else {
            exit('Data tidak dapat diakses :p');
        }
        return $this->response->setJSON($hasil);
    }

    public function accpeminjaman($id_user)
    {
        $input = [
            'id_user' => $id_user,
            'status' => "1"
        ];

        $this->sistemmodel->save($input);

        $pesan = [
            'sukses' => 'User diterima'
        ];
        return $this->response->setJSON($pesan);
        // if ($this->request->isAjax()) {
        //     $input = [
        //         'id_users' => $id_user,
        //         'status' => '1'
        //     ];
        //     $this->sistemmodel->save($input);
        //     $pesan = [
        //         'sukses' => 'User diterima'
        //     ];
        // } else {
        //     exit('tidak dapat memproses data');
        // }
        // return $this->response->setJSON($pesan);
    }

    public function disaccpeminjaman($id_user)
    {
        if ($this->request->isAjax()) {
            $this->sistemmodel->delete($id_user);
            $pesan = ['sukses' => "User ditolak"];
        } else {
            exit('tidak dapat memproses data');
        }
        return $this->response->setJSON($pesan);
    }

    // END REQUEST

    // Jadwal
    public function jadwal()
    {
        $data = [
            'user' => $this->sistemmodel->jadwal(),
            'count' => $this->sistemmodel->countbelumDiterima()
        ];
        return view('admin/jadwal', $data);
    }

    public function getDatajadwal()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'user' => $this->sistemmodel->jadwal(),
            ];
            $hasil = [
                'data' => view('admin/jadwaldata', $data)
            ];
            // echo json_encode($hasil);
        } else {
            exit('Data tidak dapat diakses :p');
        }
        return $this->response->setJSON($hasil);
    }

    public function aturJadwal($aksi, $id_jadwal)
    {
        if ($aksi = 3){
            $this->sistemmodel->save('jadwal', ['status_jadwal' => 3], ['id_jadwal' => $id_jadwal]);
            return redirect()->to('admin/jadwal');
        } elseif ($aksi = 1) {
            $this->sistemmodel->save('jadwal', ['status_jadwal' => 1], ['id_jadwal' => $id_jadwal]);
            session()->set_flashdata('message', '<div class="alert alert-success" role="alert">Jadwal dihapus!</div>');
            return redirect()->to('admin/jadwal', 'refresh');
        }
    }
    public function hapusJadwal($aksi, $id_jadwal)
    {

        if ($aksi = 0) {
            $cek = $this->sistemmodel->hapusJadwal($aksi, $id_jadwal);

            $id_peminjaman = $cek['id_peminjaman'];
            $id = ['id_peminjaman' => $id_peminjaman];
            $this->sistemmodel->delete('peminjaman', $id);
            $this->sistemmodel->delete('jadwal', ['id_jadwal' => $id_jadwal]);

            session()->set_flashdata('message', '<div class="alert alert-success" role="alert">Jadwal dihapus!</div>');
            redirect('admin/jadwal');
        }
        // } elseif ($aksi = 3) {
        //     $this->sistemmodel->save('jadwal', ['status_jadwal' => 3], ['id_jadwal' => $id_jadwal]);
        //     redirect('admin/jadwal');
        // } elseif ($aksi = 1) {
        //     $this->sistemmodel->save('jadwal', ['status_jadwal' => 1], ['id_jadwal' => $id_jadwal]);
        //     session()->set_flashdata('message', '<div class="alert alert-success" role="alert">Jadwal dihapus!</div>');
        //     redirect('admin/jadwal', 'refresh');
        // }
    }




}
