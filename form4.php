<?php 
/*
Template Name: form4
*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script> 
    function yearFunction() {
    var x = document.getElementById("ctrl-year").value;
    document.getElementById('year-comment').innerHTML = x + ', good year.';
    }
    </script>
    <script> 
    function makeFunction() {
    var x = document.getElementById("ctrl-make").value;
    document.getElementById('make-comment').innerHTML = 'Nice ' + x + '!  What is the model?';
    }
    </script>
    <script>
    function modelFunction() {
    var x = document.getElementById("ctrl-model").value;
    document.getElementById('model-comment').innerHTML = x + ' is a good model. Select the size of your beam below.';
    }
    </script>
    <script>
    function beamFunction() {
    var x = document.getElementById("ctrl-beam").value;
    document.getElementById('beam-comment').innerHTML = 'Your beam is ' + x + ' feet wide. Got it! What about your boat length?';
    }
    </script>
    <script>
    function loFunction() {
    var x = document.getElementById("ctrl-length_overall").value;
    document.getElementById('lo-comment').innerHTML = x + ' feet is an awesome size boat! You are all set to click add below. Thank you!';
    }
    </script>
    
    
</head>
<body>

<div class="container mt-3">
    <h2>Tell us about your boat!</h2>
    <p>This boat is all you. Tell us who you are and what you're all about.</p>
    <form id="form-year" role="form" class="form page-form" action="" method="POST">
    <div class="form-group ">
            <label class="col-form-label-lg" for="year">Year <span class="text-danger">*</span></label>
            <select required="" id="ctrl-year"  name="year" placeholder="Select a value ..."  class="custom-select custom-select-lg mb-3" onchange="yearFunction()">
                <option value="">Select a value ...</option>
                <?php
                global $wpdb;
                $year_option = $wpdb->get_results("SELECT DISTINCT year FROM {$wpdb->$table_prefix}boats ORDER BY year ASC");
                if(!empty($year_option)){
                foreach($year_option as $option) {
                $value = (!empty($option->year) ? $option->year : null);
                $label = (!empty($option->year) ? $option->year : $value);
                $selected = ( $value ? 'selected' : null );
                ?>
                <option 
                    <?php echo $selected; ?> value="<?php echo $value; ?>">
                    <?php echo $label; ?> 
                </option>
                <?php
                }
                }
                ?>
            </select>
            <p id="year-comment"></p>
        </div> 
        <div class="form-group ">
            <label class="col-form-label-lg" for="make">Make <span class="text-danger">*</span></label>
            <select required="" id="ctrl-make"  name="make" placeholder="Select a value ..."  class="custom-select custom-select-lg mb-3" onchange="makeFunction()">
                <option value="">Select a value ...</option>
                <?php
                global $wpdb;
                $make_option = $wpdb->get_results("SELECT DISTINCT make FROM {$wpdb->$table_prefix}boats WHERE year LIKE '%".$_POST['year']."%' ORDER BY make ASC");
                if(!empty($make_option)){
                foreach($make_option as $option) {
                $value = (!empty($option->make) ? $option->make : null);
                $label = (!empty($option->make) ? $option->make : $value);
                $selected = ( $value ? 'selected' : null );
                ?>
                <option 
                    <?php echo $selected; ?> value="<?php echo $value; ?>">
                    <?php echo $label; ?> 
                </option>
                <?php
                }
                }
                ?>
            </select>
            <p id="make-comment"></p>
        </div>    
        <div class="form-group ">
            <label class="col-form-label-lg" for="model">Model <span class="text-danger">*</span></label>
            <select required="" id="ctrl-model"  name="model" placeholder="Select a value ..."  class="custom-select custom-select-lg mb-3" onchange="modelFunction()">
                <option value="">Select a value ...</option>
                <?php
                global $wpdb;    
                $model_option = $wpdb->get_results("SELECT DISTINCT model FROM {$wpdb->$table_prefix}boats WHERE make LIKE '%".$_POST['make']."%' AND year LIKE '%".$_POST['year']."%' ORDER BY model ASC");
                if(!empty($model_option)){
                foreach($model_option as $option) {
                $value = (!empty($option->model) ? $option->model : null);
                $label = (!empty($option->model) ? $option->model : $value);
                $selected = ( $value ? 'selected' : null );
                ?>
                <option 
                    <?php echo $selected; ?> value="<?php echo $value; ?>">
                    <?php echo $label; ?> 
                </option>
                <?php
                }
                }
                ?>
            </select>
            <p id="model-comment"></p>
        </div>
        <div class="form-group " id="beam">
            <label class="col-form-label-lg" for="beam">Beam <span class="text-danger">*</span></label>
            <select required="" id="ctrl-beam"  name="beam" placeholder="Select a value ..."  class="custom-select custom-select-lg mb-3" onchange="beamFunction()">
                <option value="">Select a value ...</option>
                <?php
                global $wpdb;
                $beam_option = $wpdb->get_results("SELECT DISTINCT beam FROM {$wpdb->$table_prefix}boats WHERE model LIKE '%".$_POST['model']."%' ORDER BY beam ASC");
                if(!empty($beam_option)){
                foreach($beam_option as $option) {
                $value = (!empty($option->beam) ? $option->beam : null);
                $label = (!empty($option->beam) ? $option->beam : $value);
                $selected = ( $value ? 'selected' : null );
                ?>
                <option 
                    <?php echo $selected; ?> value="<?php echo $value; ?>">
                    <?php echo $label; ?> 
                </option>
                <?php
                }
                }
                ?>
            </select>
            <p id="beam-comment"></p>
        </div>
        <div class="form-group ">
            <label class="col-form-label-lg" for="length_overall">Length Overall <span class="text-danger">*</span></label>
            <select required="" id="ctrl-length_overall"  name="length_overall" placeholder="Select a value ..."  class="custom-select custom-select-lg mb-3" onchange="loFunction()">
                <option value="">Select a value ...</option>
                <?php
                global $wpdb;
                $length_overall_option = $wpdb->get_results("SELECT DISTINCT length_overall FROM {$wpdb->$table_prefix}boats WHERE beam LIKE '%".$_POST['beam']."%' ORDER BY length_overall ASC");
                if(!empty($length_overall_option)){
                foreach($length_overall_option as $option) {
                $value = (!empty($option->length_overall) ? $option->length_overall : null);
                $label = (!empty($option->length_overall) ? $option->length_overall : $value);
                $selected = ( $value ? 'selected' : null );
                ?>
                <option 
                    <?php echo $selected; ?> value="<?php echo $value; ?>">
                    <?php echo $label; ?> 
                </option>
                <?php
                }
                }
                ?>
            </select>
            <p id="lo-comment"></p>
        </div>
        <div class="form-group form-submit-btn-holder">
            <button class="btn btn-primary" name="submit" type="submit">Submit</button>
        </div>
    </form>
    <?php
    if(isset($_POST['submit']))
    {
        $n=$_POST['model'];
        echo 'Model: '.$n;
        $m=$_POST['marks'];
        echo 'Marks: '.$m;
        $m=$_POST['length_overall'];
        echo 'Length_overall: '.$m;
    }
    ?>
</div>

</body>
</html>