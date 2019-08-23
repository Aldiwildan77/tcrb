<div class="col-lg-8 offset-lg-1 user pt-5">
	<div class="row">
		<div class="col-12">
			<h3 class="text-center"><b>Pilih Kategori Pendaftaran</b></h3>
		</div>
	</div>
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
					<?php for ($i = 0; $i < sizeof($pemain); $i++) : ?>
					<h5 class="font-weight-bold">Pemain <?= $i + 1 ?></h5>
					<div class="form-row">
						<div class="form-group col-lg-6">
							<label for="pemain<?= $i + 1 ?>">Nama Pemain</label>
							<input type="text" class="form-control" id="pemain<?= $i + 1 ?>" name="pemain[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain" value="<?= $pemain[$i]['nama'] ?>" required>
							<small id="pemain<?= $i + 1 ?>" class="form-text text-muted">Gelar diberi tanda kurung</small>
						</div>
						<div class="form-group col-lg-6">
							<label for="instansi<?= $i + 1 ?>">Asal instansi</label>
							<input type="text" class="form-control" id="instansi<?= $i + 1 ?>" name="instansi[]" aria-describedby="instansi" placeholder="Masukkan asal instansi" value="<?= $pemain[$i]['instansi'] ?>" required>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-lg-4">
							<label for="jenisKelamin<?= $i + 1 ?>">Jenis Kelamin</label>
							<select id="jenisKelamin<?= $i + 1 ?>" class="form-control" name="jenisKelamin[]" required>
								<?php foreach ($jenis_kelamin as $key => $value) : ?>
								<?php if ($pemain[$i]['jenis_kelamin'] == $key) : ?>
								<option value="<?= $key ?>" selected><?= $value ?></option>
								<?php else : ?>
								<option value="<?= $key ?>"><?= $value ?></option>
								<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group col-lg-4">
							<label for="nim<?= $i + 1 ?>">NIM/NIS</label>
							<input type="text" class="form-control" id="nim<?= $i + 1 ?>" name="nim[]" aria-describedby="nim" placeholder="Masukkan nim/nis" value="<?= $pemain[$i]['nim'] ?>" required>
						</div>
						<div class="form-group col-lg-4">
							<label for="fakultas<?= $i + 1 ?>">Fakultas</label>
							<input type="text" class="form-control" id="fakultas<?= $i + 1 ?>" name="fakultas[]" aria-describedby="fakultas" placeholder="Masukkan fakultas" value="<?= $pemain[$i]['jurusan'] ?>" required>
							<small id="fakultas<?= $i + 1 ?>" class="form-text text-muted">Untuk Pelajar SMA diisi dengan jurusan yang diambil</small>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-lg-6">
							<label for="foto_diri<?= $i + 1 ?>">Upload foto diri</label>
							<input type="file" class="form-control-file" id="foto_diri<?= $i + 1 ?>" name="foto_diri[]" accept="image/*" required>
							<small id="foto_diri<?= $i + 1 ?>" class="form-text text-muted">File berupa 1 foto dan maksimal berukuran 1MB</small>
							<img src="<?= base_url('players/foto/') . $pemain[$i]['foto_diri'] ?>" alt="foto <?= $pemain[$i]['nama'] ?>" width="200">
						</div>
						<div class="form-group col-lg-6">
							<label for="foto_kartu<?= $i + 1 ?>">Upload foto kartu pelajar</label>
							<input type="file" class="form-control-file" id="foto_kartu<?= $i + 1 ?>" name="foto_kartu[]" accept="image/*" required>
							<small id="foto_kartu<?= $i + 1 ?>" class="form-text text-muted">File berupa 1 foto dan maksimal berukuran 1MB</small>
							<img src="<?= base_url('players/foto/') . $pemain[$i]['foto_kartu_pelajar'] ?>" alt="foto <?= $pemain[$i]['nama'] ?>" width="200">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-lg-6">
							<label for="kategori<?= $i + 1 ?>">Kategori pertandingan</label>
							<select id="kategori<?= $i + 1 ?>" class="form-control" name="kategori[]" required>
								<?php foreach ($kategoriPemain as $key => $value) : ?>
								<?php if ($pemain[$i]['kategori_id'] == $key) : ?>
								<option value="<?= $key ?>" selected><?= $value ?></option>
								<?php else : ?>
								<option value="<?= $key ?>"><?= $value ?></option>
								<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<hr>
					<?php endfor; ?>
				</div>
			</form>
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
