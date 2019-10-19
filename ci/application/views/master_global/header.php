<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http:equiv="x-ua-compatible" content="ie=edge">
		<!-- LEAFLET CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/leaflet/leaflet.css'); ?>">
		<!-- DATERANGEPICKER -->
		<link rel="stylesheet" href="<?php echo base_url('assets/daterangepicker/daterangepicker.css') ?>">
		<!-- TAILWIND CSS -->
		<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
		<!-- NPROGRESS CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/nprogress.css') ?>">
		<!-- SITE URL -->
		<input type="hidden" name="site_url" value="<?php echo site_url() ?>">
		<!-- JQUERY JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

		<script>
			$.ajaxSetup({
				dataType: 'json'
			});

			NProgress.configure({ showSpinner: false })
		</script>

		<title>Codeigniter - Tailwind CSS</title>
	</head>
	<body>

		<?php include_once 'nav.php'; ?>
