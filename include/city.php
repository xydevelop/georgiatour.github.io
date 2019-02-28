<?php
$labels = array(
		'name' => 'Город',
		'singular_name' => 'Город',
		'add_new' => 'Добавить город',
		'add_new_item' => 'Добавить город',
		'edit_item' => 'Изменить',
		'new_item' => 'Новое',
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
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'menu_position' => null,
    	'supports' => array('editor','thumbnail','title'),
    	'menu_icon' => 'dashicons-calendar-alt'
	); 		

	register_post_type( 'tg_city', $args );


?>