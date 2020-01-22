<?php



function custom_registration_function() {
    if ( isset($_POST['submit'] ) ) {
        registration_validation(
        $fname = $_POST['fname'],
        $lname = $_POST['lname'],
        $emailfrom = $_POST['email'],
        $bio =$_POST['bio']
        );
		
		$mailTo="kaurgurpreet1488@gmail.com";
		$header="From: ".$emailfrom;
		$txt="You have a new message from" .$fname."./n/n".$bio;
		main($mailTo, $header,$txt);
		//header("Location:);
	}
	
	?>