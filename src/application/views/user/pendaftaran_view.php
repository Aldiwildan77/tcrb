			<div class="col-lg-8 offset-lg-1 user pt-5">
				<div class="row">
					<div class="col-12">
						<h3 class="text-center"><b>Pilih Kategori Pendaftaran</b></h3>
					</div>
				</div>
				<ul class="nav nav-pills mb-3 row" id="pills-tab" role="tablist">
					<li class="nav-item col-6">
						<a class="btn btn-outline-primary btn-block pilih-daftar text-center" id="pills-home-tab" data-toggle="pill" data-func="perorangan" href="" role="tab" aria-controls="pills-home" aria-selected="true">Perorangan</a>
					</li>
					<li class="nav-item col-6">
						<a class="btn btn-outline-primary btn-block pilih-daftar text-center " id="pills-profile-tab" data-toggle="pill" data-func="beregu" href="" role="tab" aria-controls="pills-profile" aria-selected="false">Beregu</a>
					</li>
				</ul>
				<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade" id="pills-perorangan" role="tabpanel" aria-labelledby="pills-home-tab">
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
					</div>
					<div class="tab-pane fade" id="pills-beregu" role="tabpanel" aria-labelledby="pills-profile-tab">
						<div class="row">
							<div class="col-12">
								<!-- Beregu -->
								<h4 class="text-center mt-2 mb-2">FORM PENDAFTARAN BEREGU</h4>
								<form action="<?= base_url('user/pendaftaran-proses-regu') ?>" method="post" enctype="multipart/form-data" id="formBeregu">
									<div class="row mb-3">
										<div class="col-12">
											<div class="row no-gutters justify-content-center">
												<div class="col col-auto col-lg col-md col-sm col-xs mx-1">
													<button type="button" class="btn btn-sm btn-warning text-white btn-block" data-toggle="modal" data-target="#modalBeregu">Lihat harga</button>
												</div>
												<div class="col col-auto col-lg col-md col-sm col-xs mx-1">
													<button type="button" id="tambah-regu" class="btn btn-sm btn-info btn-block">Tambah regu</button>
												</div>
												<div class="col col-auto col-lg col-md col-sm col-xs mx-1">
													<button class="btn btn-sm btn-success btn-block">Submit</button>
												</div>
											</div>
										</div>
									</div>
									<nav>
										<ul class="nav nav-tabs" id="reguTab" role="tablist">
											<li class="nav-item">
												<a class="nav-link regu active" id="regu1" data-toggle="tab" href="#regu1" data-regu="1" role="tab" aria-controls="regu1" aria-selected="true">Regu 1</a>
											</li>
										</ul>
									</nav>
									<div class="beregu">
										<div class="tab-content" id="reguTabContent">
											<div class="tab-pane fade show active" id="regu1" role="tabpanel" aria-labelledby="nav-home-tab">
												<h5 class="text-center mt-2">REGU 1</h5>
												<div class="form-row">
													<div class="form-group col-lg-4">
														<label for="namaRegu1">Nama Regu</label>
														<input type="text" class="form-control" id="namaRegu1" name="regu[]" aria-describedby="namaRegu" placeholder="Masukkan nama regu 1" required>
													</div>
													<div class="form-group col-lg-4">
														<label for="instansiRegu1">Asal instansi</label>
														<input type="text" class="form-control" id="instansiRegu1" name="instansiRegu[]" aria-describedby="instansi" placeholder="Masukkan asal instansi" required>
													</div>
													<div class="form-group col-lg-4">
														<label for="kategoriRegu1">Kategori pertandingan</label>
														<select id="kategoriRegu1" class="form-control" name="kategoriRegu[]" required>
															<option selected disabled>Pilih salah satu</option>
															<option value="5">Beregu Cepat Paket A</option>
															<option value="6">Beregu Cepat Paket B</option>
															<option value="7">Beregu Cepat Paket C</option>
															<option value="8">Beregu Kilat</option>
														</select>
													</div>
												</div>
												<hr>
												<h6><b>Pemain 1 (Captain regu)</b></h6>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label for="pemain1_1">Nama Pemain 1 (sebagai captain regu)</label>
														<input type="text" class="form-control" id="pemain1_1" name="pemain1[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 1">
														<small id="pemain1" class="form-text text-muted">Gelar diberi tanda kurung</small>
													</div>
													<div class="form-group col-lg-6">
														<label for="jenisKelamin1_1">Jenis Kelamin</label>
														<select id="jenisKelamin1_1" class="form-control" name="jenisKelamin1[]" required>
															<option selected disabled>Pilih salah satu</option>
															<option value="L">Laki-laki</option>
															<option value="P">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-4">
														<label for="nim1_1">NIM/NIS</label>
														<input type="text" class="form-control" id="nim1_1" name="nim1[]" aria-describedby="nim" placeholder="Masukkan nim/nis" required>
													</div>
													<div class="form-group col-lg-4">
														<label for="fakultas1_1">Fakultas</label>
														<input type="text" class="form-control" id="fakultas1_1" name="fakultas1[]" aria-describedby="fakultas" placeholder="Masukkan fakultas" required>
														<small id="fakultas1" class="form-text text-muted">Untuk Pelajar SMA diisi dengan jurusan yang diambil</small>
													</div>
													<div class="form-group col-lg-4">
														<label for="alergi1_1">Alergi makanan</label>
														<input type="text" class="form-control" id="alergi1_1" name="alergi1[]" aria-describedby="nim" placeholder="Masukkan alergi makanan">
														<small id="alergi1_1" class="form-text text-muted">Kosongi jika tidak memiliki alergi</small>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label for="foto_diri1_1">Upload foto diri</label>
														<input type="file" class="form-control-file" id="foto_diri1_1" name="foto_diri1[]" accept="image/*" required>
														<small id="pemain1" class="form-text text-muted">File berupa 1 foto dan maksimal berukuran 1MB</small>
													</div>
													<div class="form-group col-lg-6">
														<label for="foto_kartu1_1">Upload foto kartu pelajar</label>
														<input type="file" class="form-control-file" id="foto_kartu1_1" name="foto_kartu1[]" accept="image/*" required>
														<small id="pemain1" class="form-text text-muted">File berupa 1 foto dan maksimal berukuran 1MB</small>
													</div>
												</div>
												<hr>
												<h6><b>Pemain 2</b></h6>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label for="pemain2_1">Nama Pemain 2</label>
														<input type="text" class="form-control" id="pemain2_1" name="pemain2[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 2" required>
														<small id="pemain2_1" class="form-text text-muted">Gelar diberi tanda kurung</small>
													</div>
													<div class="form-group col-lg-6">
														<label for="jenisKelamin2_1">Jenis Kelamin</label>
														<select id="jenisKelamin2_1" class="form-control" name="jenisKelamin2[]" required>
															<option selected disabled>Pilih salah satu</option>
															<option value="L">Laki-laki</option>
															<option value="P">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-4">
														<label for="nim2_1">NIM/NIS</label>
														<input type="text" class="form-control" id="nim2_1" name="nim2[]" aria-describedby="nim" placeholder="Masukkan nim/nis" required>
													</div>
													<div class="form-group col-lg-4">
														<label for="fakultas2_1">Fakultas</label>
														<input type="text" class="form-control" id="fakultas2_1" name="fakultas2[]" aria-describedby="fakultas" placeholder="Masukkan fakultas" required>
														<small id="fakultas1" class="form-text text-muted">Untuk Pelajar SMA diisi dengan jurusan yang diambil</small>
													</div>
													<div class="form-group col-lg-4">
														<label for="alergi2_1">Alergi makanan</label>
														<input type="text" class="form-control" id="alergi2_1" name="alergi2[]" aria-describedby="nim" placeholder="Masukkan alergi makanan">
														<small id="alergi2_1" class="form-text text-muted">Kosongi jika tidak memiliki alergi</small>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label for="foto_diri2_1">Upload foto diri</label>
														<input type="file" class="form-control-file" id="foto_diri2_1" name="foto_diri2[]" required>
														<small id="pemain1" class="form-text text-muted">File berupa 1 foto dan maksimal berukuran 1MB</small>
													</div>
													<div class="form-group col-lg-6">
														<label for="foto_kartu2_1">Upload foto kartu pelajar</label>
														<input type="file" class="form-control-file" id="foto_kartu2_1" name="foto_kartu2[]" required>
														<small id="pemain1" class="form-text text-muted">File berupa 1 foto dan maksimal berukuran 1MB</small>
													</div>
												</div>
												<hr>
												<h6><b>Pemain 3</b></h6>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label for="pemain3_1">Nama Pemain 3</label>
														<input type="text" class="form-control" id="pemain3_1" name="pemain3[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 3" required>
														<small id="pemain1" class="form-text text-muted">Gelar diberi tanda kurung</small>
													</div>
													<div class="form-group col-lg-6">
														<label for="jenisKelamin3_1">Jenis Kelamin</label>
														<select id="jenisKelamin3_1" class="form-control" name="jenisKelamin3[]" required>
															<option selected disabled>Pilih salah satu</option>
															<option value="L">Laki-laki</option>
															<option value="P">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-4">
														<label for="nim3_1">NIM/NIS</label>
														<input type="text" class="form-control" id="nim3_1" name="nim3[]" aria-describedby="nim" placeholder="Masukkan nim/nis" required>
													</div>
													<div class="form-group col-lg-4">
														<label for="fakultas3_1">Fakultas</label>
														<input type="text" class="form-control" id="fakultas3_1" name="fakultas3[]" aria-describedby="fakultas" placeholder="Masukkan fakultas" required>
														<small id="fakultas3_1" class="form-text text-muted">Untuk Pelajar SMA diisi dengan jurusan yang diambil</small>
													</div>
													<div class="form-group col-lg-4">
														<label for="alergi3_1">Alergi makanan</label>
														<input type="text" class="form-control" id="alergi3_1" name="alergi3[]" aria-describedby="nim" placeholder="Masukkan alergi makanan">
														<small id="alergi3_1" class="form-text text-muted">Kosongi jika tidak memiliki alergi</small>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label for="foto_diri3_1">Upload foto diri</label>
														<input type="file" class="form-control-file" id="foto_diri3_1" name="foto_diri3[]" required>
														<small id="pemain1" class="form-text text-muted">File berupa 1 foto dan maksimal berukuran 1MB</small>
													</div>
													<div class="form-group col-lg-6">
														<label for="foto_kartu3_1">Upload foto kartu pelajar</label>
														<input type="file" class="form-control-file" id="foto_kartu3_1" name="foto_kartu3[]" required>
														<small id="pemain1" class="form-text text-muted">File berupa 1 foto dan maksimal berukuran 1MB</small>
													</div>
												</div>
												<hr>
												<h6><b>Pemain 4</b></h6>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label for="pemain4_1">Nama Pemain 4</label>
														<input type="text" class="form-control" id="pemain4_1" name="pemain4[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 4" required>
														<small id="pemain4_1" class="form-text text-muted">Gelar diberi tanda kurung</small>
													</div>
													<div class="form-group col-lg-6">
														<label for="jenisKelamin4_1">Jenis Kelamin</label>
														<select id="jenisKelamin4_1" class="form-control" name="jenisKelamin4[]" required>
															<option selected disabled>Pilih salah satu</option>
															<option value="L">Laki-laki</option>
															<option value="P">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-4">
														<label for="nim4_1">NIM/NIS</label>
														<input type="text" class="form-control" id="nim4_1" name="nim4[]" aria-describedby="nim" placeholder="Masukkan nim/nis" required>
													</div>
													<div class="form-group col-lg-4">
														<label for="fakultas4_1">Fakultas</label>
														<input type="text" class="form-control" id="fakultas4_1" name="fakultas4[]" aria-describedby="fakultas" placeholder="Masukkan fakultas" required>
														<small id="fakultas4_1" class="form-text text-muted">Untuk Pelajar SMA diisi dengan jurusan yang diambil</small>
													</div>
													<div class="form-group col-lg-4">
														<label for="alergi4_1">Alergi makanan</label>
														<input type="text" class="form-control" id="alergi4_1" name="alergi4[]" aria-describedby="nim" placeholder="Masukkan alergi makanan">
														<small id="alergi4_1" class="form-text text-muted">Kosongi jika tidak memiliki alergi</small>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label for="foto_diri4_1">Upload foto diri</label>
														<input type="file" class="form-control-file" id="foto_diri4_1" name="foto_diri4[]" required>
														<small id="pemain1" class="form-text text-muted">File berupa 1 foto dan maksimal berukuran 1MB</small>
													</div>
													<div class="form-group col-lg-6">
														<label for="foto_kartu4_1">Upload foto kartu pelajar</label>
														<input type="file" class="form-control-file" id="foto_kartu4_1" name="foto_kartu4[]" required>
														<small id="pemain1" class="form-text text-muted">File berupa 1 foto dan maksimal berukuran 1MB</small>
													</div>
												</div>
												<hr>
												<h6><b>Official</b></h6>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label for="official1_1">Nama Official</label>
														<input type="text" class="form-control" id="official1_1" name="official1[]" aria-describedby="namaPemain" placeholder="Masukkan nama official 1">
														<input type="text" class="form-control" id="official2_1" name="official2[]" aria-describedby="namaPemain" placeholder="Masukkan nama official 2">
														<small id="pemain4_1" class="form-text text-muted">Gelar diberi tanda kurung</small>
													</div>
													<div class="form-group col-lg-6">
														<label for="jk_official1_1">Jenis Kelamin</label>
														<select id="jk_official1_1" class="form-control" name="jk_official1[]">
															<option selected disabled>Official 1</option>
															<option value="L">Laki-laki</option>
															<option value="P">Perempuan</option>
															<option>Tidak ada official 1</option>
														</select>
														<select id="jk_official2_1" class="form-control" name="jk_official2[]">
															<option selected disabled>Official 2</option>
															<option value="L">Laki-laki</option>
															<option value="P">Perempuan</option>
															<option>Tidak ada official 2</option>
														</select>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-4">
														<label for="sebagai1_1">Sebagai</label>
														<input type="text" class="form-control" id="sebagai1_1" name="sebagai1[]" aria-describedby="nim" placeholder="Masukkan kedudukan official 1">
														<input type="text" class="form-control" id="sebagai2_1" name="sebagai2[]" aria-describedby="nim" placeholder="Masukkan kedudukan official 2">
													</div>
													<div class="form-group col-lg-4">
														<label for="alergi_official1_1">Alergi makanan</label>
														<input type="text" class="form-control" id="alergi_official1_1" name="alergi_official1[]" aria-describedby="nim" placeholder="Masukkan alergi official 1">
														<input type="text" class="form-control" id="alergi_official2_1" name="alergi_official2[]" aria-describedby="nim" placeholder="Masukkan alergi official 2">
														<small id="alergi4_1" class="form-text text-muted">Kosongi jika tidak memiliki alergi</small>
													</div>
													<div class="form-group col-lg-4">
														<label for="paket_official_1">Pilih paket</label>
														<select id="paket_official_1" class="form-control" name="paket_official[]">
															<option selected disabled>Pilih salah satu</option>
															<option value="9">Paket A</option>
															<option value="10">Paket B</option>
														</select>
													</div>
												</div>
												<hr>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
			</div>
			</div>

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

			<div class="modal fade" id="modalBeregu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Harga Kategori Beregu</h5>
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
											<td>Beregu Cepat Paket A</td>
											<td>Rp 1.550.000</td>
										</tr>
										<tr>
											<th scope="row">2</th>
											<td>Beregu Cepat Paket B</td>
											<td>Rp 1.400.000</td>
										</tr>
										<tr>
											<th scope="row">3</th>
											<td>Beregu Cepat Paket C</td>
											<td>Rp 500.000</td>
										</tr>
										<tr>
											<th scope="row">4</th>
											<td>Beregu Kilat</td>
											<td>Rp 120.000</td>
										</tr>
										<tr>
											<th scope="row">5</th>
											<td>Personil yang menemani Paket A</td>
											<td>Rp 650.000</td>
										</tr>
										<tr>
											<th scope="row">6</th>
											<td>Personil yang menemani Paket B</td>
											<td>Rp 100.000</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
