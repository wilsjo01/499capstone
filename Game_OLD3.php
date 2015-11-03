<!-- ================================================================================================================== -->
<?php 
	/*****************************************
	* Author: 		Brandon Markgraf, Joshua Wilson, Madeline Marx, Dwight Solberg
	* Date: 		10/11/15
	* Description:	This is the main page that controls the flow of the game the user selects to play
	*****************************************/
	session_start();	
	
	#############
	# FUNCTIONS #
	#############
	Function test_input ($data) {
		$data = trim($data);			//Strip unnecessary characters (extra space, tab, newline)
		$data = stripslashes($data);	//remove backslashes (\)
		$data = strip_tags($data);		//eliminate tags
		$data = htmlspecialchars($data);//don't embed special chars
	
		Return $data;
	}
	
	Function Print_Game_Choices () {
		echo "<form name=\"Adventure Choice\" method=\"post\" action=\"".$_SERVER['PHP_SELF']."\">";
			echo "<input type=\"radio\" name=\"choice\" value=\"Option1\" checked><b>".$_SESSION['OptOneStories'][$_SESSION['page']][1]."<b/><br />";
			echo "<input type=\"radio\" name=\"choice\" value=\"Option2\"><b>".$_SESSION['OptTwoStories'][$_SESSION['page']][1]."<b/><br />";
			echo "<br />";
			echo "<input type=\"submit\" value=\"Submit Choice\" name=\"internalSubmit\" style=\"width:100px\">";
			echo "&nbsp &nbsp";
			echo "<input type=\"submit\" value=\"RESET Game\" name=\"ResetGame\" style=\"width:100px\">";
		echo "</form>";
	}
	
	#How the story array's are setup.
	#array(x,[Location],[Story File],[Story Continue; 0=Yes/1=No]);
	
	Function Game1 () {
		$_SESSION['story_title'] = "MetroState Adventure";
		$_SESSION['story_base'] = file_get_contents('./Game_Stories/Game1/Metro_State.txt', true);
		$_SESSION['post_story'] = file_get_contents('./Game_Stories/Game1/Train_Station.txt', true);
		
		#Option One Stories
		$_SESSION['OptOneStories'] = array (
			array(1,"McNally Smith College","McNally.txt",0),
			array(2,"Concordia University","Concordia.txt",0),
			array(3,"Augsburg College","Augsburg.txt",0),
			array(4,"Foshay Tower","Foshay.txt",1),
			array(5,"First Ave & 7th St Entry","FirstAve.txt",0)
		);
		#Option Two Stories
		$_SESSION['OptTwoStories'] = array (
			array(1,"MN State Capitol","Capitol.txt",0),
			array(2,"Midway Marketplace","Midway.txt",1),
			array(3,"University of Minnesota","UofM.txt",0),
			array(4,"Hennepin County Gov't Center","Hennepin_County.txt",0),
			array(5,"Target Center","Target_Center.txt",1)
		);
	}
	
	Function Game2 () {}
	
	Function Game3 () {}
	
	Function Game4 () {}
	
	Function Game5 () {}
	
	Function Game6 () {}
	
	#########
	# MAIN  #
	#########	
	
	#Action(s) for Initial Start Game Button from Start_Game.php
	if(isset($_POST['StartGameSubmit'])) {
		$_SESSION['Game'] = test_input($_POST["GameSelection"]);
		$_SESSION['character'] = test_input($_POST["CharSelection"]);
		$_SESSION['page'] = 0;
		
		#Functions to Set the Session Variables for the Game selected
		switch ($_SESSION['Game']) {
			case "Game1":
				Game1 ();
				break;
			case "Game1":
				Game2 ();
				break;
			case "Game1":
				Game3 ();
				break;
			case "Game1":
				Game4 ();
				break;
			case "Game1":
				Game5 ();
				break;
			case "Game1":
				Game6 ();
				break;
		}
	}
	
	#Action(s) for Reset Game Button
	if (isset($_POST['ResetGame'])) {
		$_SESSION['page'] = 0;
	}
	
	#Action(s) for Internal Submit Button for Story Selection
	if(isset($_POST['internalSubmit'])) {
		$choice = test_input($_POST["choice"]);
		
		++$_SESSION['page'];
		$i = $_SESSION['page'] - 1;		
		
		if ($_SESSION['page'] <= 4) {
			#Get the Story the User Selected
			if ($choice == "Option1") {
				$story = file_get_contents('./Game_Stories/Game1/'.$_SESSION['OptOneStories'][$i][2], true);
				$story_over = $_SESSION['OptOneStories'][$i][3];
			} else if ($choice == "Option2") {
				$story = file_get_contents('./Game_Stories/Game1/'.$_SESSION['OptTwoStories'][$i][2], true);
				$story_over = $_SESSION['OptTwoStories'][$i][3];
			}
		}
	}
?>
<!-- ================================================================================================================== -->
<!-- MAIN HTML Page - START -->
<?php
	require ("template_Top.php");
	
	echo "<h3>".$_SESSION['character'].", welcome to the \"".$_SESSION['story_title']."\" story.  Your choices should be made wisely.</h3>";
	
	echo "<p>";
	if ($_SESSION['page'] === 0) {
		print nl2br($_SESSION['story_base']);
		Print_Game_Choices();
	} else if ($_SESSION['page'] <= 4) {
		print nl2br($story);
		if ($story_over === 0) {Print_Game_Choices();}
	} else {
		print nl2br($_SESSION['post_story']);
	}
	echo "</p>";

	require ("template_Bottom.php");
?>
<!-- MAIN HTML Page - END  -->
<!-- ================================================================================================================== -->