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

    <div class="main-area-wrapper" style="background-image:url(<?= base_url('assets/img/bg-comingsoon-1.png') ?>);">
        <div class="main-area center-text">

            <div class="display-table">
                <div class="display-table-cell">

                    <h1 class="title"><b>Coming Soon</b></h1>
                    <p class="desc font-white">Website sedang dalam pengembangan</p>
                    <p class="desc font-white" style="font-size:13px">Klik tombol dibawah untuk ikut membantu kami mengembangkan website ini</p>


                    <!-- <div id="normal-countdown" data-date="2019/06/01"></div> -->

                    <a class="btn btn-outline-light btn-sm" href="form"><b>Klik ini</b></a>
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Launch demo modal
                    </button> -->
                    <ul class="social-btn">
                        <li class="list-heading">Ikuti kami untuk perkembangan terbaru</li>
                        <li><a href="https://www.instagram.com/tcrb_ub"><i class="ion-social-instagram-outline"></i></a></li>
                        <li><a href="#"><i class="fab fa-line"></i></a></li>
                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                    </ul>

                </div><!-- display-table -->
            </div><!-- display-table-cell -->
        </div><!-- main-area -->
    </div><!-- main-area-wrapper -->

    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chess Puzzle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="puzzle">
                        <div id="puzzle-container">
                            <link id="puzzleCss" type="text/css" rel="stylesheet" href="https://chesstempo.com/css/dailypuzzle.css" />
                            <script type="text/javascript" src="https://chesstempo.com/js/dailypuzzle.js"></script>
                            <script>
                                new Puzzle({
                                    pieceSize: 46
                                });
                            </script>
                        </div>
                        <a id="ct-link" href="https://chesstempo.com/play-chess-online.html">Online Chess</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> -->
    <!-- SCIPTS -->
    <!-- <script>
        $('#myModal').on('shown.bs.modal', function() {
            // $('#myInput').trigger('focus')
        })
    </script> -->
    <script src="<?= base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.countdown.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/scripts.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.js'); ?>"></script>
</body>

</html>