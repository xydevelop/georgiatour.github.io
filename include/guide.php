<?php

	$labels = array(
		'name' => 'Гиды',
		'singular_name' => 'Гид',
		'add_new' => 'Добавить',
		'add_new_item' => 'Добавить',
		'edit_item' => 'Изменить',
		'new_item' => 'Новый',
		'view_item' => 'Просмотр',
		'search_items' => 'Поиск',
		'not_found' =>  'не найдено',
		'not_found_in_trash' => 'В корзине нет', 
		'parent_item_colon' => ''
	);	

	$args = array(
    	'labels' => $labels,
    	'public' => true,
    	'publicly_queryable' => true,
    	'show_ui' => true, 
    	'query_var' => true,
    	'rewrite' => true,
    	'rewrite' => array('slug' => 'guide'),
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'menu_position' => null,
    	'supports' => array('thumbnail','editor','title','excerpt'),
    	'menu_icon' => 'dashicons-format-image'
	); 		

	register_post_type( 'tg_guide', $args );		

	
?>