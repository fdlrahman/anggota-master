<?= $this->extend('templates/t_login'); ?>

<?= $this->section('login'); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="card login-content shadow-lg border-0">
                <?php if( session()->getFlashdata('error') ) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
				<div class="card-body">
					<div class="text-center">
						<img class="logo" src="https://cdn3.iconfinder.com/data/icons/galaxy-open-line-gradient-i/200/account-256.png">
					</div>
				<h3 class="text-logo">Sign In</h3>
				<br>
				<form class="text-center" action="<?= base_url('/login/auth'); ?>" method="POST">
					<input class="form-control border-0 <?= ($validation->getError('u_name')) ? 'is-invalid' : '' ?>" type="text" name="u_name" placeholder="Type Your Username" value="<?= old('u_name'); ?>" autofocus>
					<?php if( $validation->getError('u_name') ) : ?>
                        <span class="text-danger align-baseline">
                            <small><?= $validation->getError('u_name'); ?></small>
                        </span>
                    <?php endif; ?>
                        <br>
					<input class="form-control border-0" type="password" name="u_password" value="<?= old('u_password'); ?>" placeholder="Type Your Password">
                    <?php if( $validation->getError('u_password') ) : ?>
                        <span class="text-danger align-baseline">
                            <small><?= $validation->getError('u_password'); ?></small>
                        </span>
                    <?php endif; ?>
				        <br>
					<button class="btn btn-primary btn-sm border-0" type="submit" name="sign">Sign In</button>
					<p class="forgot"><a href="<?= base_url('/'); ?>">Kembali ke website?</a></p>
				</form>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>