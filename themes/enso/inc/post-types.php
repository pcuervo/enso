<?php


// CUSTOM POST TYPES /////////////////////////////////////////////////////////////////


	add_action('init', function(){

		// Covers
		$labels = array(
			'name'          => 'Cover Fotos',
			'singular_name' => 'Cover Foto',
			'add_new'       => 'Nueva Cover Foto',
			'add_new_item'  => 'Nueva Cover Foto',
			'edit_item'     => 'Editar Cover Foto',
			'new_item'      => 'Cover Foto',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver Cover Foto',
			'search_items'  => 'Buscar Cover Foto',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Covers Foto'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'cover-fotos' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'cover-photos', $args );
		
		// NOTICIAS
		/*$labels = array(
			'name'          => 'Noticias',
			'singular_name' => 'Noticia',
			'add_new'       => 'Nueva Noticia',
			'add_new_item'  => 'Nueva Noticia',
			'edit_item'     => 'Editar Noticia',
			'new_item'      => 'Nueva Noticia',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver Noticia',
			'search_items'  => 'Buscar Noticia',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Noticias'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'noticias' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'noticia', $args );*/

	});