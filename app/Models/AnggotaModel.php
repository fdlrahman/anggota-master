<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table = 'anggota';
    protected $allowedFields = ['nkta', 'cabang', 'daerah', 'wilayah', 'nama', 'tanggallahir', 'tempatlahir', 'j_kelamin', 'alamat', 'k_pos', 'kelurahan', 'kecamatan', 'kota', 'provinsi', 'no_hp', 'email', 'profesi', 's_kawin', 'p_terakhir', 'ket', 'gambar'];
}