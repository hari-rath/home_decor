<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * This runs BEFORE the controller method is executed.
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if the session 'isLoggedIn' is NOT set
        if (!session()->get('isLoggedIn')) {
            // Redirect them to the admin login page with an error message
            return redirect()->to(base_url('admin/login'))->with('error', 'Please login to access the dashboard.');
        }
    }

    /**
     * This runs AFTER the controller method is executed.
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // We don't need to do anything here for basic auth
    }
}