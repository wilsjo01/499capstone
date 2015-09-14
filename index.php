<?php 
	session_start();	
	require ("template_Top.php"); 
?>
	<h3>Project Description</h3>
	<p>This project will consist of a working interactive website with a simple, meaningful GUI for users to play through games. 
	The web page is in html with php functionality, and it will have a supporting database for storing monster and character information. 
	The game itself is a “choose your own adventure” style game, where the user is presented with a portion of a story, and depending on their choice when prompted, 
	the story will go in one of multiple directions. This particular story is about a monster chase, so occasionally in the story the user will encounter a monster and enter a 1v1 fight.</p>
        
    <h3>Scope</h3>
    <ul>
    	<li>To create an interactive, story-driven game via a website.</li>
        <li>The game will not be a standalone offering, and not downloadable, but will be offered as an interactive online game via website.</li>
        <li>The stories will be no longer than 6 screens in length. New storylines will be offered as additional content to bring users fresh and new adventures.</li>
        <li>Library will contain no more than 4 stories by the semester end.</li>
        <li>Login and scoring is out of scope.</li>
		<li>This is a single player game. No functionality for multiplayer is planned.</li>
		<li>Performance tuning is out of scope.</li>
	</ul>
        
    <p>
		<form action='index.php' method='post'>
    	Sign-up for our monthly Newsletter<br />
        Enter your email address: <input type="text" name="email" id="email" title="enter email here"/>
		</form>
	</p>
<?php 
	$email= $_POST['email'];
	//comment placeholder for prototype
	echo "The email you entered is ".$email." if this email is incorrect please re-enter your email"; 
?>

<?php require ("template_Bottom.php"); ?>