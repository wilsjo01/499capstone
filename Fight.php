<!-- ================================================================================================================== -->
<?php 
	/*****************************************
	* Author: 		Brandon Markgraf, Joshua Wilson, Madeline Marx, Dwight Solberg
	* Date: 		10/18/15
	* Description:	This is the main page that controls the fights of the game from the stories
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
	
	#How the player/monster array's are setup.
	#Ex. array(x,[Player/Monster],[Hit Points],[Armor/Defense],[Attack Damage]);
	
	Function SetPlayers ($selection) {
		$_SESSION['Players'] = array (
			array(1,"Sally",26,4,9),
			array(2,"Joe",27,3,9),
			array(3,"Tom",15,8,3)
		);
		
		foreach ($_SESSION['Players'] as list($arrItem1, $arrItem2)) {
			if ($arrItem2 === $selection) {
				$arrIndex = $arrItem1-1;
				$_SESSION['Player'] = $_SESSION['Players'][$arrIndex][1];
				$_SESSION['Player_TotalHitPoints'] = $_SESSION['Players'][$arrIndex][2];
				$_SESSION['Player_HitPoints'] = $_SESSION['Players'][$arrIndex][2];
				$_SESSION['Player_Defense'] = $_SESSION['Players'][$arrIndex][3];
				$_SESSION['Player_AtkDmg'] = $_SESSION['Players'][$arrIndex][4];
			}
		}
	}
	
	Function SetMonsters () {
		$_SESSION['Monsters'] = array (
			array(1,"Zombie",22,1,8),
			array(2,"Ogre",20,1,8),
			array(3,"Troll",23,1,8)
		);
		
		#Generate which monster the player will fight
		#Then set session variables for HP & Def.
		$x = rand (0,2);
		$_SESSION['Monster'] = $_SESSION['Monsters'][$x][1];
		$_SESSION['Monster_TotalHitPoints'] = $_SESSION['Monsters'][$x][2];
		$_SESSION['Monster_HitPoints'] = $_SESSION['Monsters'][$x][2];
		$_SESSION['Monster_Defense'] = $_SESSION['Monsters'][$x][3];
		$_SESSION['Monster_AtkDmg'] = $_SESSION['Monsters'][$x][4];
	}
#vvvvvvvvvvv Fighting Functions - START vvvvvvvvvvv#

	Function Set_Att_Turn ($turn) {
		#echo "<b>Function</b> Set_Att_Turn <br />";
		
		#Attack Function Ex: Attack (Attacker,Defender)
		switch ($turn) {
			case 0:
				#echo "Player/Monster <br /><br />";
				$Results = Attack ("Player","Monster");
				break;
			case 1:
				#echo "Monster/Player <br /><br />";
				$Results = Attack ("Monster","Player");
				break;
		}
		
		Return $Results;
	}
	
	Function Attack ($attacker, $defender) {
		/* Making assumption that attack is using a D20 dice here
		*  and is the same for both players and monsters.
		*  We are setting/assuming the HIT is FALSE out of the gate until proven otherwise.
		*/
		
		$HIT = FALSE;
		$attackNum = rand (1,20);
		
		echo $_SESSION[$attacker]." you attempt to attack ".$_SESSION[$defender];
		
		#If attackNum is greater than/or equal to DEF; attack is successful
		if ($attackNum >= $_SESSION[$defender.'_Defense']) {
			#Determine total damage dealt as a result of attack
			$HIT = TRUE;
			$TotalDamage = rand (1,$_SESSION[$attacker.'_AtkDmg']);
			echo " and your attack HITS!!!  You deal a total damage of ".$TotalDamage.".  ";
			
		}
		
		#If $HIT is TRUE; attack was successful; let's take off damage
		if ($HIT) {
			#Take off the damage dealt from the defenders hit points
			$_SESSION[$defender.'_HitPoints'] = $_SESSION[$defender.'_HitPoints'] - $TotalDamage;
			echo $_SESSION[$defender]." you now have ".$_SESSION[$defender.'_HitPoints']." hit points left after being hit from ".$_SESSION[$attacker].".  ";
		} else {
			echo " and your attempt to attack has MISSED and thus you dealt no damage.  ";
			Return TRUE;
		}
		
		if ($_SESSION[$defender.'_HitPoints'] > 0) {
			#defender is still alive as total HP is greater than 0			
			Return TRUE;
		} else {
			#defender is SMOKED because the total damage is more than remaining HP			
			Return FALSE;
		}
		
		
		
	}

#^^^^^^^^^^^ Fighting Functions - END ^^^^^^^^^^^#
	
	#########
	# MAIN  #
	#########
	
	#Action(s) for Initial Start Fight Button from Game.php
	if(isset($_POST['StartFight'])) {
		$_SESSION['character'] = test_input($_POST["CharSelection"]);
		
		#0. Set the Monster and Player stats first
		SetMonsters();
		SetPlayers($_SESSION['character']);
		
		#1. Determine who gets to attack first (0 = Player; 1=Monster)
		$_SESSION['turn'] = rand (0,1);
	}
?>
<!-- ================================================================================================================== -->
<!-- MAIN HTML Page - START -->
<?php
	require ("template_Top.php");
	
#Introductory FIGHT message to start fight
	if(isset($_POST['StartFight'])) {
		echo "<p>";
			echo "Welcome <b>".$_SESSION['character']."</b> to the fight.  You have ".$_SESSION['Player_HitPoints']." HP and a DEF of ".$_SESSION['Player_Defense'].".  Good Luck!!!";
			echo "<br />";
			echo "You will be facing off against a <b>".$_SESSION['Monster']."</b> which has ".$_SESSION['Monster_HitPoints']." HP and a DEF of ".$_SESSION['Monster_Defense'];
			echo "<br />";
		echo "</p>";
		
		
		echo "<table><tr><td>";
		echo "<progress max=\"".$_SESSION['Monster_TotalHitPoints']."\" value=\"".$_SESSION['Monster_HitPoints']."\">CHECK</progress><br>";
		echo "</td><td>";
		if ($_SESSION['Monster']==='Ogre'){
			echo "<img src=\"./images/monster.png\" height = 175><br>ogre";
		}if ($_SESSION['Monster']==='Zombie'){
			echo "<img src=\"./images/zomb.png\" height = 175><br>zombie";
		}if ($_SESSION['Monster']==='Troll'){
			echo "<img src=\"./images/zomb.png\" height = 175><br>troll";
		}
		echo "</td></tr><tr><td>";
		if ($_SESSION['Player']==='Sally'){
			echo "<img src=\"./images/sally.png\" height = 175><br>";
		}if ($_SESSION['Player']==='Tom'){
			echo "<img src=\"./images/tom.png\" height = 175><br>";
		}if ($_SESSION['Player']==='Joe'){
			echo "<img src=\"./images/joe.png\" height = 175><br>";
		}
		echo "</td><td>";
		echo "<progress max=\"".$_SESSION['Player_TotalHitPoints']."\" value=\"".$_SESSION['Player_HitPoints']."\"> other</progress>";
		echo "</td></tr></table>";
		

		echo "<form name=\"customerForm\" action=\"".$_SERVER['PHP_SELF']."\" method=\"post\">";		
			echo "<input type=\"submit\" value=\"Start Fight\" name=\"NextRound\" />";
			echo "<br /><br />";
		echo "</form>";
		require ("template_Bottom.php");		
	}
	
#FIGHT round message(s)/results
	if(isset($_POST['NextRound'])) {
	#2. Get attack round results for player/monster
		$RoundResults = Set_Att_Turn ($_SESSION['turn']);			
		if ($_SESSION['turn'] === 0) {$_SESSION['turn'] = 1;} else {$_SESSION['turn'] = 0;}
	
	#3. Present appropriate results based off $RoundResults
		if ($RoundResults === TRUE) {
			if ($_SESSION['turn'] === 0) {$buttonValue = "Attack";} else {$buttonValue = "Defend";}
			
			
			echo "<table><tr><td>";
			echo "<progress max=\"".$_SESSION['Monster_TotalHitPoints']."\" value=\"".$_SESSION['Monster_HitPoints']."\">CHECK</progress><br>";
			echo "</td><td>";
			if ($_SESSION['Monster']==='Ogre'){
				echo "<img src=\"./images/monster.png\" height = 175><br>ogre";
			}if ($_SESSION['Monster']==='Zombie'){
				echo "<img src=\"./images/zomb.png\" height = 175><br>zombie";
			}if ($_SESSION['Monster']==='Troll'){
				echo "<img src=\"./images/zomb.png\" height = 175><br>troll";
			}			
			echo "</td></tr><tr><td>";
			if ($_SESSION['Player']==='Sally'){
				echo "<img src=\"./images/sally.png\" height = 175><br>";
			}if ($_SESSION['Player']==='Tom'){
				echo "<img src=\"./images/tom.png\" height = 175><br>";
			}if ($_SESSION['Player']==='Joe'){
				echo "<img src=\"./images/joe.png\" height = 175><br>";
			}
			echo "</td><td>";
			echo "<progress max=\"".$_SESSION['Player_TotalHitPoints']."\" value=\"".$_SESSION['Player_HitPoints']."\"> other</progress>";
			echo "</td></tr></table>";
			
			
			
			echo "<form name=\"NextRound\" action=\"".$_SERVER['PHP_SELF']."\" method=\"post\">";		
				echo "<input type=\"submit\" value=\"".$buttonValue."\" name=\"NextRound\" />";
				echo "<br /><br />";
			echo "</form>";
			
			require ("template_Bottom.php");
		}
	
	#4. Allow player to return to Game.php to continue story (player WIN); otherwise return to index.php (home page) as story is over (player LOST)
		if ($RoundResults === FALSE) {
			if ($_SESSION['Player_HitPoints'] > 0) {
			#-- Player WON the fight; story can continue --#
				echo "<p>".$_SESSION['Player']." you WON your fight against ".$_SESSION['Monster'].".  You are able to continue the story...</p>";				
				echo "<form name=\"StoryReturn\" action=\"Game.php\" method=\"post\">";		
					echo "<input type=\"submit\" value=\"Return to Story\" name=\"StoryReturn\" />";
					echo "<br /><br />";
				echo "</form>";
			} else {
			#-- Player LOST the fight; story cannot continue; thus return to home page --#
				echo "<p>".$_SESSION['Player']." you LOST the Fight against ".$_SESSION['Monster'].".  Sadly, your story cannot continue. Better luck next time.</p>";
				header("refresh:10;url=http://localhost:8888/ICS499_Capstone/Index.php");				
			}
			require ("template_Bottom.php");
		}		
	}
?>
<!-- MAIN HTML Page - END  -->
<!-- ================================================================================================================== -->

<?php
	#2. Go through attack rounds until either the player/monster is defeated
	/*
	Do {
		echo "<b>Start of round.</b> <br /><br />";
		$RoundResults = Set_Att_Turn ($_SESSION['turn']);			
		if ($_SESSION['turn'] === 0) {$_SESSION['turn'] = 1;} else {$_SESSION['turn'] = 0;}
		echo "<b>End of round.</b> <br /><hr />";		
		#header("refresh:5;");
	} While ($RoundResults === TRUE);
	*/
	
	
	#3. Return TRUE (player win) or FALSE (player lose) back to Game.php
	/*
	if ($_SESSION['Player_HitPoints'] > 0) {
		#Player won the fight; story can continue
		echo $_SESSION['Player']." you WON the Fight <br />";
		Return TRUE;
	} else {
		#Player lost the fight; story cannot continue
		echo $_SESSION['Player']." you LOST the Fight <br />";
		Return FALSE;
	}
	*/
?>