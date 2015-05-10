<!DOCTYPE html>
<?php
 session_start(); // start the session
 if (!isset ($_SESSION["login"])) { // check if session variable exists
 $_SESSION["login"] = ""; // create the session variable
 }
 $userlogin = $_SESSION["login"]; // copy the value to a variable
?>


<html>

<head>
<link rel="stylesheet" type="text/css" href="styles.css">

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Enter a Keyword to search for</title>

</head>



<body>
	<div id=login>
		<?php if($userlogin != ""){ echo "{$userlogin} <a href=\"logout.php\">Log Out</a>";} else echo "<a href=\"login.php\">Login to SERLER</a>"; ?>
	</div>
	<div id=quicksearch>
	<form id="quicksearch" action = "searchstatusprocess.php" method = "get">
		<input type="text" value="Search for Papers" 
			onblur="if(this.value == '') { 
			this.value = 'Search for Papers'; }" 
			onfocus="if(this.value == 'Search for Papers') {
			 this.value = ''; 
			}" 
		name="input">
		<input type="Submit" name="button">
	</form>
	</div>
	<h1>SERLER Software Engineering Research Laboratory Evidence Repository</h1>
	
	
	<ul class="menu">
	<li><a href="index.php">Home</a></li>
	<li><a href="poststatusform.php">Add a Paper</a></li>
	<li><a href="searchstatusform.php">Advanced Search</a></li>
	<li><a href="about.php">About SERL</a></li>
	</ul>
	
	<div id=text>
	<p>

	<form id="search" action = "searchstatusprocess.php" method = "get">

	Search for a Status:
	<input type="text" value="Enter Keyword found in status" 
		onblur="if(this.value == '') { 
		this.value = 'Enter Keyword found in status'; }" 
		onfocus="if(this.value == 'Enter Keyword found in status') {
		 this.value = ''; 
		}" 
	name="input">
	<input type="Submit" name="button">
	</form>

	</p>

	</div>

</body>

</html> 