<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
	<title>Generate PDF</title>
	<link rel="icon" href="<?= base_url('assets/img/tcrb.ico'); ?>" type="image/x-icon" />

	<style>
		.kotak {
			display: flex;
			align-items: center;
			justify-content: center;
			resize: both;
			overflow: auto;
		}

		.loading {
			resize: both;
			overflow: auto;
		}

		@font-face {
			font-family: Arial;
			src: url(../fonts/Arial.ttf);
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="vh-100 kotak" data-url="<?= base_url();?>">
				<div class="loading">
					<img src="<?= base_url('assets/img/spinner.gif') ?>" alt="Loading image">
					<p class="text-center"><b>Proses pembuatan pdf...</b></p>
				</div>
			</div>
		</div>
	</div>
	<!-- <script src="<?= base_url('assets/js/jspdf.min.js') ?>"></script> -->
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="https://unpkg.com/jspdf@latest/dist/jspdf.debug.js"></script>
	<script src="<?= base_url('assets/js/jspdf.plugin.autotable.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/api-client.js') ?>"></script>
	<script src="<?= base_url('assets/js/sweetalert2@8.js') ?>"></script>
	<?php if ($check == 'orang') : ?>
		<script>
			$(document).ready(function() {
				generatePdfPerorangan("<?= $username ?>", "<?= $token ?>", '<?= json_encode($data); ?>')
			})
		</script>
	<?php else : ?>
		<script>
			$(document).ready(function() {
				generatePdfBeregu("<?= $username ?>", "<?= $token ?>", '<?= json_encode($data); ?>');
			})
		</script>
	<?php endif; ?>
</body>

</html>
