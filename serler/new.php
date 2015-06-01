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
<title>Create Account</title>
</head>

<body>
	<?php require_once('header.php'); ?>

	<div id=text>


	<br><form action = "new.php" method = "post">
	
	Username: <input type="text" name="username">	</br>
	<br>Password: <input type="password" name="password"></br>
	<br>Email: <input type="text" name="email"></br>
	
	<input type="submit">
	<input type="reset">
	</form>

	
	<?php
	if (isset ($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])){

		$login = $_POST["username"];
		$pword = $_POST["password"];
		$email = $_POST["email"];
	
		require_once('settings.php'); 
		$conn = @mysqli_connect($host, $user, $pswd)
		or die('Failed to connect to server');

		@mysqli_select_db($conn, $dbnm)
		or die('Database not available');
		

		$query = "SELECT * FROM users WHERE email = '{$email}'";
		$results = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($results);

		if(isset($row)){
			echo "<p>User With this email already exists</p>";
		}
		else{
			$result = mysqli_query($conn, 'show tables like "users"');
			$row = mysqli_fetch_assoc($result);
			
			if(isset($row)){
				echo "<p>Table Exists</p>";
			}
			else {
			//ADDED "usertype varchar(20) NOT NULL,"
				echo "<p>Table Doesn't Exist</p>";
				$table = "CREATE TABLE IF NOT EXISTS users (user_name varchar(100) NOT NULL,
						  password varchar(100) NOT NULL, email varchar(100) NOT NULL, usertype varchar(20) NOT NULL,
						  PRIMARY KEY (user_name))";
				@mysqli_query($conn, $table)
				or die('Failed to connect to server');
			}
			
			$query = "INSERT INTO users (user_name, password, email, usertype) VALUES ('{$login}', '{$pword}', '{$email}', 'Standard User')";
	
			if (mysqli_query($conn, $query)) {
				echo "<p>New record created successfully</p>";
				header("location:index.php");

			}
			else {
				echo "<p>Insert Failed</p>";
				echo $query;
				echo "<p>Go back to correct your Input";
				echo '<button onclick="goBack()">
						Go Back
						</button></p>';
				echo "</p>";
			}
		}

		mysqli_free_result($results);
		mysqli_close($conn);
	}
	?>
<script>
	function goBack() {
		window.history.back();
	}
	</script>
	
	</div>

	
</body>
</html> 