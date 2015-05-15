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
	<?php require_once('header.php'); ?>
	
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