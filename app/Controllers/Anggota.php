<?php

namespace App\Controllers;

use \App\Models\AnggotaModel;

class Anggota extends BaseController
{
    private $anggotaModel;

    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
    }

    public function index()
    {
        if( !session()->get('logged_in') )
        {
            return redirect()->to(base_url('/login'));
        }

        $anggota = $this->anggotaModel->query("SELECT id, nkta, nama, j_kelamin, no_hp FROM anggota")->getResult();
        $s = '';

        if( $this->request->getVar('s') )
        {
            $s = $this->request->getVar('s');

            $anggota = $this->anggotaModel->query("SELECT id, nkta, nama, j_kelamin, no_hp FROM anggota WHERE nkta LIKE '%$s%'")->getResult();
        }

        $data = [
            'title' => 'Daftar Anggota - Aplikasi Anggota Master',
            'a_nav' => 'manajemen',
            'anggota' => $anggota,
            's' => $s
        ];

        return view('admin/anggota/daftaranggota', $data);
    }

    public function detil($id)
    {
        if( !session()->get('logged_in') )
        {
            return redirect()->to(base_url('/login'));
        }

        $anggota = $this->anggotaModel->find($id);

        if( !$anggota )
        {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Halaman detil tidak ditemukan, Silahkan kontak Programmer Aplikasi');
        }

        $data = [
            'title' => 'Detil Keanggotaan - Anggota Master',
            'anggota' => $anggota,
        'a_nav' => 'manajemen'
        ];

        return view('admin/anggota/detilanggota', $data);
    }

    public function add()
    {
        if( !session()->get('logged_in') )
        {
            return redirect()->to(base_url('/login'));
        }

        $data = [
            'title' => 'Tambah Anggota - Aplikasi Anggota Master',
            'a_nav' => 'manajemen',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/anggota/tambahanggota', $data);
    }

    public function save()
    {
        if( !session()->get('logged_in') )
        {
            return redirect()->to(base_url('/login'));
        }

        $validation = [
            'nkta' => [
                'rules' => 'required|is_unique[anggota.nkta]',
                'errors' => [
                    'required' => 'Masukkan NKTA terlebih dahulu.',
                    'is_unique' => 'NKTA telah tersedia, Silahkan di cek kembali'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan nama terlebih dahulu.']
            ],
            'cabang' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan cabang.']
            ],
            'daerah' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan daerah.']
            ],
            'wilayah' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan wilayah.']
            ],
            'tanggallahir' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan tanggal lahir.']
            ],
            'tempatlahir' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan tempat lahir.']
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan alamat rumah.']
            ],
            'kota' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan kota.']
            ],
            'provinsi' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan provinsi.']
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan nomor HP.']
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1048]|ext_in[gambar,png,jpg,jpeg]',
                'errors' => [
                    'max-size' => 'Ukuran gambar terlalu besar maksimal 1 mb.',
                    'ext_in' => 'Hanya menerima ekstensi png, jpg, jpeg.'
                ]
            ]
        ];

        if( !$this->validate($validation) ) {
            return redirect()->to(base_url('/anggota/add'))->withInput();
        }

        $gambar = $this->request->getFile('gambar');
        $namaGambar = '';

        if( $gambar->getError() == 4 ) {
            $namaGambar = 'default.jpg';
        } else {
            $gambar->move('public/img/upload');
            $namaGambar = $gambar->getName();
        }

        $data = $this->request->getVar();

        $save = [
            'nkta'         => $data['nkta'], 
            'cabang'       => $data['cabang'], 
            'daerah'       => $data['daerah'], 
            'wilayah'      => $data['wilayah'], 
            'nama'         => $data['nama'], 
            'tanggallahir' => $data['tanggallahir'], 
            'tempatlahir'  => $data['tempatlahir'], 
            'j_kelamin'    => $data['j_kelamin'], 
            'alamat'       => $data['alamat'], 
            'k_pos'        => ($data['k_pos']) ? $data['k_pos'] : '-', 
            'kelurahan'    => ($data['kelurahan']) ? $data['kelurahan'] : '-', 
            'kecamatan'    => ($data['kecamatan']) ? $data['kecamatan'] : '-', 
            'kota'         => $data['kota'], 
            'provinsi'     => $data['provinsi'], 
            'no_hp'        => $data['no_hp'], 
            'email'        => ($data['email']) ? $data['email'] : '-', 
            'profesi'      => $data['profesi'], 
            's_kawin'      => $data['s_kawin'], 
            'p_terakhir'   => $data['p_terakhir'], 
            'ket'          => ($data['ket']) ? $data['ket'] : '-', 
            'gambar'       => $namaGambar
        ];

        $this->anggotaModel->save($save);

        session()->setFlashdata('pesan', 'Telah berhasil menambahkan anggota.');

        return redirect()->to(base_url('/anggota'));
    }

    public function delete($id)
    {
        if( !session()->get('logged_in') )
        {
            return redirect()->to(base_url('/login'));
        }

        $anggota = $this->anggotaModel->find($id);

        if( $anggota['gambar'] != 'default.jpg' ) {
            unlink(ROOTPATH.'public/img/upload/'.$anggota['gambar']);
        }

        $this->anggotaModel->delete($id);

        session()->setFlashdata('pesan', 'Telah berhasil menghapus anggota.');

        return redirect()->to(base_url('/anggota'));
    }

    public function edit($id)
    {
        if( !session()->get('logged_in') )
        {
            return redirect()->to(base_url('/login'));
        }

        $anggota = $this->anggotaModel->find($id);

        if( !$anggota )
        {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Halaman detil dengan id $id, Tidak ditemukan.");
        }

        $data = [
            'title' => 'Edit Data Anggota - Anggota Master',
            'anggota' => $anggota,
            'a_nav' => 'manajemen',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/anggota/editanggota', $data);
    }

    public function update()
    {
        if( !session()->get('logged_in') )
        {
            return redirect()->to(base_url('/login'));
        }

        $data = $this->request->getVar();
        $anggota = $this->anggotaModel->find($data['id']);

        $nktaRule = "required";

        if( $anggota['nkta'] !== $data['nkta'] ) {
            $nktaRule .= "|is_unique[anggota.nkta]";
        }

        $validation = [
            'nkta' => [
                'rules' => $nktaRule,
                'errors' => [
                    'required' => 'Masukkan NKTA terlebih dahulu.',
                    'is_unique' => 'NKTA telah tersedia, Silahkan di cek kembali'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan nama terlebih dahulu.']
            ],
            'cabang' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan cabang.']
            ],
            'daerah' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan daerah.']
            ],
            'wilayah' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan wilayah.']
            ],
            'tanggallahir' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan tanggal lahir.']
            ],
            'tempatlahir' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan tempat lahir.']
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan alamat rumah.']
            ],
            'kota' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan kota.']
            ],
            'provinsi' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan provinsi.']
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => ['required' => 'Masukkan nomor HP.']
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1048]|ext_in[gambar,png,jpg,jpeg]',
                'errors' => [
                    'max-size' => 'Ukuran gambar terlalu besar maksimal 1 mb.',
                    'ext_in' => 'Hanya menerima ekstensi png, jpg, jpeg.'
                ]
            ]
        ];

        if( !$this->validate($validation) )
        {
            return redirect()->to(base_url('/anggota/edit/'.$data['id']))->withInput();
        }
        
        $gambar = $this->request->getFile('gambar');

        if( $gambar->getError() == 4 ) 
        {
            $namaGambar = $data['gambarLama'];
        } else {
            unlink(ROOTPATH.'public/img/upload/'.$data['gambarLama']);

            $gambar->move('public/img/upload');
            $namaGambar = $gambar->getName();
        }

        $save = [
            'id'           => $data['id'],
            'nkta'         => $data['nkta'], 
            'cabang'       => $data['cabang'], 
            'daerah'       => $data['daerah'], 
            'wilayah'      => $data['wilayah'], 
            'nama'         => $data['nama'], 
            'tanggallahir' => $data['tanggallahir'], 
            'tempatlahir'  => $data['tempatlahir'], 
            'j_kelamin'    => $data['j_kelamin'], 
            'alamat'       => $data['alamat'], 
            'k_pos'        => ($data['k_pos']) ? $data['k_pos'] : '-', 
            'kelurahan'    => ($data['kelurahan']) ? $data['kelurahan'] : '-', 
            'kecamatan'    => ($data['kecamatan']) ? $data['kecamatan'] : '-', 
            'kota'         => $data['kota'], 
            'provinsi'     => $data['provinsi'], 
            'no_hp'        => $data['no_hp'], 
            'email'        => ($data['email']) ? $data['email'] : '-', 
            'profesi'      => $data['profesi'], 
            's_kawin'      => $data['s_kawin'], 
            'p_terakhir'   => $data['p_terakhir'], 
            'ket'          => ($data['ket']) ? $data['ket'] : '-', 
            'gambar'       => $namaGambar
        ];

        $this->anggotaModel->save($save);

        session()->setFlashdata('pesan', 'Data telah berhasil diubah.');

        return redirect()->to(base_url('/anggota'));
    }
}