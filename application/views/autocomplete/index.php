<!DOCTYPE html>
<html>
<head>
	<title>Autocomplete</title>
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/autocomplete.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery.autocomplete.css' ?>">
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.8.2.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.autocomplete.js' ?>"></script>
	<script type="text/javascript">
		var site = "<?php echo base_url(); ?>";
		$(function() {
			$('.autocomplete').autocomplete({

				// serviceUrl berisi URL ke controller/fungsi yang menangani request kita
				serviceUrl: site+'/autocomplete/search',

				// fungsi ini akan dijalankan ketika user memilih salah satu hasil request
				onSelect: function(suggestion) {

					// membuat id v_nim untuk ditampilkan
					$('#v_nim').val(''+suggestion.nim);

					// membuat id v_jurusan untuk ditampilkan
					$('#v_jurusan').val(''+suggestion.jurusan);
				}
			});
		});
	</script>

</head>
<body>
	<div id="content">
		<h1>Autocomplete</h1>
		<form action="<?php echo base_url(); ?>" method="post">
			<div class="wrap">
				<table>
					<tr>
						<td><small>Nama :</small><br><input type="search" name="nama" class="autocomplete" id="autocomplete1"></td>
					</tr>
					<tr>
						<td><small>Jurusan :</small><br><input type="text" name="jurusan" id="v_jurusan" class="autocomplete"></td>
					</tr>
					<tr>
						<td><small>Nim :</small><br><input type="text" class="autocomplete" id="v_nim" name="nama"></td>
					</tr>
				</table>
			</div>
		</form>
	</div>
</body>
</html>