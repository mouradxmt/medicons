<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from themes.2the.me/Core/1.3.3/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Jul 2019 10:00:23 GMT -->
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title><?=SITENAME?></title>
		<!-- Favicons-->
		<link rel="shortcut icon" href="assets/images/favicon.png">
		<link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="assets/images/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="assets/images/apple-touch-icon-114x114.png">
		<!-- Web Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:500,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Hind:400,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lora:400i" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Raleway:700,400,300" rel="stylesheet" type="text/css">
		<!-- Bootstrap core CSS-->
		<link href="<?=URLROOT?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- Plugins and Icon Fonts-->
		<link href="<?=URLROOT?>/assets/css/plugins.min.css" rel="stylesheet">
		<!-- Template core CSS-->
		<link href="<?=URLROOT?>/assets/css/template.min.css" rel="stylesheet">
	</head>
	<body>

		<!-- Layout-->
		<div class="layout">

			<!-- Header-->
			<header class="header header-center undefined">
				<div class="container-fluid">
					<!-- Logos-->
					<div class="inner-header"><a class="inner-brand" href="<?=URLROOT?>"><img class="brand-dark" src="<?=SITELOGO?>" width="77px" alt=""><img class="brand-light" src="<?=SITELOGOLIGHT?>" width="77px" alt="">
							<!-- Or simple text-->
							<!-- Core--></a></div>
					<!-- Navigation-->
					<div class="inner-navigation collapse">
						<div class="inner-navigation-inline">
							<div class="inner-nav text-right">
								<ul>
								<?php if(!$_SESSION['loggedIn']){?>
              <li><a href="<?=URLROOT?>/users/login"><i class="fa fa-key"></i> S'authentifier</a></li>
							<li><a href="<?=URLROOT?>/users/register"><i class="fa fa-plus"></i> Creer un compte</a></li>
							<?php }
								else{
									if($_SESSION['userType']=='medecin'){
								?>
								<li><a href="<?=URLROOT?>/pages/medecin"><i class="fa fa-stethoscope"></i> Mon compte</a></li>
								<?php }
									elseif($_SESSION['userType']=='patient'){
								?>
								<li><a href="<?=URLROOT?>/pages/patient"><i class="fa fa-user-injured"></i> Mon compte</a></li>
									<?php }} ?>
								</ul>
							</div>
						</div>
					</div>
					<!-- Extra menu-->
		<!--			<div class="extra-nav">
						<ul>
							<li><a class="open-offcanvas" href="#"><span>Menu</span><span class="fa fa-bars"></span></a></li>
						</ul>
					</div> !-->
					<!-- Mobile menu-->
					<div class="nav-toggle"><a href="#" data-toggle="collapse" data-target=".inner-navigation"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a></div>
				</div>
			</header>
			<!-- Header end-->

			<!-- Wrapper-->
			<div class="wrapper">

				<!-- Page Header end-->

			