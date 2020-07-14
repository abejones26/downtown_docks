<?php

add_action( 'wp_ajax_nopriv_get_boats_from_api', 'get_boats_from_api' );
add_action( 'wp_ajax_get_boats_from_api', 'get_boats_from_api' );

function get_boats_from_api() {

    $boats = [];

    // Should return an array of objects
    $results =  wp_remote_retrieve_body( wp_remote_get('https://downtowndocks.s3.us-east-2.amazonaws.com/boat_master.csv') );

    // turn it into a PHP array from JSON string
    $contents = file_get_contents($results);
    $contents = utf8_encode($contents);
    $results = json_decode($contents);


    // Either the API is down or something else spooky happened. Just be done.
    if( ! is_array( $results ) || empty( $results ) ){
        return false;
    }

    $boats[] = $results;

    foreach( $boats[0] as $boat ){
        
        $boat_slug = sanitize_title( $boat->name );   
        
        $existing_boat = get_page_by_path( $boat_slug, 'OBJECT', 'boats' );
        
        $inserted_boat = wp_insert_post( [
            'post_name' => $boat_slug,
            'post_title' => $boat_slug,
            'post_type' => 'boats',
            'post_status' => 'publish',
        ] );

        if( is_wp_error( $inserted_boat ) || $inserted_boat === 0 ) {
            continue;
        }

        // add meta fields
        $fillable = [
            'field_5efdcc516ce9f' => 'name',
            'field_5efdcbdd6ce9e' => 'manufacturer',
            'field_5efde66f6cea1' => 'made_year',
            'field_5ed1cb60369e1' => 'length',
            'field_5efde6956cea2' => 'footage_bin',
            'field_5ed1cb85369e2' => 'beam',
            'field_5efde6396cea0' => 'country',
        ];

        foreach( $fillable as $key => $name ) {
            update_field( $key, $boat->$name, $inserted_boat );
        }

    }

    wp_remote_post( admin_url('admin-ajax.php?action=get_boats_from_api'), [
        'blocking' => false,
        'sslverify' => false, // we are sending this to ourselves, so trust it.
    ]);

}

function slugify($text){

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
  
    // trim
    $text = trim($text, '-');
  
    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);
  
    // lowercase
    $text = strtolower($text);
  
    if (empty($text)) {
      return 'n-a';
    }
  
    return $text;
  }

?>