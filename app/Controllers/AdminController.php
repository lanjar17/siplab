<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SistemModel;
use App\Models\JadwalModel;
use App\Models\PeminjamanModel;
use App\Models\RuanganModel;

class AdminController extends BaseController
{
    protected $sistemmodel;
    protected $jadwalmodel;
    protected $peminjamanmodel;
    protected $ruanganmodel;
    private $session = null;
    public function __construct()
    {
        $this->sistemmodel = new SistemModel();
        $this->jadwalmodel = new JadwalModel();
        $this->peminjamanmodel = new PeminjamanModel();
        $this->ruanganmodel = new RuanganModel();
    }

    public function index(): string
    {
        $this->session = session();
        $nama = $this->session->get('nama_lengkap');
        $data = [
            'count' => $this->sistemmodel->countbelumDiterima(),
            'nama' => $nama
        ];
        return view('admin/dashboard', $data);
    }

    //NEW USER
    public function newuser()
    {
        $this->session = session();
        $nama = $this->session->get('nama_lengkap');
        $data = [
            'user' => $this->sistemmodel->belumDiterima(),
            'count' => $this->sistemmodel->countbelumDiterima(),
            'nama'  => $nama
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
        $this->session = session();
        $nama = $this->session->get('nama_lengkap');
        $data = [
            'user' => $this->sistemmodel->findAll(),
            'count' => $this->sistemmodel->countbelumDiterima(),
            'nama'  => $nama
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
        $this->session = session();
        $nama = $this->session->get('nama_lengkap');
        $data = [
            'user' => $this->sistemmodel->request(),
            'count' => $this->sistemmodel->countbelumDiterima(),
            'nama'  => $nama
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

    public function accpeminjaman($id_peminjaman)
    {

        $cekpeminjaman = $this->peminjamanmodel->find($id_peminjaman);
        $nowtime = strtotime(date('H:i:s')) + strtotime(date('Y-m-d'));
        $dbstart = strtotime($cekpeminjaman['jam_mulai']) + strtotime($cekpeminjaman['tanggal']);
        $dbend = strtotime($cekpeminjaman['jam_berakhir']) + strtotime($cekpeminjaman['tanggal']);
        if ($nowtime >= $dbstart and $nowtime <= $dbend) {
            $ruangan = $cekpeminjaman['id_ruangan'];
            $cek = $this->jadwalmodel->cektersedia();
            $cekjadwal = $this->jadwalmodel->query('SELECT * FROM jadwal INNER JOIN peminjaman, ruangan 
			WHERE jadwal.id_peminjaman=peminjaman.id_peminjaman
			AND peminjaman.id_ruangan=ruangan.id_ruangan
			AND status_jadwal=1
			AND peminjaman.id_ruangan=' . $ruangan)->getResultArray();
            // $cekjadwal = $cek . $ruangan;

            if ($cekjadwal) {
                $pesan = [
                    'sukses' => 'Gagal diterima, jadwal bentrok!'
                ];
                return $this->response->setJSON($pesan);
            } else {
                $inputruangan = [
                    'status_ruangan' => 'Dipakai',
                    'id_ruangan' => $cekpeminjaman['id_ruangan']
                ];
                
                $inputpeminjaman = [
                    'status_peminjaman' => 1,
                    'id_peminjaman' => $id_peminjaman
                ];
                
                $inputjadwal = [
                    'id_jadwal' => null,
                    'id_peminjaman' => $id_peminjaman,
                    'status_jadwal' => 1
                ];
                $pesan = [
                    'sukses' => 'Request Diterima'
                ];
                $this->ruanganmodel->save($inputruangan);
                $this->peminjamanmodel->save($inputpeminjaman);
                $this->jadwalmodel->save($inputjadwal);
                
                return $this->response->setJSON($pesan);
            }
            
        } elseif ($nowtime < $dbstart){
            $ruangan = $cekpeminjaman['id_ruangan'];
            // $cek = $this->jadwalmodel->cektersedia2();
            // $cekjadwal = $cek . $ruangan;
            $cekjadwal = $this->jadwalmodel->query('SELECT * FROM jadwal INNER JOIN peminjaman, ruangan 
			WHERE jadwal.id_peminjaman=peminjaman.id_peminjaman
			AND peminjaman.id_ruangan=ruangan.id_ruangan
			AND status_jadwal=2
			AND peminjaman.id_ruangan=' . $ruangan)->getResultArray();

            $dbone = strtotime($cekjadwal['jam_mulai']) + strtotime($cekjadwal['jam_ berakhir']) + strtotime($cekjadwal['tanggal']);
            $dbtwo = strtotime($cekpeminjaman['jam_mulai']) + strtotime($cekpeminjaman['jam_ berakhir']) + strtotime($cekpeminjaman['tanggal']);

            if ($dbone == $dbtwo){
                $pesan = [
                    'sukses' => 'Gagal diterima, jadwal bentrok!'
                ];
                return $this->response->setJSON($pesan);
            } else {
                $inputpeminjaman = [
                    'status_peminjaman' => 2,
                    'id_peminjaman' => $id_peminjaman
                ];
                
                $inputjadwal = [
                    'id_jadwal' => null,
                    'id_peminjaman' => $id_peminjaman,
                    'status_jadwal' => 2
                ];
                $pesan = [
                    'sukses' => 'Gagal diterima, jadwal bentrok!'
                ];
                $this->peminjamanmodel->save($inputpeminjaman);
                $this->jadwalmodel->save($inputjadwal);
                
                return $this->response->setJSON($pesan);
            }
        } else {
            $inputjadwal = [
                'id_jadwal' => null,
                'id_peminjaman' => $id_peminjaman,
                'status_jadwal' => 1
            ];
            $this->jadwalmodel->save($inputjadwal);
            $pesan = [
                'sukses' => 'Request Diterima'
            ];
            return $this->response->setJSON($pesan);
        }

        // $data = [
        //     'user' => $this->sistemmodel->request(),
        // ];
        // $hasil = [
        //     'data' => view('admin/requestdata', $data)
        // ];
        // // echo json_encode($hasil);


        // return $this->response->setJSON($hasil);
        // $input = [
        //     'id_peminjaman' => $id_peminjaman,
        //     'status_peminjaman' => "1"
        // ];

        // $this->peminjamanmodel->save($input);

        // $pesan = [
        //     'sukses' => 'Peminjaman diterima'
        // ];
        // return $this->response->setJSON($pesan);
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

    public function disaccpeminjaman($id_peminjaman)
    {
        if ($this->request->isAjax()) {
            $this->peminjamanmodel->delete($id_peminjaman);
            $pesan = ['sukses' => "Peminjaman ditolak"];
        } else {
            exit('tidak dapat memproses data');
        }
        return $this->response->setJSON($pesan);
    }

    // END REQUEST

    // Jadwal
    public function jadwal()
    {
        $this->session = session();
        $nama = $this->session->get('nama_lengkap');
        $data = [
            'user' => $this->sistemmodel->jadwal(),
            'count' => $this->sistemmodel->countbelumDiterima(),
            'nama'  => $nama
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

    // public function aturJadwal($aksi, $id_jadwal)
    // {
    //     if ($aksi = 3){
    //         $this->sistemmodel->save('jadwal', ['status_jadwal' => 3], ['id_jadwal' => $id_jadwal]);
    //         return redirect()->to('admin/jadwal');
    //     } elseif ($aksi = 1) {
    //         $this->sistemmodel->save('jadwal', ['status_jadwal' => 1], ['id_jadwal' => $id_jadwal]);
    //         session()->set_flashdata('message', '<div class="alert alert-success" role="alert">Jadwal dihapus!</div>');
    //         return redirect()->to('admin/jadwal', 'refresh');
    //     }
    // }
    // public function hapusJadwal($aksi, $id_jadwal)
    // {

    //     if ($aksi = 0) {
    //         $cek = $this->sistemmodel->hapusJadwal($aksi, $id_jadwal);

    //         $id_peminjaman = $cek['id_peminjaman'];
    //         $id = ['id_peminjaman' => $id_peminjaman];
    //         $this->sistemmodel->delete('peminjaman', $id);
    //         $this->sistemmodel->delete('jadwal', ['id_jadwal' => $id_jadwal]);

    //         session()->set_flashdata('message', '<div class="alert alert-success" role="alert">Jadwal dihapus!</div>');
    //         redirect('admin/jadwal');
    //     }
    // } elseif ($aksi = 3) {
    //     $this->sistemmodel->save('jadwal', ['status_jadwal' => 3], ['id_jadwal' => $id_jadwal]);
    //     redirect('admin/jadwal');
    // } elseif ($aksi = 1) {
    //     $this->sistemmodel->save('jadwal', ['status_jadwal' => 1], ['id_jadwal' => $id_jadwal]);
    //     session()->set_flashdata('message', '<div class="alert alert-success" role="alert">Jadwal dihapus!</div>');
    //     redirect('admin/jadwal', 'refresh');
    // }





}
