$('#exampleModal').on('show.bs.modal', function (event) {
	// $('#myInput').trigger('focus')
	let btn = $(event.relatedTarget)
	$(this).find('.modal-title').text("Edit " + btn.data('func'));

	let cond = btn.data('sembarang')
	console.log(cond)

	if (cond == 'paswd') {
		$('.labelModals').addClass('col-sm-4').removeClass('col-sm-2')
		$('.inputModals').addClass('col-sm-8').removeClass('col-sm-10')
		$('#formModal').attr('action', 'user/changepass')
		$('#rowOne').html('Password Lama')
		$('#inputOne').val('').attr('type', 'password')
		$('#rowTwo').html('Password Baru')
		$('#inputTwo').val('').attr('type', 'password')
		$('#rowThree').html('Konfirmasi Password Baru')
		$('#inputThree').val('').attr('type', 'password')
	} else {
	}
})

$('#myToast').on('hidden.bs.toast', function () {
	// do something...
})

$('#instagramModal').on('show.bs.modal', function (event) {
	let btn = $(event.relatedTarget)

	let cond = btn.data('link')
	$('.instagram-media').attr('data-instgrm-permalink', cond)
	$('.instagram-media').attr('src', cond + "embed/captioned/")
	console.log(cond)
})

// owl carousel home
$(document).ready(function () {
	var owl = $('.owl-home');
	owl.owlCarousel({
		loop: true,
		autoplay: true,
		autoplaySpeed: 2000,
		autoplayTimeout: 5000,
		autoplayHoverPause: false,
		responsiveClass: true,
		margin: 10,
		nav: true,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 2
			},
			1000: {
				items: 3
			}
		}
	});
	// Go to the next item
	$('.owl-next').click(function () {
		owl.trigger('next.owl.carousel');
	})
	// Go to the previous item
	$('.owl-prev').click(function () {
		// With optional speed parameter
		// Parameters has to be in square bracket '[]'
		owl.trigger('prev.owl.carousel', [300]);
	})
});

// owl carousel dokumentasi
$(document).ready(function () {
	$('.owl-docs').owlCarousel({
		loop: true,
		autoplay: true,
		autoplaySpeed: 2000,
		autoplayTimeout: 5000,
		autoplayHoverPause: false,
		responsiveClass: true,
		margin: 10,
		nav: true,
		responsive: {
			0: {
				items: 2
			},
			600: {
				items: 3
			},
			1000: {
				items: 4
			}
		}
	});
});

var urutanPerorangan = 2;
var urutanBeregu = 2;
$('.pilih-daftar').click(function (e) {
	let btn = $(this)
	let cond = btn.data('func')
	console.log(btn.data('func'))
	Swal.fire({
		title: 'Apakah kamu yakin memilih ' + cond + '?',
		text: "Data yang telah diinput pada kategori sebelumnya akan terhapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yakin',
		cancelButtonText: 'Tidak',
	}).then((result) => {
		if (result.value) {
			if (cond == 'perorangan') {
				$('#pills-perorangan').addClass('active show')
				$('#pills-beregu').removeClass('active show')
				$('#formBeregu')[0].reset()
				for (let i = 2; i < urutanBeregu; i++) {
					$('.regu-tambahan' + i).html('')
				}
			} else {
				$('#pills-perorangan').removeClass('active show')
				$('#pills-beregu').addClass('active show')
				$('#formPerorangan')[0].reset()
				for (let i = 2; i < urutanPerorangan; i++) {
					$('.perorangan-tambahan' + i).html('')
				}
			}
		}
	})
})

$('.perorangan').on('click', '#hapus', function (e) { //hapus perorangan
	let btn = $(this).data('urutan')
	Swal.fire({
		title: 'Apakah kamu yakin?',
		text: "Data pemain yang telah dihapus tidak dapat dikembalikan",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yakin!',
		cancelButtonText: 'Tidak',
	}).then((result) => {
		if (result.value) {
			$('.perorangan-tambahan' + btn).html('')
		}
	})
})

$('.beregu').on('click', '#hapusRegu', function (e) { //hapus beregu
	let cond = $(this).data('urutanregu')

	Swal.fire({
		title: 'Apakah kamu yakin?',
		text: "Data regu yang telah dihapus tidak dapat dikembalkan",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yakin!',
		cancelButtonText: 'Tidak',
	}).then((result) => {
		if (result.value) {
			$('.regu-tambahan' + cond).html('')
			$('#reguTab').find('#regu' + (cond - 1)).addClass('active')
			$('#reguTabContent').find('#regu' + (cond - 1)).addClass('active show')
		}
	})
})


$('#tambah-perorangan').click(function (e) { //tambah perorangan
	$('.perorangan').append('<div class="perorangan-tambahan' + urutanPerorangan + '">' +
		'<h5 class="font-weight-bold">Pemain ' + urutanPerorangan + '</h5>' +
		'<div class="form-row">' +
		'<div class="form-group col-lg-6">' +
		'<label for="pemain' + urutanPerorangan + '">Nama Pemain</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Gelar diberi tanda kurung"></i>' +
		'<input type="text" class="form-control" id="pemain' + urutanPerorangan + '" name="pemain[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain" required>' +
		'</div>' +
		'<div class="form-group col-lg-6">' +
		'<label for="instansi' + urutanPerorangan + '">Asal instansi</label>' +
		'<input type="text" class="form-control" id="instansi' + urutanPerorangan + '" name="instansi[]" aria-describedby="instansi" placeholder="Masukkan asal instansi" required>' +
		'</div>' +
		'</div>' +
		'<div class="form-row">' +
		'<div class="form-group col-lg-4">' +
		'<label for="jenisKelamin' + urutanPerorangan + '">Jenis Kelamin</label>' +
		'<select id="jenisKelamin' + urutanPerorangan + '" class="form-control" name="jenisKelamin[]" required>' +
		'<option selected disabled>Pilih salah satu</option>' +
		'<option value="L">Laki-laki</option>' +
		'<option value="P">Perempuan</option>' +
		'</select>' +
		'</div>' +
		'<div class="form-group col-lg-4">' +
		'<label for="nim' + urutanPerorangan + '">NIM/NIS</label>' +
		'<input type="text" class="form-control" id="nim' + urutanPerorangan + '" name="nim[]" aria-describedby="nim" placeholder="Masukkan nim/nis" required>' +
		'</div>' +
		'<div class="form-group col-lg-4">' +
		'<label for="fakultas' + urutanPerorangan + '">Fakultas</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Untuk Pelajar SMA diisi dengan jurusan yang diambil"></i>' +
		'<input type="text" class="form-control" id="fakultas' + urutanPerorangan + '" name="fakultas[]" aria-describedby="fakultas" placeholder="Masukkan fakultas" required>' +
		'</div>' +
		'</div>' +
		'<div class="form-row">' +
		'<div class="form-group col-lg-6">' +
		'<label for="foto_diri' + urutanPerorangan + '">Upload foto diri</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>' +
		'<input type="file" class="form-control-file" id="foto_diri' + urutanPerorangan + '"  name="foto_diri[]" required accept="image/*">' +
		'</div>' +
		'<div class="form-group col-lg-6">' +
		'<label for="foto_kartu' + urutanPerorangan + '">Upload foto kartu pelajar</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>' +
		'<input type="file" class="form-control-file" id="foto_kartu' + urutanPerorangan + '"  name="foto_kartu[]" required accept="image/*">' +
		'</div>' +
		'</div>' +
		'<div class="form-row">' +
		'<div class="form-group col-lg-6">' +
		'<label for="kategori' + urutanPerorangan + '">Kategori pertandingan</label>' +
		'<select id="kategori' + urutanPerorangan + '" class="form-control" name="kategori[]" required>' +
		'<option selected disabled>Pilih salah satu</option>' +
    '<option value="1">Presale 1 Rapid</option>'+
    '<option value="3">Presale 1 Blitz</option>'+
    '<option value="13">Presale 1 Rapid + Paket B Perorangan/Official</option>'+
    '<option value="14">Presale 1 Rapid + Paket D Perorangan/Official</option>'+
    '<option value="15">Presale 1 Blitz + Paket B Perorangan/Official</option>'+
    '<option value="16">Presale 1 Blitz + Paket D Perorangan/Official</option>'+
		'</select>' +
		'</div>' +
		'<div class="form-group col-lg-6">' +
		'<label>Tekan tombol dibawah untuk menghapus pemain ini</label>' +
		'<button type="button" class="btn btn-danger btn-block" data-urutan="' + urutanPerorangan++ + '"id="hapus">Hapus pemain</button>' +
		'</div>' +
		'</div>' +
		'<hr>' +
		'</div>')
	Swal.fire({
		title: 'Berhasil',
		text: 'Pemain berhasil ditambah',
		type: 'success'
	})
	$("[data-toggle='tooltip']").tooltip()
})

$('#reguTab').on('click', '.regu', function (e) { //ganti tab beregu
	let cond = $(this).data('regu')
	$('#reguTab').find('.active').removeClass('active')
	$('#reguTab').find('#regu' + cond).addClass('active')
	$('#reguTabContent').find('.active').removeClass('active show')
	$('#reguTabContent').find('#regu' + cond).addClass('active show')
})

$('#tambah-regu').click(function (e) { //tambah beregu
	$('#reguTab').find('.active').removeClass('active')
	$('#reguTabContent').find('.active').removeClass('active show')

	$('#reguTab').append(`<div class="regu-tambahan` + urutanBeregu + `">
	<li class="nav-item">
	<a class="nav-link regu active" id="regu`+ urutanBeregu + `" data-regu="` + urutanBeregu + `" data-toggle="tab" href="#regu` + urutanBeregu + `" role="tab" aria-controls="regu` + urutanBeregu + `">Regu ` + urutanBeregu + `</a>
</li>
</div>`)
	$('#reguTabContent').append(`
		<div class="tab-pane fade show active regu-tambahan` + urutanBeregu + `" id="regu` + urutanBeregu + `" role="tabpanel" aria-labelledby="nav-home-tab">
			<h5 class="text-center mt-2">REGU `+ urutanBeregu + `</h5>
			<div class="form-row">
				<div class="form-group col-lg-4">
					<label for="namaRegu`+ urutanBeregu + `">Nama Regu</label>
					<input type="text" class="form-control" id="namaRegu`+ urutanBeregu + `" name="regu[]" aria-describedby="namaRegu" placeholder="Masukkan nama regu ` + urutanBeregu + `" required>
				</div>
				<div class="form-group col-lg-4">
					<label for="instansiRegu`+ urutanBeregu + `">Asal instansi</label>
					<input type="text" class="form-control" id="instansiRegu`+ urutanBeregu + `" name="instansiRegu[]" aria-describedby="instansi" placeholder="Masukkan asal instansi" required>
				</div>
				<div class="form-group col-lg-4">
					<label for="kategoriRegu`+ urutanBeregu + `">Kategori pertandingan</label>
					<select id="kategoriRegu`+ urutanBeregu + `" class="form-control" name="kategoriRegu[]" required>
						<option selected disabled>Pilih salah satu</option>
						<option value="5">Paket A Beregu Rapid</option>
						<option value="6">Paket B Beregu Rapid</option>
						<option value="7">Paket C Beregu Rapid</option>
						<option value="8">Paket Blitz</option>
					</select>
				</div>
			</div>
			<hr>
			<h6><b>Pemain 1 (Captain regu)</b></h6>
			<div class="form-row">
				<div class="form-group col-lg-6">
					<label for="pemain1_`+ urutanBeregu + `">Nama Pemain 1 (sebagai captain regu)</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Gelar diberi tanda kurung"></i>
					<input type="text" class="form-control" id="pemain1_`+ urutanBeregu + `" name="pemain1[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 1" required>
				</div>
				<div class="form-group col-lg-6">
					<label for="jenisKelamin1_`+ urutanBeregu + `">Jenis Kelamin</label>
					<select id="jenisKelamin1_`+ urutanBeregu + `" class="form-control" name="jenisKelamin1[]" required>
						<option selected disabled>Pilih salah satu</option>
						<option value="L">Laki-laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-lg-4">
					<label for="nim1_`+ urutanBeregu + `">NIM/NIS</label>
					<input type="text" class="form-control" id="nim1_`+ urutanBeregu + `" name="nim1[]" aria-describedby="nim" placeholder="Masukkan nim/nis" required>
				</div>
				<div class="form-group col-lg-4">
					<label for="fakultas1_`+ urutanBeregu + `">Fakultas</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Untuk Pelajar SMA diisi dengan jurusan yang diambil"></i>
					<input type="text" class="form-control" id="fakultas1_`+ urutanBeregu + `" name="fakultas1[]" aria-describedby="fakultas" placeholder="Masukkan fakultas" required>
				</div>
				<div class="form-group col-lg-4">
					<label for="alergi1_`+ urutanBeregu + `">Alergi makanan</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Kosongi jika tidak memiliki alergi"></i>
					<input type="text" class="form-control" id="alergi1_`+ urutanBeregu + `" name="alergi1[]" aria-describedby="nim" placeholder="Masukkan alergi makanan">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-lg-6">
					<label for="foto_diri1_`+ urutanBeregu + `">Upload foto diri</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
          <input type="file" class="form-control-file" id="foto_diri1_`+ urutanBeregu + `" name="foto_diri1[]" accept="image/*" required>
				</div>
				<div class="form-group col-lg-6">
					<label for="foto_kartu1_`+ urutanBeregu + `">Upload foto kartu pelajar</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
          <input type="file" class="form-control-file" id="foto_kartu1_`+ urutanBeregu + `" name="foto_kartu1[]" accept="image/*" required>
				</div>
			</div>
			<hr>
			<h6><b>Pemain 2</b></h6>
			<div class="form-row">
				<div class="form-group col-lg-6">
					<label for="pemain2_`+ urutanBeregu + `">Nama Pemain 2</label>
					<input type="text" class="form-control" id="pemain2_`+ urutanBeregu + `" name="pemain2[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 2" required>
					<small id="pemain2_`+ urutanBeregu + `" class="form-text text-muted">Gelar diberi tanda kurung</small>
				</div>
				<div class="form-group col-lg-6">
					<label for="jenisKelamin2_`+ urutanBeregu + `">Jenis Kelamin</label>
					<select id="jenisKelamin2_`+ urutanBeregu + `" class="form-control" name="jenisKelamin2[]" required>
						<option selected disabled>Pilih salah satu</option>
						<option value="L">Laki-laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-lg-4">
					<label for="nim2_`+ urutanBeregu + `">NIM/NIS</label>
					<input type="text" class="form-control" id="nim2_`+ urutanBeregu + `" name="nim2[]" aria-describedby="nim" placeholder="Masukkan nim/nis" required>
				</div>
				<div class="form-group col-lg-4">
					<label for="fakultas2_`+ urutanBeregu + `">Fakultas</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Untuk Pelajar SMA diisi dengan jurusan yang diambil"></i>
					<input type="text" class="form-control" id="fakultas2_`+ urutanBeregu + `" name="fakultas2[]" aria-describedby="fakultas" placeholder="Masukkan fakultas" required>
				</div>
				<div class="form-group col-lg-4">
					<label for="alergi2_`+ urutanBeregu + `">Alergi makanan</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Kosongi jika tidak memiliki alergi"></i>
					<input type="text" class="form-control" id="alergi2_`+ urutanBeregu + `" name="alergi2[]" aria-describedby="nim" placeholder="Masukkan alergi makanan">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-lg-6">
					<label for="foto_diri2_`+ urutanBeregu + `">Upload foto diri</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
          <input type="file" class="form-control-file" id="foto_diri2_`+ urutanBeregu + `" name="foto_diri2[]" accept="image/*" required>
				</div>
				<div class="form-group col-lg-6">
					<label for="foto_kartu2_`+ urutanBeregu + `">Upload foto kartu pelajar</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
          <input type="file" class="form-control-file" id="foto_kartu2_`+ urutanBeregu + `" name="foto_kartu2[]" accept="image/*" required>
				</div>
			</div>
			<hr>
			<h6><b>Pemain 3</b></h6>
			<div class="form-row">
				<div class="form-group col-lg-6">
					<label for="pemain3_`+ urutanBeregu + `">Nama Pemain 3</label>
					<input type="text" class="form-control" id="pemain3_`+ urutanBeregu + `" name="pemain3[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 3" required>
					<small id="pemain3_`+ urutanBeregu + `" class="form-text text-muted">Gelar diberi tanda kurung</small>
				</div>
				<div class="form-group col-lg-6">
					<label for="jenisKelamin3_`+ urutanBeregu + `">Jenis Kelamin</label>
					<select id="jenisKelamin3_`+ urutanBeregu + `" class="form-control" name="jenisKelamin3[]" required>
						<option selected disabled>Pilih salah satu</option>
						<option value="L">Laki-laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-lg-4">
					<label for="nim3_`+ urutanBeregu + `">NIM/NIS</label>
					<input type="text" class="form-control" id="nim3_`+ urutanBeregu + `" name="nim3[]" aria-describedby="nim" placeholder="Masukkan nim/nis" required>
				</div>
				<div class="form-group col-lg-4">
					<label for="fakultas3_`+ urutanBeregu + `">Fakultas</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Untuk Pelajar SMA diisi dengan jurusan yang diambil"></i>
					<input type="text" class="form-control" id="fakultas3_`+ urutanBeregu + `" name="fakultas3[]" aria-describedby="fakultas" placeholder="Masukkan fakultas" required>
				</div>
				<div class="form-group col-lg-4">
					<label for="alergi3_`+ urutanBeregu + `">Alergi makanan</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Kosongi jika tidak memiliki alergi"></i>
					<input type="text" class="form-control" id="alergi3_`+ urutanBeregu + `" name="alergi3[]" aria-describedby="nim" placeholder="Masukkan alergi makanan">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-lg-6">
					<label for="foto_diri3_`+ urutanBeregu + `">Upload foto diri</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
          <input type="file" class="form-control-file" id="foto_diri3_`+ urutanBeregu + `" name="foto_diri3[]" accept="image/*" required>
				</div>
				<div class="form-group col-lg-6">
					<label for="foto_kartu3_`+ urutanBeregu + `">Upload foto kartu pelajar</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
          <input type="file" class="form-control-file" id="foto_kartu3_`+ urutanBeregu + `" name="foto_kartu3[]" accept="image/*" required>
				</div>
			</div>
			<hr>
			<h6><b>Pemain 4</b></h6>
			<div class="form-row">
				<div class="form-group col-lg-6">
					<label for="pemain4_`+ urutanBeregu + `">Nama Pemain 4</label>
					<input type="text" class="form-control" id="pemain4_`+ urutanBeregu + `" name="pemain4[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 4" required>
					<small id="pemain4_`+ urutanBeregu + `" class="form-text text-muted">Gelar diberi tanda kurung</small>
				</div>
				<div class="form-group col-lg-6">
					<label for="jenisKelamin4_`+ urutanBeregu + `">Jenis Kelamin</label>
					<select id="jenisKelamin4_`+ urutanBeregu + `" class="form-control" name="jenisKelamin4[]" required>
						<option selected disabled>Pilih salah satu</option>
						<option value="L">Laki-laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-lg-4">
					<label for="nim4_`+ urutanBeregu + `">NIM/NIS</label>
					<input type="text" class="form-control" id="nim4_`+ urutanBeregu + `" name="nim4[]" aria-describedby="nim" placeholder="Masukkan nim/nis" required>
				</div>
				<div class="form-group col-lg-4">
					<label for="fakultas4_`+ urutanBeregu + `">Fakultas</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Untuk Pelajar SMA diisi dengan jurusan yang diambil"></i>
					<input type="text" class="form-control" id="fakultas4_`+ urutanBeregu + `" name="fakultas4[]" aria-describedby="fakultas" placeholder="Masukkan fakultas" required>
				</div>
				<div class="form-group col-lg-4">
					<label for="alergi4_`+ urutanBeregu + `">Alergi makanan</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Kosongi jika tidak memiliki alergi"></i>
					<input type="text" class="form-control" id="alergi4_`+ urutanBeregu + `" name="alergi4[]" aria-describedby="nim" placeholder="Masukkan alergi makanan">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-lg-6">
					<label for="foto_diri4_`+ urutanBeregu + `">Upload foto diri</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
          <input type="file" class="form-control-file" id="foto_diri4_`+ urutanBeregu + `" name="foto_diri4[]" accept="image/*" required>
				</div>
				<div class="form-group col-lg-6">
					<label for="foto_kartu4_`+ urutanBeregu + `">Upload foto kartu pelajar</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
          <input type="file" class="form-control-file" id="foto_kartu4_`+ urutanBeregu + `" name="foto_kartu4[]" accept="image/*" required>
				</div>
			</div>
			<hr>
			<h6><b>Official</b> (Kosongi jika tidak ada official)</h6>
				<div class="form-row">
					<div class="form-group col-lg-6">
						<label for="official1_`+ urutanBeregu + `">Nama Official</label>
						<input type="text" class="form-control" id="official1_`+ urutanBeregu + `" name="official1[]" aria-describedby="namaPemain" placeholder="Masukkan nama official 1">
						<input type="text" class="form-control" id="official2_`+ urutanBeregu + `" name="official2[]" aria-describedby="namaPemain" placeholder="Masukkan nama official 2">
						<small id="pemain4_1" class="form-text text-muted">Gelar diberi tanda kurung</small>
					</div>
					<div class="form-group col-lg-6">
						<label for="jk_official1_`+ urutanBeregu + `">Jenis Kelamin</label>
						<select id="jk_official1_`+ urutanBeregu + `" class="form-control" name="jk_official1[]">
							<option selected disabled>Official 1</option>
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
							<option>Tidak ada official 1</option>
						</select>
						<select id="jk_official2_`+ urutanBeregu + `" class="form-control" name="jk_official2[]">
							<option selected disabled>Official 2</option>
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
							<option>Tidak ada official 2</option>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-lg-4">
						<label for="sebagai1_`+ urutanBeregu + `">Sebagai</label>
						<input type="text" class="form-control" id="sebagai1_`+ urutanBeregu + `" name="sebagai1[]" aria-describedby="nim" placeholder="Masukkan kedudukan official 1">
						<input type="text" class="form-control" id="sebagai2_`+ urutanBeregu + `" name="sebagai2[]" aria-describedby="nim" placeholder="Masukkan kedudukan official 2">
					</div>
					<div class="form-group col-lg-4">
						<label for="alergi_official1_`+ urutanBeregu + `">Alergi makanan</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Kosongi jika tidak memiliki alergi"></i>
						<input type="text" class="form-control" id="alergi_official1_`+ urutanBeregu + `" name="alergi_official1[]" aria-describedby="nim" placeholder="Masukkan alergi official 1">
						<input type="text" class="form-control" id="alergi_official2_`+ urutanBeregu + `" name="alergi_official2[]" aria-describedby="nim" placeholder="Masukkan alergi official 2">
					</div>
					<div class="form-group col-lg-4">
					<label for="paket_official_`+ urutanBeregu + `">Pilih paket</label>
						<select id="paket_official_`+ urutanBeregu + `" class="form-control" name="paket_official[]">
							<option selected disabled>Pilih salah satu</option>
							<option value="9">Paket A Perorangan/Official 2 orang</option>
							<option value="10">Paket B Perorangan/Official 1 orang</option>
							<option value="11">Paket C Perorangan/Official 2 orang</option>
							<option value="12">Paket D Perorangan/Official 1 orang</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<label>Tekan tombol dibawah untuk menghapus regu ini</label>
						<button type="button" class="btn btn-danger btn-block" data-urutanRegu="`+ urutanBeregu + `" id="hapusRegu">Hapus regu ` + urutanBeregu++ + `</button>
					</div>
				</div>
				<hr>
			</div>`)
	Swal.fire({
		title: 'Berhasil',
		text: 'Regu berhasil ditambah',
		type: 'success'
	})
	$("[data-toggle='tooltip']").tooltip()
})

// Cek ukuran foto yang diupload
$('.user').on('change', 'input[type=file]', function () {
	let filename = $(this).val();
	if (this.files[0].size > 1024000) {
		alert('Ukuran file terlalu besar. Ukuran file anda : ' + this.files[0].size + ' bytes')
		$(this).val('')
	}

	let extension = filename.replace(/^.*\./, '');
	if (extension == filename) {
		extension = '';
	} else {
		extension = extension.toLowerCase();
	}

	switch (extension) {
		case 'jpg':
		case 'jpeg':
		case 'png':
			break;
		default:
			alert("File yang diupload harus berupa file gambar (jpg / jpeg / png)");
			$(this).val('')
	}
});

// mencegah user secara tidak sengaja merefresh halaman saat ngisi form pendaftaran
// $(document).ready(function () {
// 	needToConfirm = false;
// 	window.onbeforeunload = askConfirm;
// });
// function askConfirm() {
// 	if (needToConfirm) {
// 		return "Your unsaved data will be lost.";
// 	}
// }
// $(".user").on('change', 'input', function () {
// 	let res = $(this).val()
// 	if (res == '') {
// 		needToConfirm = false;
// 	} else {
// 		needToConfirm = true;
// 	}
// });

// $('#kategori1').change(function (e) {
// 	console.log('halo')
// })

$(document).ready(function () {
	$('[data-toggle="tooltip"]').tooltip()
});

// $('.form-pendafatan').submit(function(e){
//   e.preventDefault()
//   console.log('sukses dong')
//   return false
//   let form = $(this).parent('form')
//   Swal.fire({
//     title: 'Apakah anda yakin?',
//     text: "Setelah menekan tombol submit, anda tidak dapat mengganti jumlah pemain. Namun anda masih dapat mengganti data diri pemain yang ada",
//     type: 'warning',
//     showCancelButton: true,
//     confirmButtonColor: '#3085d6',
//     cancelButtonColor: '#d33',
//     confirmButtonText: 'Ya',
//     cancelButtonText: 'Tidak'
//   }).then((result) => {
//     if (result.value) {
//       console.log('berhasil')
//     }
//   })
// }