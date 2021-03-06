<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/images/favicon/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/images/favicon/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/images/favicon/favicon-64x64.png" sizes="64x64">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&amp;subset=cyrillic-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=cyrillic-ext" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<title><?php wp_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body>
	<header class="page">
		<div id="fixhead">
			<div class="container">
				<div class="row">
					<div class="logo-wrapper col-md-5" ><a href="/"><div id="logo"></div></a></div>
					<div class="menu-wrapper col-md-5">
						<div class="phone"><span class="phone-icon"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="tel:8800">8 (800) 000-00-00</a></div>
						<ul class="menu">
							<li><a class="current" href="/">Главная</a></li>
							<li><a href="/about/">О проекте</a></li>
							<li><a href="/checkout/">Бронь</a></li>
						</ul>
					</div>
					<div class="social col-md-2">
						<a class="icon-instagram" href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
						<a class="icon-facebook" href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<a class="icon-vk" href=""><i class="fa fa-vk" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div id="slide" style="height: 500px;">
			<?php if( is_page('gorod') ){ ?>
				<img style="height: 100%; min-width: 100%; max-width: none;" src="<?php echo get_template_directory_uri() ?>/images/ct-tbilisi.png" alt="" />
			<?php }else if( is_page('about') ){ ?>
				<img style="height: 100%; min-width: 100%; max-width: none;" src="<?php echo get_template_directory_uri() ?>/images/about.png" alt="" />
			<?php }else if( is_page('checkout') ){ ?>
				<img style="height: 100%; min-width: 100%; max-width: none;" src="<?php echo get_template_directory_uri() ?>/images/checkout.png" alt="" />
			<?php }else{ ?>
				<img style="height: 100%; min-width: 100%; max-width: none;" src="<?php echo get_template_directory_uri() ?>/images/condition.png" alt="" />
			<?php } ?>
			
			<div class="dark_bg"></div>
			<div class="slide-text container">
				<h1><?php the_title(); ?></h1>
				<?php if( is_page('gorod')  ){ ?>
					<p>По Грузии туристы столкнутся с одной из самых влиятельных и<br/> живых национальных культурных традиций</p>
				<?php } ?>
			</div>
		</div>
	</header>
	<section class="breadcrumbs">
		<?php if( is_page('checkout') ){ ?>
			<div class="container"><a href="/">Главная</a> > <a href="/">Однодневные туры</a> > <span>Название тура</span>
		<?php }else{ ?>
			<div class="container"><a href="/">Главная</a> > <span><?php echo get_the_title(); ?></span></div>
		<?php } ?>
	</section>
