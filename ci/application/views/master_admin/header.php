<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http:equiv="x-ua-compatible" content="ie=edge">
        <!-- FONT AWESOME CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
        <!-- TAILWIND CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.1.2/tailwind.min.css">
        <!-- TAILWIND CSS UTILIZE  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.1.2/utilities.min.css">
        <!-- TAILWIND CSS COMPONENTS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.1.2/components.min.css">
        <!-- TAILWIND CSS BASE -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.1.2/base.min.css">
        <!-- DATATABLES CUSTOM TAILWIND CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.tailwindcss.css'); ?>">
        <!-- DATERANGEPICKER -->
        <link rel="stylesheet" href="<?php echo base_url('assets/daterangepicker/daterangepicker.css') ?>">
        <!-- MAIN CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>">
        <!-- PACE CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/pace.css') ?>">


        <!-- SITE URL -->
		<input type="hidden" name="site_url" value="<?php echo site_url() ?>">

        <!-- CHECKING BROWSER -->
        <input type="hidden" name="user_agent" value="<?php echo $this->agent->browser() ?>">
		
        <!-- JQUERY JS -->
		<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    
		<script>
			$.ajaxSetup({
				dataType: 'json'
			});
		</script>

        <title>Codeigniter - Tailwind CSS</title>
    </head>
    <body>

        <?php include_once 'nav.php'; ?>
