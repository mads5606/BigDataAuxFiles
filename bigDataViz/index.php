<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<section id="cover" class="min-vh-100">
		<div id="cover-caption">
			<div class="container">
				<div class="row text-white">
					<div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
						<h1 class="display-8 py-2 text-truncate">Viusalization Tool</h1>
						<div class="px-2">
							<form action="" class="justify-content-center">
								<div>
									<label class="radio-inline">
										<input type="radio" name="radio" checked id="radioRT" onClick="displayInterval()">Real-Time            
									</label>
									<label class="radio-inline" style="margin-left:10px;">
										<input type="radio" name="radio" id="radioTI" onClick="displayInterval()">Time Interval
									</label>
								</div>
								<div class="toHide" id="toHide">
									<input id="datepicker1" width="200" />
									<input id="datepicker2" width="200" />

								</div>
								<button type="submit" class="btn btn-primary btn-lg mt-4">Launch</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script>
		$('#datepicker1').datepicker({
			uiLibrary: 'bootstrap4'
		});
		$('#datepicker2').datepicker({
			uiLibrary: 'bootstrap4'
		});
	</script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	<script>
		document.getElementById('toHide').style.display = 'none';

		function displayInterval() {
			if (document.getElementById('radioTI').checked) {
				document.getElementById('toHide').style.display = 'block'
			} else {
				document.getElementById('toHide').style.display = 'none';
			}
		}
	</script>
	
</body>
</html>