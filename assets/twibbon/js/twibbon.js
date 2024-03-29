var imageLoader = document.getElementById('imageLoader');
    imageLoader.addEventListener('change', handleImage, false);
var canvas = document.getElementById('imageCanvas');
    canvas.width = 1000;
    canvas.height = 1000;
var ctx = canvas.getContext('2d');


function popupResult(result) {
  var html;
  if (result.html) {
  	html = result.html;
  }
  if (result.src) {
  	html = '<img src="' + result.src + '" />' +
    '<a href="'+ result.src +'" id="downloadlink" class="button" download="Twibbon-TCRB-2019.jpg">Download</a>' +
    '<button class="confirm button" tabindex="1">Cancel</button>';
  }
  swal({
	title: '',
    html: true,
    text: html,
    animation: 'slide-from-top',
    confirmButtonColor:	"#f39c12",
   });
}

/**
 * Draw image
 */
function drawFrame() {
  var img = new Image();
  img.crossOrigin = "Anonymous";
  img.src = 'assets/img/twibbon19.png';
  img.onload = function() {
    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
    popupResult({
			src: document.getElementById('imageCanvas').toDataURL('image/jpg'),
		});
	console.log('popup ok');
  }
}


function drawProfPict(src) {
  var img = new Image();
  img.onload = function(){
    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
    drawFrame();
  }

  img.src = src;
}

/**
 * Load image from user
 */
function handleImage(e) {
  // Clear canvas
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  var img_url = e.target.files[0];
  loadImage.parseMetaData(img_url, function(data) {
    var ori = 0;
    if (data.exif) {
      ori = data.exif.get('Orientation');
    }

    var loadingImage = loadImage(
      img_url,
      function(canvas) {
        $('.cr-slider').css('visibility', 'visible');
        $('.loader').remove();

        var dataUrl = canvas.toDataURL('image/jpeg');
        basic.croppie('bind', {
            url: dataUrl,
        });
      },
      {
        maxWidth: 1800,
        maxHeight: 1800,
        orientation: ori,
        canvas: true
      });

    loadingImage.onloadstart = function(event) {
      $('.cr-viewport').append('<div class="loader"></div>');
    }
  });
}


/**
 * Download image from canvas
 */
function downloadCanvas(link, canvasId, filename) {
  link.href = document.getElementById(canvasId).toDataURL('image/jpeg');
  link.download = filename;
}

$('#downloadlink').on('click', '.sweet-alert', function() {
  downloadCanvas(this, 'imageCanvas', 'Twibbon-TCRB-2019.jpg');
});


var basic = $('#demo-basic').croppie({
    viewport: {
        width: Math.min(300, window.innerWidth - 50),
        height: Math.min(300, window.innerWidth - 50)
    },
    boundary: {
      width: Math.min(300, window.innerWidth - 50),
      height: Math.min(300, window.innerWidth - 50),
    },
});


$('.basic-result').on('click', function(e) {
  e.preventDefault();
  console.log('OK');
  var downloadButton = this;
  basic.croppie('result', {
		type: 'canvas',
		size: 'original',
	}).then(function (resp) {
		drawProfPict(resp);
	});
});
