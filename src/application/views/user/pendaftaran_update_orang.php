<div class="col-lg-8 offset-lg-1 user pt-5">
				<div class="row">
					<div class="col-12">
						<h3 class="text-center"><b>Pilih Kategori Pendaftaran</b></h3>
					</div>
				</div>
				<!-- <ul class="nav nav-pills mb-3 row" id="pills-tab" role="tablist">
					<li class="nav-item col-6">
						<a class="btn btn-outline-primary btn-block pilih-daftar text-center" id="pills-home-tab" data-toggle="pill" data-func="perorangan" href="" role="tab" aria-controls="pills-home" aria-selected="true">Perorangan</a>
					</li>
					<li class="nav-item col-6">
						<a class="btn btn-outline-primary btn-block pilih-daftar text-center " id="pills-profile-tab" data-toggle="pill" data-func="beregu" href="" role="tab" aria-controls="pills-profile" aria-selected="false">Beregu</a>
					</li>
				</ul>
				<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade" id="pills-perorangan" role="tabpanel" aria-labelledby="pills-home-tab"> -->
						<div class="row">
							<div class="col-12">
								<!-- Perorangan -->
								<h4 class="text-center mt-2 mb-2">FORM PENDAFTARAN PERORANGAN</h4>
								<form action="<?= base_url('user/pendaftaran-proses-orang') ?>" method="post" enctype="multipart/form-data" id="formPerorangan">
									<div class="row mb-3">
										<div class="col-12">
											<div class="row no-gutters justify-content-center">
												<div class="col col-auto col-lg col-md col-sm col-xs mx-1">
													<button type="button" class="btn btn-sm btn-warning text-white btn-block" data-toggle="modal" data-target="#modalPerorangan">Lihat harga</button>
												</div>
												<div class="col col-auto col-lg col-md col-sm col-xs mx-1">
													<button type="button" id="tambah-perorangan" class="btn btn-sm btn-info btn-block">Tambah pemain</button>
												</div>
												<div class="col col-auto col-lg col-md col-sm col-xs mx-1">
													<button class="btn btn-sm btn-success btn-block">Submit</button>
												</div>
											</div>
										</div>
									</div>
									<hr>
									<div class="perorangan">
										<h5 class="font-weight-bold">Pemain 1</h5>
										<div class="form-row">
											<div class="form-group col-lg-6">
												<label for="pemain1">Nama Pemain</label>
												<input type="text" class="form-control" id="pemain1" name="pemain[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain" required>
												<small id="pemain1" class="form-text text-muted">Gelar diberi tanda kurung</small>
											</div>
											<div class="form-group col-lg-6">
												<label for="instansi1">Asal instansi</label>
												<input type="text" class="form-control" id="instansi1" name="instansi[]" aria-describedby="instansi" placeholder="Masukkan asal instansi">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-lg-4">
												<label for="jenisKelamin1">Jenis Kelamin</label>
												<select id="jenisKelamin1" class="form-control" name="jenisKelamin[]">
													<option selected disabled>Pilih salah satu</option>
													<option value="L">Laki-laki</option>
													<option value="P">Perempuan</option>
												</select>
											</div>
											<div class="form-group col-lg-4">
												<label for="nim1">NIM/NIS</label>
												<input type="text" class="form-control" id="nim1" name="nim[]" aria-describedby="nim" placeholder="Masukkan nim/nis">
											</div>
											<div class="form-group col-lg-4">
												<label for="fakultas1">Fakultas</label>
												<input type="text" class="form-control" id="fakultas1" name="fakultas[]" aria-describedby="fakultas" placeholder="Masukkan fakultas">
												<small id="fakultas1" class="form-text text-muted">Untuk Pelajar SMA diisi dengan jurusan yang diambil</small>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-lg-6">
												<label for="foto_diri1">Upload foto diri</label>
												<input type="file" class="form-control-file" id="foto_diri1" name="foto_diri[]">
											</div>
											<div class="form-group col-lg-6">
												<label for="foto_kartu1">Upload foto kartu pelajar</label>
												<input type="file" class="form-control-file" id="foto_kartu1" name="foto_kartu[]">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-lg-6">
												<label for="kategori1">Kategori pertandingan</label>
												<select id="kategori1" class="form-control" name="kategori[]">
													<option selected disabled>Pilih salah satu</option>
													<option value="1">Presale 1 Cepat</option>
													<option value="2">Presale 2 Cepat</option>
													<option value="3">Presale 1 Kilat</option>
													<option value="3">Presale 2 Kilat</option>
												</select>
											</div>
										</div>
										<hr>
									</div>
								</form>
							</div>
						</div>
					<!-- </div> -->

			<div class="modal fade" id="modalPerorangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Harga Kategori Perorangan</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Kategori</th>
											<th scope="col">Harga</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">1</th>
											<td>Presale 1 cepat</td>
											<td>Rp 75.000</td>
										</tr>
										<tr>
											<th scope="row">2</th>
											<td>Presale 2 cepat</td>
											<td>Rp 85.000</td>
										</tr>
										<tr>
											<th scope="row">3</th>
											<td>Presale 1 kilat</td>
											<td>Rp 25.000</td>
										</tr>
										<tr>
											<th scope="row">4</th>
											<td>Presale 2 kilat</td>
											<td>Rp 35.000</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
