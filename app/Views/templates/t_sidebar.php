<div class="ui sidebar vertical left menu overlay visible" style="transition-duration: 0.1s; overflow: visible !important;">
    <div class="item logo">
        <img src="https://image.flaticon.com/icons/svg/866/866218.svg" /><img src="https://image.flaticon.com/icons/svg/866/866218.svg" style="display: none" />
    </div>
    <div class="ui accordion">
        <a class="item <?= ( $a_nav == 'dashboard' ? 'active' : '' ); ?>" href="<?= base_url('/dashboard'); ?>">Dashboard</a>

        <a class="item <?= ( $a_nav == 'manajemen' ? 'active' : '' ); ?>" href="<?= base_url('/anggota'); ?>">Manajemen Anggota</a>
    </div>
</div>
<div class="pusher">
    <div class="ui menu asd borderless" style="border-radius: 0!important; border: 0; margin-left: 260px; transition-duration: 0.1s;">
        <a class="item openbtn">
            <i class="icon content"></i>
        </a>
            
        <a class="item">Aplikasi Anggota Master</a>
            
        <div class="right menu">
            <div class="item">
                <a href="<?= base_url('/login/logout'); ?>">
                    <div class="ui primary button">Logout</div>
                </a>
            </div>
        </div>
    </div>
</div>