<?php

function sx_save_field_options( $data_array ){
	update_option( 'sx-data', $data_array );
}

function sprucexam_menu(){
    add_menu_page( 'SpruceXam Settings', 'SpruceXam Plugin', 'manage_options', 'sprucexam-plugin', 'sprucexam_menu_init' );
}
add_action( 'admin_menu', 'sprucexam_menu' );

function sx_save_settings(){

	if( !isset( $_POST['sx-save-settings'] ) || ! wp_verify_nonce( $_POST['sx-save-settings'], 'sx-data-nonce' ) ){
		$msg = "error";

	} else {

		$data = array(
		"sx_client_id" => $_POST["sx_client_id"],
		"sx_client_secret" => $_POST["sx_client_secret"],
		"sx_page_id" => $_POST["sx_page_id"]
		);

		sx_save_field_options( $data );
		$msg = "success";
		
	}

	$args = array(
	'page' => 'sprucexam-plugin', 
	'message' => $msg
	);

	wp_redirect( add_query_arg( $args , admin_url() . 'admin.php' ));
	exit;
}
add_action( 'admin_post_sx_save_settings', 'sx_save_settings' );
 
function sprucexam_menu_init(){
	$args = array(
	'sort_order' => 'asc',
	'sort_column' => 'post_title',
	'post_type' => 'page',
	'post_status' => 'publish'
	); 

	$pages = get_pages( $args ); 

	$sx_data = get_option( "sx-data" );

    include dirname( __FILE__ ) . "/amenu-form.php";
}
