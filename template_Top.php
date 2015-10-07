<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>Choose Your Own Adventure</title>
		
		<meta name="description" content="Contact Us page for vistors looking to get a hold of the company." />
		<meta name="author" content="ICS-499 Group Project" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<link rel="stylesheet" href="styles/Template.css" />
		
		<style>
			.required {color: #FF0000;}
			.success {color: #088A08;}
			.error {color: #FF0000;}
		</style>
	</head>

	<body>
		<header>
			<img src="../images/new-logo.png" alt="MetroState Logo" class="center"/>
			<br />
			<nav>
				<?php
					/*
        	 		if (empty($_SESSION['first_name'])) {
						echo "| Welcome Guest | ";
						echo "<a href=\"LogIn.php\">Log In</a> |";
					} else {
						echo "| Welcome ".$_SESSION['first_name']." | ";
						echo "<a href=\"killsession.php\">Log Out</a> |";
					} 
					*/
        	 	?>
        	 	<a href="index.php">Home</a> |
				<a href="Start_Game.php">Start Game</a> |
        	 	<a href="About_Us.php">About Us</a> |
        	 	<a href="Contact_Info.php">Contact Us</a> |
        	 	<?php
					/*
        	 		if (empty ($_SESSION['Admin'])) {
						
					} else if (($_SESSION['Admin']) == 1) {
						print "<a href=\"viewRegistrants.php\">View Users</a> | ";
						print "<a href=\"editRegistrants.php\">Edit Users</a> | ";
						print "<a href=\"itemAdmin.php\">Item Administration</a> |";
					} else {
						print "<a href=\"viewMyOrders.php\">View Orders</a> | ";
					}
					*/
        	 	?>
        	</nav>
		</header>