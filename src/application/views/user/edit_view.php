			<div class="col-lg-8 offset-lg-1 user pt-5">
				<div class="row mb-4 mt-1">
					<div class="col-lg-12">
						<h3 class="text-center"><b>Edit Profil</b></h3>
					</div>
				</div>
				<form action="<?= base_url('user/edit') ?>" method="post">
					<div class="form-group row mx-1">
						<label for="fullname" class="col-sm-3 col-form-label"><b>Nama Lengkap</b></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="fullname" id="fullname" placeholder="Masukkan nama lengkap" value="<?= $user['nama_lengkap']; ?>" required>
							<small class="form-text text-danger"><?= form_error('fullname'); ?></small>
						</div>
					</div>
					<div class="form-group row mx-1">
						<label for="email" class="col-sm-3 col-form-label"><b>Email</b></label>
						<div class="col-sm-9">
							<input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email" value="<?= $user['email']; ?>" required>
							<small class="form-text text-danger"><?= form_error('email'); ?></small>
						</div>
					</div>
					<div class="form-group row mx-1">
						<label for="instansi" class="col-sm-3 col-form-label"><b>Asal Instansi</b></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="instansi" id="instansi" placeholder="Masukkan instansi" value="<?= $user['instansi']; ?>" required>
							<small class="form-text text-danger"><?= form_error('instansi'); ?></small>
						</div>
					</div>
					<div class="form-group row mx-1">
						<label for="role" class="col-sm-3 col-form-label"><b>Sebagai</b></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="role" id="role" placeholder="Masukkan keterangan posisi anda" value="<?= $user['role']; ?>" required>
							<small class="form-text text-danger"><?= form_error('role'); ?></small>
						</div>
					</div>
					<div class="form-group row mx-1">
						<label for="telp" class="col-sm-3 col-form-label"><b>No Telepon</b></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="telp" id="telp" placeholder="Masukkan nomer telepon" value="<?=  str_replace(' ', '',$user['no_telepon'])  ?>" required>
							<small class="form-text text-danger"><?= form_error('telp'); ?></small>
						</div>
					</div>
					<div class="float-right row mx-1 mb-3">
						<div class="col-12">
							<button type="button" class="btn btn-light" onclick="history.back()">Kembali</button>
							<button type="submit" class="btn btn-success">Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
