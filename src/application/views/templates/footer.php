<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
<script src="<?= base_url('assets/vendor/OwlCarousel2-2.3.4/src/js/owl.carousel.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script>
	bsCustomFileInput.init()
</script>
<script>
	$(document).ready(function() {
		var owl = $('.owl-carousel');
		owl.owlCarousel({
			responsiveClass: true,
			margin:10,
			responsive: {
				0: {
					items: 1,
					nav: true,
					loop:true
				},
				600: {
					items: 3,
					nav: false
				},
				1000: {
					items: 3,
					nav: true,
					loop: true
				}
			}
		});
		// Go to the next item
		$('.owl-next').click(function() {
			owl.trigger('next.owl.carousel');
		})
		// Go to the previous item
		$('.owl-prev').click(function() {
			// With optional speed parameter
			// Parameters has to be in square bracket '[]'
			owl.trigger('prev.owl.carousel', [300]);
		})
	});
</script>
</body>

</html>