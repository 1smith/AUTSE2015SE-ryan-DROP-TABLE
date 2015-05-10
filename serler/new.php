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
				echo "<p>Table Doesn't Exist</p>";
				$table = "CREATE TABLE IF NOT EXISTS users (user_name varchar(100) NOT NULL,
						  password varchar(100) NOT NULL, email varchar(100) NOT NULL,
						  PRIMARY KEY (user_name))";
				@mysqli_query($conn, $table)
				or die('Failed to connect to server');
			}
			
			$query = "INSERT INTO users (user_name, password, email) VALUES ('{$login}', '{$pword}', '{$email}')";
	
			if (mysqli_query($conn, $query)) {
				echo "<p>New record created successfully</p>";
				header("location:login.php");

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

	</div>
</body>
</html> 