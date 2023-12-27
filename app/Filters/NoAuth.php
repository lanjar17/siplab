<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class NoAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $auth = service('auth');

        // if (logged_in() != true && uri_string() != 'login') {
        //     return redirect('login');
        // }

        // if (session()->get('loggedIn') && 'level' != 'Admin') {
        //         return redirect()->to(site_url('/Peminjam'));
        //     } else {
        //         return redirect()->to(site_url('/Admin'));
        //     }
        
        $peminjam = session()->get('level');


        if (session()->get('loggedIn')) {
            if ($peminjam == 'Peminjam'){
                return redirect()->to(site_url('/Peminjam'));
            } else if ($peminjam == 'Admin') {
                return redirect()->to(site_url('/Admin'));
            }
        }

        
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
