<?php

class csv extends mysqli
{
    private $state_csv = false;
    public function __construct()
    {
        parent::__construct('localhost', 'i6618576_wp1', 'T.2DEfv5xVEYOmlLV8S75', 'i6618576_wp1');
        if ($this->connect_error){
            echo "Fail to connect to Database : ". $this->connect_error;
        }
    }
    
    public function import($file)
    {
        $file = fopen($file, 'r');
        while ($boats = fgetcsv($file)){
            print "<pre>";
            print_r($boats);
            print "</pre>";

            foreach( $boats[0] as $boat ){

                $boat_slug = sanitize_title( $boat->name );

                $inserted_boat = wp_insert_post( [
                    'post_name' => $boat_slug,
                    'post_title' => $boat_slug,
                    'post_type' => 'boats',
                    'post_status' => 'publish',
                ] );


            }
            
        }
    }
}

?>