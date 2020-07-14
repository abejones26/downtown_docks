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
            
            $boats['id'] = $boats[0];
            unset($boats[0]);
            
            $boats['name'] = $boats[1];
            unset($boats[1]);
            
            $boats['manufacturer'] = $boats[2];
            unset($boats[2]);
            
            $boats['made_year'] = $boats[3];
            unset($boats[3]);
            
            $boats['length'] = $boats[4];
            unset($boats[4]);
            
            $boats['footage_bin'] = $boats[5];
            unset($boats[5]);
            
            $boats['beam'] = $boats[6];
            unset($boats[6]);
            
            $boats['country'] = $boats[7];
            unset($boats[7]);
            
        
            for ($i = 7; $i < count($boats); $i++){
                
                $boat_slug = $boats['name'];
                
                $inserted_boat = wp_insert_post( [
                    'post_name' => $boat_slug,
                    'post_title' => $boat_slug,
                    'post_type' => 'boats',
                    'post_status' => 'publish',
                ] );
                
                $field_key0 = "field_5efdcc516ce9f";
                $value0 = $boats['name'];
                update_field($field_key0, $value0, $inserted_boat);
                
                $field_key1 = "field_5efdcbdd6ce9e";
                $value1 = $boats['manufacturer'];
                update_field($field_key1, $value1, $inserted_boat);
                
                $field_key2 = "field_5efde66f6cea1";
                $value2 = $boats['made_year'];
                update_field($field_key2, $value2, $inserted_boat);
                
                $field_key3 = "field_5ed1cb60369e1";
                $value3 = $boats['length'];
                update_field($field_key3, $value3, $inserted_boat);
                
                $field_key4 = "field_5efde6956cea2";
                $value4 = $boats['footage_bin'];
                update_field($field_key4, $value4, $inserted_boat);
                
                $field_key5 = "field_5ed1cb85369e2";
                $value5 = $boats['beam'];
                update_field($field_key5, $value5, $inserted_boat);
                
                $field_key6 = "field_5efde6396cea0";
                $value6 = $boats['country'];
                update_field($field_key6, $value6, $inserted_boat);

            }
        }
    }
}

?>