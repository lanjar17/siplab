<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MemberController extends BaseController
{
    public function index()
    {
        return view('member/dashboard');
    }
}
