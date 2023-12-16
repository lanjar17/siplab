<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SistemModel;

class AdminController extends BaseController
{
    protected $sistemmodel;
    public function __construct()
    {
        $this->sistemmodel = new SistemModel();
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

    public function jadwal()
    {
        $data = [
            'user' => $this->sistemmodel->findAll(),
            'count' => $this->sistemmodel->countbelumDiterima()
        ];
        return view('admin/jadwal', $data);
    }




}
