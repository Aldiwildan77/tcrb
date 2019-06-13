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
     $('#rowOne').html('Old Password')
     $('#inputOne').val('').attr('type', 'password')
     $('#rowTwo').html('New Password')
     $('#inputTwo').val('').attr('type', 'password')
     $('#rowThree').html('Confirm Password')
     $('#inputThree').val('').attr('type', 'password')
  } else {
    //  $('.labelModals').addClass('col-sm-2').removeClass('col-sm-4')
    //  $('.inputModals').addClass('col-sm-10').removeClass('col-sm-8')
    //  $('#formModal').attr('action', 'editProfile')
    //  $('#rowOne').html('Name')
    //  $('#rowTwo').html('Username')
    //  $('#rowThree').html('Email')
    //  $.ajax({
    //     url: baseUrl + "getProfile",
    //     method: "GET",
    //     success: function (data) {
    //        let result = JSON.parse(data)
    //        $('#inputOne').val(result.name).attr('type', 'text')
    //        $('#inputTwo').val(result.username).attr('type', 'text')
    //        $('#inputThree').val(result.email).attr('type', 'text')
    //     }
    //  })
  }
})

$('#myToast').on('hidden.bs.toast', function () {
  // do something...
})

// Get the modal
// var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
// var img = document.getElementById('myImg');
// var modalImg = document.getElementById("img01");
// var captionText = document.getElementById("caption");

// $('#myImg').on('click', function(){
//   modal.style.display = "block";
//   modalImg.src = this.src;
//   captionText.innerHTML = this.alt;
// })

// Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
// span.onclick = function () {
//   modal.style.display = "none";
// }

// Memunculkan nama file setelah menekan tombol upload
// $('.custom-file-input').on('change',function(){
//   var fileName = document.getElementById("exampleInputFile").files[0].name;
//   $(this).next('.form-control-file').addClass("selected").html(fileName);
// })
