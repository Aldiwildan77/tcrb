$('#exampleModal').on('show.bs.modal', function (event) {
  // $('#myInput').trigger('focus')
  let btn = $(event.relatedTarget)
  $(this).find('.modal-title').text("Edit " + btn.data('func'));

  let cond = btn.data('sembarang')
  console.log(cond)

  if (cond == 'paswd') {
     $('.labelModals').addClass('col-sm-4').removeClass('col-sm-2')
     $('.inputModals').addClass('col-sm-8').removeClass('col-sm-10')
     $('#formModal').attr('action', 'user/changepass')
     $('#rowOne').html('Password Lama')
     $('#inputOne').val('').attr('type', 'password')
     $('#rowTwo').html('Password Baru')
     $('#inputTwo').val('').attr('type', 'password')
     $('#rowThree').html('Konfirmasi Password Baru')
     $('#inputThree').val('').attr('type', 'password')
  } else {
  }
})

$('#myToast').on('hidden.bs.toast', function () {
  // do something...
})

$('#instagramModal').on('show.bs.modal', function (event) {
  let btn = $(event.relatedTarget)

  let cond = btn.data('link')
  $('.instagram-media').attr('data-instgrm-permalink', cond)
  $('.instagram-media').attr('src', cond + "embed/captioned/")
  console.log(cond)
})

// owl carousel home
$(document).ready(function() {
  var owl = $('.owl-home');
  owl.owlCarousel({
		loop: true,
    autoplay: true,
    autoplaySpeed: 2000,
		autoplayTimeout: 5000,
    autoplayHoverPause: false,
    responsiveClass: true,
    margin: 10,
    nav: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
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

// owl carousel dokumentasi
$(document).ready(function () {
	$('.owl-docs').owlCarousel({
		loop: true,
    autoplay: true,
    autoplaySpeed: 2000,
		autoplayTimeout: 5000,
    autoplayHoverPause: false,
    responsiveClass: true,
    margin: 10,
    nav: true,
    responsive: {
      0: {
        items: 2
      },
      600: {
        items: 3
      },
      1000: {
        items: 4
      }
    }
	});
});

$('.pilih-daftar').click(function(e){
	console.log('berhasil')
	// Swal.fire({
	// 	title: 'Are you sure?',
	// 	text: "You won't be able to revert this!",
	// 	type: 'warning',
	// 	showCancelButton: true,
	// 	confirmButtonColor: '#3085d6',
	// 	cancelButtonColor: '#d33',
	// 	confirmButtonText: 'Yes, delete it!'
	// }).then((result) => {
	// 	if (result.value) {

	// 	}
	// })
})
