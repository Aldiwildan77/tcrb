<section class="log logres">
	<div class="container pt-5">
		<div class="row justify-content-center pb-5">
			<div class="login-card card col-11 col-lg-6">
				<div class="card-body">
					<h1 class="card-title text-center py-4"><strong>MASUK</strong></h1>
					<?= $this->session->flashdata('message'); ?>
					<form action="masuk" method="post">
						<div class="form-group mb-3">
							<div class="input-group">
								<label for="username" class="sr-only">Email</label>
								<label for="username">
									<i class="fa fa-user fa-lg icon px-2 py-2"></i>
								</label>
								<input type="text" class="form-control" id="username" name="input" placeholder="Username">
							</div>
							<small class="form-text text-danger"><?= form_error('input'); ?></small>
						</div>
						<div class="form-group mb-2">
							<div class="input-group">
								<label for="password" class="sr-only">Password</label>
								<label for="password">
									<i class="fa fa-key fa-lg icon px-1 py-2"></i>
								</label>
								<input type="password" class="form-control" id="password" name="password" minlength="6" placeholder="Password">
							</div>
							<small class="form-text text-danger"><?= form_error('password'); ?></small>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-6">
									<p><a href="<?= base_url('lupa-password') ?>" class="text-white">Lupa Password?</a></p>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-info col-12 mb-2">MASUK</button>
						<div class="row mt-4 mb-1">
							<div class="col text-center">
								<span style="color:grey">
									Belum mempunyai akun?
								</span>
								<a href="<?= base_url('daftar') ?>" class="text-white">
									<span>Daftar Sekarang</span>
								</a>
							</div>
						</div>
						<!-- <button type="submit" class="btn btn-outline-info col-12 mb-2">DAFTAR</button> -->
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>Swal.fire({
  title: '<strong>Info</strong>',
  type: 'info',
  html:
    'Silahkan baca tata cara pendaftaran pada link berikut ini.<br>' +
    '<a href="https://tcrb.ub.ac.id/tata-cara-pendaftaran" target="_blank">Tata Cara Pendaftaran</a> ',
  confirmButtonText:'Saya sudah mengerti'
})</script>