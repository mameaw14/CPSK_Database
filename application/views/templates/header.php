<!DOCTYPE html>
<html>
<head>
	<meta name="robots" content="noindex, nofollow">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
	<title>CPSK DB PROJECT</title>
	<?php
	$multiple_css = array('bootstrap.min.css','cpskdb.css');
	echo assets_css($multiple_css); 
	?>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>



	<?php 
	$multiple_js = array('fb.js');
	echo assets_js($multiple_js); 
	?>
</head>
<body>
	<header>
		<a href="<?php echo site_url(); ?>">CPSK</a>
	</header>
	<div class="container main">
