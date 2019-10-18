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
		</script>

		<title>Codeigniter - Tailwind CSS</title>
	</head>
	<body>

		<nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
		    <div class="flex items-center flex-shrink-0 text-white mr-6">
		        <span class="font-semibold text-xl tracking-tight">Codeigniter - Tailwind CSS</span>
		    </div>

		    <div class="block lg:hidden">
		        <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
		        </button>
		    </div>

		    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
		        <div class="text-sm lg:flex-grow">
					<?php if(isset($_SESSION['logged_in'])): ?>
			            <a href="<?php echo site_url() ?>sign-out" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
							Sign Out
			            </a>
					<?php else: ?>
						<a href="<?php echo site_url() ?>" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
					   	 	Sign In
					    </a>
					<?php endif; ?>
		            <a href="<?php echo site_url() ?>sign-up-page" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
		            	Sign Up
		            </a>
		        </div>
		    </div>
		</nav>
