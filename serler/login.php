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
	<li><a href="searchstatusform.php">Search for a Paper</a></li>
	<li><a href="about.php">About SERL</a></li>
	</ul>
	
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
			header("Refresh:0");
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