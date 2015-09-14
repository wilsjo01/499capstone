<?php 
	session_start();	
	require ("template_Top.php");	
?>

	<br />
	<p>This is where you'd select the adventure you'd like to play through and your character.</p>
	<br />
	<h3> Start Game </h3> 
	<form name="start" method="post" title="Choose Character"> 
		<table> 
			<tr> <b> Select Character </b>
				<td> Character One
				<input type='radio' name="char" value="char1" checked>
				</td>
				<td> Character Two
				<input type='radio' name="char" value="char2">
				</td>
				<td> Character Three
				<input type='radio' name="char" value="char3"> 
				</td>
			</tr>
		</table>
		<table >
			<tr> <b> Select Game </b>
				<td> Game One
				<input type='radio' name="game" value="game1" checked>
				</td>
				<td> Game Two
				<input type='radio' name="game" value="game2">
				</td>
			</tr>
		</table>
		<input type="Submit" value="Start Game"> 
	</form>

<?php require ("template_Bottom.php"); ?>