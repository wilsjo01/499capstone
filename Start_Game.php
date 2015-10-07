<?php 
	session_start();	
	require ("template_Top.php");	
?>

	<br />
	<p>This is where you'd select the adventure you'd like to play through and your character.</p>
	<br />
	<h3> Make Choice </h3> 
	<form name="start" method="get" title="Choose Character" action='Game.php'> 
		<table> 
			<tr> <b> Select Character </b>
			</tr>
			<tr> 
				<td><img src="../images/girl.png" height = 300 width = 180>
				</td>
				<td><img src="../images/girl.png" height = 300 width = 180>
				</td>
				<td><img src="../images/girl.png" height = 300 width = 180>
				</td>
			</tr>
			<tr>
				<td> Sally 
				<input type='radio' name="char" value="sally" checked>
				</td>
				<td> Character Two
				<input type='radio' name="char" value="girl.png">
				</td>
				<td> Character Three
				<input type='radio' name="char" value="girl.png"> 
				</td>
			</tr>
		</table>
		<table >
			<tr> <b> Select Game </b>
			</tr>
			<tr>
				<td><img src="../images/purple_book.png" height=200 width = 150>
				</td>
				<td><img src="../images/green-book-md.png" height=200 width=150 >
				</td>
			</tr>
			<tr>
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