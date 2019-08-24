<div class="col-lg-8 offset-lg-1">
	<div class="col-lg-12 user pt-3">
		<div class="row mb-4">
			<div class="col-12">
				<h3 class="text-center"><b>Note</b></h3>
			</div>
		</div>
	</div>
	<div class="user p-4">
		<?php if ($check != null) : ?>
		<div class="row table-responsive">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<th>Nama</th>
						<td colspan="3"><?= $user['nama_lengkap'] ?></td>
						<th>Status</th>
						<td><span class="badge badge-success">Success</span></td>
					</tr>
					<tr>
						<th>Instansi</th>
						<td colspan="3"><?= $user['instansi'] ?></td>
						<th>Tanggal Pembayaran</th>
						<td>1 November 2019</td>
					</tr>
					<tr>
						<th>Telepon</th>
						<td><?= $user['no_telepon'] ?></td>
					</tr>
					<tr>
					</tr>
					<tr>
					</tr>
				</tbody>
			</table>
		</div>
		<?php endif; ?>
		<div class="row justify-content-center mx-auto">
			<?php if ($check == 'orang') : ?>

			<!-- Tabel perorangan -->
			<table class="table table-striped table-borderless table-sm">
				<thead class="thead-dark">
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nama</th>
						<th scope="col">Kategori</th>
						<th scope="col" class="text-right">Harga(IDR)</th>
					</tr>
				</thead>
				<tbody>
					<?php for ($i = 0; $i < sizeof($pemain); $i++) : ?>
					<tr>
						<th scope="row"><?= $i + 1 ?></th>
						<td><?= $pemain[$i]['nama_pemain'] ?></td>
						<td><?= $pemain[$i]['nama_kategori'] ?></td>
						<td class="text-right"><?= $pemain[$i]['harga'] ?></td>
					</tr>
					<?php endfor; ?>
					<tr>
						<th scope="row"> </th>
						<td class="bg-light"> </td>
						<td class="bg-light" style="text-align:right;">Total : </td>
						<td class="bg-dark text-white text-right"><?= $totalHarga ?></td>
					</tr>
				</tbody>
			</table>
			<?php elseif ($check == 'regu') : ?>
			<!-- Tabel beregu -->
			<table class="table table-striped table-borderless table-sm">
				<thead class="thead-dark">
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nama Regu</th>
						<th scope="col">Kategori Regu</th>
						<th scope="col">Nama Pemain</th>
						<th class="text-right" scope="col">Harga(IDR)</th>
					</tr>
				</thead>
				<tbody>
					<?php for ($i = 0; $i < sizeof($regu); $i++) : ?>
					<tr>
						<th rowspan="4" scope="row"><?= $i + 1 ?></th>
						<td rowspan="4"><?= $regu[$i]['nama'] ?></td>
						<td rowspan="4"><?= $regu[$i]['namaPaket'] ?></td>
						<td><?= $pemain[$p]['nama'] ?></td>
						<td class="text-right" rowspan="4"><?= $regu[$i]['total'] ?></td>
					</tr>
					<?php $temp = $p + 4; ?>
					<?php for ($j = $p + 1; $j < $temp; $j++) : ?>
					<tr>
						<td><?= $pemain[$j]['nama'] ?></td>
					</tr>
					<?php endfor; ?>
					<?php $p = $p + 4; ?>
					<?php endfor; ?>
					<tr>
						<td class="bg-light"> </td>
						<td class="bg-light"> </td>
						<td class="bg-light"> </td>
						<td class="bg-light" style="text-align:right;">Total : </td>
						<td class="bg-dark text-white text-right"> <?= $totalHarga['total'] ?></td>
					</tr>
				</tbody>
			</table>
			<?php else : ?>
			<h3>Data kosong. Anda belum melakukan pendaftaran.</h3>
			<?php endif; ?>

			<?php if ($check != null) : ?>
			<?php if ($regu[0]['status_bayar'] == 1) : ?>
			<button type="button" class="btn btn-info btn-lg mt-2" style="border-radius:25px;">Cetak Struk</button>
			<?php else : ?>
			<p>Upload bukti bayar</p>
			<div class="input-group mb-3">
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="inputGroupFile02">
					<label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
				</div>
				<div class="input-group-append">
					<span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
				</div>
			</div>
			<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<?= $this->session->flashdata('message-user') ?>



<!-- untuk aside 3 div,   -->
</div>
</div>
</div>
