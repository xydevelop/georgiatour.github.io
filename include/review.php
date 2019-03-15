<?php

	$labels = array(
		'name' => 'Отзывы',
		'singular_name' => 'Отзыв',
		'add_new' => 'Добавить отзыв',
		'add_new_item' => 'Добавить отзыв',
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
    	'rewrite' => array('slug' => 'review'),
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'menu_position' => null,
    	'supports' => array('editor','title'),
    	'menu_icon' => 'dashicons-format-gallery'
	); 		

	register_post_type( 'tg_rev', $args );	

	
?>