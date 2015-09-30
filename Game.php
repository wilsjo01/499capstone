<?php 
	session_start();	
	require ("template_Top.php");
?>
	
	<p id='story'> 
		Metro State Story
	</p> 
	<form name="start" method="post" title="Choose Character" action='Functions.php'> 
		<table> 
			<tr> <b> Select Story Option </b>
				<td> Choice One
				<input type='radio' name="choice" value="McNally">
				</td>
				<td> Choice Two
				<input type='radio' name="choice" value="Capitol">
				</td>
				<td> 
				<input type='submit' name="submit">
				</td>				
			</tr>
		</table>
	</form>
<?php 
	require ("template_Bottom.php"); 
?>