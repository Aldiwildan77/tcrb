<noscript>
	Your browser does not support JavaScript!
	<?= "<meta http-equiv='refresh' content='0; URL=" . base_url('javascript-mati') . "'>" ?>
</noscript>

<!doctype html>
<html lang="en">

<head>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url('assets/vendor/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">

	<title>Hello, world!</title>

</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="exampleFormControlFile1">Example file input</label>
						<input type="file" class="form-control-file myFile" id="myFile" name="files[]">
					</div>
					<div class="form-group">
						<label for="exampleFormControlFile1">Example file input 2</label><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i>
						<input type="file" class="form-control-file myFile" id="myFile" name="files[]">
					</div>
					<input class="btn btn-primary" type="submit" name="upload" value="upload">
				</form>
			</div>
		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script>
		$('.myFile').bind('change', function() {
			if (this.files[0].size > 1024000) {
				$(this).val('')
				alert('terlalu besar')
			}
		});

		$(function() {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
</body>

</html>
