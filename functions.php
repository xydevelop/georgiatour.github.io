<?php

remove_action('wp_head', 'wp_generator');

//удаление версии WordPress из ссылок на скрипты start
function wp_version_js_css($src) {
  if (strpos($src, 'ver=' . get_bloginfo('version')))
    $src = remove_query_arg('ver', $src);
  return $src;
}
add_filter('style_loader_src', 'wp_version_js_css', 9999);
add_filter('script_loader_src', 'wp_version_js_css', 9999);
//удаление версии WordPress из ссылок на скрипты end

add_action( 'after_setup_theme', 'tourgeorg_theme_setup' );

if (function_exists('add_theme_support')) {	
	add_theme_support('menus'); 
	add_theme_support('post-thumbnails');
}

function tourgeorg_theme_head_script() {
	wp_enqueue_style( 'tg_theme_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'tg_theme_css_bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css' );
	wp_enqueue_style( 'tm_theme_style', get_template_directory_uri().'/style.css' );
	/*wp_enqueue_style( 'tm_theme_media', get_template_directory_uri().'/css/media.css' );*/
}

add_action( 'wp_enqueue_scripts', 'tourgeorg_theme_head_script' );


function tourgeorg_theme_script() {
	wp_enqueue_script( 'tm_theme_jquery', 'https://code.jquery.com/jquery-3.3.1.min.js' );
	wp_enqueue_script( 'tm_theme_poper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js', array('tm_theme_jquery') );
	wp_enqueue_script( 'tm_theme_bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js', array('tm_theme_jquery') );

	/*wp_enqueue_script( 'tm_theme_slick', get_template_directory_uri() . '/js/slick.min.js', array('tm_theme_jquery') );*/
	wp_enqueue_script( 'tm_theme_main', get_template_directory_uri() . '/js/main.js', array('tm_theme_jquery') );
}

add_action( 'wp_footer', 'tourgeorg_theme_script' );

function tourgeorg_theme_setup() {

	// Add Services Custom Post Type
	require get_template_directory() . '/include/city.php';

	require get_template_directory() . '/include/tour.php';

	require get_template_directory() . '/include/service-tour.php';

		// Add Actions Custom Post Type
	require get_template_directory() . '/include/place.php';

		// Add Actions Custom Post Type
	require get_template_directory() . '/include/guide.php';

	


}



flush_rewrite_rules();