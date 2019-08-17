<div class="halaman-user pt-5 pb-5">
	<div class="container pt-5 pb-5">
		<div class="row">
			<div class="col-lg-3 col-xs-12 mb-5">
				<div class="card" style="margin-left:-5%;margin-right:-5%">
			<div class="card-body">

				<div class="row mb-3 mt-5">
					<div class="col-lg-12 text-center">
						<h4 class="text-center"><b>Selamat datang</b></h4>
						<h5><?= $user['nama_lengkap'] ?></h5>
					</div>
				</div>
				<hr>
				<a class="tombol-user" href="<?= base_url('user') ?>">
					<div class="row pt-2 pb-1 row-tbl-user">
						<div class="col-lg-12">
							<h5 class="text-center">Profil</h5>
						</div>
					</div>
				</a>
				<hr>
				<?php if ($full) : ?>
				<a class="tombol-user" href="<?= base_url('user/pendaftaran') ?>">
					<div class="row pt-2 pb-1 row-tbl-user">
						<div class="col-lg-12">
							<h5 class="text-center">Pendaftaran</h5>
						</div>
					</div>
				</a>
				<hr>
				<a class="tombol-user" href="">
					<div class="row pt-2 pb-1 mb-3 row-tbl-user">
						<div class="col-lg-12">
							<h5 class="text-center">Pembayaran</h5>
						</div>
					</div>
				</a>
				<?php endif; ?>
			</div>
			</div>
		</div>
