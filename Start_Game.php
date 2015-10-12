<?php 
	session_start();	
	require ("template_Top.php");	
?>

<br />

<form name="Start Game" method="post" title="Character Game Selection" action='Game.php'> 
	<table> 
		<tr><b>Select a Character</b></tr>
		<tr> 
			<td><img src="./images/girl.png" height = 75 width = 45></td>
			<!-- 
			<td><img src="./images/girl.png" height = 300 width = 180></td>
			<td><img src="./images/girl.png" height = 300 width = 180></td>
			-->
		</tr>
		<tr>
			<td>Sally <input type="radio" name="CharSelection" value="Sally" checked></td>
			<!-- 
			<td>Character Two <input type='radio' name="char" value="girl.png"></td>
			<td>Character Three<input type='radio' name="char" value="girl.png"></td>
			-->
		</tr>
	</table>
	<br />
	<table>
		<tr><b> Select Game </b></tr>
		<tr>
			<td><img src="./images/purple_book.png" height=50 width = 37></td>
			<!-- 
			<td><img src="./images/green-book-md.png" height=200 width=150></td> 
			-->
		</tr>
		<tr>
			<td>MetroState Adventure<input type="radio" name="GameSelection" value="Game1" checked></td>
		</tr>
	</table>
	<input type="Submit" value="Start Game" name="StartGameSubmit" style="width:100px">
</form>

<br />

<?php require ("template_Bottom.php"); ?>