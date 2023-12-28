<?php

namespace App\Controllers\Guest;

use App\Controllers\BaseController;
use App\Models\SistemModel;


class Guest extends BaseController
{
    public function index(): string
    {
        $sistemmodel = new SistemModel();
        $data['ruangan'] = $sistemmodel->jadwal();


        return view('guest/guest', $data); // Tampilkan view guest
    }
}
