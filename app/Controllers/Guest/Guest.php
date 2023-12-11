<?php

namespace App\Controllers\Guest;

use App\Controllers\BaseController;

class Guest extends BaseController
{
    public function index(): string
    {
        return view('guest/guest');
    }
}
