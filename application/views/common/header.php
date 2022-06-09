<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= $title ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Penzi pet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon"type="image/x-icon" href="<?= base_url(); ?>assets/images/penzilogo.jpeg" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ;?>assets/styles/bootstrap4/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ;?>assets/styles/cookiealert.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ;?>assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" >
	<link rel="stylesheet" type="text/css" href="<?= base_url() ;?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ;?>assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ;?>assets/plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ;?>assets/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ;?>assets/styles/responsive.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ;?>assets/styles/slider.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ;?>assets/styles/toastr.min.css">
	<!-- Slick Carousel -->
	<link rel="stylesheet" href="<?= base_url() ;?>assets/styles/slick.css">
	<link rel="stylesheet" href="<?= base_url() ;?>assets/styles/slick-theme.css">
</head>

<body>

	<div class="super_container">

		<!-- Header -->

		<header class="header trans_300">

			<!-- Top Navigation -->

			<div class="top_nav">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="top_nav_left"></div>
						</div>
						<div class="col-md-6 text-right">
							<div class="top_nav_right">
								<ul class="top_nav_menu">

									<!-- Currency / Language / My Account -->

									<!-- <li class="currency">
									<a href="#">
										usd
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="currency_selection">
										<li><a href="#">cad</a></li>
										<li><a href="#">aud</a></li>
										<li><a href="#">eur</a></li>
										<li><a href="#">gbp</a></li>
									</ul>
								</li> -->
									<!-- <li class="language">
									<a href="#">
										English
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="language_selection">
										<li><a href="#">French</a></li>
										<li><a href="#">Italian</a></li>
										<li><a href="#">German</a></li>
										<li><a href="#">Spanish</a></li>
									</ul>
								</li> -->
									<li class="account p-2">
										<a href="#">
											<i class="fa fa-user mr-3" aria-hidden="true"></i>
											My Account
											<i class="fa fa-angle-down ml-3"></i>
										</a>
										<ul class="account_selection">
											<?php if($this->session->userdata('user_login') == 1):?>
											<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>My Profile</li>							
											<li><a href="<?php echo base_url('auths/logout');?>"><i class="fa fa-sign-out" aria-hidden="true"></i>Log Out</a></li>
											<?php else: ?>							
											<li><a href="<?php echo base_url('account_login');?>"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li>
											<li><a href="<?php echo base_url('Customer_registration');?>"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
											<?php endif;?>						
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Main Navigation -->

			<div class="main_nav_container">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-right">
							<div class="logo_container">
								<a href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/images/penzilogo.jpeg" width="150px" height="auto" alt=""></a>
							</div>
							<div class="wap">
								<div class="seach">
									<form action="<?= base_url('home/search')?>">
										<input type="search" class="seachTerm" id="searchProducts" name="searchProducts" placeholder="What are you looking for?"autocomplete="off">
									</form>
									<button type="submit" class="seachButton">
										<i class="fa fa-search"></i>
									</button>
								</div>
							</div>
							<nav class="navbar">
								<ul class="navbar_menu">
									<li><a href="<?php echo base_url('');?>">home</a></li>
									<li><a href="<?php echo base_url('shop');?>">shop</a></li>
									<li><a href="contact.html">contact</a></li>
								</ul>
								<ul class="navbar_user">
									<li><a href="#"></a></li>
									<li class="checkout">
										<a href="<?=base_url('cart');?>">
											<i class="fa fa-shopping-cart text-white" aria-hidden="true"></i>
											<span id="checkout_items" class="checkout_items"><?= count($this->cart->contents());?></span>
										</a>
									</li>
								</ul>
								<div class="hamburger_container">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</div>
							</nav>
						</div>
					</div>
				</div>
				
			</div>

		</header>

		<div class="fs_menu_overlay"></div>
		<div class="hamburger_menu">
			<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
			<div class="hamburger_menu_content text-right">
				<ul class="menu_top_nav">
					<!-- <li class="menu_item has-children">
					<a href="#">
						usd
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="#">cad</a></li>
						<li><a href="#">aud</a></li>
						<li><a href="#">eur</a></li>
						<li><a href="#">gbp</a></li>
					</ul>
				</li>
				<li class="menu_item has-children">
					<a href="#">
						English
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="#">French</a></li>
						<li><a href="#">Italian</a></li>
						<li><a href="#">German</a></li>
						<li><a href="#">Spanish</a></li>
					</ul>
				</li> -->
					<li class="menu_item has-children">
						<a href="#">
							<i class="fa fa-user"></i>
							My Account
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="menu_selection">
							<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
							<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
						</ul>
					</li>
					<li class="menu_item"><a href="#">home</a></li>
					<li class="menu_item"><a href="#">shop</a></li>
					<li class="menu_item"><a href="#">contact</a></li>
				</ul>
			</div>
		</div>