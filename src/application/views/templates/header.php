<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title ?> | TCRB</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="icon" href="<?= base_url('assets/img/tcrb.ico'); ?>" type="image/x-icon" />

    <style>
        #maps {
            width: 100%;
            height: 400px;
            background-color: grey;
        }
    </style>
</head>

<body>
	<!-- Awal Navbar -->
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<a class="navbar-brand" href="home">
			<img class="rounded-circle" src="<?= base_url('assets/img/logo.png'); ?>" width="40" height="40" alt="">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse text-center" id="navbarCollapse">
			<ul class="navbar-nav ml-auto navbar-list">
				<li class="mx-2 p-2"><a href="<?= base_url('home')?>">Home</a></li>
				<li class="mx-2 p-2 text-white"><a href="#" onclick="return comingSoon()">Pairing</a></li>
				<li class="mx-2 p-2"><a href="<?= base_url('dokumentasi')?>">Dokumentasi</a></li>
				<a class="btn btn-outline-primary text-white" onclick="return comingSoon()">Login</a>
			</ul>
		</div>
	</nav>
	<!-- Akhir Navbar -->