<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Otentikasi extends BaseController
{
    public function index()
    {
        return view("login");
    }
}
