<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
<script src="<?= base_url('assets/vendor/OwlCarousel2-2.3.4/src/js/owl.carousel.js')?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script>
	bsCustomFileInput.init()
</script>
<script>
	$(document).ready(function(){
		$(".owl-carousel").owlCarousel({
			loop:true
		});
	});
</script>
</body>

</html>