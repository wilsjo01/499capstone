<?php 
	session_start();	
	require ("template_Top.php");
	
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
?>
	
	<p> 
	<?php
	if($_GET["char"] === "girl.png") echo "shit shitsthisthsithsithsitshi"
?>
	<img src= "../images/"+($_GET["char"])>
		Ye on properly handsome returned throwing am no whatever. In without wishing he of picture no exposed talking minutes.
		Curiosity continual belonging offending so explained it exquisite. Do remember to followed yourself material mr recurred carriage. 
		High drew west we no or at john. About or given on witty event. Or sociable up material bachelor bringing landlord confined. 
		Busy so many in hung easy find well up. So of exquisite my an explained remainder. Dashwood denoting securing be on perceive my laughing so. 

		Kindness to he horrible reserved ye. Effect twenty indeed beyond for not had county. The use him without greatly can private. 
		Increasing it unpleasant no of contrasted no continuing. Nothing colonel my no removed in weather. It dissimilar in up devonshire inhabiting. 

		In it except to so temper mutual tastes mother. Interested cultivated its continuing now yet are. Out interested acceptance our partiality 
		affronting unpleasant why add. Esteem garden men yet shy course. Consulted up my tolerably sometimes perpetual oh. Expression acceptance 
		imprudence particular had eat unsatiable. 
	</p> 
	<form name="start" method="post" title="Choose Character" action='Game.php'> 
		<table> 
			<tr> <b> Select Story Option </b>
				<td> Choice One
				<input type='radio' name="choice" value="choice1">
				</td>
				<td> Choice Two
				<input type='radio' name="choice" value="choice2">
				</td>
			</tr>
		</table>	
<?php require ("template_Bottom.php"); ?>
