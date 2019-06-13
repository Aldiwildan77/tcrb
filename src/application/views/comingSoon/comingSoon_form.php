<!DOCTYPE HTML>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CPoppins:400,500">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/ionicons.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/jquery.classycountdown.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/comingsoon-styles.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css'); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>

<body>    
    <div class="main-area-wrapper" style="background-image:url(<?= base_url('assets/img/bg-comingsoon-3.jpg') ?>);">
        <div class="main-area-form center-text">

            <div class="display-table">
                <div class="display-table-cell">

                    <h1 class="title"><b>Form Fitur Website</b></h1>
                    <br>
                    <div class="container w-50">
                        <form action="form" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="nama" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
                                <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Fitur apa saja yang anda ingingkan ada di website ini</label>
                                <!-- <input type="text" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Fitur"> -->
                                <textarea name="fitur" class="form-control" rows="5" id="comment" placeholder="Fitur"><?= $fitur ?></textarea>
                            </div>
                            <a class="btn btn-info btn-sm" href="./">Kembali</a>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                    <!-- <p class="desc font-white">Website sedang dalam pengembangan</p> -->

                    <!-- <div id="normal-countdown" data-date="2019/06/01"></div> -->

                    <!-- <a class="notify-btn" href="#"><b>NOTIFY US</b></a> -->


                </div><!-- display-table -->
            </div><!-- display-table-cell -->
        </div><!-- main-area -->
    </div><!-- main-area-wrapper -->


    <!-- SCIPTS -->

    <script src="<?= base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.countdown.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('assets/js/sweetalert2.all.min.js'); ?>"></script>
    <!-- <script src="<?= base_url('assets/js/custom-comingsoon.js'); ?>"></script> -->
    <script src="<?= base_url('assets/js/scripts.js'); ?>"></script>
    <?php if ($this->session->flashdata('message')) : ?>
        <script>
            Swal.fire(
                'Terimakasih',
                'Data anda telah kami terima',
                'success'
            )
        </script>
    <?php endif; ?>
</body>

</html>