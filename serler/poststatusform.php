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
<title>Input your Status </title>
</head>

<body>
	<?php require_once('header.php'); ?>

	<div id=text>
	<br><form action = "poststatusprocess.php" method = "post">
	
	Title: <input type="text" name="title">	</br>
	<br>Contributor Name: <input type="text" name="contributor" <?php echo "value= \"{$userlogin}\"";?>readonly></br>
	<br>Authors: <input type="text" name="authors"></br>
	<br>Venue: <input type="text" name="venue"></br>
	<br>Quality: <input type="text" name="quality"></br>
	<br>Tags: <input type="text" name="tags"></br>
	<br>Year: <input type="text" name="year"></br>
	<br>Abstract up to 1000 words: <textarea name="abstract" style="height:200px; width:100%";></textarea></br>
	
	<input type="submit">
	<input type="reset">
	</form>
	</div>
</body>
</html> 