<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class Cetak extends BaseController
{
    private $anggotaModel;

    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
    }

    public function index($id)
    {
        if( !session()->get('logged_in') )
        {
            return redirect()->to(base_url('/login'));
        }

        $anggota = $this->anggotaModel->find($id);

        if( empty($anggota) ) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Halaman tidak ditemukan.');;
        }

        $pathCss = base_url('/public/css/cetak.css');

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [210, 297]]);

        $mpdf->WriteHTML('');

        $mpdf->Image('https://image.flaticon.com/icons/svg/866/866218.svg', 15, 10, 27, 27, 'svg', '', true, false);

        $mpdf->WriteHTML('
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <link rel="stylesheet" href="'. $pathCss .'">
            </head>
            <body>
                <div class="head">
                    <h3>
                        APLIKASI KEANGGOTAAN MASTER
                    </h3>
                    <h1>ANGGOTA MASTER</h1>
                    <p>
                        Telp.(022) 6645951,Fax(022)6645951 <br>
                        E-mail : sd.muhammadiyah.kampa1@gmail.com <br>
                    </p>
                </div>

                <hr>

                <div class="img-profil" style="background-image: url(http://3.bp.blogspot.com/-4K5ZxlVbfKs/T99FiDCkT5I/AAAAAAAAEbI/KOHeWFEOrwQ/s1600/paspoto-oke.jpg)"></div>
                
                <div class="body">
                    <p>Nama : '. $anggota['nama'] .'</p>
                    <p>NKTA (Nomor Keanggotaan) : '. $anggota['nkta'] .'</p>
                    <p>Jenis Kelamin : '. $anggota['j_kelamin'] .'</p>
                    <p>Keterangan : '. $anggota['ket'] .'</p>

                    <h3>Informasi Pribadi</h3>

                    <p>No Hp : '.$anggota['no_hp'].'</p>
                    <p>Email : '.$anggota['email'].'</p>
                    <p>Tempat Lahir / Tgl Lahir : '. $anggota['tempatlahir'] .' / '. $anggota['tanggallahir'] .'/p>
                    <p>Status Kawin : '. $anggota['s_kawin'] .'</p>
                    <p>Pendidkan Terakhir : '. $anggota['p_terakhir'] .'</p>
                    <p>Alamat : '. $anggota['alamat'] .'</p>
                    <p>Kelurahan : '. $anggota['kelurahan'] .'</p>
                    <p>Kecamatan : '. $anggota['kecamatan'] .'</p>
                    <p>Kota : '. $anggota['kota'] .'</p>
                    <p>Provinsi : '. $anggota['provinsi'] .'</p>
                    <p>Kode Pos : '. $anggota['k_pos'] .'</p>
                    <p>Pekerjaan : '. $anggota['profesi'] .'</p>

                    <h3>Cabang Keanggotaan</h3>

                    <p>Cabang : '. $anggota['cabang'] .'</p>
                    <p>Daerah : '. $anggota['daerah'] .'</p>
                    <p>Wilayah : '. $anggota['wilayah'] .'</p>
                </div>

            </body>
            </html>
        ');

        return redirect()->to($mpdf->Output($anggota['nama'].'.pdf', 'I'));
    }
}

?>

<div style="background-image: url();"></div>