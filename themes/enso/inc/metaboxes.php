<?php


// CUSTOM METABOXES //////////////////////////////////////////////////////////////////



	add_action('add_meta_boxes', function(){

		$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;

		// Contacto
		$contacto = get_page_by_title( 'contacto' );
		$contactoId = $contacto->ID;
		if ( $post_id == $contactoId ){
			add_meta_box( 'tel', 'Teléfono', 'metabox_telefono', 'page', 'side', 'default' );
			add_meta_box( 'dir', 'Dirección', 'metabox_direccion', 'page', 'side', 'default' );
			add_meta_box( 'redes', 'Redes Sociales', 'metabox_redes', 'page', 'side', 'default' );
			add_meta_box( 'correo', 'Correo', 'metabox_correo', 'page', 'side', 'default' );
		}
	});



// CUSTOM METABOXES CALLBACK FUNCTIONS ///////////////////////////////////////////////



	function metabox_telefono($post){
		$name = get_post_meta($post->ID, '_telefono_meta', true);
		wp_nonce_field(__FILE__, '_telefono_meta_nonce');
		echo "<input type='text' class='widefat' id='tel' name='_telefono_meta' value='$name' placeholder='tel' />";
	}

	function metabox_direccion($post){
		$dir1 = get_post_meta($post->ID, '_direccion1_meta', true);
		wp_nonce_field(__FILE__, '_direccion1_meta_nonce');

		$dir2 = get_post_meta($post->ID, '_direccion2_meta', true);
		wp_nonce_field(__FILE__, '_direccion2_meta_nonce');

		echo "<input type='text' class='widefat' id='dir' name='_direccion1_meta' value='$dir1' placeholder='línea 1' />";
		echo "<input type='text' class='widefat' id='dir' name='_direccion2_meta' value='$dir2' placeholder='línea 2' />";
	}

	function metabox_redes($post){
		$facebook = get_post_meta($post->ID, '_facebook_meta', true);
		wp_nonce_field(__FILE__, '_facebook_meta_nonce');

		$twitter = get_post_meta($post->ID, '_twitter_meta', true);
		wp_nonce_field(__FILE__, '_twitter_meta_nonce');

		$correo = get_post_meta($post->ID, '_correo_meta', true);
		wp_nonce_field(__FILE__, '_correo_meta_nonce');

		echo "<input type='text' class='widefat' id='redes' name='_facebook_meta' value='$facebook' placeholder='Facebook' />";
		echo "<input type='text' class='widefat' id='redes' name='_twitter_meta' value='$twitter' placeholder='Twitter' />";
		echo "<input type='text' class='widefat' id='redes' name='_correo_meta' value='$correo' placeholder='Correo' />";
	}



// SAVE METABOXES DATA ///////////////////////////////////////////////////////////////



	add_action('save_post', function($post_id){


		if ( ! current_user_can('edit_page', $post_id)) 
			return $post_id;


		if ( defined('DOING_AUTOSAVE') and DOING_AUTOSAVE ) 
			return $post_id;
		
		
		if ( wp_is_post_revision($post_id) OR wp_is_post_autosave($post_id) ) 
			return $post_id;

		// Guardar metaboxes contacto
		if ( isset($_POST['_telefono_meta']) and check_admin_referer(__FILE__, '_telefono_meta_nonce') ){
			update_post_meta($post_id, '_telefono_meta', $_POST['_telefono_meta']);
		}
		if ( isset($_POST['_direccion1_meta']) and check_admin_referer(__FILE__, '_direccion1_meta_nonce') ){
			update_post_meta($post_id, '_direccion1_meta', $_POST['_direccion1_meta']);
		}
		if ( isset($_POST['_direccion2_meta']) and check_admin_referer(__FILE__, '_direccion2_meta_nonce') ){
			update_post_meta($post_id, '_direccion2_meta', $_POST['_direccion2_meta']);
		}
		if ( isset($_POST['_facebook_meta']) and check_admin_referer(__FILE__, '_facebook_meta_nonce') ){
			update_post_meta($post_id, '_facebook_meta', $_POST['_facebook_meta']);
		}
		if ( isset($_POST['_twitter_meta']) and check_admin_referer(__FILE__, '_twitter_meta_nonce') ){
			update_post_meta($post_id, '_twitter_meta', $_POST['_twitter_meta']);
		}
		if ( isset($_POST['_correo_meta']) and check_admin_referer(__FILE__, '_correo_meta_nonce') ){
			update_post_meta($post_id, '_correo_meta', $_POST['_correo_meta']);
		}


		// Guardar correctamente los checkboxes
		/*if ( isset($_POST['_checkbox_meta']) and check_admin_referer(__FILE__, '_checkbox_nonce') ){
			update_post_meta($post_id, '_checkbox_meta', $_POST['_checkbox_meta']);
		} else if ( ! defined('DOING_AJAX') ){
			delete_post_meta($post_id, '_checkbox_meta', $_POST['_checkbox_meta']);
		}*/


	});



// OTHER METABOXES ELEMENTS //////////////////////////////////////////////////////////
