<?php

function sx_api_connect( $method_name, $param = "" ) {

	$sx_data = get_option( "sx-data" );
	$client_id = $sx_data['sx_client_id'];
	$client_secret = $sx_data['sx_client_secret'];

	$service_url = "https://api.untappd.com/v4/$method_name?client_id=$client_id&client_secret=$client_secret$param";

	$curl = curl_init( $service_url );
	curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
	$curl_response = curl_exec( $curl );
	$json_a = json_decode( $curl_response );
	curl_close( $curl );

	return $json_a;
}

function sx_page_content( $content ) {

	$sx_data = get_option( "sx-data" );

	if ( is_page( $sx_data['sx_page_id'] ) ) {

		$data_beer_info = sx_api_connect( "beer/info/110569" );
		$data_beer_reviews = sx_api_connect( "beer/checkins/110569", "&limit=10" );

		$brewery_label = $data_beer_info->response->beer->brewery->brewery_label;
		$brewery_name = $data_beer_info->response->beer->brewery->brewery_name;
		$beer_label = $data_beer_info->response->beer->beer_label;
		$beer_name = $data_beer_info->response->beer->beer_name;
		$beer_style = $data_beer_info->response->beer->beer_style;
		$beer_abv = $data_beer_info->response->beer->beer_abv;
		$beer_ibu = $data_beer_info->response->beer->beer_ibu;
		$rating_score = $data_beer_info->response->beer->rating_score;
		$beer_reviews = $data_beer_reviews->response->checkins->items;

      	include dirname( __FILE__ ) . '/sx-content.php'; 
    } else {

        return $content;
    }
}
add_filter( "the_content", "sx_page_content" );
