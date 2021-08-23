<?= $this->extend('templates/t_admin'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card card-dashboard blue">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h2><?= $active; ?></h2>
                            <p>Anggota aktif</p>
                        </div>
                        <div class="col-6 icon-dashboard">
                            <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <a href="" class="more">
                    <div class="card-body text-center">
                        More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-dashboard yellow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h2><?= $pending; ?></h2>
                            <p>Anggota pending</p>
                        </div>
                        <div class="col-6 icon-dashboard">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <a href="" class="more">
                    <div class="card-body text-center">
                        More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-dashboard red">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h2><?= $block; ?></h2>
                            <p>Anggota block</p>
                        </div>
                        <div class="col-6 icon-dashboard">
                            <i class="fa fa-ban" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <a href="" class="more">
                    <div class="card-body text-center">
                        More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-view p-5 text-center">
                <div class="card-body">
                    <img src="https://image.flaticon.com/icons/svg/866/866218.svg" class="img-dashboard" />
                    <h2 class="mt-4">Aplikasi Manajemen Keanggotan</h2>
                    <p>Mempermudah Dalam Mengatur Dan Membimbing Organisasi</p>
                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>

<?= $this->endSection(); ?>