<?= $this->extend('templates/t_admin'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-view anggota">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Daftar Anggota</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <h2>Daftar Anggota</h2>

                    <?php if( session()->getFlashdata('pesan') ) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('/anggota'); ?>" method="POST" class="mt-4">
                        <div class="row">
                            <div class="col-3 type">
                                <a href="<?= base_url('/anggota/add'); ?>">
                                    <button class="btn aktif" type="button">
                                        Tambah Anggota
                                    </button>
                                </a>
                            </div>
                            <div class="col-5"></div>
                            <div class="col-3" style="position: relative; left: 40px;">
                                <input type="text" class="form-control" name="s" value="<?= (strlen($s) > 0) ? $s : ''; ?>" placeholder="Cari berdasarkan NKTA...">
                            </div>
                            <div class="col-1" style="position: relative; right: -30px;">
                                <button class="btn btn-primary">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <table class="table table-bordered mt-4 align-middle">
                        <thead>
                            <tr>
                                <th style="width: 5%;" class="text-center">No</th>
                                <th style="width: 23%;">Nama Anggota</th>
                                <th style="width: 16%;">NKTA</th>
                                <th style="width: 15%;">Jenis Kelamin</th>
                                <th style="width: 15%;">No HP</th>
                                <th style="width: 15%;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php if( count($anggota) == 0 ) : ?>
                                <tr class="text-center">
                                    <td colspan="6">Tidak ditemukan anggota.</td>
                                </tr>
                            <?php endif; ?>
                            <?php foreach( $anggota as $a ) : ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td><?= $a->nama; ?></td>
                                    <td><?= $a->nkta; ?></td>
                                    <td><?= $a->j_kelamin; ?></td>
                                    <td><?= $a->no_hp; ?></td>
                                    <td class="aksin text-center">
                                        <a href="<?= base_url('/anggota/'.$a->id); ?>" class="btn btn-success">Detil</a>
                                        <a href="<?= base_url('/anggota/edit/'.$a->id); ?>" class="btn btn-warning">Update</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>

<?= $this->endSection(); ?>