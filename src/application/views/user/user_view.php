			<div class="col-lg-8 offset-lg-1 user pt-3">
				<div class="row mx-1">
					<div class="col-lg-7">
						<?= $this->session->flashdata('message-user') ?>
					</div>
					<div class="col-lg-5">
						<div class="float-right mb-2">
							<a class="btn btn-outline-dark" href="<?= base_url('user/edit') ?>">Edit Profil</a>
							<a class="btn btn-outline-dark" href="" data-toggle="modal" data-target="#exampleModal" data-sembarang="paswd" data-func="Password">Ubah Password</a>
						</div>
					</div>
				</div>
				<div class="row mt-3 mb-3 mx-1">
					<div class="col-lg-3"><b>Nama Lengkap</b></div>
					<div class="col-lg-6"><?= $user['nama_lengkap'] ?></div>
				</div>
				<hr>
				<div class="row mt-3 mb-3 mx-1">
					<div class="col-lg-3"><b>Username</b></div>
					<div class="col-lg-6"><?= $user['username'] ?></div>
				</div>
				<hr>
				<div class="row mt-3 mb-3 mx-1">
					<div class="col-lg-3"><b>Email</b></div>
					<div class="col-lg-6"><?= $user['email'] ?></div>
				</div>
				<hr>
				<div class="row mt-3 mb-3 mx-1">
					<div class="col-lg-3"><b>Asal Instansi</b></div>
					<div class="col-lg-6"><?= $user['instansi'] ?></div>
				</div>
				<hr>
				<div class="row mt-3 mb-3 mx-1">
					<div class="col-lg-3"><b>Sebagai</b></div>
					<div class="col-lg-6"><?= $user['role'] ?></div>
				</div>
				<hr>
				<div class="row mt-3 mb-5 mx-1">
					<div class="col-lg-3"><b>No Telepon</b></div>
					<div class="col-lg-6"><?= str_replace(' ', '', $user['no_telepon']) ?></div>
				</div>
			</div>
			</div>
			</div>
			</div>

			<!-- Modal Box -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="" method="post" id="formModal">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label labelModals" id="rowOne"></label>
									<div class="col-sm-10 inputModals">
										<input type="text" class="form-control" id="inputOne" name="inputOne" value="" required>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label labelModals" id="rowTwo"></label>
									<div class="col-sm-10 inputModals">
										<input type="text" class="form-control" id="inputTwo" name="inputTwo" value="" required minlength="6">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label labelModals" id="rowThree"></label>
									<div class="col-sm-10 inputModals">
										<input type="email" class="form-control" id="inputThree" name="inputThree" value="" required minlength="6">
									</div>
								</div>
								<div class="float-right">
									<button type="submit" class="btn btn-success">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
