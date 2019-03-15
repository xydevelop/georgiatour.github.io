<?php

	$labels = array(
		'name' => 'Тур',
		'singular_name' => 'Тур',
		'add_new' => 'Добавить тур',
		'add_new_item' => 'Добавить тур',
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
    	'rewrite' => array('slug' => 'tour'),
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'menu_position' => null,
    	'supports' => array('thumbnail','editor','title','excerpt'),
    	'menu_icon' => 'dashicons-format-gallery'
	); 		

	register_post_type( 'tg_tour', $args );

	register_taxonomy( 'tourcat', 'tg_tour', array(
		'hierarchical' => true,
		'label' => 'Категория тура',
		'rewrite' => array('slug' => 'cat'),
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'_builtin' => true
	) );

	register_taxonomy( 'tourtheme', 'tg_tour', array(
		'hierarchical' => true,
		'label' => 'Тип тура',
		'rewrite' => array('slug' => 'theme'),
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'_builtin' => true
	) );		

	
?>