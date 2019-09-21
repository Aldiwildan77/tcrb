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
	<link rel="stylesheet" href="<?= base_url('assets/vendor/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendor/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendor/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="<?= base_url('assets/css/animate.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/js/sweetalert2@8.js'); ?>"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

	<link rel="icon" href="<?= base_url('assets/img/tcrb.ico'); ?>" type="image/x-icon" />

	<style>
		#maps {
			width: 100%;
			height: 400px;
			background-color: grey;
		}
	</style>

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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
	<script>
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
				<li class="mx-2 p-2"><a href="#" onclick="return comingSoon()">Pairing</a></li>
				<li class="mx-2 p-2"><a href="<?= base_url('dokumentasi') ?>">Dokumentasi</a></li>
				<li class="mx-2 p-2"><a href="<?= base_url('tata-cara-pendaftaran') ?>">Tata Cara</a></li>
				<?php if ($this->session->userdata('isAdmin')) : ?>
				<a class="btn btn-outline-primary text-white" href="<?= base_url('admin/home'); ?>">Go To Panel</a>
				<?php elseif ($this->session->userdata('username') == null) : ?>
				<a class="btn btn-outline-primary text-white" href="<?= base_url('masuk');?>"">Masuk</a>
				<?php else : ?>
				<div class="nav-item dropdown">
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
