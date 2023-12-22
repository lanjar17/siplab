<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SistemModel;
use App\Models\MemberModel;
use App\Models\JadwalModel;
use App\Models\RuanganModel;


class MemberController extends BaseController
{

    protected $sistemmodel;
    protected $jadwalmodel;
    protected $membermodel;
    protected $ruanganmodel;
    public function __construct()
    {
        $this->sistemmodel = new SistemModel();
        $this->jadwalmodel = new JadwalModel();
        $this->membermodel = new MemberModel();
        $this->ruanganmodel = new RuanganModel();
    }


    public function index()
    {
        $data = [
            'ruangan' => $this->ruanganmodel->findAll(),
            'user' => $this->sistemmodel->findAll(),
            'ruangan2' => $this->ruanganmodel->getruangan(),
        ];
        return view('member/dashboard', $data);
    }

    public function formpinjam()
    {
        if ($this->request->isAjax()) {
            $item = $this->ruanganmodel->getruangan();
            
            $data = [
                'username' => $item['username'],
                'id_ruangan' => $item['id_ruangan'],
                'kode' => $item['kode'],
                'nama_ruangan' => $item['nama_ruangan'],

            ];
            $hasil = [
                'data' => view('member/formpinjam', $data),
            ];
        } else {
            exit('Data tidak dapat diload');
        }
        return $this->response->setJSON($hasil);
    }

    public function jadwalpeminjaman()
    {
        $data = [
            'user' => $this->sistemmodel->jadwal(),
        ];
        return view('member/jadwalpeminjaman', $data);
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
