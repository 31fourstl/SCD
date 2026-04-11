<?php

namespace App\Controllers\Admin;

/**
 * Handles admin authentication (login / logout).
 */
class AuthController extends AdminBaseController
{
    public function login()
    {
        // Already logged in → redirect to dashboard
        if (session()->get('admin_logged_in')) {
            return redirect()->to(site_url('admin/drops'));
        }

        return view('admin/login', ['pageTitle' => 'Admin Login']);
    }

    public function loginPost()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $adminUser = getenv('ADMIN_USERNAME') ?: 'admin';
        $adminPass = getenv('ADMIN_PASSWORD') ?: 'changeme';

        if ($username === $adminUser && $password === $adminPass) {
            session()->set('admin_logged_in', true);
            session()->set('admin_username', $username);
            return redirect()->to(site_url('admin/drops'));
        }

        return redirect()->back()
            ->withInput()
            ->with('error', 'Invalid username or password.');
    }

    public function logout()
    {
        session()->remove('admin_logged_in');
        session()->remove('admin_username');
        return redirect()->to(site_url('admin/login'));
    }
}
