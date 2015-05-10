<?php
 	session_start(); // start the session
	foreach(array_keys($_SESSION) as $k) unset($_SESSION[$k]);
	 header("location:index.php"); // redirect to number.php
?>