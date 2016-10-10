<?php
    
/* UNCOMMENT FOR LOCAL DB CREDENTIALS */
	$dbUser = "user2";			
	$dbPass = "abc123";				
	$db = "chooseYourAdventure";	
	
    //Database connection
    @ $dbc = mysqli_connect('localhost', $dbUser, $dbPass, $db);
    
    if(mysqli_connect_errno() ) {
                echo "Error: could not connect to database. Please try again later.";
                exit;
	}
?>
  