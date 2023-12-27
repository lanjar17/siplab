<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $auth = service('auth');

        if (!session()->get('loggedIn')) 
        {
            return redirect()->to(site_url('otentikasi'));
        }
    }

  
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
