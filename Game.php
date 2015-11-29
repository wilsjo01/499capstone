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
	
	Function Print_Game_Choices ($fight) {
		if ($fight === 0) {
			echo "<form name=\"Adventure Choice\" method=\"post\" action=\"".$_SERVER['PHP_SELF']."\">";
				echo "<input type=\"radio\" name=\"choice\" value=\"Option1\" checked><b>".$_SESSION['OptOneStories'][$_SESSION['page']][1]."<b/><br />";
				echo "<input type=\"radio\" name=\"choice\" value=\"Option2\"><b>".$_SESSION['OptTwoStories'][$_SESSION['page']][1]."<b/><br />";
				echo "<br />";
				echo "<input type=\"submit\" value=\"Submit Choice\" name=\"internalSubmit\" style=\"width:100px\">";
				echo "&nbsp &nbsp";
				echo "<input type=\"submit\" value=\"RESET Game\" name=\"ResetGame\" style=\"width:100px\">";
			echo "</form>";
		} elseif($fight===1) {
			echo "<form name=\"Start Fight\" method=\"post\" action=\"Fight.php\">";
				echo "<input type=\"hidden\" name=\"CharSelection\" value=\"".$_SESSION['character']."\">";
				echo "<input type=\"submit\" value=\"Begin Defense\" name=\"StartFight\" style=\"width:100px\">";
				echo "&nbsp &nbsp";
				echo "<input type=\"submit\" value=\"RESET Game\" name=\"ResetGame\" style=\"width:100px\">";
			echo "</form>";
		} elseif ($fight===2){
			echo "<form name=\"Start Fight\" method=\"post\" action=\"BossFight.php\">";
			echo "<input type=\"hidden\" name=\"CharSelection\" value=\"".$_SESSION['character']."\">";
			echo "<input type=\"submit\" value=\"Begin FINAL BOSS FIGHT\" name=\"StartFight\" style=\"width:200px\">";
			echo "&nbsp &nbsp";
			echo "<input type=\"submit\" value=\"RESET Game\" name=\"ResetGame\" style=\"width:100px\">";
		}
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
	
	Function Game2 () {
		$_SESSION['story_title'] = "MetroState Campus Adventure";
		$_SESSION['story_base'] = file_get_contents('./Game_Stories/Game2/Metro_Garage.txt', true);
		$_SESSION['post_story'] = file_get_contents('./Game_Stories/Game2/Deans_Office.txt', true);
		
		#Option One Stories
		$_SESSION['OptOneStories'] = array (
			array(1,"Admissions Desk","Admissions_Desk.txt",0),
			array(2,"Lunchroom","Lunchroom.txt",0),
			array(3,"Auditorium","Auditorium.txt",1),
			array(4,"IT Department","IT_Department.txt",0),
			array(5,"Faculty Offices","Faculty_Offices.txt",0)
		);
		#Option Two Stories
		$_SESSION['OptTwoStories'] = array (
			array(1,"Library","Library.txt",1),
			array(2,"Great Hall","Great_Hall.txt",1),
			array(3,"Bookstore","Bookstore.txt",0),
			array(4,"Financial Aid Office","Financial_Aid_Office.txt",0),
			array(5,"Science Lab","Science_Lab.txt",1)
		);
	}
	
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
		$_SESSION['fight'] = 0;
		
		#Functions to Set the Session Variables for the Game selected
		switch ($_SESSION['Game']) {
			case "Game1":
				Game1 ();
				break;
			case "Game2":
				Game2 ();
				break;
		}
	}
	
	#Action(s) for Reset Game Button
	if (isset($_POST['ResetGame'])) {
		$_SESSION['page'] = 0;
	}
	
	#Action(s) for Story Return button from Fight.php
	if (isset($_POST['StoryReturn'])) {
		$i = $_SESSION['page'] - 1;
		$_SESSION['fight'] = 0;
	}
	
	#Action(s) for Internal Submit Button for Story Selection
	if(isset($_POST['internalSubmit'])) {
		#Peform below action if submit comes from Game.php otherwise move on to next code
		$_SESSION['choice'] = test_input($_POST["choice"]);
		
		++$_SESSION['page'];
		$i = $_SESSION['page'] - 1;
		
		if ($_SESSION['page'] <= 4) {
			#Get the Story the User Selected
			if ($_SESSION['choice'] == "Option1") {
				$_SESSION['story'] = file_get_contents('./Game_Stories/'.$_SESSION['Game'].'/'.$_SESSION['OptOneStories'][$i][2], true);
				$_SESSION['fight'] = $_SESSION['OptOneStories'][$i][3];
			} else if ($_SESSION['choice'] == "Option2") {
				$_SESSION['story'] = file_get_contents('./Game_Stories/'.$_SESSION['Game'].'/'.$_SESSION['OptTwoStories'][$i][2], true);
				$_SESSION['fight'] = $_SESSION['OptTwoStories'][$i][3];
			}
		}
	}
?>
<!-- ================================================================================================================== -->
<!-- MAIN HTML Page - START -->
<?php
	require ("template_Top.php");
	
	if(isset($_POST['StartGameSubmit'])) {
		echo "<h3>".$_SESSION['character'].", welcome to the \"".$_SESSION['story_title']."\" story.  Your choices should be made wisely.</h3>";
	}
	
	echo "<p>";
	if ($_SESSION['page'] === 0) {
		print nl2br($_SESSION['story_base']);
		Print_Game_Choices($_SESSION['fight']);
	} else if ($_SESSION['page'] <= 4) {
		if(isset($_POST['internalSubmit'])) {
			print nl2br($_SESSION['story']);
		} else {
			echo "After your fight, you must decide where you would you like to go next...";
		}
		Print_Game_Choices($_SESSION['fight']);
	} else {
		print nl2br($_SESSION['post_story']);
		echo "link to wattshock game";
		Print_Game_Choices(2);
		header("refresh:10;url=http://localhost:8080/ICS499_Capstone/Index.php");
	}
	echo "</p>";

	require ("template_Bottom.php");
?>
<!-- MAIN HTML Page - END  -->
<!-- ================================================================================================================== -->