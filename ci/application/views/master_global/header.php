<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http:equiv="x-ua-compatible" content="ie=edge">
		<!-- FONT AWESOME CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
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
		<!-- SWEETALERT2 -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

		<script>
			$.ajaxSetup({
				dataType: 'json'
			});
		</script>

		<title>Codeigniter - Tailwind CSS</title>
	</head>
	<body>

		<?php include_once 'nav.php'; ?>

		<?php if($this->session->has_userdata("login")): ?>
			<input type="hidden" name="session_username" value="<?php echo $this->session->get_userdata('login')['login']['username'] ?>">
			<input type="hidden" name="session_id" value="<?php echo $this->session->get_userdata('login')['login']['id'] ?>">
			<input type="hidden" name="session_email" value="<?php echo $this->session->get_userdata('login')['login']['email'] ?>">
		<?php endif; ?>
