<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>FAME &mdash; <?php echo $pageTitle ?? ''; ?>	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo urlFor('css/animate.css'); ?>">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo urlFor('css/icomoon.css'); ?>">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo urlFor('css/bootstrap.css');?>">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?php echo urlfor('css/magnific-popup.css');?>">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="<?php echo urlFor('css/owl.carousel.min.css');?>">
	<link rel="stylesheet" href="<?php echo urlFor('css/owl.theme.default.min.css');?>">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="<?php echo urlFor('css/flexslider.css');?>">

	<!-- Pricing -->
	<link rel="stylesheet" href="<?php echo urlFor('css/pricing.css');?>">

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo urlFor('css/style.css');?>">


	<!-- My Own Stylesheets -->
	<link rel="stylesheet" type="text/css" href="<?php //echo urlFor('stylesheets/bootstrap.min.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo urlFor('stylesheets/myStyles.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php //echo urlFor('stylesheets/custom.css'); ?>" />
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	
	<!-- Modernizr JS -->
	<script src="<?php echo urlFor('js/modernizr-2.6.2.min.js');?>"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-right">
						<p class="site">www.yourdomainname.com</p>
						<p class="num">Call: +234(0) 703 891 4244</p>
						<ul class="fh5co-social">
							<li><a href="#"><i class="icon-facebook2"></i></a></li>
							<li><a href="#"><i class="icon-twitter2"></i></a></li>
							<li><a href="#"><i class="icon-dribbble2"></i></a></li>
							<!--<li><a href="#"><i class="icon-github"></i></a></li>-->
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="top-menu">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-5 text-primary">
						<div id="fh5co-logo">
							<a href="index.html">
								<img src='<?php echo urlFor("/images/logo.jpg");?>' />
								<span">FAME International School</span></a>
						</div>
					</div>
					<div class="col-xs-7 text-right menu-1">
						<ul>
							<li class="active"><a href="index.html">Home</a></li>
							<li><a href="about.html">About Us</a></li>
							<li class="has-dropdown">
								<a href="">Our Schools</a>
								<ul class="dropdown">
									<li><a href="#">Suleja</a></li>
									<li><a href="#">Lokoja</a></li>
								</ul>
							</li>
							<li class="active"><a href="">Our Story</a></li>
							<li><a href="<?php echo urlFor('teacher.php');?>">Our Teacher</a></li>
							<li><a href="courses.html">Gallery</a></li>
							<li><a href="contact.html">Contact</a></li>
							<li class="btn-cta"><a href="<?php echo urlFor('/students/login.php');?>"><span>Student Login</span></a></li>
							<li class="btn-cta"><a href="#"><span>Staff Login</span></a></li>
							
							
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>