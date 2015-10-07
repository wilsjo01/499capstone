<?php 
	//Code to Validate the Registration form submission - START
	/*****************************************
	* Author:  	Brandon Markgraf
	* Date: 	2/17/14
	* Description: This file updates a flat text file with customer Information.  
	* Based on user input the data will be Appended to the end of the file.
	*****************************************/
	session_start();	
	
		//############
	//# FUNCTIONS
	//############
	Function test_input ($data) {
		$data = trim($data);			//Strip unnecessary characters (extra space, tab, newline)
		$data = stripslashes($data);	//remove backslashes (\)
		$data = strip_tags($data);	//eliminate tags
		$data = htmlspecialchars($data);//don't embed special chars
	
		Return $data;
	}
	
	Function Print_Game_Choices ($page) {
		global $OptOneStories, $OptTwoStories;

		echo "<form name=\"Adventure Choice\" method=\"post\" action=\"".$_SERVER['PHP_SELF']."\">";
			echo "<h3> Please Select Your Next Path:<br /></h3>";
			echo "<input type=\"radio\" name=\"choice\" value=\"Option1\">".$OptOneStories[$page][1]."<br />";
			echo "<input type=\"radio\" name=\"choice\" value=\"Option2\">".$OptTwoStories[$page][1]."<br />";
			echo "<input type=\"hidden\" name=\"page\" value=\"".++$page."\">";
			echo "<input type=\"submit\" value=\"Submit\" name=\"Submit\" style=\"width:100px\">";
		echo "</form>";
	}
	
	//########
	//# MAIN
	//########

	$OptOneStories= array (
		array(1,"McNally","McNally.txt"),
		array(2,"Concordia","Concordia.txt"),
		array(3,"Augsburg","Augsburg.txt"),
		array(4,"Foshay","Foshay.txt"),
		array(5,"First Ave","FirstAve.txt")
	);
	
	$OptTwoStories = array (
		array(1,"Capitol","Capitol.txt"),
		array(2,"Midway","Midway.txt"),
		array(3,"UofM","UofM.txt"),
		array(4,"Hennepin County","Hennepin_County.txt"),
		array(5,"Target Center","Target_Center.txt")
	);
	
	if(isset($_POST['Submit'])) {		
		$choice = test_input($_POST["choice"]);
		$page = ($_POST["page"]);
		$i = $page - 1;
		
		if ($page <= 4) {
			#Get the Story the User Selected
			if ($choice == "Option1") {
				$story = file_get_contents('./Game_Stories/Game1/'.$OptOneStories[$i][2], true);
			} else if ($choice == "Option2") {
				$story = file_get_contents('./Game_Stories/Game1/'.$OptTwoStories[$i][2], true);
			}
		} else {
			$post_story = file_get_contents('./Game_Stories/Game1/Train_Station.txt', true);
		}
	} else {
		$story_base = file_get_contents('./Game_Stories/Game1/Metro_State.txt', true);
		$page = 0;
	}
?>
	
<!-- ================================================================================================================== -->
<!-- MAIN HTML Page - START -->
<?php
	require ("template_Top.php");
	
	echo "<p>";
		if (isset($post_story)) {
			print $post_story;
		} else if (isset($story)){
			print $story;
			Print_Game_Choices($page);
		} else {
			print $story_base;
			Print_Game_Choices($page);
		}
	echo "</p>";
	
	echo "<a href=\"game.php\">Reset Game</a>";
	
	require ("template_Bottom.php");
?>
