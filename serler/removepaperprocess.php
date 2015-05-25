<!DOCTYPE html>
<?php
 session_start(); // start the session
 if (!isset ($_SESSION["login"])) { // check if session variable exists
 $_SESSION["login"] = ""; // create the session variable
 }
 $userlogin = $_SESSION["login"]; // copy the value to a variable
?>
<!--TO DO:
	- Check that the paper the user wants to delete is his own *contributor*
	- Remove the paper/row from the table using 
	
	
	-->

<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Remove a Paper process </title>
</head>

<!-- not sure if needed-->
<body>
	<script type="text/javascript">
	    function toggle_visibility() {
	    	alert("Please Login");
	    	window.location = "login.php";
	    }
	</script>
<!--include header-->
	<?php require_once('header.php'); ?>

	<?php
	//Get ID of row to delete
	if (isset ($_GET["id"])){
		require_once('settings.php');
		$id = $_GET["id"];

		echo $id;
	//connect to DB
		$conn = @mysqli_connect($host, $user, $pswd)
		or die('Failed to connect to server');
	//select DB
		@mysqli_select_db($conn, $dbnm)
		or die('Database not available');

	//Set the query to delete
		$query = "DELETE FROM serler WHERE id = '{$id}'";

	//delete the row, throw error if it cant
		if (mysqli_query($conn, $query)){
			echo "Paper removed successfully";
			echo $query;
		} else{
			echo "Error removing paper: " . mysqli_error($conn);
	}

		mysqli_close($conn);
		header("location:removepaperform.php");
	}
	?>
</body>
</html>