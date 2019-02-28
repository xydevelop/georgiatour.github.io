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
	<title><?php wp_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body>
	<header class="page">
		<div id="fixhead">
			<a class="logo-wrapper" href="/"><div id="logo"></div></a>
			<div class="menu-wrapper">
				<div class="phone"><span class="ph-icon"></span><a href="tel:8800">8 (800) 000-00-00</a></div>
				<ul class="menu">
					<li><a href="/">Главная</a></li>
					<li><a href="/about/">О проекте</a></li>
					<li><a href="/condition/">Условия</a></li>
				</ul>
			</div>
			<div class="social">
				<a href=""><span>vk</span></a>
				<a href=""><span>face</span></a>
				<a href=""><span>insta</span></a>
			</div>
		</div>
		<div id="slide">
			<?php if( is_page('gorod') ){ ?>
				<img style="max-width: 100%;" src="<?php echo get_template_directory_uri() ?>/images/ct-tbilisi.png" alt="" />
			<?php }else if( is_page('about') ){ ?>
				<img style="max-width: 100%;" src="<?php echo get_template_directory_uri() ?>/images/about.png" alt="" />
			<?php }else{ ?>
				<img style="max-width: 100%;" src="<?php echo get_template_directory_uri() ?>/images/condition.png" alt="" />
			<?php } ?>
			
			<div class="dark_bg"></div>
			<div class="slide-text container">
				<h1><?php the_title(); ?></h1>
				<?php if( is_page('gorod') ){ ?>
					<p>По Грузии туристы столкнутся с одной из самых влиятельных и<br/> живых национальных культурных традиций</p>
				<?php } ?>
			</div>
		</div>
	</header>
	<section class="breadcrumbs">
		<div class="container"><a href="">Главная</a>-><span><?php echo get_the_title(); ?></span></div>
	</section>
