<?php 
	session_start();	
	require ("template_Top.php");	
?>

<br />

<form name="Start Game" method="post" title="Character Game Selection" action='Game.php'> 
	<table> 
		<tr><h2>Select a Character</h2></tr>
		<tr>
			<div class="cc-selector">
			<input type="radio" name="CharSelection" value="Tom" id="Tom" checked/>
        	<label class="drinkcard-cc Tom" for="Tom"></label>
        	<input type="radio" name="CharSelection" value="Sally" id="Sally" checked/>
        	<label class="drinkcard-cc Sally" for="Sally"></label>
        	<input type="radio" name="CharSelection" value="Joe" id="Joe" />
        	<label class="drinkcard-cc Joe"for="Joe"></label>
        	<!-- source/help : https://gist.github.com/rcotrina94/7828886 -->
		</div>
		</tr>
</form>
		</tr>
	</table>
	<br />
	<table>
		<tr><h2>Select Story</h2></tr>
		<tr>
			<div class="cc-selector">
        	<input type="radio" name="GameSelection" value="Game1" id="Game1" checked/>
        	<label class="drinkcard-cc Game1" for="Game1"></label>
        	<input type="radio" name="GameSelection" value="Game2" id="Game2" />
        	<label class="drinkcard-cc Game2"for="Game2"></label>
		</div>
		</tr>
	</table>
	<input type="Submit" value="Start Game" name="StartGameSubmit" style="width:100px">
</form>

<br />

<?php require ("template_Bottom.php"); ?>