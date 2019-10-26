<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="title" content="Turnamen Catur Raja Brawijaya">
	<meta name="description" content="Turnamen Catur Raja Brawijaya (TCRB) merupakan event tahunan yang diselenggerakan oleh Unit Kegiatan Mahasiswa Brawijaya Chess Club. Sejak diselenggerakan pertama kali pada tahun 2011, TCRB telah berhasil menjaring dan mewadahi ketertarikan minat dan bakat pelajar SMA maupun Mahasiswa seluruh Indonesia dalam dunia catur">
	<meta name="keywords" content="tcrb, turnamen catur raja brawijaya, tcrb ub, tcrb ub 2019, tcrb ub bcc">
	<meta name="robots" content="index, follow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="revisit-after" content="1 hours">

	<noscript>
		<!-- Your browser does not support JavaScript! -->
		<?= "<meta http-equiv='refresh' content='0; URL=" . base_url('javascript-mati') . "'>" ?>
	</noscript>


	<title><?= $title ?> | TCRB</title>

	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
	<!-- <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="<?= base_url('assets/panitia/css/style.css'); ?>">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

	<link rel="icon" href="<?= base_url('assets/img/tcrb.ico'); ?>" type="image/x-icon" />

	<!-- GOOGLE ANALYTICS -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144591507-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-144591507-1');
	</script>

	<!-- WOW JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js">
		new WOW().init();
	</script>

	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		var Tawk_API = Tawk_API || {},
			Tawk_LoadStart = new Date();
		(function() {
			var s1 = document.createElement("script"),
				s0 = document.getElementsByTagName("script")[0];
			s1.async = true;
			s1.src = 'https://embed.tawk.to/5d3fd5297d27204601c851ba/default';
			s1.charset = 'UTF-8';
			s1.setAttribute('crossorigin', '*');
			s0.parentNode.insertBefore(s1, s0);
		})();
	</script>
	<!--End of Tawk.to Script-->

</head>

<body>
	<!-- Awal Navbar -->
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<a class="navbar-brand" href="<?= base_url('home') ?>">
			<img class="rounded-circle" src="<?= base_url('assets/img/logo.png'); ?>" width="40" height="40" alt="">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse text-center" id="navbarCollapse">
			<ul class="navbar-nav ml-auto navbar-list">
				<li class="mx-2 p-2"><a href="<?= base_url('home') ?>">Home</a></li>
				<li class="mx-2 p-2"><a href="<?= base_url('uploads/GUIDE-BOOK-TCRB-VII-2019.pdf') ?>" target="_blank">Guide Book</a></li>
				<li class="mx-2 p-2"><a href="#" onclick="return comingSoon()">Pairing</a></li>
				<li class="mx-2 p-2"><a href="<?= base_url('dokumentasi') ?>">Dokumentasi</a></li>
				<li class="mx-2 p-2"><a href="<?= base_url('panitia') ?>">Panitia</a></li>
				<li class="mx-2 p-2"><a href="<?= base_url('tata-cara-pendaftaran') ?>">Tata Cara</a></li>
				<li class="mx-2 p-2"><a href="<?= base_url('twibbon') ?>">Twibbon</a></li>
				<?php if ($this->session->userdata('isAdmin')) : ?>
					<a class="btn btn-outline-primary text-white" href="<?= base_url('admin/home'); ?>">Go To Panel</a>
				<?php elseif ($this->session->userdata('username') == null) : ?>
					<a class="btn btn-outline-primary text-white" href="<?= base_url('masuk'); ?>"">Masuk</a>
				<?php else : ?>
				<div class=" nav-item dropdown">
						<a class="nav-link dropdown-toggle text-white btn btn-outline-primary" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?= $this->session->userdata('username') ?>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="<?= base_url('user') ?>">Profil</a>
							<a class="dropdown-item" href="<?= base_url('keluar') ?>">Keluar</a>
						</div>
		</div>
	<?php endif; ?>
	</ul>
	</div>
	</nav>
	<!-- Akhir Navbar -->

	<div class="container">
		<div class="row mt-5">
			<div class="col-12">
				<h1 class="text-center">Panitia <b>Turnamen Catur Raja Brawijaya VII 2019</b></h1>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row my-5">
			<div class="col-lg-6 mx-auto">

				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">

						<div class="carousel-item active">
							<img src="<?= base_url("assets/panitia/img/Inti.png"); ?>" class="d-block w-100" alt="...">
						</div>

						<?php foreach ($listPanitia as $list) : ?>
							<div class="carousel-item">
								<img src="<?= base_url("assets/panitia/img/$list.png"); ?>" class="d-block w-100" alt="...">
							</div>
						<?php endforeach; ?>

					</div>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>

			</div>
		</div>
	</div>


	<footer>
		<div class="container-fluid bg-dark text-white">
			<!-- about -->
			<div class="row">
				<div class="col-md-12 mt-3 mb-2">
					<div class="text-center">
						<h6>Gedung UKM Universitas Brawijaya Lt. 3.9</h6>
						<span>Universitas Brawijaya</span>
					</div>
				</div>
			</div>

			<!-- sosmed  -->
			<div class="row">
				<div class="col-md-12 my-2">
					<div class="text-center">
						<a href="<?= base_url('instagram') ?>" class="lead mx-2" target="_blank"><i class="fa fa-instagram"></i></a>
						<a href="<?= base_url('youtube') ?>" class="lead mx-2" target="_blank"><i class="fa fa-youtube"></i></a>
						<a href="<?= base_url('line') ?>" class="lead mx-2" target="_blank"><i class="fa fa-line"></i></a>
					</div>
				</div>
			</div>
		</div>

		<!-- end -->
		<div class="text-white bg-secondary text-center py-2">
			<span class="footer-end text-wrap">Copyright &copy; TCRB 2019 | Made With <i class="fas fa-heart"></i> By IT TCRB 2019</span>
		</div>
	</footer>
	<!-- Akhir footer -->

	<script src="<?= base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
	<!-- <script src="<?= base_url('assets/panitia/js/index.js') ?>"></script> -->
	<?= $this->session->flashdata('message') ?>

	<script>
		function comingSoon() {
			Swal.fire(
				'Coming Soon',
				'Fitur masih dalam pengembangan, cek lain waktu ya',
				'info'
			)
		}
	</script>
</body>

</html>
