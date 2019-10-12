<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http:equiv="x-ua-compatible" content="ie=edge">

		<!-- LEAFLET CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/leaflet/leaflet.css'); ?>">

		<!-- DATERANGEPICKER -->
		<link rel="stylesheet" href="<?php echo base_url('assets/datetimepicker/daterangepicker.css') ?>">

		<!-- TAILWIND CSS -->
		<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
		<title>Learn Codeigniter & Tailwind CSS</title>
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
		            <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
		            Docs
		            </a>
		            <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
		            Examples
		            </a>
		            <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
		            Blog
		            </a>
		        </div>
		    </div>
		</nav>

		<div class="flex justify-center mt-20">
		<div class="w-full max-w-xs">

		  	<form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
			    <div class="mb-4">
			      	<label class="block text-gray-700 text-sm font-bold mb-2" for="username">
			        	Email
			      	</label>
			      	<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="E-mail">
			    </div>

			    <div class="mb-6">
			      	<label class="block text-gray-700 text-sm font-bold mb-2" for="password">
			        	Password
			      	</label>
			      	<input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" placeholder="******************">
			      	<p class="text-red-500 text-xs italic">Please choose a password.</p>
			    </div>

		    	<div class="flex items-center justify-between">
		      		<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
		        		Sign In
		      		</button>
		      		<a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
		        	Forgot Password?
		      		</a>
		    	</div>
			</form>

		  	<p class="text-center text-gray-500 text-xs">
		    	&copy;2019 Codeigniter - Tailwind CSS. All rights reserved.
		  	</p>

		</div>
	</div>
