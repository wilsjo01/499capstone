<?php
	session_start();	
	require ("template_Top.php");
	
	if (isset($_POST['submit'])) {
		if(isset($_POST['choice'])){
			echo "You have selected :".$_POST['choice'].'<br />';  //  Displaying Selected Value
			$choice =$_POST['choice'];
		}
	}
	
	$OptOneStories = array (
	  	array(1,"McNally","McNally Story"),
	  	array(2,"Concordia","Concordia Story"),
	  	array(3,"Augsburg","Augsburg Story"),
	  	array(4,"Foshay","Foshay Story"),
	  	array(5,"First Ave","First Ave Story")
	);

	$OptTwoStories = array (
	  	array(1,"Capitol","MN State Capitol Story"),
	  	array(2,"Midway","Midway Marketplace Story"),
	  	array(3,"UofM","UofM Medical Story"),
	  	array(4,"Hennepin County","Hennepin County Gov't Center Story"),
	  	array(5,"Target Center","Target Center Story")
	);
	
	$Nextstory = '';
	$OptOne = '';
	$OptTwo ='';
	for ($i = 0; $i < sizeof($OptOneStories) ; $i++){
		echo $OptOneStories[$i][1].'<br />';
		if ($i == 4){
			if ($choice == $OptOneStories[$i][1]) {
				echo $OptOneStories[$i][1];
				echo $NextStory = $OptOneStories[$i][2];
				break;
			}
			echo $OptTwoStories[$i][1].'<br />';		
			if ($choice == $OptTwoStories[$i][1]) {
				echo $OptTwoStories[$i][1];
				echo $NextStory = $OptTwoStories[$i][2];
				break;
			}				
		}
		if ($choice == $OptOneStories[$i][1]) {
			echo $OptOneStories[$i][1];
			echo $NextStory = $OptOneStories[$i][2];
			echo $OptOne = $OptOneStories[$i+1][1];
			echo $OptTwo =$OptTwoStories[$i+1][1];
			break;
		}
		echo $OptTwoStories[$i][1].'<br />';		
		if ($choice == $OptTwoStories[$i][1]) {
			echo $OptTwoStories[$i][1];
			echo $NextStory = $OptTwoStories[$i][2];
			echo $OptOne = $OptOneStories[$i+1][1];
			echo $OptTwo =$OptTwoStories[$i+1][1];
			break;
		}
	}
?>

	<p id='story'> 
<?php
	echo $NextStory;
?>
	</p> 
	<form name="start" method="post" title="Choose Character" action='Functions.php'> 
		<table> 
			<tr> <b> Select Story Option </b>
				<td> Choice One
				<input type='radio' name="choice" value="<?php echo $OptOne ?>">
				</td>
				<td> Choice Two
				<input type='radio' name="choice" value="<?php echo $OptTwo ?>">
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