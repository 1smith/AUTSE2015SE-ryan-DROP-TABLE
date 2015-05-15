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
	<title>Index</title>

</head>

<body>
	<?php require_once('header.php'); ?>



	<div id=text>
	This is an Repository of papers for SERL at AUT
	</div>
	

</body>
</html> 