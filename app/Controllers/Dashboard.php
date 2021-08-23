<?php

namespace App\Controllers;

use \App\Models\AnggotaModel;

class Dashboard extends BaseController
{
	private $anggotaModel;

	public function __construct()
	{
		$this->anggotaModel = new AnggotaModel();

	}

	public function index()
	{
        if( !session()->get('logged_in') ) {
            return redirect()->to(base_url('/login'));
        }

		$this->anggotaModel->select('id','s_anggota'); 

		$active = $this->anggotaModel->where('s_anggota', '')->findAll();
		$pending = $this->anggotaModel->where('s_anggota', 'pending')->findAll();
		$block = $this->anggotaModel->where('s_anggota', 'block')->findAll();  

		$data = [
			'title' => 'Dashboard - Aplikasi Anggota Master',
			'a_nav' => 'dashboard',
			'active' => count($active),
			'pending' => count($pending),
			'block' => count($block)
		];
        
		return view('admin/dashboard', $data);
	}
}
