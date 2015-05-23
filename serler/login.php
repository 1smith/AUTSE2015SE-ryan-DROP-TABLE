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
<title>Login</title>
</head>

<body>
	<?php require_once('header.php'); ?>
	
	<div id=text>
	
	<form action = "login.php" method = "post">
	<P>
	Username: <input type="text" name="login">
	Password: <input type="password" name="password">
	<input type="Submit">
	<a href="new.php">Create User Acoount</a>
	</p>

	</form>

	<?php
	if (isset ($_POST["login"]) && isset($_POST["password"])){

		$login = $_POST["login"];
		$pword = $_POST["password"];
	
		require_once('settings.php'); 
		$conn = @mysqli_connect($host, $user, $pswd)
		or die('Failed to connect to server');

		@mysqli_select_db($conn, $dbnm)
		or die('Database not available');
		

		$query = "SELECT password FROM users WHERE user_name = '{$login}'";
		$results = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($results);

		if($row['password'] == $pword){
			echo "<p>correct password {$row['password']}, {$pword}</p>";
			$_SESSION["login"] = $login;
			header("location:index.php");
		}
		else{
			echo "<p>incorrect password {$row['password']}, {$pword}</p>";			
		}

		mysqli_free_result($results);
		mysqli_close($conn);
	}
	?>

	</div>

</body>
</html> 