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
								<div class="row">
									<div class="col-12 col-md-5 col-lg-5 offset-lg-7 offset-md-7">
										<div class="row no-gutters">
											<div class="col-6">
												<button type="button" id="tambah-perorangan" class="btn btn-info btn-block">Tambah pemain</button>
											</div>
											<div class="col-6">
												<button class="btn btn-success btn-block">Submit</button>
											</div>
										</div>
									</div>
								</div>
								<hr>
								<form action="" method="post" id="formPerorangan">
									<div class="perorangan">
										<h5 class="text-center">Pemain 1</h5>
										<div class="form-row">
											<div class="form-group col-lg-6">
												<label for="pemain1">Nama Pemain</label>
												<input type="text" class="form-control" id="pemain1" name="pemain[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain">
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
												<label for="kategori1">Kategori pertandingan</label>
												<select id="kategori1" class="form-control" name="kategori[]">
													<option selected disabled>Pilih salah satu</option>
													<option value="Cepat">Cepat</option>
													<option value="Kilat">Kilat</option>
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
								<div class="row">
									<div class="col-12 col-md-5 col-lg-5 offset-lg-7 offset-md-7">
										<div class="row no-gutters">
											<div class="col-6">
												<button type="button" id="tambah-regu" class="btn btn-info btn-block">Tambah regu</button>
											</div>
											<div class="col-6">
												<button class="btn btn-success btn-block">Submit</button>
											</div>
										</div>
									</div>
								</div>
								<hr>
								<nav>
									<ul class="nav nav-tabs" id="reguTab" role="tablist">
										<li class="nav-item">
											<a class="nav-link regu active" id="regu1" data-toggle="tab" href="#regu1" data-regu="1" role="tab" aria-controls="regu1" aria-selected="true">Regu 1</a>
										</li>
									</ul>
								</nav>
								<hr>
								<form action="" method="post" id="formBeregu">
									<div class="beregu">
										<div class="tab-content" id="reguTabContent">
											<div class="tab-pane fade show active" id="regu1" role="tabpanel" aria-labelledby="nav-home-tab">
												<h5 class="text-center">REGU 1</h5>
												<div class="form-row">
													<div class="form-group col-lg-4">
														<label for="namaRegu1">Nama Regu</label>
														<input type="text" class="form-control" id="namaRegu1" name="regu[]" aria-describedby="namaRegu" placeholder="Masukkan nama regu 1">
													</div>
													<div class="form-group col-lg-4">
														<label for="instansiRegu1">Asal instansi</label>
														<input type="text" class="form-control" id="instansiRegu1" name="instansiRegu[]" aria-describedby="instansi" placeholder="Masukkan asal instansi">
													</div>
													<div class="form-group col-lg-4">
														<label for="kategoriRegu1">Kategori pertandingan</label>
														<select id="kategoriRegu1" class="form-control" name="kategoriRegu[]">
															<option selected disabled>Pilih salah satu</option>
															<option value="Cepat">Beregu Cepat</option>
															<option value="Kilat">Beregu Kilat</option>
														</select>
													</div>
												</div>
												<hr>
												<h6><b>Pemain 1</b></h6>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label for="pemain1_1">Nama Pemain 1</label>
														<input type="text" class="form-control" id="pemain1_1" name="pemain1[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 1">
														<small id="pemain1" class="form-text text-muted">Gelar diberi tanda kurung</small>
													</div>
													<div class="form-group col-lg-6">
														<label for="jenisKelamin1_1">Jenis Kelamin</label>
														<select id="jenisKelamin1_1" class="form-control" name="jenisKelamin1[]">
															<option selected disabled>Pilih salah satu</option>
															<option value="L">Laki-laki</option>
															<option value="P">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label for="nim1_1">NIM/NIS</label>
														<input type="text" class="form-control" id="nim1_1" name="nim1[]" aria-describedby="nim" placeholder="Masukkan nim/nis">
													</div>
													<div class="form-group col-lg-6">
														<label for="fakultas1_1">Fakultas</label>
														<input type="text" class="form-control" id="fakultas1_1" name="fakultas1[]" aria-describedby="fakultas" placeholder="Masukkan fakultas">
														<small id="fakultas1" class="form-text text-muted">Untuk Pelajar SMA diisi dengan jurusan yang diambil</small>
													</div>
												</div>
												<hr>
												<h6><b>Pemain 2</b></h6>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label for="pemain2_1">Nama Pemain 2</label>
														<input type="text" class="form-control" id="pemain2_1" name="pemain2[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 2">
														<small id="pemain2_1" class="form-text text-muted">Gelar diberi tanda kurung</small>
													</div>
													<div class="form-group col-lg-6">
														<label for="jenisKelamin2_1">Jenis Kelamin</label>
														<select id="jenisKelamin2_1" class="form-control" name="jenisKelamin2[]">
															<option selected disabled>Pilih salah satu</option>
															<option value="L">Laki-laki</option>
															<option value="P">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label for="nim2_1">NIM/NIS</label>
														<input type="text" class="form-control" id="nim2_1" name="nim2[]" aria-describedby="nim" placeholder="Masukkan nim/nis">
													</div>
													<div class="form-group col-lg-6">
														<label for="fakultas2_1">Fakultas</label>
														<input type="text" class="form-control" id="fakultas2_1" name="fakultas2[]" aria-describedby="fakultas" placeholder="Masukkan fakultas">
														<small id="fakultas1" class="form-text text-muted">Untuk Pelajar SMA diisi dengan jurusan yang diambil</small>
													</div>
												</div>
												<hr>
												<h6><b>Pemain 3</b></h6>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label for="pemain3_1">Nama Pemain 3</label>
														<input type="text" class="form-control" id="pemain3_1" name="pemain3[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 3">
														<small id="pemain1" class="form-text text-muted">Gelar diberi tanda kurung</small>
													</div>
													<div class="form-group col-lg-6">
														<label for="jenisKelamin3_1">Jenis Kelamin</label>
														<select id="jenisKelamin3_1" class="form-control" name="jenisKelamin3[]">
															<option selected disabled>Pilih salah satu</option>
															<option value="L">Laki-laki</option>
															<option value="P">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label for="nim3_1">NIM/NIS</label>
														<input type="text" class="form-control" id="nim3_1" name="nim3[]" aria-describedby="nim" placeholder="Masukkan nim/nis">
													</div>
													<div class="form-group col-lg-6">
														<label for="fakultas3_1">Fakultas</label>
														<input type="text" class="form-control" id="fakultas3_1" name="fakultas3[]" aria-describedby="fakultas" placeholder="Masukkan fakultas">
														<small id="fakultas3_1" class="form-text text-muted">Untuk Pelajar SMA diisi dengan jurusan yang diambil</small>
													</div>
												</div>
												<hr>
												<h6><b>Pemain 4</b></h6>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label for="pemain4_1">Nama Pemain 3</label>
														<input type="text" class="form-control" id="pemain4_1" name="pemain4[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 4">
														<small id="pemain4_1" class="form-text text-muted">Gelar diberi tanda kurung</small>
													</div>
													<div class="form-group col-lg-6">
														<label for="jenisKelamin4_1">Jenis Kelamin</label>
														<select id="jenisKelamin4_1" class="form-control" name="jenisKelamin4[]">
															<option selected disabled>Pilih salah satu</option>
															<option value="L">Laki-laki</option>
															<option value="P">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label for="nim4_1">NIM/NIS</label>
														<input type="text" class="form-control" id="nim4_1" name="nim4[]" aria-describedby="nim" placeholder="Masukkan nim/nis">
													</div>
													<div class="form-group col-lg-6">
														<label for="fakultas4_1">Fakultas</label>
														<input type="text" class="form-control" id="fakultas4_1" name="fakultas4[]" aria-describedby="fakultas" placeholder="Masukkan fakultas">
														<small id="fakultas4_1" class="form-text text-muted">Untuk Pelajar SMA diisi dengan jurusan yang diambil</small>
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
