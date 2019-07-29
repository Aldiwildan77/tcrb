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
					<a href="instagram" class="lead mx-2"><i class="fab fa-instagram"></i></a>
					<a href="youtube" class="lead mx-2"><i class="fab fa-youtube"></i></a>
					<a href="email" class="lead mx-2"><i class="fa fa-envelope"></i></a>
					<a href="line" class="lead mx-2"><i class="fab fa-line"></i></a>
				</div>
			</div>
		</div>
	</div>

	<!-- end -->
	<div class="text-white bg-secondary text-center py-2">
		<span class="footer-end text-wrap">Copyright &copy; TCRB 2019 | Made with &hearts; by IT TCRB 2019</span>
	</div>
</footer>
<!-- Akhir footer -->

<script src="<?= base_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/vendor/OwlCarousel2-2.3.4/src/js/owl.carousel.js') ?>"></script>
<script src="<?= base_url('assets/vendor/OwlCarousel2-2.3.4/src/js/owl.autoplay.js') ?>"></script>
<script src="<?= base_url('assets/vendor/OwlCarousel2-2.3.4/src/js/owl.navigation.js') ?>"></script>
<script src="<?= base_url('assets/js/custom.js') ?>"></script>
<script src="<?= base_url('assets/js/custom-file-input.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
	bsCustomFileInput.init()
</script>

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