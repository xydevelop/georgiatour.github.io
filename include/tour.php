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
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'menu_position' => null,
    	'supports' => array('thumbnail','editor','title'),
    	'menu_icon' => 'dashicons-format-gallery'
	); 		

	register_post_type( 'tg_tour', $args );

	register_taxonomy( 'tourcat', 'tg_tour', array(
		'hierarchical' => true,
		'query_var' => 'category_name',
		'label' => 'Категория тура',
		'rewrite' => array('slug' => 'tour'),
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'_builtin' => true,
		'capabilities' => array(
			'manage_terms' => 'manage_categories',
			'edit_terms'   => 'edit_categories',
			'delete_terms' => 'delete_categories',
			'assign_terms' => 'assign_categories',
		),
		'show_in_rest' => true,
		'rest_base' => 'service-category',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

	register_taxonomy( 'tourtheme', 'tg_tour', array(
		'hierarchical' => true,
		'query_var' => 'category_name',
		'label' => 'Тема тура',
		'rewrite' => array('slug' => 'themet'),
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'_builtin' => true,
		'capabilities' => array(
			'manage_terms' => 'manage_categories',
			'edit_terms'   => 'edit_categories',
			'delete_terms' => 'delete_categories',
			'assign_terms' => 'assign_categories',
		),
		'show_in_rest' => true,
		'rest_base' => 'service-category',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );		

	
?>