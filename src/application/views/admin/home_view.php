<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>Admin</title>
</head>

<body>
	<div class="container-fluid mt-3">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="text-center">ADMIN</h3>
				<?= $this->session->flashdata('message') ?>
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>User</th>
								<th>Nama pemain</th>
								<th>NIM</th>
								<th>Jenis kelamin</th>
								<th>Instansi</th>
								<th>Jurusan</th>
								<th>Foto diri</th>
								<th>Foto kartu pelajar</th>
								<th>Biaya</th>
								<th>Bukti bayar</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php for ($i = 0; $i < sizeof($user); $i++) : ?>
							<tr>
								<th rowspan="<?= $user[$i]['jumlah'] ?>"><?= $i+1 ?></th>
								<td rowspan="<?= $user[$i]['jumlah'] ?>"><?= $user[$i]['username'] ?></td>
								<td><?= $pemain[$i]['nama'] ?></td>
								<td><?= $pemain[$i]['nim'] ?></td>
								<td><?= $pemain[$i]['jenis_kelamin'] ?></td>
								<td><?= $pemain[$i]['instansi'] ?></td>
								<td><?= $pemain[$i]['jurusan'] ?></td>
								<td><?= $pemain[$i]['foto_diri'] ?></td>
								<td><?= $pemain[$i]['foto_kartu_pelajar'] ?></td>
								<td rowspan="<?= $user[$i]['jumlah'] ?>"><?= $user[$i]['total'] ?></td>
								<td rowspan="<?= $user[$i]['jumlah'] ?>"><?= $user[$i]['bukti_bayar'] ?></td>
								<td rowspan="<?= $user[$i]['jumlah'] ?>">Valid</td>
							</tr>
							<?php for ($j = 1; $j < $user[$i]['jumlah'] ; $j++) : ?>
							<tr>
								<td><?= $pemain[$j]['nama'] ?></td>
								<td><?= $pemain[$j]['nim'] ?></td>
								<td><?= $pemain[$j]['jenis_kelamin'] ?></td>
								<td><?= $pemain[$j]['instansi'] ?></td>
								<td><?= $pemain[$j]['jurusan'] ?></td>
								<td><?= $pemain[$j]['foto_diri'] ?></td>
								<td><?= $pemain[$j]['foto_kartu_pelajar'] ?></td>
							</tr>
							<?php endfor; ?>
							<?php endfor; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>