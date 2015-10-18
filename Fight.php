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
	
	#How the player/monster array's are setup.
	#Ex. array(x,[Player/Monster],[Hit Points],[Armor/Defense],[Attack Damage]);
	
	Function SetPlayers ($selection) {
		$_SESSION['Players'] = array (
			array(1,"Sally",20,5,4),
			array(2,"John",10,13,6),
			array(3,"Jeremy",6,17,8)
		);
		
		foreach ($_SESSION['Players'] as list($arrItem1, $arrItem2)) {
			if ($arrItem2 === $selection) {
				$arrIndex = $arrItem1-1;
				
				$_SESSION['Player_HitPoints'] = $_SESSION['Players'][$arrIndex][2];
				$_SESSION['Player_Defense'] = $_SESSION['Players'][$arrIndex][3];
				$_SESSION['Player_AtkDmg'] = $_SESSION['Players'][$arrIndex][4];
			}
		}
	}
	
	Function SetMonsters () {
		$_SESSION['Monsters'] = array (
			array(1,"Zombie",14,6,4),
			array(2,"Ogre",18,4,6),
			array(3,"Troll",24,8,8)
		);
		
		#Generate which monster the player will fight
		#Then set session variables for HP & Def.
		$x = rand (0,2);
		$_SESSION['Monster'] = $_SESSION['Monsters'][$x][1];
		$_SESSION['Monster_HitPoints'] = $_SESSION['Monsters'][$x][2];
		$_SESSION['Monster_Defense'] = $_SESSION['Monsters'][$x][3];
		$_SESSION['Monster_AtkDmg'] = $_SESSION['Monsters'][$x][4];
	}
	
	Function Set_Att_Turn ($turn) {
		#Attack Function Ex: Attack (Attacker,Defender)
		switch ($turn) {
			case "Player":
				Attack ("Player","Monster");
				break;
			case "Monster":
				Attack ("Monster","Player");
				break;
		}
	}
	
	Function Attack ($attacker, $defender) {
		/* Making assumption that attack is using a D20 dice here
		*  and is the same for both players and monsters
		*  Adjustable; just trying to get the fight to work
		*/		
		$attackNum = rand (1,20);
		
		if (attackNum >= $_SESSION[$defender.'_Defense']) {
			$TotalDamage = rand(1,$_SESSION[$attacker.'_AtkDmg']);
			$HIT = TRUE;
		}
		
		if ($HIT) {
			echo "The attack HIT";
			if ($TotalDamage >= $_SESSION[$defender.'_HitPoints']) {
				$_SESSION[$defender.'_HitPoints'] = $TotalDamage - $_SESSION[$defender.'_HitPoints'];
			} else {
				#defender is SMOKED because the total damage is more than remaining HP
			}
		} else {
			echo "The attack missed";
		}
	}	
	
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
		$y = rand (0,1);
		
		#2. Go through attack rounds until either the player/monster is defeated
		
		#3. Return TRUE (player win) or FALSE (player lose) back to Game.php
	}
	
	
	#################
	# TESTING MAIN  #
	#################
	
	$_SESSION['character'] = "Sally";
	SetMonsters();
	SetPlayers($_SESSION['character']);
?>
<!-- ================================================================================================================== -->
<!-- MAIN HTML Page - START -->
<?php
	require ("template_Top.php");
	
	print "<p>";
	echo "Welcome <b>".$_SESSION['character']."</b> to the fight.  You have ".$_SESSION['Player_HitPoints']." hitpoints and a defense of ".$_SESSION['Player_Defense'].".  Good Luck!!!";
	print "<br />";
	echo "You will be facing off against a <b>".$_SESSION['Monster']."</b> which has ".$_SESSION['Monster_HitPoints']." hit points and a defense of ".$_SESSION['Monster_Defense'];
	print "</p>";
	
	#Set_Att_Turn ();
	
	require ("template_Bottom.php");
?>
<!-- MAIN HTML Page - END  -->
<!-- ================================================================================================================== -->