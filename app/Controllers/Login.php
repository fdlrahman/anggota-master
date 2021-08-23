<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if( session()->get('logged_in') ) {
            return redirect()->to(base_url('/dashboard'));
        }

        $data = [
            'title'  => 'Login - Anggota Master',
            'validation' => \Config\Services::validation()
        ];

        return view('login/index', $data);
    }

    public function auth()
    {
        if( !$this->validate([
            'u_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi username terlebih dahulu.'
                ]
            ],
            'u_password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi password terlebih dahulu!'
                ]
            ]
        ]) ) {
            return redirect()->to(base_url('/login'))->withInput();
        }

        $data = $this->request->getVar();

        $user = $this->userModel->where('u_name', $data['u_name'])->first();

        if( !$user )
        {
            session()->setFlashdata('error', 'Mohon maaf, User tidak ditemukan!');

            return redirect()->to(base_url('/login'));
        } else {
            if( password_verify($data['u_password'], $user['u_password']) ) {
                $set_session = [
                    'u_id' => $user['id'],
                    'logged_in' => true
                ];

                session()->set($set_session);

                return redirect()->to(base_url('/dashboard'));
            } else {
                session()->setFlashdata('error', 'Mohon maaf, User tidak ditemukan!');

                return redirect()->to(base_url('/login'));
            }
        }
    }

    public function logout()
    {
        $session = session();

        $session->destroy();

        return redirect()->to(base_url('/login'));
    }
}