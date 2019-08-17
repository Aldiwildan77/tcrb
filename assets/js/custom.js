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
		text: "Data yang telah anda masukkan di kategori sebelumnya akan hilang semua",
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
		text: "Data pemain yang telah dihapus tidak dapat dikembalkan",
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
			$('#reguTab').find('#regu' + (cond -1)).addClass('active')
			$('#reguTabContent').find('#regu' + (cond - 1)).addClass('active show')
		}
	})
})


$('#tambah-perorangan').click(function (e) { //tambah perorangan
	$('.perorangan').append('<div class="perorangan-tambahan' + urutanPerorangan + '">' +
		'<h5 class="text-center">Pemain ' + urutanPerorangan + '</h5>' +
		'<div class="form-row">' +
		'<div class="form-group col-lg-6">' +
		'<label for="pemain' + urutanPerorangan + '">Nama Pemain</label>' +
		'<input type="text" class="form-control" id="pemain' + urutanPerorangan + '" name="pemain[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain">' +
		'<small id="pemain' + urutanPerorangan + '" class="form-text text-muted">Gelar diberi tanda kurung</small>' +
		'</div>' +
		'<div class="form-group col-lg-6">' +
		'<label for="instansi' + urutanPerorangan + '">Asal instansi</label>' +
		'<input type="text" class="form-control" id="instansi' + urutanPerorangan + '" name="instansi[]" aria-describedby="instansi" placeholder="Masukkan asal instansi">' +
		'</div>' +
		'</div>' +
		'<div class="form-row">' +
		'<div class="form-group col-lg-4">' +
		'<label for="jenisKelamin' + urutanPerorangan + '">Jenis Kelamin</label>' +
		'<select id="jenisKelamin' + urutanPerorangan + '" class="form-control" name="jenisKelamin[]">' +
		'<option selected disabled>Pilih salah satu</option>' +
		'<option value="L">Laki-laki</option>' +
		'<option value="P">Perempuan</option>' +
		'</select>' +
		'</div>' +
		'<div class="form-group col-lg-4">' +
		'<label for="nim' + urutanPerorangan + '">NIM/NIS</label>' +
		'<input type="text" class="form-control" id="nim' + urutanPerorangan + '" name="nim[]" aria-describedby="nim" placeholder="Masukkan nim/nis">' +
		'</div>' +
		'<div class="form-group col-lg-4">' +
		'<label for="fakultas' + urutanPerorangan + '">Fakultas</label>' +
		'<input type="text" class="form-control" id="fakultas' + urutanPerorangan + '" name="fakultas[]" aria-describedby="fakultas" placeholder="Masukkan fakultas">' +
		'<small id="fakultas' + urutanPerorangan + '" class="form-text text-muted">Untuk Pelajar SMA diisi dengan jurusan yang diambil</small>' +
		'</div>' +
		'</div>' +
		'<div class="form-row">' +
		'<div class="form-group col-lg-6">' +
		'<label for="kategori' + urutanPerorangan + '">Kategori pertandingan</label>' +
		'<select id="kategori' + urutanPerorangan + '" class="form-control" name="kategori[]">' +
		'<option selected disabled>Pilih salah satu</option>' +
		'<option value="Cepat">Cepat</option>' +
		'<option value="Kilat">Kilat</option>' +
		'</select>' +
		'</div>' +
		'<div class="form-group col-lg-6">' +
		'<label>Tekan tombol dibawah untuk menghapus pemain ini</label>' +
		'<button type="button" class="btn btn-danger btn-block" data-urutan="' + urutanPerorangan++ + '"id="hapus">Hapus pemain</button>' +
		'</div>' +
		'</div>' +
		'<hr>' +
		'</div>')
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
			<h5 class="text-center">REGU `+ urutanBeregu + `</h5>
			<div class="form-row">
				<div class="form-group col-lg-4">
					<label for="namaRegu`+ urutanBeregu + `">Nama Regu</label>
					<input type="text" class="form-control" id="namaRegu`+ urutanBeregu + `" name="regu[]" aria-describedby="namaRegu" placeholder="Masukkan nama regu ` + urutanBeregu + `">
				</div>
				<div class="form-group col-lg-4">
					<label for="instansiRegu`+ urutanBeregu + `">Asal instansi</label>
					<input type="text" class="form-control" id="instansiRegu`+ urutanBeregu + `" name="instansiRegu[]" aria-describedby="instansi" placeholder="Masukkan asal instansi">
				</div>
				<div class="form-group col-lg-4">
					<label for="kategoriRegu`+ urutanBeregu + `">Kategori pertandingan</label>
					<select id="kategoriRegu`+ urutanBeregu + `" class="form-control" name="kategoriRegu[]">
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
					<label for="pemain1_`+ urutanBeregu + `">Nama Pemain 1</label>
					<input type="text" class="form-control" id="pemain1_`+ urutanBeregu + `" name="pemain1[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 1">
					<small id="pemain1" class="form-text text-muted">Gelar diberi tanda kurung</small>
				</div>
				<div class="form-group col-lg-6">
					<label for="jenisKelamin1_`+ urutanBeregu + `">Jenis Kelamin</label>
					<select id="jenisKelamin1_`+ urutanBeregu + `" class="form-control" name="jenisKelamin1[]">
						<option selected disabled>Pilih salah satu</option>
						<option value="L">Laki-laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-lg-6">
					<label for="nim1_`+ urutanBeregu + `">NIM/NIS</label>
					<input type="text" class="form-control" id="nim1_`+ urutanBeregu + `" name="nim1[]" aria-describedby="nim" placeholder="Masukkan nim/nis">
				</div>
				<div class="form-group col-lg-6">
					<label for="fakultas1_`+ urutanBeregu + `">Fakultas</label>
					<input type="text" class="form-control" id="fakultas1_`+ urutanBeregu + `" name="fakultas1[]" aria-describedby="fakultas" placeholder="Masukkan fakultas">
					<small id="fakultas1" class="form-text text-muted">Untuk Pelajar SMA diisi dengan jurusan yang diambil</small>
				</div>
			</div>
			<hr>
			<h6><b>Pemain 2</b></h6>
			<div class="form-row">
				<div class="form-group col-lg-6">
					<label for="pemain2_`+ urutanBeregu + `">Nama Pemain 2</label>
					<input type="text" class="form-control" id="pemain2_`+ urutanBeregu + `" name="pemain2[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 2">
					<small id="pemain2_`+ urutanBeregu + `" class="form-text text-muted">Gelar diberi tanda kurung</small>
				</div>
				<div class="form-group col-lg-6">
					<label for="jenisKelamin2_`+ urutanBeregu + `">Jenis Kelamin</label>
					<select id="jenisKelamin2_`+ urutanBeregu + `" class="form-control" name="jenisKelamin2[]">
						<option selected disabled>Pilih salah satu</option>
						<option value="L">Laki-laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-lg-6">
					<label for="nim2_`+ urutanBeregu + `">NIM/NIS</label>
					<input type="text" class="form-control" id="nim2_`+ urutanBeregu + `" name="nim2[]" aria-describedby="nim" placeholder="Masukkan nim/nis">
				</div>
				<div class="form-group col-lg-6">
					<label for="fakultas2_`+ urutanBeregu + `">Fakultas</label>
					<input type="text" class="form-control" id="fakultas2_`+ urutanBeregu + `" name="fakultas2[]" aria-describedby="fakultas" placeholder="Masukkan fakultas">
					<small id="fakultas2_`+ urutanBeregu + `" class="form-text text-muted">Untuk Pelajar SMA diisi dengan jurusan yang diambil</small>
				</div>
			</div>
			<hr>
			<h6><b>Pemain 3</b></h6>
			<div class="form-row">
				<div class="form-group col-lg-6">
					<label for="pemain3_`+ urutanBeregu + `">Nama Pemain 3</label>
					<input type="text" class="form-control" id="pemain3_`+ urutanBeregu + `" name="pemain3[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 3">
					<small id="pemain3_`+ urutanBeregu + `" class="form-text text-muted">Gelar diberi tanda kurung</small>
				</div>
				<div class="form-group col-lg-6">
					<label for="jenisKelamin3_`+ urutanBeregu + `">Jenis Kelamin</label>
					<select id="jenisKelamin3_`+ urutanBeregu + `" class="form-control" name="jenisKelamin3[]">
						<option selected disabled>Pilih salah satu</option>
						<option value="L">Laki-laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-lg-6">
					<label for="nim3_`+ urutanBeregu + `">NIM/NIS</label>
					<input type="text" class="form-control" id="nim3_`+ urutanBeregu + `" name="nim3[]" aria-describedby="nim" placeholder="Masukkan nim/nis">
				</div>
				<div class="form-group col-lg-6">
					<label for="fakultas3_`+ urutanBeregu + `">Fakultas</label>
					<input type="text" class="form-control" id="fakultas3_`+ urutanBeregu + `" name="fakultas3[]" aria-describedby="fakultas" placeholder="Masukkan fakultas">
					<small id="fakultas3_`+ urutanBeregu + `" class="form-text text-muted">Untuk Pelajar SMA diisi dengan jurusan yang diambil</small>
				</div>
			</div>
			<hr>
			<h6><b>Pemain 4</b></h6>
			<div class="form-row">
				<div class="form-group col-lg-6">
					<label for="pemain4_`+ urutanBeregu + `">Nama Pemain 3</label>
					<input type="text" class="form-control" id="pemain4_`+ urutanBeregu + `" name="pemain4[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 4">
					<small id="pemain4_`+ urutanBeregu + `" class="form-text text-muted">Gelar diberi tanda kurung</small>
				</div>
				<div class="form-group col-lg-6">
					<label for="jenisKelamin4_`+ urutanBeregu + `">Jenis Kelamin</label>
					<select id="jenisKelamin4_`+ urutanBeregu + `" class="form-control" name="jenisKelamin4[]">
						<option selected disabled>Pilih salah satu</option>
						<option value="L">Laki-laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-lg-6">
					<label for="nim4_`+ urutanBeregu + `">NIM/NIS</label>
					<input type="text" class="form-control" id="nim4_`+ urutanBeregu + `" name="nim4[]" aria-describedby="nim" placeholder="Masukkan nim/nis">
				</div>
				<div class="form-group col-lg-6">
					<label for="fakultas4_`+ urutanBeregu + `">Fakultas</label>
					<input type="text" class="form-control" id="fakultas4_`+ urutanBeregu + `" name="fakultas4[]" aria-describedby="fakultas" placeholder="Masukkan fakultas">
					<small id="fakultas1" class="form-text text-muted">Untuk Pelajar SMA diisi dengan jurusan yang diambil</small>
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
})
