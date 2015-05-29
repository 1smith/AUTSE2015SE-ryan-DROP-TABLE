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

	Search for a Status:<br>
	<input type="text" value="Enter Keyword found in status" 
		onblur="if(this.value == '') { 
		this.value = 'Enter Keyword found in status'; }" 
		onfocus="if(this.value == 'Enter Keyword found in status') {
		 this.value = ''; 
		}" 
	name="input">
	<br><br><Strong>Show: </Strong>
		<input type="checkbox" value="1" name="methodology"/>Methodology
		<input type="checkbox" value="1" name="date_added"/>Date Added

		<input type="checkbox" value="1" name="contributor"/>Contributor
		<input type="checkbox" value="1" name="journal"/>Journal

		<input type="checkbox" value="1" name="level"/>Level
		<input type="checkbox" value="1" name="rater"/>Rater
		<input type="checkbox" value="1" name="rate"/>Rate
		<input type="checkbox" value="1" name="reason"/>Reason
		<input type="checkbox" value="1" name="practice"/>Practice

		<input type="checkbox" value="1" name="outcome"/>Outcome
		<input type="checkbox" value="1" name="when"/>When
		<input type="checkbox" value="1" name="where"/>Where
		<input type="checkbox" value="1" name="why"/>Why
		<input type="checkbox" value="1" name="who"/>Who

		<input type="checkbox" value="1" name="what"/>What
		<input type="checkbox" value="1" name="how"/>How
		<input type="checkbox" value="1" name="result"/>Result
		<input type="checkbox" value="1" name="integrity"/>Integrity
		<input type="checkbox" value="1" name="question"/>Question

		<input type="checkbox" value="1" name="participants"/>Participants
		<input type="checkbox" value="1" name="metrics"/>Metrics
		<input type="checkbox" value="1" name="method"/>Method
		<input type="checkbox" value="1" name="rating"/>User Rating
		<input type="checkbox" value="1" name="numberofratings"/>Number of User who Rated it

		<br><br>
		<input type="submit">
	</form>

	</p>

	</div>

</body>

</html> 