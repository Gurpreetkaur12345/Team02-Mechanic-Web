<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
  <script language="JavaScript" type="text/javascript" src="jquery/jquery.js"></script>
<script>
    jQuery.noConflict();
    (function ($) {
        function readyFn() {
            // Set your code here!!
        }

        $(document).ready(readyFn); 
    })(jQuery);

</script>
  
  
 
</head>
<body>

<?php
	global $wpdb;
	//simple insert operation on page refresh
		$wpdb-> insert(
		"wp_custom_plugin",
		array(
		"name"=>"online web",
		"email"=>"online@gmail.com"
		"phone"=>"123456789"
		)
		);
		
		


?>

<div class="container">
  <h2>Vertical (basic) form</h2>
  <form action="#" id="frmPost">
    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="txtName"  placeholder="Enter Name" name="txtName" required>
    </div>
    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="email" class="form-control" id="txtEmail" placeholder="Enter Email" name="txtEmail" required>
    </div>
   
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
