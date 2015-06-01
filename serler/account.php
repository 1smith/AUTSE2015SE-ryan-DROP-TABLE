<!DOCTYPE html>
<?php
 session_start(); // start the session
 if (!isset ($_SESSION["login"])) { // check if session variable exists
 $_SESSION["login"] = ""; // create the session variable
 }
 $userlogin = $_SESSION["login"]; // copy the value to a variable
?>

<?php require_once('settings.php');  
	$conn = @mysqli_connect($host, $user, $pswd)
	or die('Failed to connect to server');

	@mysqli_select_db($conn, $dbnm)
	or die('Database not available');

	$query = "SELECT * FROM users WHERE user_name = '{$userlogin}'";
	$results = mysqli_query($conn, $query);

	while($row = mysqli_fetch_assoc($results)) {
		$email = $row['email'];
		$usertype = $row['usertype'];
	}

	mysqli_free_result($results);
	
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $userlogin . "'s account"; ?></title>
</head>

<body>
	<?php require_once('header.php'); ?>
	
	<div id=text>
	<?php
	echo "<h2>{$userlogin}</h2>";
	echo "<br><strong>Email: </strong>{$email}"; 

	$query = "SELECT * FROM query WHERE user_name = '{$userlogin}'";
	$results = mysqli_query($conn, $query);
	echo "<br>";
	
	echo "<br><strong>Saved Query's: </strong>"; 
	echo "<br>";
	


	while($row = mysqli_fetch_assoc($results)) {
		echo "<a href=\"searchstatusprocess.php?{$row['query']}\">{$row['query']}</a>".  "<br>";
	}
	mysqli_free_result($results);
	
	echo "<br><strong>User Type: </Strong>{$usertype}";
	
	mysqli_close($conn);
	?>
	</div>

</body>
</html> 