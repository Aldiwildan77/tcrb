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
  <link rel="stylesheet" href="<?= base_url('assets/vendor/Croppie-2.6.4/croppie.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/twibbon/css/twibbon.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/twibbon/css/sweetalert.css'); ?>">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

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
        <li class="mx-2 p-2"><a href="<?= base_url('uploads/GUIDE-BOOK-TCRB-VII-2019.pdf') ?>" target="_blank">Guide Book</a></li>
        <li class="mx-2 p-2"><a href="#" onclick="return comingSoon()">Pairing</a></li>
        <li class="mx-2 p-2"><a href="<?= base_url('dokumentasi') ?>">Dokumentasi</a></li>
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

  <div class="container-fluid edit-twibbon">
    <div class="judul text-center">
      <!-- <img class="teks-twibbon" src="{{asset('19/img/x.svg')}}"> -->
      <h1><b>Twibbon TCRB</b></h1>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card kotak">
          <div class="card-body">
            <h5 class="card-title text-center">Panduan Penggunaan Twibbon</h5>
            <p><br>
              <ol type="numbered" style="padding-left:20px; text-align:justify;">
                <li>Klik tombol <label for="imageLoader"><b>Pilih Foto</b></label></li>
                <li>Pilih foto yang ingin digunakan</li>
                <li>Kamu bisa mengatur posisi foto dengan cara <b>menggeser slider</b></li>
                <li>Jika sudah cocok, klik tombol <b>Preview</b></li>
                <li>Untuk mendownload, klik tombol <b>Download</b> dan jika ingin kembali, klik tombol <b>Cancel</b></li>
                <li>Jika gambar tidak muncul saat menekan <b>Preview</b>, silahkan menekan ulang tombol <b>Preview</b>. Jika tetap error, silahkan menggunakan Laptop / PC untuk melakukan edit twibbon.</li>
                <li>Posting di Instagram dengan caption yang sudah disediakan</li>
                <li>Selesai</li>
              </ol>
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4 text-center mb-4">
        <div class="row">
          <div class="col-12">
            <div class="uploader">
              <canvas id="imageCanvas" class="image-canvas"></canvas>
              <div class="profile-pic-wrap">
                <div id="demo-basic"></div>
              </div>
              <div class="download-button">
                <input type="file" name="file" id="imageLoader" class="inputfile" accept="image/*" />
                <label for="imageLoader">Pilih Foto</label>
                <a class="basic-result button">Preview</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12">
            <a href="<?= base_url('twibbon-manual') ?>" class="btn btn-primary btn-block text-white" target="_blank">Download Twibbon Manual</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card kotak">
          <div class="card-body">
            <h5 class="card-title text-center">Ketentuan Caption : </h5>
            <p class="caption-twibbon" style="padding-left:20px; text-align:justify;font-size: 13px;"><br>
              [ TWIBBON TCRB VII 2019 ]

              <br><br>"The beauty of chess is it can be whatever you want it to be. It transcends language, age, race, religion, politics, gender, and socioeconomic background. Whatever your circumstances, anyone can enjoy a good fight to the death over the chess board."
              - Simon Williams

              <br><br>Hello! My name is (your name) and I'm ready for being a part of Turnamen Catur Raja Brawijaya VII 2019.

              <br><br>--Dive Into the Challenges and Catch the Victory--

              <br><br>#CaturYes
              <br>#BCCLuarBiasa
              <br>#TCRBVII2019
              <br>#GensUnaSumus
            </p>
          </div>
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
            <a href="<?= base_url('instagram') ?>" class="lead mx-2" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="<?= base_url('youtube') ?>" class="lead mx-2" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="<?= base_url('line') ?>" class="lead mx-2" target="_blank"><i class="fab fa-line"></i></a>
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
  <script src="<?= base_url('assets/vendor/Croppie-2.6.4/croppie.js') ?>"></script>
  <script src="<?= base_url('assets/twibbon/js/sweetalert.min.js') ?>"></script>
  <script src="<?= base_url('assets/twibbon/js/load-image.all.min.js') ?>"></script>
  <script src="<?= base_url('assets/twibbon/js/twibbon.js') ?>"></script>
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