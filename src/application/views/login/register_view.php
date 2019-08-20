<section class="res logres">
	<div class="container pt-5">
		<div class="row justify-content-center pb-5">
			<div class="login-card card col-11 col-lg-6 px-3">
				<div class="card-body">
					<h1 class="card-title text-center py-4"><strong>REGISTER</strong></h1>
					<?= $this->session->flashdata('message'); ?>
					<form action="register" method="post">
						<div class="form-group">
							<label for="nama" class="sr-only">Nama lengkap</label>
							<div class="input-group">
								<label for="nama">
									<i class="fa fa-user fa-lg icon p-2"></i>
								</label>
								<input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter full name" value="<?= set_value('fullname'); ?>" required>
							</div>
							<small class="form-text text-danger"><?= form_error('fullname'); ?></small>
						</div>
						<div class="form-group">
							<label for="username" class="sr-only">Username</label>
							<div class="input-group">
								<label for="username">
									<i class="fa fa-user-tag fa-lg icon px-1 py-2"></i>
								</label>
								<input type="text" class="form-control" name="username" id="username" placeholder="Enter username" value="<?= set_value('username'); ?>" required>
							</div>
							<small class="form-text text-danger"><?= form_error('username'); ?></small>
						</div>
						<div class="form-group">
							<label for="email" class="sr-only">Email</label>
							<div class="input-group">
								<label for="email">
									<i class="fa fa-envelope fa-lg icon px-1 py-2"></i>
								</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="<?= set_value('email'); ?>" required>
							</div>
							<small class="form-text text-danger"><?= form_error('email'); ?></small>
						</div>
						<div class="form-group mb-4">
							<div class="row">
								<div class="col">
									<label for="password" class="sr-only">Password</label>
									<div class="input-group">
										<label for="password">
											<i class="fa fa-key fa-lg icon px-1 py-2"></i>
										</label>
										<input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" minlength="6" required>
										<small class="form-text text-danger"><?= form_error('password'); ?></small>
										<small class="form-text text-disabled">Password minimal 6 karakter</small>
									</div>
								</div>
								<div class="col">
									<div class="input-group">
									<input type="password" class="form-control" name="passconf" id="passconf" placeholder="Enter password confirmation" minlength="6" required>
										<small class="form-text text-danger"><?= form_error('passconf'); ?></small>
									</div>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-info col-12 mb-2">DAFTAR</button>
						<div class="row mt-2 mb-1">
							<div class="col text-center">
								<span style="color:grey">
									Sudah mempunyai akun?
								</span>
								<a href="<?= base_url('login') ?>" class="text-white">Masuk sekarang</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
