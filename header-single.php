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
					<div class="logo-wrapper col-md-5"><a href="/"><div id="logo"></div></a></div>
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
			
			 <?php 

			 	$id_tour = get_the_ID();

			 $tour_photo_src = get_the_post_thumbnail_url( $id_tour, 'full' ); ?>
				<img style="height: 100%; min-width: 100%; max-width: none;" src="<?php echo $tour_photo_src; ?>" alt="" />
		
			
			<div class="dark_bg"></div>
			<div class="slide-text container">
				<h1><?php the_title(); ?></h1>
				
					<p><?php the_excerpt(); ?></p>
				
			</div>
		</div>
	</header>
	<?php        $cat_tour = get_terms( array(
  'taxonomy' => 'tourcat',
  'hide_empty' => false,
  'object_ids' => $id_tour
) ); 

if ( $cat_tour[0]->term_id == 2 ){ $cat_name = 'Однодневные туры'; $cat_link = '/cat/singleday'; }else{ $cat_link = '/cat/fewdays'; $cat_name = 'Многодневные туры'; }

?>
	<section class="breadcrumbs">
	
			<div class="container"><a class="tl" href="/">Главная</a> > <a  class="tl" href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a> > <span><?php echo get_the_title(); ?></span></div>
	
	</section>
