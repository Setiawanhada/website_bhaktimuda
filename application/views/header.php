	<!DOCTYPE html>
	<html lang="zxx" class="no-js">

	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link href="<?php echo base_url('assets/public/images/fav.png') ?>" rel="shortcut icon">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Bhakti Muda</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--
			CSS
			============================================= -->
		<link href="<?php echo base_url('assets/public/css/linearicons.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/public/css/font-awesome.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/public/css/jquery.DonutWidget.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/public/css/bootstrap.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/public/css/owl.carousel.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/public/css/main.css') ?>" rel="stylesheet">
	</head>

	<body>

		<!-- Start Header Area -->
		<header class="default-header">
			<div class="menutop-wrap">
				<div class="menu-top container">

				</div>
			</div>
			<nav class="navbar navbar-expand-lg  navbar-light">
				<div class="container">
					<a class="navbar-brand" href="<?php echo site_url('welcome/')?>">
						<img src="<?php echo base_url('assets/public/images/bm.png')?>" width="30px" hight="30px" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
						aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse justify-content-end align-items-center"
						id="navbarSupportedContent">
						<ul class="navbar-nav">
							<li><a href="<?php echo site_url('welcome/')?>">Home</a></li>
							<li><a href="<?php echo site_url('welcome/info')?>">Informasi</a></li>
							<!-- Dropdown -->
							<li class="dropdown">
								<a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
									Galeri
								</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="<?php echo site_url('welcome/foto')?>">Foto</a>
									<a class="dropdown-item" href="<?php echo site_url('welcome/video')?>">Video</a>
								</div>
							</li>
							<li><a href="<?php echo site_url('welcome/presensi')?>">Daftar Hadir</a></li>
							<li><a href="<?php echo site_url('welcome/pengurus')?>">Pengurus</a></li>
							<li><a href="<?php echo site_url('login')?>">Login</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<!-- End Header Area -->
