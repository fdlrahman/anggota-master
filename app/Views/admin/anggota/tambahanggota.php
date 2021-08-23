<?= $this->extend('templates/t_admin'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-view anggota tambahanggota">
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Anggota</li>
                        </ol>
                    </nav>
                    <h2>Tambah Anggota</h2>

                    <div class="alert mt-4 alert-dismissible fade show" role="alert">
                        <strong>Informasi :</strong> Yang ada tanda bintang (*) artinya optional (Boleh diisi maupun tidak)
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <form class="mt-4" method="POST" enctype="multipart/form-data" action="<?= base_url('/anggota/save'); ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nomor NKTA</label>
                                    <input type="text" class="form-control <?= ($validation->getError('nkta') ? 'is-invalid' : ''); ?>" name="nkta" value="<?= old('nkta'); ?>" autofocus>
                                    <?php if( $validation->getError('nkta') ) : ?>
                                        <p class="text-danger">
                                            <small><?= $validation->getError('nkta'); ?></small>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama lengkap. (Gelar)</label>
                                    <input type="text" class="form-control <?= ($validation->getError('nama') ? 'is-invalid' : ''); ?>" name="nama" value="<?= old('nama'); ?>">
                                    <?php if( $validation->getError('nama') ) : ?>
                                        <p class="text-danger">
                                            <small><?= $validation->getError('nama'); ?></small>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="exampleFormControlInput1" class="form-label">Cabang</label>
                                            <input type="text" class="form-control <?= ($validation->getError('cabang') ? 'is-invalid' : ''); ?>" name="cabang" value="<?= old('cabang'); ?>">
                                            <?php if( $validation->getError('cabang') ) : ?>
                                                <p class="text-danger">
                                                    <small><?= $validation->getError('cabang'); ?></small>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-4">
                                            <label for="exampleFormControlInput1" class="form-label">Daerah</label>
                                            <input type="text" class="form-control <?= ($validation->getError('daerah') ? 'is-invalid' : ''); ?>" name="daerah" value="<?= old('daerah'); ?>">
                                            <?php if( $validation->getError('daerah') ) : ?>
                                                <p class="text-danger">
                                                    <small><?= $validation->getError('daerah'); ?></small>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-4">
                                            <label for="exampleFormControlInput1" class="form-label">Wilayah</label>
                                            <input type="text" class="form-control <?= ($validation->getError('wilayah') ? 'is-invalid' : ''); ?>" name="wilayah" value="<?= old('wilayah'); ?>" >
                                            <?php if( $validation->getError('wilayah') ) : ?>
                                                <p class="text-danger">
                                                    <small><?= $validation->getError('wilayah'); ?></small>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-5">
                                            <label for="exampleFormControlInput1" class="form-label">Tanggal lahir (m, d, y)</label>
                                            <input type="date" class="form-control <?= ($validation->getError('tanggallahir') ? 'is-invalid' : ''); ?>" name="tanggallahir" value="<?= old('tanggallahir'); ?>">
                                            <?php if( $validation->getError('tanggallahir') ) : ?>
                                                <p class="text-danger">
                                                    <small><?= $validation->getError('tanggallahir'); ?></small>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-7">
                                            <label for="exampleFormControlInput1" class="form-label">Tempat lahir</label>
                                            <input type="text" class="form-control <?= ($validation->getError('tempatlahir') ? 'is-invalid' : ''); ?>" name="tempatlahir" value="<?= old('tempatlahir'); ?>">
                                            <?php if( $validation->getError('tempatlahir') ) : ?>
                                                <p class="text-danger">
                                                    <small><?= $validation->getError('tempatlahir'); ?></small>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Jenis kelamin</label>
                                    <select class="form-select" aria-label="Default select example" name="j_kelamin">
                                        <?= $this->include('templates/option/t_jenis_kelamin'); ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <label for="exampleFormControlInput1" class="form-label">Alamat Rumah</label>
                                            <input type="text" class="form-control <?= ($validation->getError('alamat') ? 'is-invalid' : ''); ?>" name="alamat" value="<?= old('alamat'); ?>">
                                            <?php if( $validation->getError('alamat') ) : ?>
                                                <p class="text-danger">
                                                    <small><?= $validation->getError('alamat'); ?></small>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-4">
                                            <label for="exampleFormControlInput1" class="form-label optional">Kode Pos</label>
                                            <input type="text" class="form-control" name="k_pos" value="<?= old('k_pos'); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label optional">Desa / Kelurahan</label>
                                            <input type="text" class="form-control" name="kelurahan" value="<?= old('kelurahan'); ?>">
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label optional">Kecamatan</label>
                                            <input type="text" class="form-control optional" name="kecamatan" value="<?= old('kecamatan'); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Kab/Kota</label>
                                            <input type="text" class="form-control <?= ($validation->getError('kota') ? 'is-invalid' : ''); ?>" name="kota" value="<?= old('kota'); ?>">
                                            <?php if( $validation->getError('kota') ) : ?>
                                                <p class="text-danger">
                                                    <small><?= $validation->getError('kota'); ?></small>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Provinsi</label>
                                            <input type="text" class="form-control <?= ($validation->getError('provinsi') ? 'is-invalid' : ''); ?>" name="provinsi" value="<?= old('provinsi'); ?>">
                                            <?php if( $validation->getError('provinsi') ) : ?>
                                                <p class="text-danger">
                                                    <small><?= $validation->getError('provinsi'); ?></small>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nomor HP</label>
                                    <input type="text" class="form-control <?= ($validation->getError('no_hp') ? 'is-invalid' : ''); ?>" name="no_hp" value="<?= old('no_hp'); ?>">
                                    <?php if( $validation->getError('no_hp') ) : ?>
                                        <p class="text-danger">
                                            <small><?= $validation->getError('no_hp'); ?></small>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label optional">Email</label>
                                    <input type="text" class="form-control <?= ($validation->getError('email') ? 'is-invalid' : ''); ?>" name="email" value="<?= old('email'); ?>">
                                    <?php if( $validation->getError('email') ) : ?>
                                        <p class="text-danger">
                                            <small><?= $validation->getError('email'); ?></small>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                
                            <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Profesi</label>
                                    <select class="form-select" aria-label="Default select example" name="profesi">
                                        <?= $this->include('templates/option/t_pekerjaan'); ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Status Perkawinan</label>
                                    <select class="form-select" aria-label="Default select example" name="s_kawin">
                                        <?= $this->include('templates/option/t_status_kawin'); ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Pendidikan terakhir</label>
                                    <select class="form-select" aria-label="Default select example" name="p_terakhir">
                                        <?= $this->include('templates/option/t_pendidikan_terakhir'); ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label optional">Keterangan</label>
                                    <textarea class="form-control" name="ket" id="exampleFormControlTextarea1" rows="3"><?= old('ket'); ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <img src="<?= base_url('/public/img/upload/default.jpg'); ?>" width="100" class="img-thumbnail imgPreview">
                                    <input class="form-control form-control mt-3 <?= ($validation->getError('gambar') ? 'is-invalid' : '' ); ?>" id="gambar" type="file" name="gambar" onchange="previewImg();">
                                    <?php if( $validation->getError('gambar') ) : ?>
                                        <p class="text-danger">
                                            <small><?= $validation->getError('gambar'); ?></small>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3 submit">Daftarkan Jadi Anggota</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- alert-warning -->


<?= $this->endSection(); ?>