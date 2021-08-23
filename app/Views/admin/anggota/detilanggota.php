<?= $this->extend('templates/t_admin'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-view anggota detilanggota pb-5">
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detil Anggota</li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $anggota['nama']; ?></li>
                        </ol>
                    </nav>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="profil-inti text-center mt-4">
                                <div class="profil-gambar" style="background-image: url(<?= base_url('public/img/upload/'.$anggota['gambar']); ?>);"></div>

                                <h1 class="mt-4"><?= $anggota['nama']; ?></h1>
                                <h3><?= $anggota['email']; ?></h3>
                            </div>

                            <div class="row informasi mb-3">
                                <div class="col-5 mb-3">
                                    <p><strong>NKTA (Nomor Keanggotaan)</strong></p>
                                </div>
                                <div class="col-5 mb-3">
                                    <p>: <?= $anggota['nkta']; ?></p>
                                </div>

                                <div class="col-5 mb-3">
                                    <p><strong>Jenis Kelamin</strong></p>
                                </div>
                                <div class="col-5 mb-3">
                                    <p>: <?= $anggota['j_kelamin']; ?></p>
                                </div>

                                <div class="col-5 mb-3">
                                    <p><strong>Pekerjaan</strong></p>
                                </div>
                                <div class="col-5 mb-3">
                                    <p>: <?= $anggota['profesi']; ?></p>
                                </div>

                                <div class="col-5 mb-3">
                                    <p><strong>Keterangan :</strong></p>
                                </div>
                                <div class="col-5 mb-3">
                                    <p>: <?= $anggota['ket']; ?></p>
                                </div>

                                <!-- Informasi Pribadi -->

                                <h4 class="mt-3"><strong>Informasi Pribadi :</strong></h4>
                                <hr class="mb-5">

                                <div class="col-5 mb-3">
                                    <p><strong>No HP</strong></p>
                                </div>
                                <div class="col-5 mb-3">
                                    <p>: <?= $anggota['no_hp']; ?></p>
                                </div>

                                <div class="col-5 mb-3">
                                    <p><strong>Email</strong></p>
                                </div>
                                <div class="col-5 mb-3">
                                    <p>: <?= $anggota['email']; ?></p>
                                </div>

                                <div class="col-5 mb-3">
                                    <p><strong>Tempat Lahir / Tgl Lahir</strong></p>
                                </div>
                                <div class="col-5 mb-3">
                                    <p>: <?= $anggota['tempatlahir']; ?> / <?= $anggota['tanggallahir']; ?></p>
                                </div>

                                <div class="col-5 mb-3">
                                    <p><strong>Status Kawin</strong></p>
                                </div>
                                <div class="col-5 mb-3">
                                    <p>: <?= $anggota['s_kawin']; ?></p>
                                </div>

                                <div class="col-5 mb-3">
                                    <p><strong>Pendidikan Terakhir</strong></p>
                                </div>
                                <div class="col-5 mb-3">
                                    <p>: <?= $anggota['p_terakhir']; ?></p>
                                </div>

                                <div class="col-5 mb-3">
                                    <p><strong>Alamat</strong></p>
                                </div>
                                <div class="col-5 mb-3">
                                    <p>: <?= $anggota['alamat']; ?></p>
                                </div>
                                
                                <div class="col-5 mb-3">
                                    <p><strong>Kelurahan</strong></p>
                                </div>
                                <div class="col-5 mb-3">
                                    <p>: <?= $anggota['kelurahan']; ?></p>
                                </div>

                                <div class="col-5 mb-3">
                                    <p><strong>Kecamatan</strong></p>
                                </div>
                                <div class="col-5 mb-3">
                                    <p>: <?= $anggota['kecamatan']; ?></p>
                                </div>

                                <div class="col-5 mb-3">
                                    <p><strong>Kota</strong></p>
                                </div>
                                <div class="col-5 mb-3">
                                    <p>: <?= $anggota['kota']; ?></p>
                                </div>

                                <div class="col-5 mb-3">
                                    <p><strong>Provinsi</strong></p>
                                </div>
                                <div class="col-5 mb-3">
                                    <p>: <?= $anggota['provinsi']; ?></p>
                                </div>

                                <div class="col-5 mb-3">
                                    <p><strong>Kode Pos</strong></p>
                                </div>
                                <div class="col-5 mb-3">
                                    <p>: <?= $anggota['k_pos']; ?></p>
                                </div>

                            </div>

                            <a href="<?= base_url('/cetak/'.$anggota['id']); ?>" target="_blank" class="btn btn-outline-primary">
                                <i class="fa fa-print" aria-hidden="true"></i>
                                Print
                            </a>
                            <form action="<?= base_url('/anggota/'.$anggota['id']); ?>" method="POST" onclick="return confirm('Apakah anda yakin mau dihapus?')" class="d-inline-block">
                                <input type="hidden" value="DELETE" name="_method">

                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    Hapus
                                </button>
                            </form>
                            

                        </div>
                        <div class="col-3">
                            <h4 class="mt-3"><strong>Cabang Keanggotaan :</strong></h4>
                            <hr class="mb-4">
                            <div class="card" style="width: 18rem;">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Cabang : <?= $anggota['cabang']; ?></li>
                                    <li class="list-group-item">Daerah : <?= $anggota['daerah']; ?></li>
                                    <li class="list-group-item">Wilayah : <?= $anggota['wilayah']; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>