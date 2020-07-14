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
        while ($row = fgetcsv($file)){
            print "<pre>";
            print_r($row);
            print "</pre>";
            $boats = "'" . implode("', '", $row) ."'";
        }
    }

    foreach( $values[0] as $boat ){

        $boat_slug = sanitize_title($boats->model);

        $inserted_boat = wp_insert_post([
            'post_name' => $boat_slug,
            'post_title' => $boat_slug,
            'post_type' => 'boats',
            'post_status' => 'publish'
        ]);

        if( is_wp_error($inserted_boat)){
            continue;
        }

        $fillable = [
            'field_5efde6396cea0' => 'country',
            'field_5efdcbdd6ce9e' => 'manufacturer',
            'field_5efdcc516ce9f' => 'model',
            'field_5efde66f6cea1' => 'made_year',
            'field_5ed1cb60369e1' => 'length',
            'field_5efde6956cea2' => 'footage_bin',
            'field_5ed1cb85369e2' => 'beam',
        ];

        foreach( $fillable as $key => $name ){
            update_field( $key, $boats->$name, $inserted_boat);
        }

    }
}

?>