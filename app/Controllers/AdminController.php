<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SistemModel;

class AdminController extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new SistemModel();
    }

    public function index() :string
    {
        return view('admin/dashboard');
    }

    public function newuser()
    {
        $data = [
            'user' => $this->userModel->findAll()
        ];
        return view('admin/newuser', $data);
    }

    public function user()
    {
        $data = [
            'user' => $this->userModel->findAll()
        ];
        return view('admin/user', $data);
    }

    public function jadwal()
    {
        $data = [
            'user' => $this->userModel->findAll()
        ];
        return view('admin/jadwal', $data);
    }




}
