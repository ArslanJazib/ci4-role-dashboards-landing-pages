<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Shield\Authentication\AuthenticationInterface;
use CodeIgniter\Shield\Entities\User;

class AuthController extends BaseController
{
    /**
     * Show the login form.
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function login()
    {
        return view('auth/login'); // Render login view
    }

    /**
     * Handle login attempt.
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function attemptLogin()
    {
        $auth = service('auth');

        $credentials = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ];

        if ($auth->attempt($credentials)) {
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->withInput()->with('error', 'Invalid login credentials.');
        }
    }

    /**
     * Handle user logout.
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function logout()
    {
        $auth = service('auth');
        $auth->logout();

        return redirect()->to('/login');
    }

    /**
     * Show the registration form.
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function register()
    {
        return view('auth/register'); // Render registration view
    }

    /**
     * Handle registration attempt.
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function attemptRegister()
    {
        $auth = service('auth');

        $userData = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'password_confirm' => $this->request->getPost('password_confirm'),
        ];

        // Register user using Shield's registration method
        $result = $auth->register($userData);

        if ($result) {
            return redirect()->to('/login')->with('success', 'Registration successful. Please log in.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Registration failed. Please try again.');
        }
    }
}