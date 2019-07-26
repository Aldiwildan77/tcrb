<script src="<?= base_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/js/custom.js') ?>"></script>
<script src="<?= base_url('assets/vendor/OwlCarousel2-2.3.4/src/js/owl.carousel.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>

<script>
	let segment = window.location.pathname.split('/')
	let check = segment.includes("home")

	// if (check) {
	// 	$.ajax({
	// 		url: `<?= base_url(); ?>auth/generate`,
	// 		crossDomain: true,
	// 		beforeSend: function(xhr) {
	// 			xhr.withCredentials = true
	// 		}

	// 	}).then(_ => {
	// 		console.log(<?= getenv('INSTA_TOKEN'); ?>)
	// 	}).catch(err => {
	// 		console.error(err)
	// 	})
	// }
</script>

<script>
	bsCustomFileInput.init()
</script>

<script>
	$(document).ready(function() {
		var owl = $('.owl-carousel');
		owl.owlCarousel({
			responsiveClass: true,
			margin: 10,
			responsive: {
				0: {
					items: 1,
					nav: true,
					loop: true
				},
				600: {
					items: 2,
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